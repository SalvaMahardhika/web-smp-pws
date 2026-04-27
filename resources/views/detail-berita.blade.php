<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            scroll-behavior: smooth; 
        }
        
        /* Menggunakan pattern yang sama dengan visi-misi/beranda jika ingin konsisten */
        .bg-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b82f6' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-shadow {
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
        }

        .article-content {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        }
    </style>
</head>

<body class="bg-pattern text-slate-900">

    <x-navbar />

    {{-- HEADER SECTION --}}
    <section class="pt-20 pb-10 px-6">
        <div class="max-w-4xl mx-auto">
            {{-- Kembali ke Beranda --}}
            <a href="{{ route('beranda') }}" class="group inline-flex items-center gap-2 text-blue-600 font-bold text-sm uppercase tracking-widest transition-all">
                <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali
            </a>
            
            <div class="mt-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-8 h-1 bg-blue-600 rounded-full"></span>
                    <span class="text-blue-600 font-bold uppercase tracking-[0.2em] text-xs">Berita Sekolah</span>
                </div>
                
                <h1 class="text-3xl md:text-5xl font-bold text-slate-900 leading-tight">
                    {{ $berita->judul }}
                </h1>
                
                <div class="flex items-center gap-4 mt-6 text-slate-400 text-sm font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                    </div>
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
                    <span>Admin Sekolah</span>
                </div>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <section class="pb-24 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 card-shadow overflow-hidden">
                
                {{-- GAMBAR UTAMA --}}
                <div class="relative h-[250px] md:h-[500px] overflow-hidden p-4">
                    <img src="{{ asset('img/berita/' . $berita->gambar) }}" 
                         alt="{{ $berita->judul }}"
                         class="w-full h-full object-cover rounded-[2rem]">
                </div>

                {{-- ISI BERITA --}}
                <div class="p-8 md:p-16 pt-6">
                    <div class="article-content text-lg leading-relaxed">
                        {{-- Logika nl2br untuk menjaga spasi paragraf --}}
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    {{-- FOOTER ARTIKEL (Sederhana) --}}
                    <div class="mt-16 pt-8 border-t border-slate-50">
                        <p class="text-slate-400 text-sm italic">
                            Terima kasih telah membaca informasi resmi dari SMPN 1 Purwosari.
                        </p>
                    </div>
                </div>
            </div>

            {{-- TOMBOL NAVIGASI BAWAH --}}
            <div class="mt-12 flex justify-center">
                <a href="/#berita" class="px-10 py-4 bg-slate-900 text-white rounded-full font-bold shadow-xl hover:bg-blue-600 transition-all transform hover:-translate-y-1">
                    Lihat Berita Lainnya
                </a>
            </div>
        </div>
    </section>

    <x-footer />

</body>
</html>