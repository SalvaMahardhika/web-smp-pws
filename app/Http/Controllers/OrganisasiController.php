<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function index() {
        $data = Organisasi::first();
        return view('strukturorg', compact('data'));
    }

    public function update(Request $request) {
        Organisasi::updateStruktur($request);
        return back()->with('success', 'Struktur berhasil diperbarui');
    }

    public function destroy() {
        Organisasi::hapusStruktur();
        return back()->with('success', 'Struktur berhasil dihapus');
    }
}