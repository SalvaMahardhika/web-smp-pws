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
        .hover-lift { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .hover-lift:hover { transform: translateY(-10px); }
        .modal-bg { background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(8px); }
        section { scroll-margin-top: 80px; }
    </style>
</head>

<body class="bg-white text-slate-900">

    <x-navbar />

    <section class="relative min-h-[90vh] flex items-center px-6 md:px-20 text-white overflow-hidden">
        <img src="{{ asset('img/image1.png') }}" class="absolute inset-0 w-full h-full object-cover z-0 brightness-[0.45] scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent z-0"></div>
        <div class="relative z-10 max-w-4xl">
            <div class="w-20 h-1 bg-blue-500 mb-6"></div>
            <h1 class="font-extrabold leading-[1.1] tracking-tight">
                <span class="text-2xl md:text-3xl block mb-3 font-light text-blue-400">Selamat Datang di</span>
                <span class="text-5xl md:text-8xl text-transparent bg-clip-text bg-gradient-to-r from-white via-blue-100 to-blue-300">
                    SMPN 1 Purwosari
                </span>
            </h1>
            <p class="mt-8 text-lg md:text-xl text-slate-300 max-w-2xl font-light leading-relaxed italic">
                "Mendedikasikan diri untuk mencetak generasi cerdas, inovatif, dan berakhlak mulia di era digital."
            </p>
            <div class="mt-12 flex flex-wrap gap-5">
                <a href="#ekstrakurikuler" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-bold shadow-xl shadow-blue-500/20 transition-all">Eksplorasi Kegiatan</a>
                <a href="/sejarah" class="px-10 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 rounded-full font-bold transition-all">Tentang Kami</a>
            </div>
        </div>
    </section>

    <section id="berita" class="py-28 px-6 md:px-10 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold">Kabar Terkini</h2>
                <p class="text-slate-400 mt-4 max-w-xl mx-auto text-lg leading-relaxed">
                    Ikuti terus perkembangan warta dan aktivitas terbaru di lingkungan sekolah kami.
                </p>
                @if(session('login') && in_array(session('role'), ['admin', 'super_admin']))
                    <button onclick="openModal('modalTambahBerita')" class="mt-6 bg-slate-900 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-600 transition shadow-lg">+ Tulis Berita</button>
                @endif
            </div>

            <div class="flex md:grid md:grid-cols-3 gap-10 overflow-x-auto md:overflow-visible pb-10 hide-scrollbar snap-x">
                @foreach ($berita as $b)
                    <div class="min-w-[85%] md:min-w-0 bg-white rounded-[2.5rem] p-4 border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.05)] hover-lift snap-center relative group">
                        @if(session('login') && in_array(session('role'), ['admin', 'super_admin']))
                        <div class="absolute top-8 right-8 flex gap-2 z-20 opacity-0 group-hover:opacity-100 transition">
                            <button onclick='openEditBerita(@json($b))' class="bg-white/90 backdrop-blur p-2 rounded-lg shadow-md text-blue-600 hover:scale-110 transition">✏️</button>
                            <form action="{{ route('berita.destroy', $b->id_berita) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-white/90 backdrop-blur p-2 rounded-lg shadow-md text-red-600 hover:scale-110 transition" onclick="return confirm('Hapus berita?')">🗑️</button>
                            </form>
                        </div>
                        @endif
                        <div class="overflow-hidden rounded-[2rem] mb-6">
                            <img src="{{ asset('img/berita/' . $b->gambar) }}" class="h-64 w-full object-cover transform hover:scale-110 transition duration-700">
                        </div>
                        <div class="px-4 pb-4">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold text-2xl leading-snug text-slate-800 line-clamp-2 hover:text-blue-600 transition cursor-pointer">{{ $b->judul }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="fasilitas" class="relative py-28 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 px-6 md:px-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-600/20 blur-[100px] rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-600/10 blur-[120px] rounded-full translate-x-1/3 translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-white tracking-tight">Fasilitas Sekolah</h2>
                <p class="text-slate-300 mt-4 max-w-xl mx-auto text-lg leading-relaxed">
                    Menyediakan infrastruktur teknologi dan lingkungan belajar yang inspiratif untuk menunjang masa depan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 bg-white/5 backdrop-blur-md p-10 rounded-[3rem] border border-white/10 shadow-2xl flex flex-col justify-between min-h-[400px] relative overflow-hidden group">
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 font-black text-2xl shadow-lg shadow-blue-600/40">01</div>
                        <h3 class="text-4xl font-bold text-white mb-4 leading-tight">Lab Komputer <br>Modern</h3>
                        <p class="text-slate-300 text-lg leading-relaxed max-w-md">Menghadirkan teknologi terbaru untuk mendukung kreativitas tanpa batas di dunia digital.</p>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-blue-600/10 rounded-full group-hover:scale-125 transition duration-700"></div>
                </div>

                <div class="grid grid-rows-2 gap-8">
                    <div class="bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 shadow-xl hover:border-blue-500/50 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-blue-400 font-bold tracking-tighter">#02</span>
                            <span class="opacity-0 group-hover:opacity-100 transition text-blue-400">→</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Perpustakaan</h3>
                        <p class="text-slate-400 text-sm mt-1">E-Book System</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 shadow-xl hover:border-blue-500/50 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-blue-400 font-bold tracking-tighter">#03</span>
                            <span class="opacity-0 group-hover:opacity-100 transition text-blue-400">→</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Laboratorium</h3>
                        <p class="text-slate-400 text-sm mt-1">Sains Modern</p>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 shadow-xl hover:border-blue-500/50 transition-all group">
                    <div class="flex justify-between items-start mb-4 text-blue-400">
                        <span class="font-bold">#04</span>
                    </div>
                    <h3 class="text-xl font-bold text-white">Sport Center</h3>
                    <p class="text-slate-400 text-sm mt-1">Area olahraga indoor & outdoor lengkap.</p>
                </div>

                <div class="md:col-span-2 bg-white/5 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 shadow-xl hover:border-blue-500/50 transition-all group flex items-center justify-between overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-2">
                            <span class="text-blue-400 font-bold">#05</span>
                            <h3 class="text-2xl font-bold text-white tracking-tight">Aula Serbaguna</h3>
                        </div>
                        <p class="text-slate-400 text-sm">Ruang pertemuan luas untuk seni, seminar, dan wisuda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ekstrakurikuler" class="py-28 px-6 md:px-10 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold">Ekstrakurikuler</h2>
                <p class="text-slate-400 mt-4 max-w-xl mx-auto text-lg leading-relaxed">Mengembangkan minat, bakat, dan karakter melalui komunitas yang inspiratif.</p>
                @if(session('login') && in_array(session('role'), ['admin', 'super_admin']))
                    <button onclick="openModal('modalTambahEskul')" class="mt-6 bg-slate-900 text-white px-8 py-3 rounded-full font-bold shadow-lg">+ Tambah Eskul</button>
                @endif
            </div>

            <div class="flex lg:grid lg:grid-cols-3 gap-10 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-12">
                @foreach ($ektrakurikuler as $e)
                    <div class="min-w-[85%] md:min-w-[45%] lg:min-w-full group bg-white rounded-[3rem] overflow-hidden border border-slate-100 shadow-[0_10px_40px_rgba(0,0,0,0.03)] hover-lift snap-center relative">
                        @if(session('login') && in_array(session('role'), ['admin', 'super_admin']))
                        <div class="absolute top-6 right-6 flex gap-2 z-20 opacity-0 group-hover:opacity-100 transition">
                            <button onclick='openEditEskul(@json($e))' class="bg-white/90 backdrop-blur p-2 rounded-lg shadow-md text-blue-600 hover:scale-110 transition">Edit</button>
                            <form action="{{ route('eskul.destroy', $e->id_ektrakurikuler) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-white/90 backdrop-blur p-2 rounded-lg shadow-md text-red-600 hover:scale-110 transition" onclick="return confirm('Hapus eskul?')">Hapus</button>
                            </form>
                        </div>
                        @endif
                        <div class="h-72 overflow-hidden relative">
                            <img src="{{ asset('img/eskul/' . $e->gambar) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md text-blue-600 text-[10px] font-black px-5 py-2 rounded-full uppercase tracking-widest">Pembina: {{ $e->pembina }}</div>
                        </div>
                        <div class="p-10">
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ $e->namaeskul }}</h3>
                            <p class="text-slate-500 leading-relaxed text-sm italic">"{{ $e->deskripsi }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />

    <div id="modalEditBerita" class="fixed inset-0 z-[150] hidden modal-bg flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] p-10 max-w-xl w-full shadow-2xl">
            <h3 class="text-2xl font-black mb-6">Edit Berita</h3>
            <form id="formEditBerita" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="text" id="edit_berita_judul" name="judul" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <input type="date" id="edit_berita_tanggal" name="tanggal" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <textarea id="edit_berita_isi" name="isi" rows="4" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required></textarea>
                <input type="file" name="gambar" class="w-full text-sm">
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('modalEditBerita')" class="flex-1 p-4 bg-slate-100 rounded-2xl font-bold">Batal</button>
                    <button type="submit" class="flex-1 p-4 bg-blue-600 text-white rounded-2xl font-bold">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalTambahBerita" class="fixed inset-0 z-[150] hidden modal-bg flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] p-10 max-w-xl w-full shadow-2xl">
            <h3 class="text-2xl font-black mb-6">Tulis Berita Baru</h3>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="text" name="judul" placeholder="Judul Berita" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <input type="date" name="tanggal" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <textarea name="isi" placeholder="Isi Berita" rows="4" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required></textarea>
                <input type="file" name="gambar" class="w-full text-sm" required>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('modalTambahBerita')" class="flex-1 p-4 bg-slate-100 rounded-2xl font-bold">Batal</button>
                    <button type="submit" class="flex-1 p-4 bg-blue-600 text-white rounded-2xl font-bold">Terbitkan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalTambahEskul" class="fixed inset-0 z-[150] hidden modal-bg flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] p-10 max-w-xl w-full shadow-2xl">
            <h3 class="text-2xl font-black mb-6">Tambah Eskul</h3>
            <form action="{{ route('eskul.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="text" name="namaeskul" placeholder="Nama Eskul" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <input type="text" name="pembina" placeholder="Nama Pembina" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <textarea name="deskripsi" placeholder="Deskripsi Singkat" rows="3" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required></textarea>
                <input type="file" name="gambar" class="w-full text-sm" required>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('modalTambahEskul')" class="flex-1 p-4 bg-slate-100 rounded-2xl font-bold">Batal</button>
                    <button type="submit" class="flex-1 p-4 bg-blue-600 text-white rounded-2xl font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEditEskul" class="fixed inset-0 z-[150] hidden modal-bg flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] p-10 max-w-xl w-full shadow-2xl">
            <h3 class="text-2xl font-black mb-6">Edit Ekstrakurikuler</h3>
            <form id="formEditEskul" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="text" id="edit_eskul_nama" name="namaeskul" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <input type="text" id="edit_eskul_pembina" name="pembina" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required>
                <textarea id="edit_eskul_desk" name="deskripsi" rows="3" class="w-full p-4 bg-slate-50 rounded-2xl border outline-none focus:border-blue-500" required></textarea>
                <input type="file" name="gambar" class="w-full text-sm">
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('modalEditEskul')" class="flex-1 p-4 bg-slate-100 rounded-2xl font-bold">Batal</button>
                    <button type="submit" class="flex-1 p-4 bg-blue-600 text-white rounded-2xl font-bold">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) { 
            const el = document.getElementById(id);
            if(el) {
                el.classList.remove('hidden');
                el.classList.add('flex');
                document.body.style.overflow = 'hidden'; 
            }
        }
        function closeModal(id) { 
            const el = document.getElementById(id);
            if(el) {
                el.classList.add('hidden');
                el.classList.remove('flex');
                document.body.style.overflow = 'auto'; 
            }
        }

        function openEditBerita(data) {
            document.getElementById('edit_berita_judul').value = data.judul;
            document.getElementById('edit_berita_tanggal').value = data.tanggal;
            document.getElementById('edit_berita_isi').value = data.isi;
            document.getElementById('formEditBerita').action = `/berita/${data.id_berita}/update`;
            openModal('modalEditBerita');
        }

        function openEditEskul(data) {
            document.getElementById('edit_eskul_nama').value = data.namaeskul;
            document.getElementById('edit_eskul_pembina').value = data.pembina;
            document.getElementById('edit_eskul_desk').value = data.deskripsi;
            document.getElementById('formEditEskul').action = `/ekstrakurikuler/${data.id_ektrakurikuler}/update`;
            openModal('modalEditEskul');
        }
    </script>
</body>
</html>