<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Ivan Ganteng - Sistem Informasi Sekolah</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100%;
            background-color: #1a1f36;
            padding-top: 20px;
            color: #ffffff;
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
            transition: background 0.3s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        .card-custom {
            background-color: #fff;
            border: none;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
<h4><i class="bi bi-mortarboard-fill me-2 text-white"></i> <span class="text-white">Ivnrzky</span></h4>

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
            <i class="bi bi-calendar-week-fill me-2"></i> Jadwal Pelajaran
        </a>
        <a href="/nilai/pilih-kelas" class="{{ request()->is('nilai*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-data-fill me-2"></i> Input Nilai Siswa
        </a>
        <a href="/lihat-nilai/pilih-kelas" class="{{ request()->is('lihat-nilai/pilih-kelas') ? 'active' : '' }}"><i class="bi bi-card-list me-2"></i> Lihat Nilai
        </a>
        <a href="/pengumuman" class="{{ request()->is('pengumuman*') ? 'active' : '' }}"><i class="bi bi-megaphone-fill"></i> Pengumuman
        </a>
        </a>
        <a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}"><i class="bi bi-chat-dots"></i> Kontak Admin
        </a>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2025 Copyright: M. Ivan Rizky
 
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
