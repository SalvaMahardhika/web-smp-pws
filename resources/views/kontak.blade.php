<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200">

<!-- NAVBAR -->
<x-navbar />

<!-- TITLE -->
<section class="text-center py-16">
    <h1 class="text-4xl font-bold">Hubungi Kami</h1>
    <p class="text-gray-600 mt-3">
        Kami siap membantu menjawab pertanyaan Anda tentang <br>
        pendaftaran dan informasi sekolah
    </p>
</section>

<!-- KONTAK -->
<section class="px-10 flex flex-col items-center gap-4">

    <!-- ITEM -->
    <div class="flex items-center gap-4 bg-white px-6 py-4 rounded-xl shadow w-[500px]">
        <img src="{{ asset('img/logo/instagram.png') }}" class="w-10">
        <div>
            <h3 class="font-semibold">Instagram</h3>
            <a href="#" class="text-gray-600 text-sm hover:underline">
                https://www.instagram.com/official_smpn1purwosari/
            </a>
        </div>
    </div>

    <div class="flex items-center gap-4 bg-white px-6 py-4 rounded-xl shadow w-[500px]">
        <img src="{{ asset('img/logo/youtube.png') }}" class="w-10">
        <div>
            <h3 class="font-semibold">Youtube</h3>
            <a href="#" class="text-gray-600 text-sm hover:underline">
                http://www.youtube.com/@spensapurbojpn
            </a>
        </div>
    </div>

    <div class="flex items-center gap-4 bg-white px-6 py-4 rounded-xl shadow w-[500px]">
        <img src="{{ asset('img/logo/email.png') }}" class="w-10">
        <div>
            <h3 class="font-semibold">Email</h3>
            <p class="text-gray-600 text-sm">
                smpn1pwr@gmail.com
            </p>
        </div>
    </div>

    <div class="flex items-center gap-4 bg-white px-6 py-4 rounded-xl shadow w-[500px]">
        <img src="{{ asset('img/logo/location.png') }}" class="w-10">
        <div>
            <h3 class="font-semibold">Alamat</h3>
            <p class="text-gray-600 text-sm">
                Jalan Raya Ngambon, Desa Pojok,<br>
                Kec. Purwosari, Kab. Bojonegoro, Prov. Jawa Timur
            </p>
        </div>
    </div>

</section>

<!-- GOOGLE MAPS -->
<section class="px-10 py-16 flex justify-center">
    <div class="w-[900px] h-[400px] rounded-2xl overflow-hidden shadow-lg">

        <iframe 
            src="https://www.google.com/maps?q=SMPN+1+Purwosari+Bojonegoro&output=embed"
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>

    </div>
</section>

<x-footer />

</body>
</html>