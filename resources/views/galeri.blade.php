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
        Dokumentasi momen-momen berharga dan prestasi civitas akademika SMP Negeri 1 Purwosari.
    </p>

    @if(session('login'))
    <button onclick="openTambah()" 
        class="bg-blue-600 text-white px-6 py-3 rounded-full font-bold text-sm shadow-lg hover:bg-blue-700 transition-all">
        + Tambah Album
    </button>
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

    <!-- JUDUL -->
    <div class="flex items-center gap-4 mb-8">
        <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-xs font-bold uppercase">Album</span>
        <h2 class="text-2xl font-bold text-gray-800">{{ $data['judul'] }}</h2>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border p-6 md:p-8">

        <!-- FOTO -->
        <div class="flex flex-wrap justify-center gap-6 mb-8">

        @foreach ($data['fotos'] as $foto)
        <div class="gallery-card relative overflow-hidden rounded-xl bg-gray-100 group">

            <img src="{{ asset('img/imggaleri/' . $foto) }}" 
                 class="max-h-60 rounded-xl object-contain">

            @if(session('login'))
            <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition">

                <button onclick="openEdit({{ $data['id'] }}, '{{ $album_nama }}', '{{ $data['keterangan'] }}')" 
                    class="p-2 bg-white text-blue-600 rounded-lg">✏️</button>

                <button onclick="openDelete({{ $data['id'] }})" 
                    class="p-2 bg-white text-red-600 rounded-lg">🗑️</button>

            </div>
            @endif

        </div>
        @endforeach

        </div>

        <!-- KETERANGAN -->
        <div class="bg-blue-50 border-l-4 border-blue-600 p-5 rounded">
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

<x-footer />

<!-- LIGHTBOX -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 hidden flex items-center justify-center z-50"
     onclick="this.classList.add('hidden')">
    <img id="lightbox-img" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl">
</div>

@if(session('login'))
<div id="modalOverlay" class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4">

    <!-- MODAL TAMBAH / EDIT -->
    <div id="mainModal" class="hidden bg-white rounded-2xl shadow-xl w-full max-w-lg">
        <div class="p-6">

            <h2 id="modalTitle" class="text-xl font-bold mb-4">Tambah Album</h2>

            <form id="activeForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div id="methodPut"></div>

                <!-- ✅ JUDUL -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Judul Album</label>
                    <input type="text" name="judul" id="inputJudul"
                           class="w-full border p-2 rounded" required>
                </div>

                <!-- KETERANGAN -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Keterangan</label>
                    <textarea name="keterangan" id="inputKeterangan"
                              class="w-full border p-2 rounded" required></textarea>
                </div>

                <!-- FOTO -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-1">Upload Foto</label>
                    <input type="file" name="foto[]" id="inputFoto" multiple
                           class="w-full border p-2 rounded">
                </div>

                <!-- BUTTON -->
                <div class="flex gap-2">
                    <button type="submit"
                            class="flex-1 bg-blue-600 text-white py-2 rounded">
                        Simpan
                    </button>

                    <button type="button" onclick="closeModal()"
                            class="flex-1 bg-gray-300 py-2 rounded">
                        Batal
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div id="deleteModal" class="hidden bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center">
        <h3 class="text-lg font-bold mb-4">Hapus Album?</h3>

        <form method="POST" id="confirmDeleteForm">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="w-full bg-red-600 text-white py-2 rounded mb-2">
                Ya, Hapus
            </button>

            <button type="button" onclick="closeModal()"
                    class="w-full bg-gray-300 py-2 rounded">
                Batal
            </button>
        </form>
    </div>

</div>
@endif


<script>
const overlay = document.getElementById('modalOverlay');
const mainModal = document.getElementById('mainModal');
const deleteModal = document.getElementById('deleteModal');
const activeForm = document.getElementById('activeForm');
const methodPut = document.getElementById('methodPut');

// =========================
// OPEN TAMBAH
// =========================
function openTambah() {
    overlay.classList.remove('hidden');
    mainModal.classList.remove('hidden');
    deleteModal.classList.add('hidden');

    document.getElementById('modalTitle').innerText = 'Tambah Album';

    activeForm.reset();
    activeForm.action = '/galeri/store';
    methodPut.innerHTML = '';

    document.getElementById('inputFoto').required = true;
}

// =========================
// OPEN EDIT
// =========================
function openEdit(id, album, keterangan) {
    overlay.classList.remove('hidden');
    mainModal.classList.remove('hidden');
    deleteModal.classList.add('hidden');

    document.getElementById('modalTitle').innerText = 'Edit Album';

    document.getElementById('inputJudul').value = album;
    document.getElementById('inputKeterangan').value = keterangan;

    activeForm.action = '/galeri/update/' + id;
    methodPut.innerHTML = '<input type="hidden" name="_method" value="PUT">';

    document.getElementById('inputFoto').required = false;
}

// =========================
// DELETE
// =========================
function openDelete(id) {
    overlay.classList.remove('hidden');
    deleteModal.classList.remove('hidden');
    mainModal.classList.add('hidden');

    document.getElementById('confirmDeleteForm').action = '/galeri/delete/' + id;
}

// =========================
// CLOSE
// =========================
function closeModal() {
    overlay.classList.add('hidden');
}

// =========================
// LIGHTBOX
// =========================
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').classList.remove('hidden');
}
</script>

</body>
</html>