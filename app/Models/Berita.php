<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'id_user',
        'judul',
        'isi',
        'gambar',
        'tanggal',
        'status'
    ];

    // =========================
    // SIMPAN
    // =========================
    public static function simpanBerita($request)
    {
        $namaGambar = self::handleUpload($request->file('gambar'));

        return self::create([
            'id_user' => session('id_user'),
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $namaGambar,
            'status'  => $request->status ?? 1 // 🔥 FIX: default ON
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function updateBerita($request)
    {
        if ($request->hasFile('gambar')) {
            $this->hapusGambar();
            $this->gambar = self::handleUpload($request->file('gambar'));
        }

        return $this->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar'  => $this->gambar,
            'status'  => $request->status ?? $this->status // 🔥 FIX
        ]);
    }

    // =========================
    // DELETE
    // =========================
    public function hapusBerita()
    {
        $this->hapusGambar();
        return $this->delete();
    }

    // =========================
    // UPLOAD
    // =========================
    private static function handleUpload($file)
    {
        $namaGambar = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/berita'), $namaGambar);
        return $namaGambar;
    }

    private function hapusGambar()
    {
        $path = public_path('img/berita/' . $this->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}