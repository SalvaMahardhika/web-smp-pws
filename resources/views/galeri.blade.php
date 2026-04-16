<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com">
    function openTambahAlbum(album) {
        openTambah();
        document.getElementById('inputAlbum').value = album;
    }
</script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gallery-card img { transition: transform 0.5s ease; }
        .gallery-card:hover img { transform: scale(1.1); }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<section class="text-center py-16 px-4 bg-white border-b border-gray-100 relative">
    <h1 class="text-4xl md:text-5xl font-black text-gray-900">Galeri Kegiatan</h1>
    <p class="text-gray-500 mt-4 max-w-2xl mx-auto text-sm md:text-base mb-6">
        Dokumentasi momen-momen berharga dan prestasi civitas akademika SMP Negeri 1 Purwosari.
    </p>

    @if(session('login'))
    <button onclick="openTambah()" class="bg-blue-600 text-white px-6 py-3 rounded-full font-bold text-sm shadow-lg hover:bg-blue-700 transition-all active:scale-95 uppercase tracking-widest mx-auto flex items-center gap-2">
        <span>+</span> Tambah Foto Baru
    </button>
    @endif
</section>

@if(session('success'))
<div class="max-w-xl mx-auto mt-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-2xl shadow-sm flex items-center animate-bounce">
    <span class="mr-2">✅</span> {{ session('success') }}
</div>
@endif

<div class="max-w-7xl mx-auto py-12 px-4 md:px-10 space-y-20">

    @forelse ($galeris as $album_nama => $fotos)
    <section>
        <div class="flex items-center gap-4 mb-8">
            <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album</span>
            <h2 class="text-2xl font-bold text-gray-800">{{ $album_nama }}</h2>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">
            <div class="flex flex-wrap justify-center gap-6 mb-8">
                @foreach ($fotos as $foto)
                <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group">
                    
                    <img src="{{ asset('img/imggaleri/' . $foto->file_foto) }}" 
                        class="max-h-60 rounded-xl object-contain">


                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition flex flex-col items-center justify-center gap-2 pointer-events-none">
                        <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor">
                            <path stroke-width="2" d="M21 21l-6-6 m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    @if(session('login'))
                    <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity z-10">
                        <button onclick="openTambahAlbum('{{ $foto->album }}')" 
        class="p-2 bg-white/90 text-green-600 rounded-lg hover:bg-green-600 hover:text-white shadow transition text-sm">➕</button>
                        <button onclick="openEdit({{ $foto->id }}, '{{ $foto->album }}', '{{ $foto->keterangan }}')" class="p-2 bg-white/90 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white shadow transition text-sm">✏️</button>
                        <button onclick="openDelete({{ $foto->id }})" class="p-2 bg-white/90 text-red-600 rounded-lg hover:bg-red-600 hover:text-white shadow transition text-sm">🗑️</button>
                    </div>
                    @endif

                </div>
                @endforeach
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-600 p-5 rounded-r-xl">
                <p class="text-gray-700 italic">
                    "{{ $fotos->first()->keterangan ?? 'Dokumentasi kegiatan SMP Negeri 1 Purwosari' }}"
                </p>
            </div>
        </div>
    </section>
    @empty
    <div class="text-center py-20 text-gray-400 border-2 border-dashed border-gray-200 rounded-3xl">
        <p class="text-xl font-bold">Belum ada foto di galeri.</p>
    </div>
    @endforelse

</div>

<x-footer />

<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 hidden flex items-center justify-center z-50 cursor-pointer" onclick="this.classList.add('hidden')">
    <img id="lightbox-img" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transition-transform transform scale-95">
</div>

