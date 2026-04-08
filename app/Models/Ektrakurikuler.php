<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Ektrakurikuler extends Model
{
    protected $table = 'ektrakurikuler';
    protected $primaryKey = 'id_ektrakurikuler';
    protected $fillable = ['id_user', 'namaeskul', 'pembina', 'deskripsi', 'gambar'];

    public static function simpanEskul($request)
    {
        $namaGambar = self::handleUpload($request->file('gambar'));
        return self::create([
            'id_user'   => session('id_user'), // Menggunakan ID dari session login kamu
            'namaeskul' => $request->namaeskul,
            'pembina'   => $request->pembina,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $namaGambar,
        ]);
    }

    public function updateEskul($request)
    {
        if ($request->hasFile('gambar')) {
            $this->hapusGambar();
            $this->gambar = self::handleUpload($request->file('gambar'));
        }
        return $this->update([
            'namaeskul' => $request->namaeskul,
            'pembina'   => $request->pembina,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $this->gambar
        ]);
    }

    public function hapusEskul()
    {
        $this->hapusGambar();
        return $this->delete();
    }

    private static function handleUpload($file)
    {
        $namaGambar = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/eskul'), $namaGambar);
        return $namaGambar;
    }

    private function hapusGambar()
    {
        $path = public_path('img/eskul/' . $this->gambar);
        if (File::exists($path)) { File::delete($path); }
    }
}