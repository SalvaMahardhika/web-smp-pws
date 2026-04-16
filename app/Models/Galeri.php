<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $primaryKey = 'id';

    protected $fillable = [
        'album',
        'keterangan',
        'file_foto'
    ];

    public $timestamps = true;
}