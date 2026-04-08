<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SMPN 1 Purwosari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        /* Utilitas untuk menyembunyikan scrollbar namun tetap bisa di-scroll */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .hover-lift { transition: all 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

<x-navbar />

<section class="relative min-h-[85vh] flex items-center px-6 md:px-20 text-white overflow-hidden">
    <img src="{{ asset('img/image1.png') }}" class="absolute inset-0 w-full h-full object-cover z-0 brightness-[0.4]">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-transparent z-0"></div>

    <div class="relative z-10 max-w-3xl">
        <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-widest uppercase bg-blue-600 rounded-full">Official Website</span>
        <h1 class="text-4xl md:text-7xl font-extrabold leading-[1.1]">
            Membentuk Masa Depan di <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">SMPN 1 Purwosari</span>
        </h1>
        <p class="mt-6 text-lg md:text-xl text-slate-200 max-w-xl font-light leading-relaxed">
            Mewujudkan generasi cerdas, kreatif, dan berkarakter melalui ekosistem pendidikan yang inovatif dan religius.
        </p>
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="#ekstrakurikuler" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold shadow-lg shadow-blue-500/30 transition-all">Lihat Kegiatan</a>
            <a href="/sejarah" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/20 rounded-2xl font-bold transition-all">Profil Sekolah</a>
        </div>
    </div>
</section>

<section class="py-20 px-6 md:px-10">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight">Berita <span class="text-blue-600">Terbaru</span></h2>
                <p class="text-slate-500 mt-2 text-lg">Ikuti perkembangan dan prestasi siswa kami.</p>
            </div>
            <a href="#" class="text-blue-600 font-bold hover:text-blue-800 transition">Lihat Semua Berita →</a>
        </div>

        <div class="flex md:grid md:grid-cols-3 gap-8 overflow-x-auto md:overflow-visible pb-10 hide-scrollbar snap-x">
            @foreach (['berita1', 'berita2', 'berita3'] as $news)
            <div class="min-w-[85%] md:min-w-0 bg-white rounded-[2rem] p-3 border border-slate-100 shadow-xl shadow-slate-200/50 hover-lift snap-center">
                <img src="{{ asset('img/'.$news.'.png') }}" class="h-52 w-full object-cover rounded-[1.5rem] mb-4">
                <div class="px-3 pb-4">
                    <span class="text-[10px] font-bold uppercase text-blue-500 tracking-wider">Aktivitas • 2024</span>
                    <h3 class="font-bold text-xl mt-2 leading-tight text-slate-800 line-clamp-2">
                        {{ $news == 'berita1' ? 'Future Coders: Pelatihan Koding AI SMPN 1 Purwosari' : ($news == 'berita2' ? 'Workshop Literasi Guru Era Digital' : 'Peringatan Maulid Nabi 1446 H') }}
                    </h3>
                    <p class="text-blue-600 text-sm mt-4 font-bold">Baca Selengkapnya →</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-slate-900 text-white px-6 md:px-10 overflow-hidden">
    <div class="max-w-7xl mx-auto relative">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl font-black italic opacity-10 absolute -top-10 left-1/2 -translate-x-1/2 w-full uppercase">Our Facilities</h2>
            <h2 class="text-3xl md:text-5xl font-extrabold relative">Fasilitas <span class="text-blue-500">Unggulan</span></h2>
            <p class="text-slate-400 mt-4">Lingkungan belajar kondusif dengan standar teknologi terkini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-4">
            <div class="md:col-span-2 md:row-span-2 bg-blue-600 p-8 rounded-[2.5rem] flex flex-col justify-end min-h-[300px] relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 text-6xl font-black opacity-20 group-hover:scale-110 transition">01</div>
                <h3 class="text-3xl font-bold mb-2">Lab Komputer</h3>
                <p class="text-blue-100">Dilengkapi dengan iMac & PC high-end untuk menunjang pembelajaran desain dan koding.</p>
            </div>

            @php
                $fasilitas = [
                    ['02','Perpustakaan Digital','Koleksi ribuan e-book'],
                    ['03','Aula Serbaguna','Kapasitas 500 orang'],
                    ['04','Sport Center','Area olahraga outdoor & indoor'],
                    ['05','Laboratorium Sains','Eksperimen kimia & fisika'],
                ];
            @endphp
            @foreach ($fasilitas as $f)
            <div class="bg-slate-800/50 hover:bg-slate-800 border border-slate-700 p-6 rounded-[2rem] transition-all">
                <div class="text-blue-500 font-bold mb-4">#{{ $f[0] }}</div>
                <h3 class="text-xl font-bold mb-2">{{ $f[1] }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">{{ $f[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="ekstrakurikuler" class="py-24 px-6 md:px-10 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-5xl font-extrabold">Ekstrakurikuler</h2>
            <p class="text-slate-500 mt-4 max-w-2xl mx-auto text-lg italic">
                "Wadah pengembangan minat dan bakat siswa."
            </p>
        </div>
        
        <div class="flex lg:grid lg:grid-cols-3 gap-8 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-8">
            
            <div class="min-w-[85%] md:min-w-[45%] lg:min-w-full group flex flex-col bg-slate-50 rounded-[2.5rem] overflow-hidden shadow-lg hover-lift snap-center">
                <div class="h-60 overflow-hidden relative">
                    <img src="{{ asset('img/futsal.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-4 py-1 rounded-full">Olahraga</div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-800">Futsal</h3>
                    <p class="text-slate-600 mt-4 leading-relaxed text-sm">
                        Membangun kerjasama tim, melatih ketangkasan fisik, serta sportivitas siswa melalui kompetisi dan latihan rutin.
                    </p>
                </div>
            </div>

            <div class="min-w-[85%] md:min-w-[45%] lg:min-w-full group flex flex-col bg-slate-50 rounded-[2.5rem] overflow-hidden shadow-lg hover-lift snap-center">
                <div class="h-60 overflow-hidden relative">
                    <img src="{{ asset('img/pramuka.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-amber-600 text-white text-xs font-bold px-4 py-1 rounded-full">Karakter</div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-800">Pramuka</h3>
                    <p class="text-slate-600 mt-4 leading-relaxed text-sm">
                        Fokus pada pembentukan karakter mandiri, disiplin, dan jiwa kepemimpinan melalui kegiatan kepanduan edukatif.
                    </p>
                </div>
            </div>

            <div class="min-w-[85%] md:min-w-[45%] lg:min-w-full group flex flex-col bg-slate-50 rounded-[2.5rem] overflow-hidden shadow-lg hover-lift snap-center">
                <div class="h-60 overflow-hidden relative">
                    <img src="{{ asset('img/senitari.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-purple-600 text-white text-xs font-bold px-4 py-1 rounded-full">Seni Budaya</div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-800">Seni Tari</h3>
                    <p class="text-slate-600 mt-4 leading-relaxed text-sm">
                        Melestarikan budaya tradisional sekaligus mengasah ekspresi diri siswa dalam gerak tari yang harmonis.
                    </p>
                </div>
            </div>

        </div>

        <div class="flex justify-center gap-2 mt-4 lg:hidden">
            <div class="w-8 h-1 bg-blue-600 rounded-full"></div>
            <div class="w-2 h-1 bg-slate-300 rounded-full"></div>
            <div class="w-2 h-1 bg-slate-300 rounded-full"></div>
        </div>
    </div>
</section>

<x-footer />

</body>
</html>