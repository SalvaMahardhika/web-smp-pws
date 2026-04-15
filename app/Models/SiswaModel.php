<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'kelas',
        'jumlah_siswa',
        'jumlah_laki',
        'jumlah_perempuan',
        'id_user'
    ];

    public $timestamps = true;

    //get data
    public static function getAllGrouped()
    {
        return [
            'kelas7' => self::where('kelas', 'like', '7%')->get(),
            'kelas8' => self::where('kelas', 'like', '8%')->get(),
            'kelas9' => self::where('kelas', 'like', '9%')->get(),
        ];
    }

    //add data
    public static function storeData($request)
    {
        // VALIDASI
        if (!$request->kelas || $request->jumlah_laki === null || $request->jumlah_perempuan === null) {
            return [
                'status' => false,
                'message' => 'Semua field wajib diisi'
            ];
        }

        if ($request->jumlah_laki < 0 || $request->jumlah_perempuan < 0) {
            return [
                'status' => false,
                'message' => 'Jumlah tidak boleh negatif'
            ];
        }

        // CEK DUPLIKAT
        if (self::where('kelas', $request->kelas)->exists()) {
            return [
                'status' => false,
                'message' => 'Kelas sudah ada'
            ];
        }

        $laki = $request->jumlah_laki;
        $perempuan = $request->jumlah_perempuan;
        $total = $laki + $perempuan;

        self::create([
            'kelas' => $request->kelas,
            'jumlah_laki' => $laki,
            'jumlah_perempuan' => $perempuan,
            'jumlah_siswa' => $total,
            'id_user' => session('id_user')
        ]);

        return ['status' => true];
    }

    //update
    public static function updateJumlah($id, $request)
    {
        if ($request->jumlah_laki === null || $request->jumlah_perempuan === null) {
            return [
                'status' => false,
                'message' => 'Data tidak boleh kosong'
            ];
        }

        if ($request->jumlah_laki < 0 || $request->jumlah_perempuan < 0) {
            return [
                'status' => false,
                'message' => 'Tidak boleh angka negatif'
            ];
        }

        $siswa = self::findOrFail($id);

        $laki = $request->jumlah_laki;
        $perempuan = $request->jumlah_perempuan;

        $siswa->update([
            'jumlah_laki' => $laki,
            'jumlah_perempuan' => $perempuan,
            'jumlah_siswa' => $laki + $perempuan
        ]);

        return ['status' => true];
    }

    //delete
    public static function deleteData($id)
    {
        $siswa = self::findOrFail($id);
        $siswa->delete();

        return ['status' => true];
    }
}