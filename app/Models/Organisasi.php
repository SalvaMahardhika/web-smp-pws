<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Organisasi extends Model
{
    protected $table = 'organisasis';
    protected $fillable = ['foto'];

    // Update atau Create Struktur
    public static function updateStruktur($request)
    {
        $request->validate(['foto' => 'required|image|mimes:jpg,jpeg,png|max:2048']);

        $organisasi = self::first() ?? new self();

        if ($request->hasFile('foto')) {
            if ($organisasi->foto) {
                $oldPath = public_path('img/org/' . $organisasi->foto);
                if (File::exists($oldPath)) { File::delete($oldPath); }
            }

            $file = $request->file('foto');
            $nama_file = 'struktur_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/org'), $nama_file);

            $organisasi->foto = $nama_file;
            $organisasi->save();
            return true;
        }
        return false;
    }

    // Hapus Struktur
    public static function hapusStruktur()
    {
        $organisasi = self::first();
        if ($organisasi) {
            $path = public_path('img/org/' . $organisasi->foto);
            if (File::exists($path)) { File::delete($path); }
            return $organisasi->delete();
        }
        return false;
    }
}