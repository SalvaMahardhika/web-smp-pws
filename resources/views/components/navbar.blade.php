<!-- NAVBAR -->
<nav class="relative z-50 flex justify-between items-center px-10 py-4 bg-white shadow">
    <div class="flex items-center gap-3">
        <img src="{{ asset('img/logo.png') }}" class="w-12">
        <div>
            <h2 class="text-blue-500 font-bold text-lg">SMPN 1 Purwosari</h2>
            <p class="text-sm text-gray-500">Sekolah Standart Nasional (SSN)</p>
        </div>
    </div>

    <ul class="flex gap-8 font-medium">

        <li><a href="{{ route('beranda') }}" class="hover:text-blue-500">Beranda</a></li>

        <!-- PROFILE -->
        <li class="relative group cursor-pointer">
            <button class="flex items-center gap-1">
                Profile <span>▾</span>
            </button>

            <div class="absolute top-full left-0 w-full h-3"></div>

            <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 bg-white shadow-lg rounded-lg mt-1 w-48 text-left">
                
                <li>
                    <a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Sejarah
                    </a>
                </li>

                <li>
                    <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Visi Misi
                    </a>
                </li>

                <li>
                    <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Struktur Organisasi
                    </a>
                </li>

            </ul>
        </li>

        <!-- DATA -->
        <li class="relative group cursor-pointer">
            <button class="flex items-center gap-1">
                Data <span>▾</span>
            </button>

            <div class="absolute top-full left-0 w-full h-3"></div>

            <ul class="absolute top-full left-0 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 bg-white shadow-lg rounded-lg mt-1 w-48 text-left">
                <li><a href="{{ route('data.siswa') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Data Siswa
                </a></li>

                <li><a href="{{ route('data.guru') }}" class="block px-4 py-2 hover:bg-gray-100">
                    Data Guru
                </a></li>
            </ul>
        </li>

        <li><a href="{{ route('galeri') }}">Galeri</a></li>
        <li><a href="{{ route('kontak') }}">Kontak</a></li>

    </ul>
</nav>