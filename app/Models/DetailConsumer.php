<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailConsumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'alamat',
        'kode_pos',
        'no_hp',
        'foto_rumah'
    ];
}
