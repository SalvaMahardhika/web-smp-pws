<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - SMPN 1 Purwosari</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200">

<!-- NAVBAR -->
<x-navbar />

<!-- TITLE -->
<section class="text-center py-12">
    <h1 class="text-4xl font-bold">Data Guru</h1>
    <p class="text-gray-600 mt-2">
        Daftar tenaga pendidik SMPN 1 Purwosari
    </p>
</section>

<!-- TOMBOL TAMBAH (HANYA SAAT LOGIN) -->
<section class="px-10 mb-4 flex justify-center">
    <div class="w-full max-w-5xl">
        @if(session('login'))
        <button onclick="openModal('tambahModal')" 
            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
            + Tambah Guru
        </button>
        @endif
    </div>
</section>

<!-- TABLE -->
<section class="px-10 pb-20 flex justify-center">
    <div class="bg-white rounded-2xl shadow-md p-6 w-full max-w-5xl">

        <table class="w-full text-sm border border-gray-300">
            
            <!-- HEADER -->
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="border px-3 py-2 w-12 text-center">No</th>
                    <th class="border px-3 py-2">Nama Guru</th>
                    <th class="border px-3 py-2">Mata Pelajaran / Jabatan</th>

                    @if(session('login'))
                    <th class="border px-3 py-2 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>

            <!-- BODY -->
            <tbody>
                @foreach ($guru as $index => $g)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-3 py-2">{{ $g->nama_guru }}</td>
                    <td class="border px-3 py-2">{{ $g->mata_pelajaran }}</td>

                    @if(session('login'))
                    <td class="border px-3 py-2 text-center">
                        <button onclick="openEdit({{ $g->id_guru }}, '{{ $g->nama_guru }}', '{{ $g->mata_pelajaran }}')" class="text-blue-500">✏️</button>
                        <button onclick="openDelete({{ $g->id_guru }})" class="text-red-500 ml-2">🗑️</button>
                    </td>
                    @endif
                </tr>
                @endforeach

                @foreach ($guru as $index => $g)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-3 py-2">{{ $g[0] }}</td>
                    <td class="border px-3 py-2">{{ $g[1] }}</td>

                    @if(session('login'))
                    <td class="border px-3 py-2 text-center">
                        <button onclick="openEdit({{ $index }}, '{{ $g[0] }}', '{{ $g[1] }}')" class="text-blue-500">✏️</button>
                        <button onclick="openDelete({{ $index }})" class="text-red-500 ml-2">🗑️</button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</section>

<!-- MODAL TAMBAH -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Guru</h2>

        <form method="POST" action="/guru/store">
            @csrf

            <input type="text" name="nama_guru" placeholder="Nama Guru"
                class="w-full border p-2 rounded mb-3">

            <input type="text" name="mata_pelajaran" placeholder="Mata Pelajaran"
                class="w-full border p-2 rounded mb-3">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')" 
                    class="bg-red-400 text-white px-3 py-1 rounded">Batal</button>

                <button class="bg-blue-500 text-white px-3 py-1 rounded">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Edit Guru</h2>

        <form method="POST" id="editForm">
            @csrf

            <input type="text" name="nama_guru" id="editNama"
                class="w-full border p-2 rounded mb-3">

            <input type="text" name="mata_pelajaran" id="editMapel"
                class="w-full border p-2 rounded mb-3">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editModal')" 
                    class="bg-red-400 text-white px-3 py-1 rounded">Batal</button>

                <button class="bg-blue-500 text-white px-3 py-1 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL DELETE -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl text-center w-80">
        <h2 class="text-lg font-bold mb-2">Apakah anda yakin?</h2>
        <p class="text-gray-500 mb-4">Data akan dihapus</p>

        <div class="flex justify-center gap-3">
            <button onclick="closeModal('deleteModal')" 
                class="bg-red-400 text-white px-4 py-2 rounded">Batal</button>

            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Ya hapus
                </button>
            </form>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
function openModal(id){
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id){
    document.getElementById(id).classList.add('hidden');
}

function openEdit(id, nama, mapel){
    openModal('editModal');

    document.getElementById('editNama').value = nama;
    document.getElementById('editMapel').value = mapel;

    document.getElementById('editForm').action = '/guru/update/' + id;
}

function openDelete(id){
    openModal('deleteModal');
    document.getElementById('deleteForm').action = '/guru/delete/' + id;
}
</script>

<x-footer />

</body>
</html>