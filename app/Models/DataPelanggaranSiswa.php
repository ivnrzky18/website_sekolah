<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggaranSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_pelanggaran_siswa';

    protected $fillable = [
        'nama_siswa',
        'id_pelanggaran',
        'tanggal',
        'keterangan',
    ];

    public function pelanggaran()
    {
        return $this->belongsTo(JenisPelanggaran::class, 'id_pelanggaran');
    }
}
