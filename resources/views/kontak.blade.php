<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SMPN 1 Purwosari</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        /* Utilitas untuk menyembunyikan scrollbar namun tetap bisa di-scroll */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .hover-lift { transition: all 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

<x-navbar />

<section class="text-center py-20 px-6">
    <span class="text-blue-600 font-bold tracking-widest uppercase text-xs">Hubungi Kami</span>
    
    <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 font-poppins mt-4 mb-6 leading-tight">
        Informasi Kontak
    </h1>

    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
        Kami siap membantu menjawab pertanyaan Anda tentang pendaftaran, 
        kegiatan siswa, dan informasi sekolah lainnya.
    </p>
    <div class="w-16 h-1.5 bg-blue-600 rounded-full mx-auto mt-6"></div>
</section>

<section class="max-w-7xl mx-auto px-6 pb-24">
    <div class="grid lg:grid-cols-2 gap-12 items-start">
        
        <div class="space-y-4">
            <div class="flex items-center gap-5 bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:scale-[1.02]">
                <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7C2 4.23858 4.23858 2 7 2Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5931 15.1514 13.8416 15.5297C13.0901 15.9079 12.2406 16.0373 11.403 15.8982C10.5654 15.7591 9.78214 15.3591 9.15616 14.7541C8.53018 14.1491 8.10404 13.364 7.93547 12.4928C7.76689 11.6217 7.86319 10.716 8.21181 9.90264C8.56043 9.08925 9.1415 8.4116 9.87679 7.95893C10.6121 7.50625 11.4635 7.30232 12.3161 7.3752C13.1687 7.44808 13.9806 7.79427 14.6223 8.36881C15.264 8.94336 15.7013 9.71536 15.8718 10.563C16.0423 11.4106 15.938 12.2878 15.5753 13.0645" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.5 6.5H17.51" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 font-poppins">Instagram</h3>
                    <a href="https://www.instagram.com/official_smpn1purwosari/" target="_blank" class="text-slate-500 text-sm hover:text-blue-600 transition-colors break-all">
                        @official_smpn1purwosari
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-5 bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:scale-[1.02]">
                <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.33z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 15.02l5.75-3.27-5.75-3.27v6.54z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 font-poppins">Youtube</h3>
                    <a href="http://www.youtube.com/@spensapurbojpn" target="_blank" class="text-slate-500 text-sm hover:text-blue-600 transition-colors break-all">
                        @spensapurbojpn
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-5 bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:scale-[1.02]">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 font-poppins">Email Resmi</h3>
                    <p class="text-slate-500 text-sm">smpn1pwr@gmail.com</p>
                </div>
            </div>

            <div class="flex items-center gap-5 bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:scale-[1.02]">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 font-poppins">Lokasi Sekolah</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">
                        Jl. Raya Ngambon, Desa Pojok, Kec. Purwosari, <br>
                        Kab. Bojonegoro, Jawa Timur
                    </p>
                </div>
            </div>
        </div>

        <div class="h-full min-h-[450px] rounded-[3rem] overflow-hidden border-8 border-white shadow-2xl shadow-slate-200">
            <iframe 
                src="https://www.google.com/maps?q=SMPN+1+Purwosari+Bojonegoro&output=embed"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

    </div>
</section>

<x-footer />

</body>
</html>