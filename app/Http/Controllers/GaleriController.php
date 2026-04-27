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
        $galeris = Galeri::getGaleri();
        return view('galeri', compact('galeris'));
    }

    // =========================
    // STORE (AUTO ALBUM + MULTI FOTO)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        Galeri::createAlbum($request);

        return back()->with('success', 'Album berhasil dibuat!');
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        $galeri->updateAlbum($request);

        return back()->with('success', 'Berhasil update!');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->deleteAlbum();

        return back()->with('success', 'Album dihapus!');
    }
}