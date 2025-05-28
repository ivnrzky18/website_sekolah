<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'kelas'
    ];

    public function nilai()
{
    return $this->hasMany(Nilai::class);
}

    public function absensi()
    {
        return $this->hasmany(Absensi::class);
    }

    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}

