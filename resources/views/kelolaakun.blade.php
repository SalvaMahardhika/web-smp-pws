<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SMPN 1 Purwosari</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

<x-navbar />

<main class="flex-grow">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-xl font-bold mb-4">Kelola Akun</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

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
                @foreach($users as $i => $user)
                <tr class="border-t">
                    <td class="p-3">{{ $i + 1 }}</td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>

                    <!-- STATUS -->
                    <td class="p-3 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox"
                                class="sr-only peer"
                                {{ $user->status ? 'checked' : '' }}
                                onchange="toggleStatus(this, {{ $user->id_user }})">

                            <div class="w-11 h-6 bg-gray-300 rounded-full peer 
                                        peer-checked:bg-blue-500 
                                        relative transition">
                                <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full 
                                            transition peer-checked:translate-x-5"></div>
                            </div>
                        </label>
                    </td>

                    <td class="p-3 text-center space-x-2">

                        <!-- EDIT -->
                        <button 
                            onclick="openEdit(this)"
                            data-id="{{ $user->id_user }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded">
                            Edit
                        </button>

                        <!-- 🔥 HAPUS + KONFIRMASI -->
                        <form action="/kelola-akun/{{ $user->id_user }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus akun ini? Data tidak bisa dikembalikan!')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

</main>

<!-- MODAL TAMBAH -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-lg font-bold text-center mb-4">Tambah Akun Admin</h2>

        <form method="POST" action="/kelola-akun">
            @csrf

            <input type="text" name="name" placeholder="Username" class="w-full border p-2 rounded mb-3">
            <input type="email" name="email" placeholder="Gmail" class="w-full border p-2 rounded mb-3">
            <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('tambahModal')" class="bg-red-400 text-white px-4 py-1 rounded">
                    Keluar
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-96">
        <h2 class="text-lg font-bold text-center mb-4">Edit Akun Admin</h2>

        <form method="POST" id="editForm">
            @csrf

            <input type="text" name="name" id="editName" class="w-full border p-2 rounded mb-3">
            <input type="email" name="email" id="editEmail" class="w-full border p-2 rounded mb-3">
            <input type="password" name="password" placeholder="Password (opsional)" class="w-full border p-2 rounded mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editModal')" class="bg-red-400 text-white px-4 py-1 rounded">
                    Keluar
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<x-footer />

<script>
function openModal(id){
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id){
    document.getElementById(id).classList.add('hidden');
}

// EDIT
function openEdit(el){
    openModal('editModal');

    let id = el.getAttribute('data-id');
    let name = el.getAttribute('data-name');
    let email = el.getAttribute('data-email');

    document.getElementById('editForm').action = '/kelola-akun/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
}

// STATUS
function toggleStatus(el, id){
    let status = el.checked ? 1 : 0;

    fetch('/update-status/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ status: status })
    });
}
</script>

</body>
</html>