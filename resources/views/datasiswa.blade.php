<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .snap-x { scroll-snap-type: x mandatory; }
        .snap-start { scroll-snap-align: start; }
        .card-shadow { box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

<x-navbar />

<div class="max-w-7xl mx-auto px-4 md:px-6 py-10">
    
    <div class="mb-16 text-center">
        <h1 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900 font-poppins text-center">Data Siswa</h1>
        <p class="text-slate-500 mt-2 text-lg">Data jumlah siswa per rombongan belajar.</p>
        <div class="w-16 h-1.5 bg-blue-600 rounded-full mx-auto mt-4"></div>
    </div>

    @if(session('success'))
    <div class="mb-10 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-2xl shadow-sm flex items-center animate-bounce max-w-2xl mx-auto">
        <span class="mr-2">✅</span> {{ session('success') }}
    </div>
    @endif

    @php
    function renderKelas($data) {
        if($data->isEmpty()) {
            // Menghapus 'italic' di sini
            echo '<div class="min-w-full py-10 text-center text-slate-400 border-2 border-dashed border-slate-200 rounded-3xl">Belum ada data kelas.</div>';
            return;
        }
        foreach($data as $k) {
            echo '
            <div class="snap-start flex-shrink-0 w-[280px] md:w-auto bg-white p-6 rounded-[2.5rem] border border-slate-100 card-shadow transition-all duration-300 hover:scale-[1.02]">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-lg shadow-blue-200 font-poppins">
                        '.$k->kelas.'
                    </div>
                    '.(session('login') ? '
                    <div class="flex gap-1">
                        <button onclick="openEdit('.$k->id_siswa.', '.$k->jumlah_laki.', '.$k->jumlah_perempuan.')" class="p-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition text-sm">✏️</button>
                        <button onclick="openDelete('.$k->id_siswa.')" class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition text-sm">🗑️</button>
                    </div>
                    ' : '').'
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between items-center bg-slate-50 p-3 rounded-2xl">
                        <span class="text-slate-500 font-bold text-xs uppercase tracking-wider">Laki-laki</span>
                        <span class="font-black text-slate-800 text-lg">'.$k->jumlah_laki.'</span>
                    </div>
                    <div class="flex justify-between items-center bg-slate-50 p-3 rounded-2xl">
                        <span class="text-slate-500 font-bold text-xs uppercase tracking-wider">Perempuan</span>
                        <span class="font-black text-slate-800 text-lg">'.$k->jumlah_perempuan.'</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-between items-center px-1">
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 font-poppins">Total</span>
                    <span class="text-3xl font-black text-blue-600 font-poppins">'.$k->jumlah_siswa.'</span>
                </div>
            </div>
            ';
        }
    }
    @endphp

    <div class="space-y-20">
        @foreach(['7','8','9'] as $tingkat)
        <section>
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100 px-2">
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                    <h2 class="text-2xl font-black text-slate-800 font-poppins tracking-tighter">Kelas {{ $tingkat }}</h2>
                </div>
                
                @if(session('login'))
                <button type="button" onclick="openTambah('{{ $tingkat }}')" class="bg-slate-900 text-white px-5 py-2.5 rounded-2xl font-bold text-xs shadow-xl hover:bg-blue-600 transition-all active:scale-95 uppercase tracking-widest">
                    + Tambah Ruang {{ $tingkat }}
                </button>
                @endif
            </div>

            <div class="flex overflow-x-auto pb-8 gap-6 scrollbar-hide snap-x md:grid md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 md:overflow-visible px-2">
                {!! renderKelas(${'kelas'.$tingkat}) !!}
            </div>
        </section>
        @endforeach
    </div>
</div>

<div id="modalOverlay" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] flex items-center justify-center p-4">
    <div id="mainModal" class="hidden bg-white rounded-[3rem] shadow-2xl w-full max-w-md overflow-hidden transition-all scale-95">
        <div class="p-10 text-center">
            <h2 id="modalTitle" class="text-3xl font-black text-slate-900 mb-8 tracking-tight uppercase font-poppins">Data Siswa</h2>
            <form id="activeForm" method="POST" action="" class="text-left">
                @csrf
                <div class="space-y-6">
                    <div id="kelasSelectorContainer">
                        <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Pilih Ruang</label>
                        <select name="kelas" id="dropdownKelas" class="w-full bg-slate-100 border-none p-4 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 font-bold text-lg"></select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Laki-laki</label>
                            <input type="number" name="jumlah_laki" id="inputLaki" class="w-full bg-slate-100 border-none p-4 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 font-bold text-lg" min="0" required placeholder="0">
                        </div>
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Perempuan</label>
                            <input type="number" name="jumlah_perempuan" id="inputPerempuan" class="w-full bg-slate-100 border-none p-4 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 font-bold text-lg" min="0" required placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex flex-col gap-2">
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black rounded-3xl hover:bg-blue-700 shadow-xl shadow-blue-100 transition-all active:scale-95 uppercase tracking-widest text-center">Simpan Data</button>
                    <button type="button" onclick="closeAllModals()" class="w-full py-3 text-slate-400 font-bold hover:text-slate-600 transition text-center">Tutup</button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteModal" class="hidden bg-white rounded-[3rem] shadow-2xl w-full max-w-xs p-10 text-center">
        <div class="text-5xl mb-4 text-center">⚠️</div>
        <h3 class="text-2xl font-black text-slate-900 mb-2 uppercase tracking-tight font-poppins text-center">Hapus Data?</h3>
        <p class="text-slate-500 font-medium mb-8 text-center">Data akan dihapus permanen.</p>
        <form method="POST" id="confirmDeleteForm" class="flex flex-col gap-2 items-center text-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full py-4 bg-red-500 text-white font-black rounded-[2rem] hover:bg-red-600 transition-all uppercase tracking-widest text-center">Ya, Hapus</button>
            <button type="button" onclick="closeAllModals()" class="w-full py-2 text-slate-400 font-bold uppercase text-xs tracking-widest text-center">Batal</button>
        </form>
    </div>
