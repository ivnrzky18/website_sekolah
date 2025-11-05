<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            width: 240px;
            height: 100%;
            background-color: #1a1f36;
            color: #fff;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            font-size: 1.2rem;
        }

        .sidebar a {
            display: block;
            color: #cfd2dc;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 15px;
            transition: background 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 5px;
        }

        /* Dropdown submenu */
        .submenu a {
            padding-left: 40px;
            font-size: 14px;
        }

        /* Navbar atas */
        .topbar {
            background-color: #2ecc71;
            padding: 12px 25px;
            color: #fff;
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .topbar h5 {
            margin: 0;
            font-weight: 600;
        }

        /* Konten utama */
        .main-content {
            margin-left: 240px;
            padding: 100px 30px 30px;
        }

        .card-custom {
            border-radius: 12px;
            border: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }

        .card-custom:hover {
            transform: translateY(-4px);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="bi bi-mortarboard-fill me-2 text-white"></i> SekolahKU</h4>

        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        <a href="/siswa" class="{{ request()->is('siswa*') ? 'active' : '' }}">
            <i class="bi bi-people-fill me-2"></i> Siswa
        </a>

        <a href="/guru" class="{{ request()->is('guru*') ? 'active' : '' }}">
            <i class="bi bi-person-vcard-fill me-2"></i> Guru
        </a>

        <a href="/jadwal-pelajaran" class="{{ request()->is('jadwal-pelajaran*') ? 'active' : '' }}">
            <i class="bi bi-calendar-week-fill me-2"></i> Jadwal
        </a>

        <a href="/nilai/pilih-kelas" class="{{ request()->is('nilai*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-data-fill me-2"></i> Nilai
        </a>

        <a href="/lihat-nilai/pilih-kelas" class="{{ request()->is('lihat-nilai/pilih-kelas') ? 'active' : '' }}">
            <i class="bi bi-card-list me-2"></i> Lihat Nilai
        </a>

        <!-- Dropdown Pelanggaran -->
        <a data-bs-toggle="collapse" href="#menuPelanggaran" role="button" 
           aria-expanded="{{ request()->is('pelanggaran*') || request()->is('data-pelanggaran*') ? 'true' : 'false' }}"
           aria-controls="menuPelanggaran"
           class="d-flex justify-content-between align-items-center {{ request()->is('pelanggaran*') || request()->is('data-pelanggaran*') ? 'active' : '' }}">
            <span><i class="bi bi-exclamation-triangle-fill me-2"></i> Pelanggaran Siswa</span>
            <i class="bi bi-chevron-down small"></i>
        </a>

        <div class="collapse {{ request()->is('pelanggaran*') || request()->is('data-pelanggaran*') ? 'show' : '' }}" id="menuPelanggaran">
            <div class="submenu">
                <a href="{{ route('pelanggaran.index') }}" class="{{ request()->is('pelanggaran*') ? 'active' : '' }}">
                    <i class="bi bi-list-ul me-2"></i> Kategori Pelanggaran
                </a>
                <a href="{{ route('data-pelanggaran.index') }}" class="{{ request()->is('data-pelanggaran') ? 'active' : '' }}">
                    <i class="bi bi-person-exclamation me-2"></i> Data Pelanggaran
                </a>
                <a href="{{ route('data-pelanggaran.poin') }}" class="{{ request()->is('data-pelanggaran/poin') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-line-fill me-2"></i> Daftar Poin Siswa
                </a>
            </div>
        </div>

        <a href="/pengumuman" class="{{ request()->is('pengumuman*') ? 'active' : '' }}">
            <i class="bi bi-megaphone-fill me-2"></i> Pengumuman
        </a>

        <a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}">
            <i class="bi bi-chat-dots-fill me-2"></i> Kontak
        </a>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <h5><i class="bi bi-person-circle me-2"></i> Halo, Admin IVAN</h5>
        <div>
            <i class="bi bi-calendar-event me-2"></i> {{ date('d M Y') }}
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
