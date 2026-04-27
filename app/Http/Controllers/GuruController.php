<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        return view('dataguru', [
            'guru' => Guru::getAllData()
        ]);
    }

    public function store(Request $request)
    {
        Guru::storeData($request);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        Guru::updateData($id, $request);
        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Guru::deleteData($id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}