<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|max:200',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Berita::simpanBerita($request);
        return back()->with('success', 'Berita berhasil diterbitkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|max:200',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->updateBerita($request);
        return back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->hapusBerita();
        return back()->with('success', 'Berita berhasil dihapus!');
    }
}