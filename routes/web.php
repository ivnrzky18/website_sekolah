<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\LihatNilaiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JenisPelanggaranController;
use App\Http\Controllers\DataPelanggaranSiswaController;

// ============================
// 🏠 HALAMAN AWAL
// ============================
Route::get('/', function () {
    return view('welcome');
});

// ============================
// 📊 DASHBOARD
// ============================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ============================
// 📞 KONTAK
// ============================
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::get('/admin/kontak', [KontakController::class, 'adminIndex'])->name('kontak.admin.index');

// ============================
// 🕒 ABSENSI
// ============================
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/pilih-tanggal', [AbsensiController::class, 'lihatFormTanggal'])->name('absensi.pilih-tanggal');
Route::get('/absensi/lihat', [AbsensiController::class, 'lihatAbsensi'])->name('absensi.lihat');

// ============================
// 🎓 SISWA
// ============================
Route::get('/siswa', [SiswaController::class, 'pilihKelas'])->name('siswa.pilih-kelas');
Route::get('/siswa/{kelas}', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/{kelas}/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{kelas}/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{kelas}/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{kelas}/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// ============================
// 👩‍🏫 GURU
// ============================
Route::resource('guru', GuruController::class);

// ============================
// 📚 JADWAL PELAJARAN
// ============================
Route::get('/jadwal-pelajaran/{kelas?}', [JadwalPelajaranController::class, 'index'])->name('jadwal-pelajaran.index');
Route::get('/jadwal-pelajaran/{kelas?}/create', [JadwalPelajaranController::class, 'create'])->name('jadwal-pelajaran.create');
Route::post('/jadwal-pelajaran', [JadwalPelajaranController::class, 'store'])->name('jadwal-pelajaran.store');
Route::get('/jadwal-pelajaran/{id}/edit', [JadwalPelajaranController::class, 'edit'])->name('jadwal-pelajaran.edit');
Route::put('/jadwal-pelajaran/{id}', [JadwalPelajaranController::class, 'update'])->name('jadwal-pelajaran.update');
Route::delete('/jadwal-pelajaran/{id}', [JadwalPelajaranController::class, 'destroy'])->name('jadwal-pelajaran.destroy');

// ============================
// 📢 PENGUMUMAN
// ============================
Route::resource('pengumuman', PengumumanController::class);

// ============================
// 🧮 NILAI
// ============================
Route::prefix('nilai')->group(function () {
    Route::get('/pilih-kelas', [NilaiController::class, 'pilihKelas'])->name('nilai.pilih-kelas');
    Route::get('/{kelas}', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/{kelas}/siswa/{id}/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/store', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/lihat', [NilaiController::class, 'lihatNilai'])->name('nilai.lihat');
});

// ============================
// 📈 LIHAT NILAI
// ============================
Route::get('/lihat-nilai', [LihatNilaiController::class, 'index'])->name('lihat-nilai.index');
Route::get('/lihat-nilai/pilih-kelas', [LihatNilaiController::class, 'pilihKelas'])->name('lihat-nilai.pilih-kelas');
Route::get('/lihat-nilai/{kelas}', [LihatNilaiController::class, 'index'])->name('lihat-nilai.index');
Route::get('/lihat-nilai/{kelas}/cetak', [LihatNilaiController::class, 'cetak'])->name('lihat-nilai.cetak');
Route::get('/nilai/{kelas}/{id}/edit', [LihatNilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{kelas}/{id}', [LihatNilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{kelas}/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

// ============================
// 🚨 PELANGGARAN
// ============================

// Jenis Pelanggaran
Route::resource('pelanggaran', JenisPelanggaranController::class);

// Data Pelanggaran Siswa
Route::resource('data-pelanggaran', DataPelanggaranSiswaController::class)->except(['show']);

// Daftar Poin Siswa (fitur tambahan)
Route::get('/data-pelanggaran/poin', [DataPelanggaranSiswaController::class, 'daftarPoin'])
    ->name('data-pelanggaran.poin');
