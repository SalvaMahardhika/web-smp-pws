<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- ✅ NAVBAR COMPONENT -->
<x-navbar />

<!-- HERO -->
<section class="relative z-0 h-[90vh] flex items-center px-10 text-white">

    <img src="{{ asset('img/image1.png') }}" 
         class="absolute inset-0 w-full h-full object-cover z-0">

    <div class="absolute inset-0 bg-blue-900/80 z-0"></div>

    <div class="relative z-10 max-w-xl">
        <h1 class="text-5xl font-bold leading-tight">
            Selamat Datang di <br>
            SMP Negeri 1 Purwosari
        </h1>

        <p class="mt-6 text-lg text-gray-200">
            Membangun generasi cerdas, kreatif, dan berkarakter
            melalui pendidikan berkualitas yang mengutamakan nilai moral dan akademis.
        </p>
    </div>
</section>

<!-- BERITA -->
<section class="py-20 text-center px-10">
    <h2 class="text-4xl font-bold">Berita & Pengumuman</h2>
    <p class="text-gray-500 mt-3">
        Dapatkan informasi terkini mengenai kegiatan sekolah
    </p>

    <div class="flex flex-wrap justify-center gap-10 mt-10">

        <div class="bg-white w-80 rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/berita1.png') }}" class="h-52 w-full object-cover">
            <p class="p-5 font-medium">
                Future Coders: Pelatihan Koding AI SMPN 1 Purwosari 
            </p>
        </div>

        <div class="bg-white w-80 rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/berita2.png') }}" class="h-52 w-full object-cover">
            <p class="p-5 font-medium">
                Workshop Literasi Guru SMPN 1 Purwosari
            </p>
        </div>

        <div class="bg-white w-80 rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/berita3.png') }}" class="h-52 w-full object-cover">
            <p class="p-5 font-medium">
                Peringatan Maulid Nabi di SMPN 1 Purwosari
            </p>
        </div>

    </div>
</section>

<!-- FASILITAS -->
<section class="py-20 bg-gray-200 text-center px-10">
    <h2 class="text-4xl font-bold">Fasilitas Sekolah</h2>
    <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
        Dilengkapi dengan fasilitas modern dan lengkap untuk mendukung proses pembelajaran yang optimal dan menyenangkan.
    </p>

    <div class="grid grid-cols-3 gap-8 mt-12">

        @php
            $fasilitas = [
                ['01','Ruang Kelas','Ruang kelas dengan kapasitas maksimal 25 siswa per kelas'],
                ['02','Mushola','Tempat ibadah bagi siswa dan guru'],
                ['03','Lab Komputer','Ruang dengan fasilitas komputer untuk pembelajaran teknologi informasi'],
                ['04','Perpustakaan','Menyediakan berbagai koleksi buku untuk mendukung kegiatan belajar siswa'],
                ['05','Aula','Ruang serbaguna untuk kegiatan pertemuan dan acara sekolah'],
                ['06','Lap Olahraga','Area untuk kegiatan olahraga siswa guna menjaga kesehatan dan kebugaran'],
                ['07','UKS','Ruang layanan kesehatan untuk penanganan awal siswa yang kurang sehat'],
                ['08','Taman','Area hijau di lingkungan sekolah yang memberikan suasana nyaman dan asri'],
                ['09','Kantin','Menyediakan makanan sehat dan bergizi untuk siswa'],
            ];
        @endphp

        @foreach ($fasilitas as $item)
        <div class="bg-white p-6 rounded-2xl shadow-md text-left flex items-start gap-4 hover:shadow-lg transition">
            <div class="border rounded-lg px-4 py-2 font-bold text-lg">
                {{ $item[0] }}
            </div>

            <div>
                <h3 class="font-semibold text-lg">{{ $item[1] }}</h3>
                <p class="text-gray-500 text-sm mt-1">
                    {{ $item[2] }}
                </p>
            </div>
        </div>
        @endforeach

    </div>
</section>

<!-- EKSTRA -->
<section class="px-10 py-20">
    <h2 class="text-4xl font-bold text-center">Ekstrakurikuler</h2>

    <div class="mt-10 space-y-10">

        <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/futsal.png') }}" class="w-1/3 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold">FUTSAL</h3>
                <p class="text-gray-600 mt-2">
                    Kegiatan olahraga yang melatih kerjasama tim dan kebugaran siswa.
                </p>
            </div>
        </div>

        <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/pramuka.png') }}" class="w-1/3 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold">PRAMUKA</h3>
                <p class="text-gray-600 mt-2">
                    Membentuk karakter disiplin, mandiri, dan tanggung jawab siswa.
                </p>
            </div>
        </div>

        <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/senitari.png') }}" class="w-1/3 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold">SENI TARI</h3>
                <p class="text-gray-600 mt-2">
                    Mengembangkan kreativitas dan kecintaan terhadap budaya Indonesia.
                </p>
            </div>
        </div>

    </div>
</section>

<x-footer />

</body>
</html>