<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler; // ✅ FIX
use Illuminate\Http\Request;

class EskulController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|max:30',
            'id_guru'    => 'required',
            'deskripsi'  => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Ekstrakurikuler::simpanEskul($request);

        return back()->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_eskul' => 'required|max:30',
            'id_guru'    => 'required',
            'deskripsi'  => 'required',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $eskul = Ekstrakurikuler::findOrFail($id);
        $eskul->updateEskul($request);

        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $eskul = Ekstrakurikuler::findOrFail($id);
        $eskul->hapusEskul();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}