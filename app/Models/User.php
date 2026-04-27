<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // =========================
    // PRIMARY KEY
    // =========================
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    // =========================
    // FILLABLE
    // =========================
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    // =========================
    // HIDDEN
    // =========================
    protected $hidden = [
        'password',
    ];

    // =========================
    // CASTS
    // =========================
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // =========================
    // DELETE USER + CEK LOGOUT
    // =========================
    public static function deleteUser($id)
    {
        $user = self::findOrFail($id);

        // cek apakah user yg dihapus adalah yg sedang login
        $isCurrentUser = session('id_user') == $user->id_user;

        $user->delete();

        return [
            'logout' => $isCurrentUser
        ];
    }
}