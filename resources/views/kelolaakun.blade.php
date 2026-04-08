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
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .hover-lift { transition: all 0.3s ease; }
        .hover-lift:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

<x-navbar />

<main class="flex-grow">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-xl font-bold mb-4">Kelola Akun</h1>

    <button onclick="openModal('tambahModal')"
        class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
        + Tambah Admin
    </button>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Gmail</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 3; $i++)
                <tr class="border-t">
                    <td class="p-3">{{ $i }}</td>
                    <td class="p-3">Admin {{ $i }}</td>
                    <td class="p-3">admin{{ $i }}@gmail.com</td>

                    <!-- ✅ SWITCH -->
                    <td class="p-3 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked onchange="toggleStatus(this)">
                            <div class="w-11 h-6 bg-gray-300 rounded-full peer 
                                        peer-checked:bg-blue-500 
                                        relative transition">
                                <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full 
                                            transition peer-checked:translate-x-5"></div>
                            </div>
                        </label>
                    </td>

                    <td class="p-3 text-center space-x-2">
                        <button onclick="openEdit()" class="bg-blue-500 text-white px-3 py-1 rounded">
                            Edit
                        </button>

                        <button onclick="openDelete()" class="bg-red-500 text-white px-3 py-1 rounded">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

    </div>

</div>

</main>

<!-- ================= MODAL TAMBAH ================= -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-lg font-bold text-center mb-4">Tambah Akun Admin</h2>
        <form>
            <input type="text" placeholder="Username" class="w-full border p-2 rounded mb-3">
            <input type="email" placeholder="Gmail" class="w-full border p-2 rounded mb-3">
            <input type="password" placeholder="Password" class="w-full border p-2 rounded mb-4">
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')" class="bg-red-400 text-white px-4 py-1 rounded">Keluar</button>
                <button class="bg-blue-500 text-white px-4 py-1 rounded">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL EDIT ================= -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-lg font-bold text-center mb-4">Edit Akun Admin</h2>
        <form>
            <input type="text" placeholder="Username" class="w-full border p-2 rounded mb-3">
            <input type="email" placeholder="Gmail" class="w-full border p-2 rounded mb-3">
            <input type="password" placeholder="Password" class="w-full border p-2 rounded mb-4">
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editModal')" class="bg-red-400 text-white px-4 py-1 rounded">Keluar</button>
                <button class="bg-blue-500 text-white px-4 py-1 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL DELETE ================= -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl text-center">
        <h2 class="font-bold text-lg mb-2">Apakah anda yakin?</h2>
        <p class="text-gray-500 mb-4">Akun akan dihapus permanen</p>
        <div class="flex justify-center gap-3">
            <button onclick="closeModal('deleteModal')" class="bg-red-400 text-white px-4 py-2 rounded">Batal</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Ya</button>
        </div>
    </div>
</div>

<x-footer />

<!-- ================= SCRIPT ================= -->
<script>
function openModal(id){
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id){
    document.getElementById(id).classList.add('hidden');
}

function openEdit(){
    openModal('editModal');
}

function openDelete(){
    openModal('deleteModal');
}

function toggleStatus(el){
    if(el.checked){
        console.log('Admin Aktif');
    } else {
        console.log('Admin Nonaktif');
    }
}
</script>

</body>
</html>