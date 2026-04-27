<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Organisasi extends Model
{
    protected $table = 'organisasi';
    protected $primaryKey = 'id_organisasi';

    protected $fillable = [
        'foto_organisasi',
        'id_user'
    ];

    public $timestamps = true;

    // =========================
    // UPDATE / CREATE
    // =========================
    public static function updateStruktur($request)
    {
        $request->validate([
            'foto_organisasi' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $organisasi = self::first() ?? new self();

        // 🔥 simpan user yang upload
        if (auth()->check()) {
            $organisasi->id_user = auth()->id();
        }

        if ($request->hasFile('foto_organisasi')) {

            // 🔥 hapus file lama
            if ($organisasi->foto_organisasi) {
                $oldPath = public_path('img/org/' . $organisasi->foto_organisasi);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // 🔥 upload file baru
            $file = $request->file('foto_organisasi');
            $nama_file = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/org'), $nama_file);

            $organisasi->foto_organisasi = $nama_file;
            $organisasi->save();

            return true;
        }

        return false;
    }

    // =========================
    // DELETE
    // =========================
    public static function hapusStruktur()
    {
        $organisasi = self::first();

        if ($organisasi) {

            $path = public_path('img/org/' . $organisasi->foto_organisasi);

            if (File::exists($path)) {
                File::delete($path);
            }

            return $organisasi->delete();
        }

        return false;
    }
}