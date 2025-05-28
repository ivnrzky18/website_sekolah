<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'mata_pelajaran',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
    ];
}
