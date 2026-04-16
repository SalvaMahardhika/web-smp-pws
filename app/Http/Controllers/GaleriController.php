<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $galeris = Galeri::latest()->get()->groupBy('album');
        return view('galeri', compact('galeris'));
    }

    // =========================
    // STORE (MULTI UPLOAD)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'album' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        foreach ($request->file('foto') as $file) {

            // 🔥 generate nama file unik
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();

            // 🔥 simpan ke public/img/imggaleri
            $file->move(public_path('img/imggaleri'), $namaFile);

            // 🔥 simpan ke database
            Galeri::create([
                'album' => $request->album,
                'keterangan' => $request->keterangan,
                'file_foto' => $namaFile
            ]);
        }

        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'album' => 'required',
            'keterangan' => 'required',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $albumLama = $galeri->album;

        $data = [
            'album' => $request->album,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('foto')) {

            // 🔥 hapus file lama
            $path = public_path('img/imggaleri/' . $galeri->file_foto);
            if (file_exists($path)) {
                unlink($path);
            }

            // 🔥 ambil file baru
            $file = is_array($request->file('foto')) ? $request->file('foto')[0] : $request->file('foto');

            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/imggaleri'), $namaFile);

            $data['file_foto'] = $namaFile;
        }

        // update 1 foto
        $galeri->update($data);

        // 🔥 sinkron semua album
        Galeri::where('album', $albumLama)->update([
            'album' => $request->album,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Galeri berhasil diperbarui!');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // 🔥 hapus file fisik
        $path = public_path('img/imggaleri/' . $galeri->file_foto);
        if (file_exists($path)) {
            unlink($path);
        }

        // 🔥 hapus DB
        $galeri->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }
}