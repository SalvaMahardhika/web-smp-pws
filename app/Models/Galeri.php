<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_media';

    protected $fillable = [
        'judul',
        'album',
        'keterangan'
    ];

    public $timestamps = true;

    private static $basePath = 'img/imggaleri/';

    // =========================
    // CREATE ALBUM + UPLOAD
    // =========================
    public static function createAlbum($request)
    {
        $last = self::orderBy('id_media', 'desc')->first();

        if ($last) {
            preg_match('/\d+/', $last->album, $match);
            $next = isset($match[0]) ? (int)$match[0] + 1 : 1;
        } else {
            $next = 1;
        }

        $albumName = 'album' . $next;

        $folderPath = public_path(self::$basePath . $albumName);

        // buat folder
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true, true);
        }

        // upload file
        foreach ($request->file('foto') as $file) {
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $namaFile);
        }

        // simpan DB
        return self::create([
            'judul' => $request->judul,
            'album' => $albumName,
            'keterangan' => $request->keterangan
        ]);
    }

    // =========================
    // GET GALERI (SCAN FOLDER)
    // =========================
    public static function getGaleri()
    {
        $data = [];

        $albums = self::all();

        foreach ($albums as $album) {
            $folderPath = public_path(self::$basePath . $album->album);

            if (File::exists($folderPath)) {
                $files = File::files($folderPath);

                $images = [];
                foreach ($files as $file) {
                    $images[] = $album->album . '/' . $file->getFilename();
                }

                $data[$album->album] = [
                    'id' => $album->id_media,
                    'judul' => $album->judul,
                    'keterangan' => $album->keterangan,
                    'fotos' => $images
                ];
            }
        }

        return $data;
    }

    // =========================
    // DELETE ALBUM
    // =========================
    public function deleteAlbum()
    {
        $folderPath = public_path(self::$basePath . $this->album);

        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        return $this->delete();
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function updateAlbum($request)
    {
        return $this->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);
    }
}