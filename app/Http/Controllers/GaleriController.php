<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'foto.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        Galeri::createAlbum($request);

        return back()->with('success', 'Album berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        $galeri = Galeri::findOrFail($id);

        $galeri->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Album berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->deleteAlbum();

        return back()->with('success', 'Album dihapus');
    }

    public function tambahFoto(Request $request, $album)
    {
        $request->validate([
            'foto' => 'required|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $folderPath = public_path('img/imggaleri/' . $album);

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true, true);
        }

        foreach ($request->file('foto') as $file) {
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $namaFile);
        }

        return back()->with('success', 'Foto ditambahkan');
    }

    public function deleteFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required'
        ]);

        $path = public_path('img/imggaleri/' . $request->foto);

        if (File::exists($path)) {
            File::delete($path);
        }

        return back()->with('success', 'Foto dihapus');
    }
}