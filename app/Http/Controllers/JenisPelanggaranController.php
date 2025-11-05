<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    public function index()
    {
        $items = JenisPelanggaran::orderBy('kategori')->orderBy('poin','desc')->paginate(15);
        return view('pelanggaran.index', compact('items'));
    }

    public function create()
    {
        return view('pelanggaran.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:0',
            'kategori' => 'required|in:ringan,sedang,berat',
            'keterangan' => 'nullable|string',
        ]);

        JenisPelanggaran::create($data);

        return redirect()->route('pelanggaran.index')->with('success', 'Jenis pelanggaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = JenisPelanggaran::findOrFail($id);
        return view('pelanggaran.show', compact('item'));
    }

    public function edit($id)
    {
        $item = JenisPelanggaran::findOrFail($id);
        return view('pelanggaran.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:0',
            'kategori' => 'required|in:ringan,sedang,berat',
            'keterangan' => 'nullable|string',
        ]);

        $item = JenisPelanggaran::findOrFail($id);
        $item->update($data);

        return redirect()->route('pelanggaran.index')->with('success', 'Jenis pelanggaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = JenisPelanggaran::findOrFail($id);
        $item->delete();

        return redirect()->route('pelanggaran.index')->with('success', 'Jenis pelanggaran berhasil dihapus.');
    }
}
