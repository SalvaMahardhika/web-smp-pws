<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<x-navbar />

<div class="max-w-6xl mx-auto py-10 space-y-10">

<!-- ALERT -->
@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 rounded">{{ session('error') }}</div>
@endif

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded">{{ session('success') }}</div>
@endif

@php
function renderKelas($data){
    foreach($data as $k){

        echo '
        <div class="bg-gray-50 p-4 rounded-xl shadow relative">

            '.(session('login') ? '
            <div class="absolute bottom-3 right-3 flex gap-2">
                <button onclick="openEdit('.$k->id_siswa.', '.$k->jumlah_laki.', '.$k->jumlah_perempuan.')" class="text-blue-500">✏️</button>
                <button onclick="openDelete('.$k->id_siswa.')" class="text-gray-600">🗑️</button>
            </div>
            ' : '').'

            <h3 class="font-bold">'.$k->kelas.'</h3>
            <p>Laki-laki: '.$k->jumlah_laki.'</p>
            <p>Perempuan: '.$k->jumlah_perempuan.'</p>
            <p class="font-bold">Jumlah: '.$k->jumlah_siswa.'</p>
        </div>
        ';
    }
}
@endphp

<!-- LOOP -->
@foreach(['7','8','9'] as $kelas)
<section>

    @if(session('login'))
    <button onclick="openTambah('{{ $kelas }}')" class="bg-blue-500 text-white px-3 py-1 rounded mb-3">
        + Tambah Kelas
    </button>
    @endif

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="font-bold text-lg mb-4">Kelas {{ $kelas }}</h2>
        <div class="grid grid-cols-5 gap-4">
            {!! renderKelas(${'kelas'.$kelas}) !!}
        </div>
    </div>

</section>
@endforeach

</div>

<!-- ================= MODAL TAMBAH ================= -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-80">

        <h2 id="titleTambah" class="text-center font-bold mb-4"></h2>

        <form method="POST" action="/siswa/store" onsubmit="return validateTambah()">
            @csrf

            <!-- DROPDOWN -->
            <select name="kelas" id="dropdownKelas"
                class="w-full border p-2 rounded mb-3">
            </select>

            <input type="number" name="jumlah_laki" id="inputLaki" placeholder="Laki-laki"
                class="w-full border p-2 rounded mb-3" min="0">

            <input type="number" name="jumlah_perempuan" id="inputPerempuan" placeholder="Perempuan"
                class="w-full border p-2 rounded mb-3" min="0">

            <p id="errorMsg" class="text-red-500 text-sm mb-2 hidden"></p>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')" class="bg-red-400 text-white px-3 py-1 rounded">Batal</button>
                <button class="bg-blue-500 text-white px-3 py-1 rounded">Simpan</button>
            </div>

        </form>

    </div>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-80">

        <h2 class="text-center font-bold mb-4">Edit Jumlah</h2>

        <form method="POST" id="editForm" onsubmit="return validateEdit()">
            @csrf

            <input type="number" name="jumlah_laki" id="editLaki"
                class="w-full border p-2 rounded mb-3" min="0">

            <input type="number" name="jumlah_perempuan" id="editPerempuan"
                class="w-full border p-2 rounded mb-3" min="0">

            <p id="editError" class="text-red-500 text-sm mb-2 hidden"></p>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editModal')" class="bg-red-400 text-white px-3 py-1 rounded">Batal</button>
                <button class="bg-blue-500 text-white px-3 py-1 rounded">Simpan</button>
            </div>
        </form>

    </div>
</div>

<!-- ================= MODAL DELETE ================= -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl text-center">

        <p class="mb-4">Apakah anda yakin?</p>

        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Ya hapus saja
            </button>
        </form>

        <button onclick="closeModal('deleteModal')" class="mt-2 text-red-500">
            Batal
        </button>
    </div>
</div>

<x-footer />

<!-- ================= SCRIPT ================= -->
<script>

function openTambah(kelas){
    document.getElementById('tambahModal').classList.remove('hidden');
    document.getElementById('titleTambah').innerText = 'Tambah Kelas ' + kelas;

    let dropdown = document.getElementById('dropdownKelas');
    dropdown.innerHTML = '';

    let huruf = ['A','B','C','D','E','F','G','H','I'];

    huruf.forEach(h => {
        let opt = document.createElement('option');
        opt.value = kelas + h;
        opt.text = kelas + h;
        dropdown.appendChild(opt);
    });
}

function validateTambah(){
    let laki = document.getElementById('inputLaki').value;
    let perempuan = document.getElementById('inputPerempuan').value;
    let error = document.getElementById('errorMsg');

    if(laki === '' || perempuan === ''){
        error.innerText = 'Semua field wajib diisi';
        error.classList.remove('hidden');
        return false;
    }

    if(laki < 0 || perempuan < 0){
        error.innerText = 'Tidak boleh angka negatif';
        error.classList.remove('hidden');
        return false;
    }

    return true;
}

function validateEdit(){
    let laki = document.getElementById('editLaki').value;
    let perempuan = document.getElementById('editPerempuan').value;
    let error = document.getElementById('editError');

    if(laki === '' || perempuan === ''){
        error.innerText = 'Tidak boleh kosong';
        error.classList.remove('hidden');
        return false;
    }

    if(laki < 0 || perempuan < 0){
        error.innerText = 'Tidak boleh negatif';
        error.classList.remove('hidden');
        return false;
    }

    return true;
}

function openEdit(id, laki, perempuan){
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editLaki').value = laki;
    document.getElementById('editPerempuan').value = perempuan;
    document.getElementById('editForm').action = '/siswa/update/' + id;
}

function openDelete(id){
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteForm').action = '/siswa/delete/' + id;
}

function closeModal(id){
    document.getElementById(id).classList.add('hidden');
}

</script>

</body>
</html>