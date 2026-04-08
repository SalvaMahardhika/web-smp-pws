<?php

namespace App\Http\Controllers;

use App\Models\Ektrakurikuler;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'namaeskul' => 'required|max:150',
            'pembina'   => 'required|max:100',
            'deskripsi' => 'required',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Ektrakurikuler::simpanEskul($request);
        return back()->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaeskul' => 'required|max:150',
            'pembina'   => 'required|max:100',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $eskul = Ektrakurikuler::findOrFail($id);
        $eskul->updateEskul($request);
        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $eskul = Ektrakurikuler::findOrFail($id);
        $eskul->hapusEskul();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}