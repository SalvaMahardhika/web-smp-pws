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
                <li><a href="{{ route('beranda') }}" class="hover:text-blue-500 transition font-semibold text-blue-600">Beranda</a></li>

                <li class="relative group cursor-pointer">
                    <button class="flex items-center gap-1 hover:text-blue-500 transition focus:outline-none font-semibold text-blue-600">
                        Profile <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute top-full left-0 w-full h-3"></div>
                    <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 bg-white shadow-xl rounded-xl mt-1 w-48 py-2 border border-gray-100">
                        <li><a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 font-semibold text-blue-600">Sejarah</a></li>
                        <li><a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 font-semibold text-blue-600">Visi Misi</a></li>
                        <li><a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 font-semibold text-blue-600">Struktur Organisasi</a></li>
                    </ul>
                </li>

                <li class="relative group cursor-pointer">
                    <button class="flex items-center gap-1 hover:text-blue-500 transition focus:outline-none font-semibold text-blue-600">
                        Data <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute top-full left-0 w-full h-3"></div>
                    <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 bg-white shadow-xl rounded-xl mt-1 w-48 py-2 border border-gray-100">
                        <li><a href="{{ route('data.siswa') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 font-semibold text-blue-600">Data Siswa</a></li>
                        <li><a href="{{ route('data.guru') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 font-semibold text-blue-600">Data Guru</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('galeri') }}" class="hover:text-blue-500 transition font-semibold text-blue-600">Galeri</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-blue-500 transition font-semibold text-blue-600">Kontak</a></li>

                @if(session('role') === 'super_admin')
                <li>
                    <a href="{{ route('kelola.akun') }}" 
                       class="hover:text-blue-500 transition font-semibold text-blue-600">
                       Kelola Akun
                    </a>
                </li>
                @endif
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
            <a href="{{ route('beranda') }}" class="block py-2 border-b border-gray-50 hover:text-blue-500 font-semibold text-blue-600">Beranda</a>
            
            <details class="group">
                <summary class="flex justify-between items-center list-none py-2 border-b border-gray-50 cursor-pointer hover:text-blue-500 font-semibold text-blue-600">
                    Profile <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="pl-4 mt-2 space-y-2 text-sm text-gray-600">
                    <a href="{{ route('sejarah') }}" class="block py-2 font-semibold text-blue-600">Sejarah</a>
                    <a href="{{ route('visimisi') }}" class="block py-2 font-semibold text-blue-600">Visi Misi</a>
                    <a href="{{ route('struktur') }}" class="block py-2 font-semibold text-blue-600">Struktur Organisasi</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex justify-between items-center list-none py-2 border-b border-gray-50 cursor-pointer hover:text-blue-500 font-semibold text-blue-600">
                    Data <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="pl-4 mt-2 space-y-2 text-sm text-gray-600">
                    <a href="{{ route('data.siswa') }}" class="block py-2 font-semibold text-blue-600">Data Siswa</a>
                    <a href="{{ route('data.guru') }}" class="block py-2 font-semibold text-blue-600">Data Guru</a>
                </div>
            </details>

            <a href="{{ route('galeri') }}" class="block py-2 border-b border-gray-50 hover:text-blue-500 font-semibold text-blue-600">Galeri</a>
            <a href="{{ route('kontak') }}" class="block py-2 hover:text-blue-500 font-semibold text-blue-600">Kontak</a>

            @if(session('role') === 'super_admin')
            <a href="{{ route('kelola.akun') }}" 
               class="block py-2 border-t border-gray-50 text-blue-600 font-semibold">
               Kelola Akun
            </a>
            @endif
        </div>
    </div>
</nav>

