<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $eskul->nama_eskul }} - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            scroll-behavior: smooth; 
        }

        .bg-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b82f6' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-shadow {
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
        }

        .content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #475569;
        }
    </style>
</head>

<body class="bg-pattern text-slate-900">

<x-navbar />

{{-- HEADER --}}
<section class="pt-20 pb-10 px-6">
    <div class="max-w-4xl mx-auto">

        <a href="{{ route('beranda') }}" class="group inline-flex items-center gap-2 text-blue-600 font-bold text-sm uppercase tracking-widest transition-all">
            <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali
        </a>

        <div class="mt-8">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-8 h-1 bg-blue-600 rounded-full"></span>
                <span class="text-blue-600 font-bold uppercase tracking-[0.2em] text-xs">
                    Ekstrakurikuler
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 leading-tight">
                {{ $eskul->nama_eskul }}
            </h1>

            <div class="flex items-center gap-4 mt-6 text-slate-400 text-sm font-medium">
                <span>Pembina: {{ $eskul->guru->nama_guru ?? '-' }}</span>
            </div>
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section class="pb-24 px-6">
    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-[2.5rem] border border-slate-100 card-shadow overflow-hidden">

            {{-- GAMBAR --}}
            <div class="relative h-[250px] md:h-[500px] overflow-hidden p-4">
                <img src="{{ asset('img/eskul/' . $eskul->gambar) }}" 
                     alt="{{ $eskul->nama_eskul }}"
                     class="w-full h-full object-cover rounded-[2rem]">
            </div>

            {{-- DESKRIPSI --}}
            <div class="p-8 md:p-16 pt-6">
                <div class="content text-lg leading-relaxed break-words">
                    {!! nl2br(e($eskul->deskripsi)) !!}
                </div>

                {{-- FOOTER --}}
                <div class="mt-16 pt-8 border-t border-slate-50">
                    <p class="text-slate-400 text-sm italic">
                        Kegiatan ini merupakan bagian dari pengembangan minat dan bakat siswa di SMPN 1 Purwosari.
                    </p>
                </div>
            </div>

        </div>

        {{-- BUTTON BAWAH --}}
        <div class="mt-12 flex justify-center">
            <a href="/#ekstrakurikuler"
               class="px-10 py-4 bg-slate-900 text-white rounded-full font-bold shadow-xl hover:bg-blue-600 transition-all transform hover:-translate-y-1">
               Lihat Ekstrakurikuler Lainnya
            </a>
        </div>

    </div>
</section>

<x-footer />

</body>
</html>