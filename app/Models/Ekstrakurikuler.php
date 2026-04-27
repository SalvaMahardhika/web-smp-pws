<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Models\Guru; // ✅ TAMBAH

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_eskul';

    protected $fillable = [
        'id_user',
        'id_guru',
        'nama_eskul',
        'deskripsi',
        'gambar'
    ];

    // =========================
    // RELASI
    // =========================
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // =========================
    // CREATE
    // =========================
    public static function simpanEskul($request)
    {
        $namaGambar = self::handleUpload($request->file('gambar'));

        return self::create([
            'id_user'   => session('id_user'),
            'id_guru'   => $request->id_guru,
            'nama_eskul'=> $request->nama_eskul,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $namaGambar,
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function updateEskul($request)
    {
        if ($request->hasFile('gambar')) {
            $this->hapusGambar();
            $this->gambar = self::handleUpload($request->file('gambar'));
        }

        return $this->update([
            'id_guru'    => $request->id_guru,
            'nama_eskul' => $request->nama_eskul,
            'deskripsi'  => $request->deskripsi,
            'gambar'     => $this->gambar
        ]);
    }

    // =========================
    // DELETE
    // =========================
    public function hapusEskul()
    {
        $this->hapusGambar();
        return $this->delete();
    }

    // =========================
    // UPLOAD
    // =========================
    private static function handleUpload($file)
    {
        if (!$file) return null;

        $namaGambar = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/eskul'), $namaGambar);

        return $namaGambar;
    }

    private function hapusGambar()
    {
        $path = public_path('img/eskul/' . $this->gambar);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}