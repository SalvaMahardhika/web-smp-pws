<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gallery-card img { transition: transform 0.5s ease; }
        .gallery-card:hover img { transform: scale(1.1); }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<section class="text-center py-16 px-4 bg-white border-b border-gray-100">
    <h1 class="text-4xl md:text-5xl font-black text-gray-900">Galeri Kegiatan</h1>
    <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-sm md:text-base mb-6">
        Dokumentasi kegiatan sekolah.
    </p>

    @if(session('login'))
    <a href="#formTambah"
        class="bg-blue-600 text-white px-6 py-3 rounded-full font-bold text-sm shadow-lg hover:bg-blue-700 transition-all">
        + Tambah Album
    </a>
    @endif
</section>

@if(session('success'))
<div class="max-w-xl mx-auto mt-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded">
    {{ session('success') }}
</div>
@endif

<div class="max-w-7xl mx-auto py-12 px-4 md:px-10 space-y-20">

@forelse ($galeris as $album_nama => $data)
<section>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <!-- EDIT INLINE -->
        @if(session('login'))
        <form action="/galeri/update/{{ $data['id'] }}" method="POST" class="flex flex-wrap gap-2 items-center">
            @csrf
            @method('PUT')

            <span class="bg-blue-600 text-white px-3 py-1 rounded text-xs font-bold">Album</span>

            <input type="text" name="judul" value="{{ $data['judul'] }}"
                class="border px-2 py-1 rounded text-sm">

<input type="text" name="keterangan" value="{{ $data['keterangan'] }}"                class="border px-2 py-1 rounded text-sm">

            <button class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                Simpan
            </button>
        </form>

        <form action="/galeri/delete/{{ $data['id'] }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                Hapus
            </button>
        </form>
        @else
        <div class="flex items-center gap-4">
            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album</span>
            <h2 class="text-2xl font-bold text-gray-800">{{ $data['judul'] }}</h2>
        </div>
        @endif

    </div>

    <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">

        @if(session('login'))
        <form action="/galeri/tambah-foto/{{ $album_nama }}" method="POST" enctype="multipart/form-data" class="mb-6 flex gap-2">
            @csrf
            <input type="file" name="foto[]" multiple required class="border p-2 rounded w-full">
            <button class="bg-green-600 text-white px-4 rounded">
                + Tambah Foto
            </button>
        </form>
        @endif

        <div class="flex flex-wrap justify-center gap-6">

        @foreach ($data['fotos'] as $foto)
        <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group">

            <img src="{{ asset('img/imggaleri/' . $foto) }}"
                 class="max-h-60 rounded-xl object-contain">

            @if(session('login'))
            <form action="/galeri/delete-foto" method="POST"
                  class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition">
                @csrf
                @method('DELETE')
                <input type="hidden" name="foto" value="{{ $foto }}">

                <button class="p-2 bg-white text-red-600 rounded-lg">
                    🗑️
                </button>
            </form>
            @endif

        </div>
        @endforeach

        </div>

        <div class="mt-6 bg-blue-50 border-l-4 border-blue-600 p-5 rounded">
            <p class="text-gray-700 italic">
                "{{ $data['keterangan'] }}"
            </p>
        </div>

    </div>
</section>

@empty
<div class="text-center py-20 text-gray-400">
    <p class="text-xl font-bold">Belum ada album.</p>
</div>
@endforelse

</div>

<!-- FORM TAMBAH ALBUM -->
@if(session('login'))
<div id="formTambah" class="max-w-3xl mx-auto mt-16 bg-white border rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold mb-4">Tambah Album Baru</h2>

    <form action="/galeri/store" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-1">Judul Album</label>
            <input type="text" name="judul" required
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Keterangan</label>
            <textarea name="keterangan" required
                class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Upload Foto</label>
            <input type="file" name="foto[]" multiple required
                class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Simpan Album
        </button>
    </form>

</div>
@endif

<x-footer />

</body>
</html>