@if(session('login'))
<div id="modalOverlay" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] flex items-center justify-center p-4">
    
    <div id="mainModal" class="hidden bg-white rounded-[2rem] shadow-2xl w-full max-w-lg overflow-hidden transition-all">
        <div class="p-8">
            <h2 id="modalTitle" class="text-2xl font-black text-slate-900 mb-6 tracking-tight uppercase border-b pb-4">Tambah Foto</h2>
            
            <form id="activeForm" method="POST" action="" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div id="methodPut"></div> <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Album</label>
                    <input type="text" name="album" id="inputAlbum" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-xl outline-none focus:border-blue-500" required placeholder="Contoh: Peringatan Hari Besar">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Keterangan / Quotes</label>
                    <textarea name="keterangan" id="inputKeterangan" rows="3" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-xl outline-none focus:border-blue-500" required placeholder="Tulis keterangan album..."></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Upload Foto</label>
                    <input type="file" name="foto[]" id="inputFoto" multiple accept="image/*" class="w-full bg-slate-50 border border-slate-200 p-2 rounded-xl text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-blue-600 font-bold mt-2">💡 Anda bisa memblok/memilih banyak foto sekaligus saat memilih file.</p>

                    <p id="fotoHelp" class="text-[10px] text-gray-400 mt-1">*Pilih foto baru. Biarkan kosong jika sedang mengedit dan tidak ingin mengubah foto.</p>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="flex-1 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all uppercase text-sm tracking-wide">Simpan</button>
                    <button type="button" onclick="closeAllModals()" class="flex-1 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-all uppercase text-sm tracking-wide">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteModal" class="hidden bg-white rounded-[2rem] shadow-2xl w-full max-w-sm p-8 text-center">
        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">⚠️</div>
        <h3 class="text-xl font-black text-slate-900 mb-2 uppercase tracking-tight">Hapus Foto?</h3>
        <p class="text-slate-500 text-sm mb-6">Foto akan dihapus permanen dari sistem.</p>
        <form method="POST" id="confirmDeleteForm" class="flex flex-col gap-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full py-3 bg-red-500 text-white font-bold rounded-xl hover:bg-red-600 transition-all uppercase text-sm tracking-widest">Ya, Hapus</button>
            <button type="button" onclick="closeAllModals()" class="w-full py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-all uppercase text-sm tracking-widest">Batal</button>
        </form>
    </div>

</div>

<script>
    const overlay = document.getElementById('modalOverlay');
    const mainModal = document.getElementById('mainModal');
    const deleteModal = document.getElementById('deleteModal');
    const activeForm = document.getElementById('activeForm');
    const methodPut = document.getElementById('methodPut');

    // Fungsi buka Lightbox
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.remove('hidden');
        setTimeout(() => document.getElementById('lightbox-img').classList.remove('scale-95'), 10);
    }

    // Fungsi buka form Tambah
    function openTambah() {
        overlay.classList.remove('hidden');
        mainModal.classList.remove('hidden');
        deleteModal.classList.add('hidden');
        
        document.getElementById('modalTitle').innerText = 'TAMBAH FOTO BARU';
        activeForm.reset();
        activeForm.action = '/galeri/store'; // Rute Laravel untuk simpan
        methodPut.innerHTML = ''; // Hapus method put
        document.getElementById('inputFoto').required = true;
    }

    // Fungsi buka form Edit
    function openEdit(id, album, keterangan) {
        overlay.classList.remove('hidden');
        mainModal.classList.remove('hidden');
        deleteModal.classList.add('hidden');
        
        document.getElementById('modalTitle').innerText = 'EDIT FOTO GALERI';
        document.getElementById('inputAlbum').value = album;
        document.getElementById('inputKeterangan').value = keterangan;
        document.getElementById('inputFoto').required = false; // Foto tidak wajib saat edit
        
        activeForm.action = '/galeri/update/' + id; // Rute Laravel untuk update
        methodPut.innerHTML = '<input type="hidden" name="_method" value="PUT">';
    }

    // Fungsi buka form Hapus
    function openDelete(id) {
        overlay.classList.remove('hidden');
        deleteModal.classList.remove('hidden');
        mainModal.classList.add('hidden');
        document.getElementById('confirmDeleteForm').action = '/galeri/delete/' + id; // Rute Laravel hapus
    }

    function closeAllModals() {
        overlay.classList.add('hidden');
    }

    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeAllModals();
    });

    function openTambahAlbum(album) {
        openTambah();
        document.getElementById('inputAlbum').value = album;
    }
</script>

@endif

</body>
</html>