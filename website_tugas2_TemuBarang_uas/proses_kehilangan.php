<?php
session_start();

// ambil data dari form kehilangan
$hilang_nama = isset($_POST['namaBarang']) ? strtolower(trim($_POST['namaBarang'])) : '';
$hilang_warna = isset($_POST['warnaBarang']) ? strtolower(trim($_POST['warnaBarang'])) : '';

// ambil data temuan dari session 
$temuan_nama = isset($_SESSION['temuan_nama']) ? strtolower(trim($_SESSION['temuan_nama'])) : '';
$temuan_warna = isset($_SESSION['temuan_warna']) ? strtolower(trim($_SESSION['temuan_warna'])) : '';

// logika Pencocokan (Hanya cek NAMA dan WARNA agar anti error)
$is_match = false;
if ($temuan_nama !== '' && $hilang_nama === $temuan_nama && $hilang_warna === $temuan_warna) {
    $is_match = true;
}

echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Laporan | TemuBarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: \'Poppins\', sans-serif; 
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("bc_barbie_detective.png");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }
        .card-bersih {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-transparent pt-4">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: \'Pacifico\', cursive; font-size: 1.5rem;">TemuBarang</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-6">
                <div class="card card-bersih p-4 p-md-5 text-center shadow-lg">';

if ($is_match) {
    echo '          <h2 class="fw-bold mb-3">Pencarian Cocok! 🔎</h2>
                    <p class="mb-4">Sistem mendeteksi ada barang temuan yang mirip dengan laporan kehilanganmu ("' . htmlspecialchars($hilang_nama) . ' ' . htmlspecialchars($hilang_warna) . '").</p>
                    <div class="d-grid gap-3">
                        <a href="klaim.html" class="btn btn-success rounded-pill py-3 fw-bold shadow-sm">Ajukan Klaim 📝</a>
                        <a href="beranda_user.php" class="btn btn-danger rounded-pill py-2 fw-bold shadow-sm">Kembali ke Dashboard</a>
                    </div>';
} else {
    echo '          <h2 class="fw-bold mb-3">Belum Ditemukan 🕵️‍♀️</h2>
                    <p class="mb-4">Maaf, saat ini belum ada barang temuan yang cocok dengan ("' . htmlspecialchars($hilang_nama) . ' ' . htmlspecialchars($hilang_warna) . '"). Laporanmu sudah dicatat, silakan cek kembali nanti!</p>
                    <div class="d-grid">
                        <a href="beranda_user.php" class="btn btn-danger rounded-pill py-3 fw-bold shadow-sm">Kembali ke Dashboard</a>
                    </div>';
}

echo '          </div>
            </div>
        </div>
    </div>
</body>
</html>';
?>