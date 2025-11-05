<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();

        // Ambil 4 siswa dengan total poin pelanggaran tertinggi
        $topPelanggaran = DB::table('data_pelanggaran_siswa')
            ->join('jenis_pelanggaran', 'data_pelanggaran_siswa.id_pelanggaran', '=', 'jenis_pelanggaran.id')
            ->select(
                'data_pelanggaran_siswa.nama_siswa',
                DB::raw('SUM(jenis_pelanggaran.poin) as total_poin')
            )
            ->groupBy('data_pelanggaran_siswa.nama_siswa')
            ->orderByDesc('total_poin')
            ->take(4)
            ->get();

        return view('dashboard.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'topPelanggaran'));
    }
}
