<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('pengumuman.index', compact('pengumuman'));
    }

    /**
     * Menampilkan form untuk membuat pengumuman baru.
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Simpan pengumuman baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit pengumuman.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update pengumuman.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui');
    }

    /**
     * Hapus pengumuman.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
