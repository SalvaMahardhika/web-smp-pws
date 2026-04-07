<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        /* Sembunyikan scrollbar di mobile agar rapi */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-100">

<x-navbar />

<section class="text-center py-10 md:py-16 px-4">
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900">Data Siswa</h1>
    <p class="text-gray-500 mt-3 text-sm md:text-lg">Informasi jumlah siswa tiap kelas</p>
</section>

@php
function renderKelasScroll($kelasList) {
    foreach ($kelasList as $kelas) {
        echo '
        <div class="flex-shrink-0 w-[280px] md:w-auto md:min-w-[200px] snap-center bg-gray-50 p-6 rounded-2xl border border-gray-100 shadow-sm">
            <h3 class="font-bold text-xl text-blue-600 mb-4 text-center md:text-left">'.$kelas.'</h3>
            <div class="space-y-3 text-sm text-gray-600">
                <div class="flex justify-between items-center">
                    <span>Laki-laki</span>
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-bold">20</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Perempuan</span>
                    <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded-md font-bold">14</span>
                </div>
                <div class="pt-3 border-t border-gray-200 flex justify-between font-black text-gray-900 text-base">
                    <span>Total</span>
                    <span>34</span>
                </div>
            </div>
        </div>
        ';
    }
}
@endphp

<div class="max-w-7xl mx-auto pb-20 space-y-12">
    
    <section>
        <div class="px-6 md:px-10 mb-4 flex items-center gap-3">
            <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-gray-800">Kelas 7</h2>
        </div>
        
        <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 px-6 md:px-10 pb-6 hide-scrollbar md:grid md:grid-cols-3 lg:grid-cols-5 md:overflow-visible">
            {!! renderKelasScroll(['7A','7B','7C','7D','7E','7F','7G','7H','7I']) !!}
        </div>
    </section>

    <section>
        <div class="px-6 md:px-10 mb-4 flex items-center gap-3">
            <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-gray-800">Kelas 8</h2>
        </div>
        <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 px-6 md:px-10 pb-6 hide-scrollbar md:grid md:grid-cols-3 lg:grid-cols-5 md:overflow-visible">
            {!! renderKelasScroll(['8A','8B','8C','8D','8E','8F','8G','8H','8I']) !!}
        </div>
    </section>

    <section>
        <div class="px-6 md:px-10 mb-4 flex items-center gap-3">
            <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-gray-800">Kelas 9</h2>
        </div>
        <div class="flex overflow-x-auto snap-x snap-mandatory gap-6 px-6 md:px-10 pb-6 hide-scrollbar md:grid md:grid-cols-3 lg:grid-cols-5 md:overflow-visible">
            {!! renderKelasScroll(['9A','9B','9C','9D','9E','9F','9G','9H','9I']) !!}
        </div>
    </section>

</div>

<x-footer />

</body>
</html>