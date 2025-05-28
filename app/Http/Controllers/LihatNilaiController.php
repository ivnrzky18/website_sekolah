<?php
namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LihatNilaiController extends Controller
{
    public function pilihKelas()
    {
        return view('lihat-nilai.pilih-kelas');
    }

    public function index($kelas)
    {
        $nilais = Nilai::with('siswa')->where('kelas', $kelas)->get();
        return view('lihat-nilai.index', compact('nilais', 'kelas'));
    }

    public function cetak($kelas)
{
    $nilais = Nilai::with('siswa')->where('kelas', $kelas)->get();
    return view('lihat-nilai.cetak', compact('nilais', 'kelas'));
}

/// Tampilkan form edit
public function edit($kelas, $id)
{
    $nilai = Nilai::findOrFail($id);
    $siswas = \App\Models\Siswa::where('kelas', $kelas)->get();

    return view('lihat-nilai.edit', compact('nilai', 'kelas', 'siswas'));
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
    $nilai->update($request->all());

    return redirect()->route('lihat-nilai.index', $kelas)->with('success', 'Nilai berhasil diperbarui');
}



public function destroy($kelas, $id)
{
    $nilai = Nilai::findOrFail($id);
    $nilai->delete();

    return redirect()->route('lihat-nilai.index', $kelas)->with('success', 'Data nilai berhasil dihapus.');
}


}
