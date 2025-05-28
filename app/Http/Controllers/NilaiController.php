<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Pilih Kelas
    public function pilihKelas()
    {
        return view('nilai.pilih_kelas');
    }

    // Menampilkan siswa berdasarkan kelas
    public function index($kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->get();
        return view('nilai.index', compact('siswas', 'kelas'));
    }

    // Form untuk input nilai
    public function create($kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->get();
        return view('nilai.create', compact('kelas', 'siswas'));
    }

    // Simpan nilai siswa
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'kelas' => 'required|string',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel' => $request->mapel,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('nilai.index', $request->kelas)->with('success', 'Nilai berhasil disimpan');
    }

    // Form edit nilai
    public function edit($kelas, $id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswas = Siswa::where('kelas', $kelas)->get();
        return view('nilai.edit', compact('nilai', 'siswas', 'kelas'));
    }

    // Update nilai
    public function update(Request $request, $kelas, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mapel' => $request->mapel,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('lihat-nilai.index', $kelas)->with('success', 'Nilai berhasil diperbarui');
    }

    // Hapus nilai
    public function destroy($kelas, $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('lihat-nilai.index', $kelas)->with('success', 'Data nilai berhasil dihapus.');
    }
}