<div id="profileModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black bg-opacity-50 px-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-95 duration-200">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">Edit Profile</h3>
                <button onclick="closeProfileModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" onsubmit="return validatePasswordForm()">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ session('name') }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ session('email') }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>

                    <div class="pt-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">
                            Ubah Password <span class="normal-case text-gray-400 font-normal">(opsional)</span>
                        </p>

                        <div class="relative mb-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Password Lama</label>
                            <input type="password" id="oldPasswordInput" name="old_password" placeholder="Masukkan password lama"
                                class="w-full px-4 py-2 pr-10 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
                            <button type="button" onclick="togglePassword('oldPasswordInput', 'eyeOld')" class="absolute right-3 top-9 text-gray-400">
                                <svg id="eyeOld" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        <div class="relative mb-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
                            <input type="password" id="newPasswordInput" name="password" placeholder="Masukkan password baru"
                                class="w-full px-4 py-2 pr-10 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition"
                                oninput="checkPasswordStrength(this.value)">
                            <button type="button" onclick="togglePassword('newPasswordInput', 'eyeNew')" class="absolute right-3 top-9 text-gray-400">
                                <svg id="eyeNew" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <div id="passwordStrengthBar" class="mt-2 hidden">
                                <div class="flex gap-1">
                                    <div id="bar1" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                                    <div id="bar2" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                                    <div id="bar3" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                                    <div id="bar4" class="h-1 flex-1 rounded-full bg-gray-200"></div>
                                </div>
                                <p id="passwordStrengthText" class="text-xs mt-1 text-gray-400"></p>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" id="confirmPasswordInput" name="password_confirmation" placeholder="Ulangi password baru"
                                class="w-full px-4 py-2 pr-10 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition"
                                oninput="checkPasswordMatch()">
                            <button type="button" onclick="togglePassword('confirmPasswordInput', 'eyeConfirm')" class="absolute right-3 top-9 text-gray-400">
                                <svg id="eyeConfirm" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <p id="passwordMatchMsg" class="text-xs mt-1 hidden"></p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="button" onclick="closeProfileModal()" class="flex-1 px-4 py-2 border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 font-medium transition">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 font-medium shadow-lg transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // --- UI Controls ---
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const profileMenuDesktop = document.getElementById('profileMenuDesktop');
    const profileMenuMobile = document.getElementById('profileMenuMobile');
    const profileModal = document.getElementById('profileModal');

    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        mobileMenu.classList.toggle('hidden');
        if(profileMenuMobile) profileMenuMobile.classList.add('hidden');
    });

    function toggleProfileDesktop(e) { e.stopPropagation(); profileMenuDesktop.classList.toggle('hidden'); }
    function toggleProfileMobile(e) { e.stopPropagation(); profileMenuMobile.classList.toggle('hidden'); mobileMenu.classList.add('hidden'); }
    function openProfileModal() { profileModal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
    function closeProfileModal() { profileModal.classList.add('hidden'); document.body.style.overflow = 'auto'; resetPasswordFields(); }

    window.addEventListener('click', (e) => {
        if (profileMenuDesktop && !profileMenuDesktop.contains(e.target)) profileMenuDesktop.classList.add('hidden');
        if (profileMenuMobile && !profileMenuMobile.contains(e.target)) profileMenuMobile.classList.add('hidden');
        if (mobileMenu && !mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) mobileMenu.classList.add('hidden');
        if (e.target === profileModal) closeProfileModal();
    });

    // --- Password Logic ---
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
        } else {
            input.type = 'password';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
        }
    }

    function checkPasswordStrength(value) {
        const bar = document.getElementById('passwordStrengthBar');
        const text = document.getElementById('passwordStrengthText');
        if (value.length === 0) { bar.classList.add('hidden'); return; }
        bar.classList.remove('hidden');
        let score = (value.length >= 6 ? 1 : 0) + (/[A-Z]/.test(value) ? 1 : 0) + (/[0-9]/.test(value) ? 1 : 0) + (/[^A-Za-z0-9]/.test(value) ? 1 : 0);
        const colors = ['bg-red-400', 'bg-orange-400', 'bg-yellow-400', 'bg-green-500'];
        const labels = ['Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];
        for (let i = 1; i <= 4; i++) {
            let b = document.getElementById('bar' + i);
            b.className = `h-1 flex-1 rounded-full ${i <= score ? colors[score-1] : 'bg-gray-200'} transition-all`;
        }
        text.textContent = labels[score-1] || 'Sangat Lemah';
    }

    function checkPasswordMatch() {
        const msg = document.getElementById('passwordMatchMsg');
        const match = document.getElementById('newPasswordInput').value === document.getElementById('confirmPasswordInput').value;
        msg.classList.remove('hidden');
        msg.textContent = match ? '✓ Password cocok' : '✗ Password tidak cocok';
        msg.className = `text-xs mt-1 ${match ? 'text-green-600' : 'text-red-500'}`;
    }

    function validatePasswordForm() {
        const oldP = document.getElementById('oldPasswordInput').value;
        const newP = document.getElementById('newPasswordInput').value;
        const confP = document.getElementById('confirmPasswordInput').value;
        if (newP || confP) {
            if (!oldP) { alert('Password lama harus diisi!'); return false; }
            if (newP !== confP) { alert('Konfirmasi password tidak cocok!'); return false; }
            if (newP.length < 6) { alert('Password baru minimal 6 karakter!'); return false; }
        }
        return true;
    }

    function resetPasswordFields() {
        ['oldPasswordInput', 'newPasswordInput', 'confirmPasswordInput'].forEach(id => document.getElementById(id).value = '');
        document.getElementById('passwordStrengthBar').classList.add('hidden');
        document.getElementById('passwordMatchMsg').classList.add('hidden');
    }
</script>

@if(session('error'))
    <script>alert("Gagal: {{ session('error') }}");</script>
@endif

@if(session('success'))
    <script>alert("Berhasil: {{ session('success') }}");</script>
@endif