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
                </tr>
            </thead>

            <!-- BODY -->
            <tbody>
                @php
                    $guru = [
                        ['Budi Santoso, S.Pd','Kepala Sekolah'],
                        ['Drs. Endra Joko Prasetyo','Matematika'],
                        ['Bambang Rochim, S.Pd','Matematika'],
                        ['Imam Nurhuda, S.Pd','Matematika'],
                        ['Nur Hidayah, S.Pd','Matematika'],
                        ['Ana Murtiawati, S.Pd','Matematika'],
                        ['Hj. Arni Sihombing, S.Pd','IPS'],
                        ['Sri Kurniasih, S.Pd','IPS'],
                        ['Umi Lestari, S.Pd','IPS'],
                        ['Octaviani Indah Sakhowati, S.Pd','IPS'],
                        ['Hartini, S.Pd','IPA'],
                        ['Anik Tri Rohmawati, S.Pd','IPA'],
                        ['Anang Yuni Astuti, S.Pd','IPA'],
                        ['Tri Wahyuni, S.Pd','IPA'],
                        ['Aditya, S.Pd','IPA'],
                        ['Dwi Setiani, S.Sos., S.Pd','Bahasa Inggris'],
                        ['Susi Aminah, S.Pd','Bahasa Inggris'],
                        ['Erin Retno Kumala, S.Pd','Bahasa Inggris'],
                        ['Sudarsih, S.Pd','Bahasa Inggris'],
                        ['Budi Susiloyono, S.Pd','Bahasa Indonesia'],
                        ['Juwari, M.Pd','Bahasa Indonesia'],
                        ['Sukini, S.Pd','Bahasa Indonesia'],
                        ['Siti Rahayu, S.Pd','Bahasa Indonesia'],
                        ['Teguh Septiya Ardi, S.Pd','Bahasa Indonesia'],
                        ['Andina Dwi Komalasari, S.Pd','Bahasa Indonesia'],
                        ['Zulfi Irawan, S.Pd','Bahasa Indonesia'],
                        ['Kuni Harsi Nafa, S.Pd','PJOK'],
                        ['Sutrisno, S.Pd','PJOK'],
                        ['Ramelan, S.Pd','PJOK'],
                        ['Suyitno Aris Saputra, S.Pd','PPKn'],
                        ['Adi Dwi Sulis, S.Pd','PPKn'],
                        ['Slamet Riyadi, S.Pd','PPKn'],
                        ['Dyah Cici Susilowati, S.Pd','Agama'],
                        ['Abdurrahman, S.Pd.I','Agama'],
                        ['Mahnud Efendi, S.Pd.I','Agama'],
                        ['Merlina Fristy Mariandini, S.Pd','Informatika'],
                        ['Septi Nur Kholiyah, S.Pd','Informatika'],
                        ['Beni Ningsih Waspada, S.Pd','Seni'],
                        ['Siti Munaifah, S.Pd','Bahasa Jawa'],
                        ['Rita Puspitasari, S.Pd','Bahasa Jawa'],
                        ['Moch. Heru Eko Cahyon, S.Pd','BK'],
                        ['Wantono, S.Pd','BK'],
                        ['Lia Arfika Sari, S.Pd','BK'],
                        ['Abyan Raga Kusuma, S.tr.kom','TRPL'],
                    ];
                @endphp

                @foreach ($guru as $index => $g)
                <tr class="hover:bg-gray-50">
                    <td class="border px-3 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-3 py-2">{{ $g[0] }}</td>
                    <td class="border px-3 py-2">{{ $g[1] }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</section>

<x-footer />

</body>
</html>