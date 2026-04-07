<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // tampil data
    public function index()
    {
        $guru = Guru::getAllData();

        return view('dataguru', compact('guru'));
    }

    // tambah
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required'
        ]);

        Guru::storeData($request);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    // update
    public function update(Request $request, $id)
    {
        Guru::updateData($id, $request);

        return back()->with('success', 'Data berhasil diupdate');
    }

    // delete
    public function destroy($id)
    {
        Guru::deleteData($id);

        return back()->with('success', 'Data berhasil dihapus');
    }
}