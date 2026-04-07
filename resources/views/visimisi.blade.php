<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-pattern {
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b82f6' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-pattern">

<x-navbar />

<section class="py-16 text-center px-4">
    <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Visi & Misi</h1>
    <p class="text-gray-500 max-w-xl mx-auto">Komitmen kami dalam membentuk karakter dan mencetak generasi unggul bangsa.</p>
</section>

<section class="pb-10 px-6">
    <div class="max-w-5xl mx-auto relative">
        <div class="absolute -top-6 -left-6 w-20 h-20 bg-blue-600 rounded-full opacity-10 animate-pulse"></div>
        
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-gray-100 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-blue-600"></div>
            <span class="inline-block px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-bold uppercase tracking-widest mb-4">Visi Utama</span>
            <h2 class="text-2xl md:text-4xl font-bold text-gray-800 leading-tight italic">
                “Berprestasi, Terampil, Peduli Lingkungan, Berbudaya berdasarkan Iman dan Taqwa”
            </h2>
        </div>
    </div>
</section>

<section class="py-10 px-6 pb-24">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-4 mb-10 justify-center">
            <hr class="w-12 border-blue-600 border-2 rounded-full">
            <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Misi Sekolah</h2>
            <hr class="w-12 border-blue-600 border-2 rounded-full">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @php
            $misi = [
                "Mengembangkan potensi kecerdasan peserta didik dalam meningkatkan kejujuran, tanggung jawab, percaya diri dan semangat berkompetisi",
                "Mewujudkan sekolah ramah harmoni yang inovatif dalam pembelajaran",
                "Memenuhi fasilitas sekolah yang relevan dan berwawasan ke depan",
                "Memberdayakan pendidik dan tenaga kependidikan yang mampu dan tangguh",
                "Mengembangkan organisasi sekolah yang terus belajar (learning organization)",
                "Mewujudkan pembiayaan pendidikan yang memadai, wajar dan adil",
                "Mengembangkan manajemen berbasis sekolah yang transparan dan akuntabel",
                "Mengembangkan pembiasaan membaca, menulis, berpendapat untuk meningkatkan karakter peserta didik",
                "Meningkatkan kedisiplinan peserta didik",
                "Memperkokoh nilai-nilai agama untuk meningkatkan pemahaman dan penghayatan",
                "Mewujudkan nilai solidaritas bagi kehidupan sekolah dalam menciptakan sekolah hijau, bersih dan sehat",
                "Mewujudkan nilai karakter siswa/sekolah yang peduli lingkungan dalam rangka melestarikan lingkungan dan mencegah kerusakan"
            ];
            @endphp

            @foreach($misi as $index => $item)
            <div class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center font-bold group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        {{ $index + 1 }}
                    </div>
                    <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                        {{ $item }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<x-footer />

</body>
</html>