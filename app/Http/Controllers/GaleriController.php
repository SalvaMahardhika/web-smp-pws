<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::getGaleri();
        return view('galeri', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|array',
            'foto.*' => 'image'
        ]);

        Galeri::createAlbum($request);

        return back()->with('success', 'Album berhasil dibuat!');
    }

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

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->deleteAlbum();

        return back()->with('success', 'Album dihapus!');
    }
}