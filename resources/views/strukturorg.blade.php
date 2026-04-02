<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SMPN 1 Purwosari</title>

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
<section class="text-center py-12">
    <h1 class="text-4xl font-bold">Struktur Organisasi</h1>
</section>

<!-- CONTENT -->
<section class="px-10 pb-20 flex justify-center">
    <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-6xl border border-gray-300">

        <!-- GAMBAR STRUKTUR -->
        <div class="flex justify-center">
            <img src="{{ asset('img/org/struktur.jpg') }}" 
                 alt="Struktur Organisasi"
                 class="w-full max-w-5xl rounded-lg">
        </div>

    </div>
</section>

</body>

<x-footer />

</html>