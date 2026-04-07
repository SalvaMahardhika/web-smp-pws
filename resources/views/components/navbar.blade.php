<nav class="relative z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-3 flex justify-between items-center">
        
        <div class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('img/logo.png') }}" class="w-10 md:w-12">
            <div>
                <h2 class="text-blue-600 font-bold text-sm md:text-lg leading-tight">SMPN 1 Purwosari</h2>
                <p class="text-[10px] md:text-xs text-gray-500 uppercase tracking-wider">Sekolah Standart Nasional</p>
            </div>
        </div>

        <div class="hidden lg:flex items-center gap-8">
            <ul class="flex gap-8 font-medium text-gray-700 items-center">
                <li><a href="{{ route('beranda') }}" class="hover:text-blue-500 transition">Beranda</a></li>

                <li class="relative group cursor-pointer">
                    <button class="flex items-center gap-1 hover:text-blue-500 transition focus:outline-none">
                        Profile <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute top-full left-0 w-full h-3"></div>
                    <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 bg-white shadow-xl rounded-xl mt-1 w-48 py-2 border border-gray-100">
                        <li><a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Sejarah</a></li>
                        <li><a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Visi Misi</a></li>
                        <li><a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Struktur Organisasi</a></li>
                    </ul>
                </li>

                <li class="relative group cursor-pointer">
                    <button class="flex items-center gap-1 hover:text-blue-500 transition focus:outline-none">
                        Data <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute top-full left-0 w-full h-3"></div>
                    <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 bg-white shadow-xl rounded-xl mt-1 w-48 py-2 border border-gray-100">
                        <li><a href="{{ route('data.siswa') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Data Siswa</a></li>
                        <li><a href="{{ route('data.guru') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Data Guru</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('galeri') }}" class="hover:text-blue-500 transition">Galeri</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-blue-500 transition">Kontak</a></li>
            </ul>

            @if(session('login'))
            <div class="relative ml-4">
                <button onclick="toggleProfileDesktop(event)" class="focus:outline-none flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full border border-gray-200 hover:bg-gray-100 transition">
                    <span class="text-sm font-medium text-gray-700 hidden xl:block">{{ session('name') }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ session('name') }}&background=3b82f6&color=fff" class="w-8 h-8 rounded-full border border-white shadow-sm">
                </button>
                <div id="profileMenuDesktop" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl p-4 border border-gray-100 z-50">
                    <div class="text-center mb-3">
                        <p class="font-bold text-gray-800">{{ session('name') }}</p>
                        <p class="text-xs text-blue-500 font-medium uppercase tracking-wide">{{ session('role') }}</p>
                    </div>
                    <hr class="mb-3 border-gray-100">
                    <button onclick="openProfileModal()" class="w-full text-left px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded-lg text-sm transition font-medium">Edit Profile</button>
                    <a href="{{ route('logout') }}" class="block px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg text-sm transition font-medium">Logout</a>
                </div>
            </div>
            @endif
        </div>

        <div class="flex lg:hidden items-center gap-4">
            @if(session('login'))
            <div class="relative">
                <button onclick="toggleProfileMobile(event)" class="focus:outline-none pt-1">
                    <img src="https://ui-avatars.com/api/?name={{ session('name') }}&background=3b82f6&color=fff" class="w-8 h-8 rounded-full border border-gray-200">
                </button>
                
                <div id="profileMenuMobile" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl p-4 border border-gray-100 z-[60]">
                    <div class="text-center mb-3">
                        <p class="font-bold text-gray-800">{{ session('name') }}</p>
                        <p class="text-xs text-blue-500 font-medium uppercase tracking-wide">{{ session('role') }}</p>
                    </div>
                    <hr class="mb-3 border-gray-100">
                    <button onclick="openProfileModal()" class="w-full text-left px-3 py-2 hover:bg-blue-50 hover:text-blue-600 rounded-lg text-sm transition font-medium">Edit Profile</button>
                    <a href="{{ route('logout') }}" class="block px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg text-sm transition font-medium">Logout</a>
                </div>
            </div>
            @endif

            <button id="mobileMenuBtn" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition focus:outline-none">
                <svg id="hamburgerIcon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-100 overflow-hidden">
        <div class="px-4 py-6 space-y-4 font-medium text-gray-700">
            <a href="{{ route('beranda') }}" class="block py-2 border-b border-gray-50 hover:text-blue-500">Beranda</a>
            
            <details class="group">
                <summary class="flex justify-between items-center list-none py-2 border-b border-gray-50 cursor-pointer hover:text-blue-500">
                    Profile <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="pl-4 mt-2 space-y-2 text-sm text-gray-600">
                    <a href="{{ route('sejarah') }}" class="block py-2">Sejarah</a>
                    <a href="{{ route('visimisi') }}" class="block py-2">Visi Misi</a>
                    <a href="{{ route('struktur') }}" class="block py-2">Struktur Organisasi</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex justify-between items-center list-none py-2 border-b border-gray-50 cursor-pointer hover:text-blue-500">
                    Data <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="pl-4 mt-2 space-y-2 text-sm text-gray-600">
                    <a href="{{ route('data.siswa') }}" class="block py-2">Data Siswa</a>
                    <a href="{{ route('data.guru') }}" class="block py-2">Data Guru</a>
                </div>
            </details>

            <a href="{{ route('galeri') }}" class="block py-2 border-b border-gray-50 hover:text-blue-500">Galeri</a>
            <a href="{{ route('kontak') }}" class="block py-2 hover:text-blue-500">Kontak</a>
        </div>
    </div>
