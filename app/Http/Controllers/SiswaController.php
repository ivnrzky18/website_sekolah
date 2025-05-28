<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function pilihKelas()
    {
        return view('siswa.kelas');
    }

    public function index($kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->get();
        return view('siswa.index', compact('siswas', 'kelas'));
    }

    public function create($kelas)
    {
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect()->route('siswa.index', $request->kelas)->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($kelas, $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $kelas, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('siswa.index', $kelas)->with('success', 'Siswa berhasil diperbarui');
    }


    public function destroy($kelas, $id)
    {
        Siswa::destroy($id);
        return redirect()->route('siswa.index', $kelas)->with('success', 'Siswa berhasil dihapus');
    }
}
