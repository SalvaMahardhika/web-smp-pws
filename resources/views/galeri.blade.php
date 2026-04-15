<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }

        .gallery-card img {
            transition: transform 0.5s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<section class="text-center py-16 px-4 bg-white border-b border-gray-100">
    <h1 class="text-4xl md:text-5xl font-black text-gray-900">Galeri Kegiatan</h1>
    <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-sm md:text-base">
        Dokumentasi momen-momen berharga dan prestasi civitas akademika SMP Negeri 1 Purwosari.
    </p>
</section>

<div class="max-w-7xl mx-auto py-12 px-4 md:px-10 space-y-20">

    <!-- ALBUM 1 -->
    <section>
        <div class="flex items-center gap-4 mb-8">
            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album 01</span>
            <h2 class="text-2xl font-bold text-gray-800">Peringatan Hari Besar</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">

            <!-- FIX POSISI FOTO -->
            <div class="flex flex-wrap justify-center gap-6 mb-8">
                @for ($i = 0; $i < 5; $i++)
                <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group cursor-pointer">

                    <img src="{{ asset('img/imggaleri/g2.jpeg') }}" 
                         class="max-h-60 rounded-xl object-contain">

                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition flex items-center justify-center">
                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition">
                            <path stroke-width="2" d="M21 21l-6-6"/>
                        </svg>
                    </div>

                </div>
                @endfor
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-600 p-5 rounded-r-xl">
                <p class="text-gray-700 italic">
                    "SMP Negeri 1 Purwosari memperingati kegiatan sekolah dengan penuh semangat dan kebersamaan."
                </p>
            </div>
        </div>
    </section>

    <!-- ALBUM 2 -->
    <section>
        <div class="flex items-center gap-4 mb-8">
            <span class="bg-green-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album 02</span>
            <h2 class="text-2xl font-bold text-gray-800">Nasionalisme & Kreativitas</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">

            <div class="flex flex-wrap justify-center gap-6 mb-8">
                @for ($i = 0; $i < 3; $i++)
                <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group cursor-pointer">

                    <img src="{{ asset('img/imggaleri/g3.jpg') }}" 
                         class="max-h-60 rounded-xl object-contain">

                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition flex items-center justify-center">
                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition">
                            <path stroke-width="2" d="M21 21l-6-6"/>
                        </svg>
                    </div>

                </div>
                @endfor
            </div>

            <div class="bg-green-50 border-l-4 border-green-600 p-5 rounded-r-xl">
                <p class="text-gray-700 italic">
                    "Siswa mengikuti berbagai kegiatan untuk meningkatkan rasa cinta tanah air."
                </p>
            </div>
        </div>
    </section>

    <!-- ALBUM 3 -->
    <section class="pb-10">
        <div class="flex items-center gap-4 mb-8">
            <span class="bg-purple-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album 03</span>
            <h2 class="text-2xl font-bold text-gray-800">Ekstrakurikuler & Kebersamaan</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">

            <div class="flex flex-wrap justify-center gap-6 mb-8">
                @for ($i = 0; $i < 9; $i++)
                <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group cursor-pointer">

                    <img src="{{ asset('img/imggaleri/g1.jpg') }}" 
                         class="max-h-48 rounded-xl object-contain">

                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition"></div>

                </div>
                @endfor
            </div>

            <div class="bg-purple-50 border-l-4 border-purple-600 p-5 rounded-r-xl">
                <p class="text-gray-700 italic">
                    "Dokumentasi kegiatan luar kelas yang membangun karakter siswa."
                </p>
            </div>
        </div>
    </section>

</div>

<x-footer />

<!-- LIGHTBOX -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 hidden flex items-center justify-center" onclick="this.classList.add('hidden')">
    <img id="lightbox-img" class="max-w-full max-h-[90vh] rounded-lg">
</div>

<script>
    document.querySelectorAll('.gallery-card').forEach(card => {
        card.addEventListener('click', () => {
            document.getElementById('lightbox-img').src = card.querySelector('img').src;
            document.getElementById('lightbox').classList.remove('hidden');
        });
    });
</script>

</body>
</html>