</nav>

<div id="profileModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black bg-opacity-50 px-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-95 duration-200">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Edit Profile</h3>
                <button onclick="closeProfileModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ session('name') }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ganti"
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="button" onclick="closeProfileModal()" 
                        class="flex-1 px-4 py-2 border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 font-medium transition">Batal</button>
                    <button type="submit" 
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium shadow-lg transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const profileMenuDesktop = document.getElementById('profileMenuDesktop');
    const profileMenuMobile = document.getElementById('profileMenuMobile');
    const profileModal = document.getElementById('profileModal');

    // Toggle Mobile Nav
    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        mobileMenu.classList.toggle('hidden');
        if(profileMenuMobile) profileMenuMobile.classList.add('hidden');
    });

    // Toggle Desktop Profile
    function toggleProfileDesktop(e) {
        if(e) e.stopPropagation();
        profileMenuDesktop.classList.toggle('hidden');
    }

    // Toggle Mobile Profile
    function toggleProfileMobile(e) {
        if(e) e.stopPropagation();
        profileMenuMobile.classList.toggle('hidden');
        mobileMenu.classList.add('hidden');
    }

    // Modal Control
    function openProfileModal() {
        // Sembunyikan semua menu yang sedang terbuka
        if(profileMenuDesktop) profileMenuDesktop.classList.add('hidden');
        if(profileMenuMobile) profileMenuMobile.classList.add('hidden');
        
        // Tampilkan modal
        profileModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Lock scroll
    }

    function closeProfileModal() {
        profileModal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Unlock scroll
    }

    // Global Click Listener (untuk tutup menu saat klik di luar)
    window.addEventListener('click', function(e) {
        // Tutup Dropdown Desktop
        if (profileMenuDesktop && !profileMenuDesktop.contains(e.target)) {
            profileMenuDesktop.classList.add('hidden');
        }
        // Tutup Dropdown Mobile
        if (profileMenuMobile && !profileMenuMobile.contains(e.target)) {
            profileMenuMobile.classList.add('hidden');
        }
        // Tutup Nav Mobile
        if (mobileMenu && !mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
        // Tutup Modal jika klik pada background hitam
        if (e.target === profileModal) {
            closeProfileModal();
        }
    });
</script>