<?php
namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
public function index($kelas = null)
{
    if ($kelas) {
        // Ambil semua jadwal berdasarkan kelas yang dipilih
        $jadwals = JadwalPelajaran::where('kelas', $kelas)->get();
        
        // Kelompokkan berdasarkan hari
        $grouped = $jadwals->groupBy('hari');
    } else {
        // Jika kelas belum dipilih, data kosong
        $grouped = [];
    }

    // Kirim data ke view
    return view('jadwal-pelajaran.index', compact('kelas', 'grouped'));
}



    public function create($kelas)
    {
        return view('jadwal-pelajaran.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required',
            'nama_guru' => 'required',
            'kelas' => 'required',
        ]);

        JadwalPelajaran::create($request->all());
        return redirect()->route('jadwal-pelajaran.index', $request->kelas)->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);
        return view('jadwal-pelajaran.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal-pelajaran.index', $jadwal->kelas)->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);
        $kelas = $jadwal->kelas;
        $jadwal->delete();
        return redirect()->route('jadwal-pelajaran.index', $kelas)->with('success', 'Jadwal berhasil dihapus');
    }
}
