<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - SMPN 1 Purwosari</title>
    <link rel="icon" href="{{ asset('img/logo-removebg.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        body {
            /* Font dasar tetap menggunakan Plus Jakarta Sans sesuai permintaan 
               bahwa teks lain tidak diubah, namun di sini saya tambahkan fallback Inter */
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .luxury-shadow {
            box-shadow: 0 10px 50px -12px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="text-slate-800">

    <x-navbar />

    <header class="pt-10 pb-12 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <span class="text-blue-600 font-semibold tracking-[0.2em] text-xs uppercase mb-3 block">
                Informasi Institusi
            </span>

            <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 font-poppins text-center">
                Struktur Organisasi
            </h1>

            <p class="text-slate-400 mt-4 text-sm max-w-xl mx-auto font-light italic">
                "Bersatu dalam visi, bergerak dalam dedikasi."
            </p>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 pb-32">

        @if(session('success'))
            <div class="mb-8 p-3 bg-slate-900 text-white text-xs rounded-xl text-center animate-fade-in shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('login') && in_array(session('role'), ['admin', 'super_admin']))
            <div
                class="mb-10 p-5 border border-slate-100 rounded-3xl luxury-shadow flex items-center justify-between bg-white">
                <div class="flex items-center gap-3 pl-2">
                    <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
                    <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Management</h3>
                </div>

                <div class="flex items-center gap-1">
                    @if(!$data)
                        <form action="{{ route('struktur.update') }}" method="POST" enctype="multipart/form-data"
                            class="flex items-center gap-2">
                            @csrf
                            <input type="file" name="foto_organisasi" required
                                class="text-[10px] text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-slate-50 file:text-slate-600 hover:file:bg-slate-100 transition-all cursor-pointer">
                            <button type="submit"
                                class="bg-slate-900 text-white px-5 py-2 rounded-full text-[10px] font-bold hover:bg-blue-600 transition-all uppercase tracking-wider">Upload</button>
                        </form>
                    @else
                        <form action="{{ route('struktur.update') }}" method="POST" enctype="multipart/form-data" id="editForm"
                            class="inline">
                            @csrf
                            <input type="file" name="foto_organisasi" id="editInput" class="hidden"
                                onchange="document.getElementById('editForm').submit()">
                            <button type="button" onclick="document.getElementById('editInput').click()"
                                class="p-2.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all"
                                title="Ganti Gambar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                        </form>

                        <form action="{{ route('struktur.delete') }}" method="POST" class="inline"
                            onsubmit="return confirm('Hapus struktur ini?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="p-2.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all"
                                title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endif

        <div class="bg-white border border-slate-50 rounded-[3rem] luxury-shadow overflow-hidden">
            <div class="p-4 md:p-12 flex justify-center items-center min-h-[450px]">
                @if($data && $data->foto_organisasi)
                    <img src="{{ asset('img/org/' . $data->foto_organisasi) }}?t={{ time() }}" alt="Bagan Struktur"
                        class="w-full h-auto object-contain rounded-2xl shadow-sm">
                @else
                    <div class="text-center">
                        <svg class="w-16 h-16 text-slate-100 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-slate-300 font-light text-sm italic tracking-widest uppercase">Content Unavailable
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <div
            class="mt-12 flex flex-col md:flex-row justify-between items-center px-6 text-[10px] text-slate-300 uppercase tracking-[0.3em] font-bold">
            <div class="flex items-center gap-6 mb-4 md:mb-0">
                <span>Arsip Sekolah</span>
                <span>Dokumen Publik</span>
            </div>
            <span>Last Update: {{ $data ? $data->updated_at->format('d.m.Y') : '--.--.----' }}</span>
        </div>

    </main>

    <x-footer />

</body>

</html>