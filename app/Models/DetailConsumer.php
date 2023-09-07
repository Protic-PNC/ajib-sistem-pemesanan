<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailConsumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'branch_name',
        'branch_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