</div>

<x-footer />

<script>
const overlay = document.getElementById('modalOverlay');
const mainModal = document.getElementById('mainModal');
const deleteModal = document.getElementById('deleteModal');
const activeForm = document.getElementById('activeForm');

function openTambah(tingkat) {
    overlay.classList.remove('hidden');
    mainModal.classList.remove('hidden');
    deleteModal.classList.add('hidden');
    document.getElementById('modalTitle').innerText = 'TAMBAH KELAS ' + tingkat;
    document.getElementById('kelasSelectorContainer').classList.remove('hidden');
    activeForm.reset();
    activeForm.action = '/siswa/store';
    let dropdown = document.getElementById('dropdownKelas');
    dropdown.innerHTML = '';
    const rombel = ['A','B','C','D','E','F','G','H','I'];
    rombel.forEach(h => {
        let opt = document.createElement('option');
        opt.value = tingkat + h;
        opt.text = 'RUANG ' + tingkat + h;
        dropdown.appendChild(opt);
    });
}

function openEdit(id, laki, perempuan) {
    overlay.classList.remove('hidden');
    mainModal.classList.remove('hidden');
    deleteModal.classList.add('hidden');
    document.getElementById('modalTitle').innerText = 'UPDATE JUMLAH';
    document.getElementById('kelasSelectorContainer').classList.add('hidden');
    document.getElementById('inputLaki').value = laki;
    document.getElementById('inputPerempuan').value = perempuan;
    activeForm.action = '/siswa/update/' + id;
}

function openDelete(id) {
    overlay.classList.remove('hidden');
    deleteModal.classList.remove('hidden');
    mainModal.classList.add('hidden');
    document.getElementById('confirmDeleteForm').action = '/siswa/delete/' + id;
}

function closeAllModals() {
    overlay.classList.add('hidden');
}

overlay.addEventListener('click', (e) => {
    if (e.target === overlay) closeAllModals();
});
</script>

</body>
</html>