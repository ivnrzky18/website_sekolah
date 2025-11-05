<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggaranSiswa;
use App\Models\JenisPelanggaran;
use Illuminate\Support\Facades\DB;

class DataPelanggaranSiswaController extends Controller
{
    /**
     * Tampilkan daftar pelanggaran siswa (detail per pelanggaran)
     */
    public function index()
    {
        $items = DataPelanggaranSiswa::with('pelanggaran')
            ->orderBy('tanggal', 'desc')
            ->paginate(15);

        $totalPoin = DataPelanggaranSiswa::with('pelanggaran')
            ->get()
            ->groupBy('nama_siswa')
            ->map(fn($group) => $group->sum(fn($item) => $item->pelanggaran->poin));

        return view('data-pelanggaran.index', compact('items', 'totalPoin'));
    }

    /**
     * Form tambah data pelanggaran siswa
     */
    public function create()
    {
        $pelanggaran = JenisPelanggaran::orderBy('kategori')->get();
        return view('data-pelanggaran.create', compact('pelanggaran'));
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'id_pelanggaran' => 'required|exists:jenis_pelanggaran,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        DataPelanggaranSiswa::create($data);

        return redirect()->route('data-pelanggaran.index')
            ->with('success', 'Data pelanggaran siswa berhasil ditambahkan.');
    }

    /**
     * Form edit data pelanggaran siswa
     */
    public function edit($id)
    {
        $item = DataPelanggaranSiswa::findOrFail($id);
        $pelanggaran = JenisPelanggaran::orderBy('kategori')->get();

        return view('data-pelanggaran.edit', compact('item', 'pelanggaran'));
    }

    /**
     * Update data pelanggaran siswa
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'id_pelanggaran' => 'required|exists:jenis_pelanggaran,id',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $item = DataPelanggaranSiswa::findOrFail($id);
        $item->update($data);

        return redirect()->route('data-pelanggaran.index')
            ->with('success', 'Data pelanggaran siswa berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $data = DataPelanggaranSiswa::findOrFail($id);
        $data->delete();

        return redirect()->route('data-pelanggaran.index')
            ->with('success', 'Data pelanggaran siswa berhasil dihapus.');
    }

    /**
     * Daftar total poin siswa + status peringatan
     */
    public function daftarPoin(Request $request)
    {
        $query = DB::table('data_pelanggaran_siswa')
            ->join('jenis_pelanggaran', 'data_pelanggaran_siswa.id_pelanggaran', '=', 'jenis_pelanggaran.id')
            ->select(
                'data_pelanggaran_siswa.nama_siswa',
                DB::raw('SUM(jenis_pelanggaran.poin) as total_poin')
            )
            ->groupBy('data_pelanggaran_siswa.nama_siswa');

        if ($request->has('search') && $request->search != '') {
            $query->where('data_pelanggaran_siswa.nama_siswa', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderByDesc('total_poin')->get();

        return view('data-pelanggaran.daftar_poin', compact('data'));
    }

    /**
     * Detail pelanggaran siswa
     */
    public function show($id)
    {
        $item = DataPelanggaranSiswa::with('pelanggaran')->findOrFail($id);
        return view('data-pelanggaran.show', compact('item'));
    }
}
