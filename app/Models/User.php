<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //custom primary key
    protected $primaryKey = 'id_user';

    //kalau bukan auto increment default (optional aman)
    public $incrementing = true;

    //tipe primary key
    protected $keyType = 'int';

    /**
     * Mass assignable
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * Hidden data
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Casting
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed', // otomatis bcrypt
        ];
    }
}