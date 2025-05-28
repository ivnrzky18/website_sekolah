<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Siswa::select('kelas')->distinct()->pluck('kelas');
        return view('absensi.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelas = $request->kelas;
        $tanggal = date('Y-m-d');
        $siswa = Siswa::where('kelas', $kelas)->get();

        return view('absensi.form', compact('siswa', 'kelas', 'tanggal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'kelas' => 'required',
        'tanggal' => 'required|date',
        'kehadiran' => 'required|array',

        ]);

        foreach ($request->kehadiran as $siswa_id => $status) {
            Absensi::updateOrCreate(
            [
                'siswa_id' => $siswa_id,
                'tanggal' => $request->tanggal,
            ],
            [
                'kelas' => $request->kelas,
                'status' => $status,
            ]
            );
        }
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    
    public function lihatFormTanggal(Request $request)
    {
        $kelas = $request->kelas;
        return view('absensi.pilih-tanggal', compact('kelas'));
    }


    public function lihatAbsensi(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'tanggal' => 'required|date',
        ]);

        $data = Absensi::with('siswa')
        ->where('kelas', $request->kelas)
        ->where('tanggal', $request->tanggal)
        ->get();

        return view('absensi.lihat', [
            'data' => $data,
            'kelas' => $request->kelas,
            'tanggal' => $request->tanggal,
        ]);
    }
 
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
