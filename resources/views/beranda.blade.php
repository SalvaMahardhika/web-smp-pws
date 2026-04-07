<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 1 Purwosari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

<x-navbar />

<section class="relative z-0 h-[80vh] md:h-[90vh] flex items-center px-6 md:px-20 text-white overflow-hidden">
    <img src="{{ asset('img/image1.png') }}" class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-blue-900/80 z-0"></div>

    <div class="relative z-10 max-w-2xl text-center md:text-left">
        <h1 class="text-3xl md:text-6xl font-bold leading-tight">
            Selamat Datang di <br>
            <span class="text-blue-400">SMP Negeri 1 Purwosari</span>
        </h1>
        <p class="mt-4 md:mt-6 text-base md:text-lg text-gray-200">
            Membangun generasi cerdas, kreatif, dan berkarakter melalui pendidikan berkualitas.
        </p>
    </div>
</section>

<section class="py-12 md:py-20 text-center px-4 md:px-10">
    <h2 class="text-2xl md:text-4xl font-bold">Berita & Pengumuman</h2>
    <p class="text-gray-500 mt-2 text-sm md:text-base">
        Dapatkan informasi terkini mengenai kegiatan sekolah
    </p>

    <div class="flex md:grid md:grid-cols-3 gap-6 mt-10 max-w-5xl mx-auto overflow-x-auto md:overflow-visible pb-6 snap-x snap-mandatory hide-scrollbar">
        
        <div class="min-w-[80%] sm:min-w-[45%] md:min-w-full bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition snap-center">
            <img src="{{ asset('img/berita1.png') }}" class="h-40 md:h-52 w-full object-cover">
            <div class="p-4 text-left">
                <p class="font-semibold text-sm md:text-base leading-snug">
                    Future Coders: Pelatihan Koding AI SMPN 1 Purwosari 
                </p>
            </div>
        </div>

        <div class="min-w-[80%] sm:min-w-[45%] md:min-w-full bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition snap-center">
            <img src="{{ asset('img/berita2.png') }}" class="h-40 md:h-52 w-full object-cover">
            <div class="p-4 text-left">
                <p class="font-semibold text-sm md:text-base leading-snug">
                    Workshop Literasi Guru SMPN 1 Purwosari
                </p>
            </div>
        </div>

        <div class="min-w-[80%] sm:min-w-[45%] md:min-w-full bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition snap-center">
            <img src="{{ asset('img/berita3.png') }}" class="h-40 md:h-52 w-full object-cover">
            <div class="p-4 text-left">
                <p class="font-semibold text-sm md:text-base leading-snug">
                    Peringatan Maulid Nabi di SMPN 1 Purwosari
                </p>
            </div>
        </div>

    </div>
</section>

<section class="py-16 md:py-20 bg-gray-200 text-center px-6 md:px-10">
    <h2 class="text-3xl md:text-4xl font-bold">Fasilitas Sekolah</h2>
    <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Modern dan lengkap untuk mendukung pembelajaran.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 mt-12">
        @php
            $fasilitas = [
                ['01','Ruang Kelas','Kapasitas maksimal 25 siswa per kelas'],
                ['02','Mushola','Tempat ibadah bagi siswa dan guru'],
                ['03','Lab Komputer','Fasilitas komputer teknologi informasi'],
                ['04','Perpustakaan','Koleksi buku lengkap'],
                ['05','Aula','Gedung serbaguna'],
                ['06','Lap Olahraga','Area olahraga luas'],
                ['07','UKS','Layanan kesehatan'],
                ['08','Taman','Area hijau asri'],
                ['09','Kantin','Makanan sehat & bergizi'],
            ];
        @endphp

        @foreach ($fasilitas as $item)
        <div class="bg-white p-6 rounded-2xl shadow-md text-left flex items-start gap-4 hover:shadow-lg transition">
            <div class="bg-blue-100 text-blue-600 rounded-lg px-4 py-2 font-bold text-lg">
                {{ $item[0] }}
            </div>
            <div>
                <h3 class="font-semibold text-lg">{{ $item[1] }}</h3>
                <p class="text-gray-500 text-sm mt-1">{{ $item[2] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="px-6 md:px-10 py-16 md:py-20">
    <h2 class="text-3xl md:text-4xl font-bold text-center">Ekstrakurikuler</h2>

    <div class="mt-10 flex md:flex-col gap-6 overflow-x-auto md:overflow-visible pb-6 snap-x snap-mandatory hide-scrollbar">
        @foreach(['futsal' => 'FUTSAL', 'pramuka' => 'PRAMUKA', 'senitari' => 'SENI TARI'] as $img => $name)
        <div class="min-w-[85%] md:min-w-full flex flex-col md:flex-row bg-white rounded-2xl shadow-lg overflow-hidden snap-center">
            <img src="{{ asset('img/'.$img.'.png') }}" class="w-full md:w-1/3 h-48 md:h-auto object-cover">
            <div class="p-6 flex flex-col justify-center">
                <h3 class="text-xl font-bold">{{ $name }}</h3>
                <p class="text-gray-600 mt-2">
                    Kegiatan yang melatih karakter, kerjasama tim, dan kreativitas siswa.
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<x-footer />

</body>
</html> 