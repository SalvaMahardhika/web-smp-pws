<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SMPN 1 Purwosari</title>

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
    <h1 class="text-4xl font-bold">Data Siswa</h1>
    <p class="text-gray-600 mt-2">
        Informasi jumlah siswa tiap kelas
    </p>
</section>

<!-- FUNCTION -->
@php
function kelasBox($kelasList) {
    foreach ($kelasList as $kelas) {
        echo '
        <div>
            <h3 class="font-semibold">'.$kelas.'</h3>
            <p class="text-xs text-gray-600">
                Laki-laki : 20 <br>
                Perempuan : 14 <br>
                Jumlah : 34
            </p>
        </div>
        ';
    }
}
@endphp

<!-- KELAS 7 -->
<section class="px-10 mb-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Kelas 7</h2>

        <div class="grid grid-cols-5 gap-6 text-sm">
            {!! kelasBox(['7A','7B','7C','7D','7E','7F','7G','7H','7I']) !!}
        </div>
    </div>
</section>

<!-- KELAS 8 -->
<section class="px-10 mb-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Kelas 8</h2>

        <div class="grid grid-cols-5 gap-6 text-sm">
            {!! kelasBox(['8A','8B','8C','8D','8E','8F','8G','8H','8I']) !!}
        </div>
    </div>
</section>

<!-- KELAS 9 -->
<section class="px-10 mb-16">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Kelas 9</h2>

        <div class="grid grid-cols-5 gap-6 text-sm">
            {!! kelasBox(['9A','9B','9C','9D','9E','9F','9G','9H','9I']) !!}
        </div>
    </div>
</section>

<x-footer />

</body>
</html>