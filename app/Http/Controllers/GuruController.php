<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nip' => 'required|numeric|unique:gurus,nip',
        'nama' => 'required|string|max:255',
        'mata_pelajaran' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'alamat' => 'nullable|string'
    ]);

    Guru::create($request->all());

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan.');
}


    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip,' . $guru->id,
            'nama' => 'required',
            'mata_pelajaran' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}
