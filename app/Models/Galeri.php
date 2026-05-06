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

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;

    private static $basePath = 'img/imggaleri/';

    public static function createAlbum($request)
    {
        $last = self::orderBy('id_media', 'desc')->first();

        if ($last && preg_match('/\d+/', $last->album, $match)) {
            $next = (int) $match[0] + 1;
        } else {
            $next = 1;
        }

        $albumName = 'album' . $next;
        $folderPath = public_path(self::$basePath . $albumName);

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true, true);
        }

        foreach ($request->file('foto') as $file) {
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $namaFile);
        }

        return self::create([
            'judul' => $request->judul,
            'album' => $albumName,
            'keterangan' => $request->keterangan
        ]);
    }

    public static function getGaleri()
    {
        $data = [];

        foreach (self::all() as $album) {
            $folderPath = public_path(self::$basePath . $album->album);

            if (!File::exists($folderPath)) {
                continue;
            }

            $images = [];

            foreach (File::files($folderPath) as $file) {
                $images[] = $album->album . '/' . $file->getFilename();
            }

            $data[$album->album] = [
                'id' => $album->id_media,
                'judul' => $album->judul,
                'keterangan' => $album->keterangan,
                'fotos' => $images
            ];
        }

        return $data;
    }

    public function updateAlbum($request)
    {
        return $this->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);
    }

    public function deleteAlbum()
    {
        $folderPath = public_path(self::$basePath . $this->album);

        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        return $this->delete();
    }
}