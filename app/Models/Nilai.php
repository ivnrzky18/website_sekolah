<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
    'siswa_id',
    'mapel',
    'nilai',
    'semester',
    'tahun_ajaran',
    'kelas',
    ];

    // relasi dengan model siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
