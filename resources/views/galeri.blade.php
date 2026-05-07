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
        .modal-animate { transition: all 0.3s ease-out; }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<section class="text-center py-16 px-4 bg-white border-b border-gray-100">
    <h1 class="text-4xl md:text-5xl font-black text-gray-900">Galeri Kegiatan</h1>
    <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-sm md:text-base mb-8">
        Dokumentasi momen-momen berharga dan kegiatan rutin di SMPN 1 Purwosari.
    </p>

    @if(session('login'))
    <button onclick="openAddAlbumModal()"
        class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold text-sm shadow-lg hover:bg-blue-700 hover:scale-105 transition-all flex items-center gap-2 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Album Baru
    </button>
    @endif
</section>

@if(session('success'))
<div class="max-w-4xl mx-auto mt-8 px-4">
    <div class="p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-xl shadow-sm">
        <span class="font-bold">Berhasil!</span> {{ session('success') }}
    </div>
</div>
@endif

<div class="max-w-7xl mx-auto py-12 px-4 md:px-10 space-y-20">

@forelse ($galeris as $album_nama => $data)
<section>
    <div class="mb-6">
        @if(session('login'))
        <form action="/galeri/update/{{ $data['id'] }}" method="POST" class="bg-white p-6 rounded-3xl border shadow-sm space-y-4">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-between">
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Mode Edit Album</span>
                <button type="button" onclick="confirmDeleteAlbum('{{ $data['id'] }}', '{{ $data['judul'] }}')" 
                    class="text-red-500 hover:text-red-700 text-sm font-bold flex items-center gap-1 transition">
                    Hapus Album
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Judul Album</label>
                    <input type="text" name="judul" value="{{ $data['judul'] }}"
                        class="w-full border border-gray-200 px-4 py-2 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Deskripsi / Keterangan</label>
                    <textarea name="keterangan" rows="2"
                        class="w-full border border-gray-200 px-4 py-2 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">{{ $data['keterangan'] }}</textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <form id="delete-album-{{ $data['id'] }}" action="/galeri/delete/{{ $data['id'] }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
        @else
        <div class="flex items-center gap-4">
            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">Album</span>
            <h2 class="text-3xl font-bold text-gray-800">{{ $data['judul'] }}</h2>
        </div>
        @endif
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border p-6 md:p-10">
        @if(session('login'))
        <div class="mb-8 p-4 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
            <p class="text-sm font-bold text-gray-500 mb-3 uppercase tracking-tighter">+ Tambah Foto ke Album Ini</p>
            <form action="/galeri/tambah-foto/{{ $album_nama }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-3">
                @csrf
                <input type="file" name="foto[]" multiple required class="bg-white border p-2 rounded-xl w-full text-sm">
                <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-2 rounded-xl font-bold text-sm transition">Upload</button>
            </form>
        </div>
        @endif

        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($data['fotos'] as $foto)
            <div class="gallery-card relative overflow-hidden rounded-2xl bg-gray-100 group shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('img/imggaleri/' . $foto) }}" class="max-h-64 md:max-h-72 w-auto object-cover">
                
                @if(session('login'))
                <button type="button" onclick="confirmDeleteFoto(this)"
                      class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all p-2 bg-white/90 text-red-600 rounded-xl shadow-lg hover:bg-red-600 hover:text-white backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>

                <form action="/galeri/delete-foto" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="foto" value="{{ $foto }}">
                </form>
                @endif
            </div>
            @endforeach
        </div>

        @if(!session('login'))
        {{-- BAGIAN YANG DIPERBAIKI: Menambahkan class break-words agar teks tidak tembus --}}
        <div class="mt-10 bg-blue-50 border-l-4 border-blue-600 p-6 rounded-2xl">
            <p class="text-gray-700 leading-relaxed italic break-words">
                "{{ $data['keterangan'] }}"
            </p>
        </div>
        @endif
    </div>
</section>
@empty
<div class="text-center py-32 bg-white rounded-[3rem] border border-dashed">
    <p class="text-xl text-gray-400 font-medium">Belum ada album galeri yang diunggah.</p>
</div>
@endforelse

</div>

@if(session('login'))
<div id="modalTambahAlbum" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">
    <div class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all duration-300">
        <div class="p-8 md:p-10">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Tambah Album Baru</h2>
                    <p class="text-sm text-gray-500">Buat album kegiatan baru dan unggah foto.</p>
                </div>
                <button onclick="closeAddAlbumModal()" class="bg-gray-100 p-2 rounded-full text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="/galeri/store" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Album</label>
                    <input type="text" name="judul" required placeholder="Contoh: Perayaan HUT RI ke-79"
                        class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan / Deskripsi</label>
                    <textarea name="keterangan" required rows="4" placeholder="Jelaskan secara singkat mengenai kegiatan ini..."
                        class="w-full border border-gray-200 rounded-2xl px-5 py-3 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Foto Kegiatan</label>
                    <div class="relative group">
                        <input type="file" name="foto[]" multiple required
                            class="w-full border border-gray-200 rounded-2xl px-5 py-3 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 shadow-xl shadow-blue-200 transition-all">
                        Simpan & Publikasikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<x-footer />

<script>
    // Logika Modal
    function openAddAlbumModal() {
        const modal = document.getElementById('modalTambahAlbum');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAddAlbumModal() {
        const modal = document.getElementById('modalTambahAlbum');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Tutup modal jika klik luar
    window.onclick = function(event) {
        const modal = document.getElementById('modalTambahAlbum');
        if (event.target == modal) closeAddAlbumModal();
    }

    // Konfirmasi Hapus Album
    function confirmDeleteAlbum(id, judul) {
        if (confirm("⚠️ PERINGATAN: Apakah Anda yakin ingin menghapus seluruh album '" + judul + "'? Semua foto di dalamnya akan ikut terhapus secara permanen.")) {
            document.getElementById('delete-album-' + id).submit();
        }
    }

    // Konfirmasi Hapus Foto
    function confirmDeleteFoto(btn) {
        if (confirm("Hapus foto ini dari album?")) {
            // Mengambil form terdekat (sibling selanjutnya) dan mensubmitnya
            btn.nextElementSibling.submit();
        }
    }
</script>

</body>
</html>