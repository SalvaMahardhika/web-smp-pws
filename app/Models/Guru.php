<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nama_guru',
        'mata_pelajaran',
        'id_user'
    ];

    // =========================
    // GET ALL DATA
    // =========================
    public static function getAllData()
    {
        return self::all();
    }

    // =========================
    // STORE DATA
    // =========================
    public static function storeData($request)
    {
        return self::create([
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran' => $request->mata_pelajaran,
            'id_user' => session('id_user')
        ]);
    }

    // =========================
    // UPDATE DATA
    // =========================
    public static function updateData($id, $request)
    {
        $guru = self::findOrFail($id);

        return $guru->update([
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran' => $request->mata_pelajaran
        ]);
    }

    // =========================
    // DELETE DATA
    // =========================
    public static function deleteData($id)
    {
        return self::destroy($id);
    }
}