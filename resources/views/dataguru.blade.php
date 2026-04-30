<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .card-shadow { box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

<x-navbar />

<div class="max-w-7xl mx-auto px-4 md:px-6 py-10">
    
    <div class="mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900 font-poppins text-center">Data Guru</h1>
        <p class="text-slate-500 mt-2 text-lg text-center">Daftar tenaga pendidik SMPN 1 Purwosari</p>
        <div class="w-16 h-1.5 bg-blue-600 rounded-full mx-auto mt-4 text-center"></div>
    </div>

    <div class="flex flex-col items-center mb-10 text-center">
        @if(session('login'))
        <button onclick="openModal('tambahModal')" 
            class="bg-slate-900 text-white px-8 py-3 rounded-2xl font-bold shadow-xl hover:bg-blue-600 transition-all active:scale-95 text-center">
            + Tambah Guru
        </button>
        @endif

        @if(session('success'))
        <div class="mt-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-2xl shadow-sm flex items-center animate-bounce text-center">
            <span class="mr-2">✅</span> {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 card-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-slate-400 text-center w-24">No</th>
                        <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-slate-400">Nama Lengkap</th>
                        <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-slate-400">Mata Pelajaran / Jabatan</th>
                        @if(session('login'))
                        <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-slate-400 text-center w-44">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($guru as $index => $g)
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="px-8 py-5 text-center font-bold text-slate-300">{{ $index + 1 }}</td>
                        <td class="px-8 py-5">
                            <span class="font-bold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">{{ $g->nama_guru }}</span>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-lg text-sm font-medium italic">
                                {{ $g->mata_pelajaran }}
                            </span>
                        </td>
                        @if(session('login'))
                        <td class="px-8 py-5">
                            <div class="flex justify-center gap-3">
                                <button onclick="openEdit({{ $g->id_guru }}, '{{ $g->nama_guru }}', '{{ $g->mata_pelajaran }}')" 
                                    class="text-blue-500 hover:text-blue-700 font-bold text-sm flex items-center gap-1 transition-all hover:underline text-center">
                                    Edit ✏️
                                </button>
                                <button onclick="openDelete({{ $g->id_guru }})" 
                                    class="text-red-400 hover:text-red-600 font-bold text-sm flex items-center gap-1 transition-all hover:underline text-center">
                                    Hapus 🗑️
                                </button>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    
                    @if($guru->isEmpty())
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center text-slate-400 italic font-medium">
                            Belum ada data tenaga pendidik yang tersedia.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="tambahModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-md overflow-hidden transition-all scale-100">
        <div class="p-10 text-center">
            <h2 class="text-3xl font-black text-slate-900 mb-8 tracking-tight uppercase italic font-poppins text-center">Tambah Guru</h2>
            <form method="POST" action="/guru/store" class="space-y-6 text-left">
                @csrf
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                    <input type="text" name="nama_guru" class="w-full bg-slate-100 border-none p-4 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 font-bold text-lg" required placeholder="Contoh: Budi Santoso, S.Pd">
                </div>

                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Mata Pelajaran</label>
                    <div class="relative">
                        <select name="mata_pelajaran" class="w-full bg-slate-100 border-2 border-transparent p-4 rounded-3xl outline-none focus:border-blue-200 focus:bg-blue-50/50 font-bold text-lg text-slate-800 cursor-pointer appearance-none pr-12 transition-all" required>
                            <option value="" disabled selected>Pilih Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Ilmu Pengetahuan Alam (IPA)">Ilmu Pengetahuan Alam (IPA)</option>
                            <option value="Ilmu Pengetahuan Sosial (IPS)">Ilmu Pengetahuan Sosial (IPS)</option>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="Pendidikan Pancasila (PPKn)">Pendidikan Pancasila (PPKn)</option>
                            <option value="Pendidikan Jasmani (PJOK)">Pendidikan Jasmani (PJOK)</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="TIK">TIK</option>
                            <option value="Prakarya">Prakarya</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-slate-800">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-2 text-center">
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black rounded-3xl hover:bg-blue-700 shadow-xl transition-all uppercase tracking-widest text-center">Simpan Data</button>
                    <button type="button" onclick="closeModal('tambahModal')" class="w-full py-3 text-slate-400 font-bold text-center">Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-md overflow-hidden transition-all scale-100">
        <div class="p-10 text-center">
            <h2 class="text-3xl font-black text-slate-900 mb-8 tracking-tight uppercase italic font-poppins text-center">Edit Data</h2>
            <form method="POST" id="editForm" class="space-y-6 text-left">
                @csrf
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Guru</label>
                    <input type="text" name="nama_guru" id="editNama" class="w-full bg-slate-100 border-none p-4 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 font-bold text-lg" required>
                </div>

                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Mata Pelajaran</label>
                    <div class="relative">
                        <select name="mata_pelajaran" id="editMapel" class="w-full bg-slate-100 border-2 border-transparent p-4 rounded-3xl outline-none focus:border-blue-200 focus:bg-blue-50/50 font-bold text-lg text-slate-800 cursor-pointer appearance-none pr-12 transition-all" required>
                            <option value="" disabled>Pilih Mata Pelajaran</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Ilmu Pengetahuan Alam (IPA)">Ilmu Pengetahuan Alam (IPA)</option>
                            <option value="Ilmu Pengetahuan Sosial (IPS)">Ilmu Pengetahuan Sosial (IPS)</option>
                            <option value="Pendidikan Agama">Pendidikan Agama</option>
                            <option value="Pendidikan Pancasila (PPKn)">Pendidikan Pancasila (PPKn)</option>
                            <option value="Pendidikan Jasmani (PJOK)">Pendidikan Jasmani (PJOK)</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="TIK">TIK</option>
                            <option value="Prakarya">Prakarya</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-slate-800">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-2 text-center">
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black rounded-3xl hover:bg-blue-700 shadow-xl transition-all uppercase tracking-widest text-center">Update Data</button>
                    <button type="button" onclick="closeModal('editModal')" class="w-full py-3 text-slate-400 font-bold text-center">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] flex items-center justify-center p-4 text-center">
    <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-xs p-10 text-center">
        <div class="text-5xl mb-4 text-center">⚠️</div>
        <h3 class="text-2xl font-black text-slate-900 mb-2 uppercase font-poppins text-center">Hapus Guru?</h3>
        <p class="text-slate-500 text-sm mb-8 text-center italic">Data akan hilang permanen.</p>
        <form method="POST" id="deleteForm" class="flex flex-col gap-2 items-center text-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full py-4 bg-red-500 text-white font-black rounded-[2rem] hover:bg-red-600 transition-all text-center">Ya, Hapus</button>
            <button type="button" onclick="closeModal('deleteModal')" class="w-full py-2 text-slate-400 font-bold text-center uppercase text-xs tracking-widest">Batal</button>
        </form>
    </div>
</div>

<script>
function openModal(id){ document.getElementById(id).classList.remove('hidden'); }
function closeModal(id){ document.getElementById(id).classList.add('hidden'); }
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

// Menutup modal jika klik di luar area modal
window.addEventListener('click', function(e) {
    if (e.target.classList.contains('bg-slate-900/80')) {
        closeModal('tambahModal');
        closeModal('editModal');
        closeModal('deleteModal');
    }
});
</script>

<x-footer />
</body>
</html>