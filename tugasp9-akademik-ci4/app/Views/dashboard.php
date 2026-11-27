<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

    <style>
        .navbar {
            background: #173b65;
            padding: 16px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .navbar h2 {
            color: white;
            font-size: 20px;
        }

        .navbar-menu {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .navbar-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .navbar-menu a:hover {
            color: #ffd166;
        }

        .dashboard-title {
            margin-bottom: 8px;
        }

        .dashboard-description {
            color: #777;
            margin-bottom: 25px;
        }

        .dashboard a {
            text-decoration: none;
            color: inherit;
        }

        .dashboard .card {
            cursor: pointer;
            transition: 0.2s;
        }

        .dashboard .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
            margin-top: 12px;
            color: #173b65;
        }

        .card small {
            display: block;
            color: #777;
            margin-top: 8px;
        }

        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-menu {
                gap: 13px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- NAVBAR -->
        <nav class="navbar">
            <h2>Sistem Akademik</h2>

            <div class="navbar-menu">
                <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                <a href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
                <a href="<?= base_url('dosen'); ?>">Dosen</a>
                <a href="<?= base_url('matakuliah'); ?>">Mata Kuliah</a>
                <a href="<?= base_url('krs'); ?>">KRS</a>
            </div>
        </nav>

        <!-- JUDUL DASHBOARD -->
        <h1 class="dashboard-title">Dashboard Akademik</h1>

        <p class="dashboard-description">
            Selamat datang di Sistem Informasi Akademik.
            Berikut ringkasan data akademik yang tersedia.
        </p>

        <!-- RINGKASAN DATA -->
        <div class="dashboard">

            <!-- MAHASISWA -->
            <a href="<?= base_url('mahasiswa'); ?>">
                <div class="card">
                    <h3>Mahasiswa</h3>
                    <p><?= $jumlahMahasiswa; ?></p>
                    <small>Total data mahasiswa</small>
                </div>
            </a>

            <!-- DOSEN -->
            <a href="<?= base_url('dosen'); ?>">
                <div class="card">
                    <h3>Dosen</h3>
                    <p><?= $jumlahDosen; ?></p>
                    <small>Total data dosen</small>
                </div>
            </a>

            <!-- MATA KULIAH -->
            <a href="<?= base_url('matakuliah'); ?>">
                <div class="card">
                    <h3>Mata Kuliah</h3>
                    <p><?= $jumlahMK; ?></p>
                    <small>Total mata kuliah</small>
                </div>
            </a>

            <!-- KRS -->
            <a href="<?= base_url('krs'); ?>">
                <div class="card">
                    <h3>KRS</h3>
                    <p><?= $jumlahKRS; ?></p>
                    <small>Total data KRS</small>
                </div>
            </a>

        </div>

    </div>

</body>
</html>
