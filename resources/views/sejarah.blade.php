<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<section class="relative py-16 md:py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div class="relative z-10">
            <span class="text-blue-600 font-bold tracking-widest uppercase text-sm">Tentang Sekolah</span>
            <h1 class="text-4xl md:text-6xl font-black text-gray-900 mt-4 mb-6 leading-tight">
                Mengukir Prestasi Sejak <span class="gradient-text">1983</span>
            </h1>
            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                SMP Negeri 1 Purwosari berdiri sebagai pilar pendidikan di Bojonegoro, berkomitmen mencetak generasi cerdas dengan kurikulum merdeka dan fasilitas modern.
            </p>
            <div class="flex gap-4">
                <div class="bg-blue-50 p-4 rounded-2xl border border-blue-100 text-center flex-1">
                    <p class="text-3xl font-bold text-blue-600">A</p>
                    <p class="text-xs text-blue-500 font-medium uppercase tracking-tighter">Akreditasi</p>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 text-center flex-1">
                    <p class="text-3xl font-bold text-gray-800">{{ \Illuminate\Support\Facades\DB::table('guru')->count() }}</p>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-tighter">Guru Ahli</p>
                </div>
                
            </div>
        </div>

        <div class="relative">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
            <img src="{{ asset('img/image1.png') }}" alt="Gedung Sekolah" class="relative rounded-3xl shadow-2xl transform rotate-2 hover:rotate-0 transition duration-500 object-cover h-80 md:h-[450px] w-full">
        </div>
    </div>
</section>

<section class="py-16 px-6 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="w-10 h-1 bg-blue-600 rounded-full"></span>
                Lintas Sejarah
            </h2>
            
            <div class="prose prose-blue max-w-none text-gray-700 space-y-6 text-lg leading-relaxed">
                <p>
                    SMP Negeri 1 Purwosari adalah institusi pendidikan negeri yang berlokasi strategis di <strong>Jalan Raya Ngambon, Kab. Bojonegoro</strong>. Institusi ini resmi dibuka pada tahun <strong>1983</strong> dan terus bertransformasi mengikuti perkembangan zaman.
                </p>
                
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-8">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">{{ \Illuminate\Support\Facades\DB::table('siswa')->distinct()->count('kelas') }}</p>
                        <p class="text-sm text-gray-500">Ruang Kelas</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">2</p>
                        <p class="text-sm text-gray-500">Perpustakaan</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">3</p>
                        <p class="text-sm text-gray-500">Lab Komputer</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">1</p>
                        <p class="text-sm text-gray-500">Lab IPA</p>
                    </div>
                </div>

                <div class="p-6 bg-blue-600 rounded-2xl text-white">
                    <h4 class="font-bold mb-2">Luas Wilayah</h4>
                    <p class="text-blue-100 text-sm">
                        Berdiri di atas tanah seluas 17.730 m² dengan total luas bangunan mencapai 2.187 m², memberikan lingkungan belajar yang asri, luas, dan kondusif bagi pertumbuhan siswa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<x-footer />

</body>
</html>