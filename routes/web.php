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




Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::get('/admin/kontak', [KontakController::class, 'adminIndex'])->name('kontak.admin.index');


// Absensi Siswa
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/pilih-tanggal', [AbsensiController::class, 'lihatFormTanggal'])->name('absensi.pilih-tanggal');
Route::get('/absensi/lihat', [AbsensiController::class, 'lihatAbsensi'])->name('absensi.lihat');





// Siswa Routes
Route::get('/siswa', [SiswaController::class, 'pilihKelas'])->name('siswa.pilih-kelas');

// CRUD berdasarkan kelas
Route::get('/siswa/{kelas}', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/{kelas}/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{kelas}/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{kelas}/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{kelas}/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');




// Lihat Nilai
Route::get('/lihat-nilai', [LihatNilaiController::class, 'index'])->name('lihat-nilai.index');
Route::get('/lihat-nilai/pilih-kelas', [LihatNilaiController::class, 'pilihKelas'])->name('lihat-nilai.pilih-kelas');
Route::get('/lihat-nilai/{kelas}', [LihatNilaiController::class, 'index'])->name('lihat-nilai.index');
Route::get('/lihat-nilai/{kelas}/cetak', [LihatNilaiController::class, 'cetak'])->name('lihat-nilai.cetak');
Route::get('/nilai/{kelas}/{id}/edit', [LihatNilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/{kelas}/{id}', [LihatNilaiController::class, 'update'])->name('nilai.update');
Route::delete('/nilai/{kelas}/{id}', [App\Http\Controllers\NilaiController::class, 'destroy'])->name('nilai.destroy');





// Guru
Route::resource('guru', GuruController::class);


// Jadwal Pelajaran
Route::get('/jadwal-pelajaran/{kelas?}', [JadwalPelajaranController::class, 'index'])->name('jadwal-pelajaran.index');
Route::get('/jadwal-pelajaran/{kelas?}/create', [JadwalPelajaranController::class, 'create'])->name('jadwal-pelajaran.create');
Route::post('/jadwal-pelajaran', [JadwalPelajaranController::class, 'store'])->name('jadwal-pelajaran.store');
Route::get('/jadwal-pelajaran/{id}/edit', [JadwalPelajaranController::class, 'edit'])->name('jadwal-pelajaran.edit');
Route::put('/jadwal-pelajaran/{id}', [JadwalPelajaranController::class, 'update'])->name('jadwal-pelajaran.update');
Route::delete('/jadwal-pelajaran/{id}', [JadwalPelajaranController::class, 'destroy'])->name('jadwal-pelajaran.destroy');

// Pengumuman
Route::resource('pengumuman', PengumumanController::class);


Route::prefix('nilai')->group(function () {
    // Pilih Kelas
    Route::get('/pilih-kelas', [NilaiController::class, 'pilihKelas'])->name('nilai.pilih-kelas');

    // Daftar siswa di kelas
    Route::get('/{kelas}', [NilaiController::class, 'index'])->name('nilai.index');

    // Lihat Nilai Siswa
    Route::get('nilai/lihat', [NilaiController::class, 'lihatNilai'])->name('nilai.lihat');

    // Input nilai
    Route::get('/{kelas}/siswa/{id}/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/store', [NilaiController::class, 'store'])->name('nilai.store');
});


