<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 1 Purwosari</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-4 bg-white shadow">
    <div class="flex items-center gap-3">
        <img src="{{ asset('img/logo.png') }}" class="w-12">
        <div>
            <h2 class="text-blue-500 font-bold text-lg">SMPN 1 Purwosari</h2>
            <p class="text-sm text-gray-500">Sekolah Standart Nasional (SSN)</p>
        </div>
    </div>

    <ul class="flex gap-8 font-medium">
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Data</a></li>
        <li><a href="#">Galeri</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="relative h-[90vh] flex items-center px-10 text-white">

    <img src="{{ asset('img/image1.png') }}" 
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-blue-900/80"></div>

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

<!-- EKSTRA -->
<section class="px-10 py-20">
    <h2 class="text-4xl font-bold text-center">Ekstrakurikuler</h2>

    <div class="mt-10 space-y-10">

        <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('img/futsal.png') }}" class="w-1/3 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold">FUTSAL</h3>
                <p class="text-gray-600 mt-2">
                    Melatih kemampuan fisik, strategi permainan, dan kerja sama tim siswa.
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

<!-- FASILITAS -->
<section class="py-20 bg-gray-200 text-center px-10">
    <h2 class="text-4xl font-bold">Fasilitas Sekolah</h2>
    <p class="text-gray-600 mt-3">
        Fasilitas lengkap untuk mendukung pembelajaran
    </p>

    <div class="grid grid-cols-3 gap-8 mt-10">

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">Ruang Kelas</h3>
            <p class="text-gray-500">Maksimal 25 siswa</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">Lab Komputer</h3>
            <p class="text-gray-500">Fasilitas IT lengkap</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">Perpustakaan</h3>
            <p class="text-gray-500">Buku lengkap</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">Lapangan</h3>
            <p class="text-gray-500">Olahraga siswa</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">UKS</h3>
            <p class="text-gray-500">Kesehatan siswa</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h3 class="font-bold text-lg">Kantin</h3>
            <p class="text-gray-500">Makanan sehat</p>
        </div>

    </div>
</section>

</body>
</html>