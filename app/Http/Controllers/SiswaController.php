<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function index()
    {
        $data = SiswaModel::getAllGrouped();

        return view('datasiswa', $data);
    }

    public function store(Request $request)
    {
        $result = SiswaModel::storeData($request);

        if (!$result['status']) {
            return back()->with('error', $result['message']);
        }

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $result = SiswaModel::updateJumlah($id, $request);

        if (!$result['status']) {
            return back()->with('error', $result['message']);
        }

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SiswaModel::deleteData($id);

        return back()->with('success', 'Data berhasil dihapus');
    }
}