<?php
session_start();

// Cek apakah ada klaim masuk, kalau tidak ada lemparkan ke dashboard
if(!isset($_SESSION['pemilik_klaim'])) {
    header("Location: beranda_user.php");
    exit();
}

// Mengambil data dari ingatan sistem
$nama_barang = isset($_SESSION['temuan_nama']) ? $_SESSION['temuan_nama'] : 'Barang Tidak Diketahui';
$warna_barang = isset($_SESSION['temuan_warna']) ? $_SESSION['temuan_warna'] : '';
$ciri_khusus = isset($_SESSION['ciri_khusus_klaim']) ? $_SESSION['ciri_khusus_klaim'] : 'Tidak ada catatan.';
$nim_pemilik = $_SESSION['pemilik_klaim'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Klaim | TemuBarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("bc_barbie_detective.png"); 
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed; 
            margin: 0; 
            min-height: 100vh;
        }
        .glass-box { 
            background: rgba(255, 255, 255, 0.15); 
            backdrop-filter: blur(10px); 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            border-radius: 20px; 
            color: white;
        }
        .ciri-box {
            background: rgba(255, 255, 255, 0.8);
            color: #c2185b;
            border-radius: 10px;
            font-weight: 500;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 position-relative">

    <nav class="navbar navbar-dark bg-transparent position-absolute w-100 top-0 pt-3" style="z-index: 1050;">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">TemuBarang</a>
            <a href="beranda_user.php" class="btn btn-outline-light rounded-pill px-3 py-1 fw-medium" style="backdrop-filter: blur(4px);">← Kembali</a>
        </div>
    </nav>

    <main class="container d-flex justify-content-center align-items-center flex-grow-1" style="padding-top: 80px;">
        <div class="glass-box p-4 p-md-5 shadow-lg col-11 col-sm-8 col-md-6 col-lg-5 text-center">
            <h2 class="mb-3 fw-bold">Verifikasi Klaim 🚨</h2>
            
            <p class="mb-2">Seseorang dengan ID/NIM <strong><?= htmlspecialchars($nim_pemilik) ?></strong> mengaku sebagai pemilik barang yang kamu temukan:</p>
            <h5 class="fw-bold text-warning mb-4"><?= htmlspecialchars(ucwords($nama_barang)) ?> (<?= htmlspecialchars(ucwords($warna_barang)) ?>)</h5>

            <p class="mb-1" style="font-size: 0.9rem;">Dia menyebutkan ciri rahasia barang ini:</p>
            
            <div class="ciri-box p-3 mb-4 shadow-sm text-start">
                " <?= nl2br(htmlspecialchars($ciri_khusus)) ?> "
            </div>

            <p class="mb-4 fw-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Apakah ciri-ciri tersebut sesuai dengan barangmu?</p>

            <div class="d-grid gap-3">
                <button onclick="terimaKlaim()" class="btn btn-success rounded-pill py-3 fw-bold shadow-sm">✅ Sesuai</button>
                <button onclick="tolakKlaim()" class="btn btn-danger rounded-pill py-2 fw-bold shadow-sm">❌ Tidak Sesuai</button>
            </div>
        </div>
    </main>

    <script>
        function terimaKlaim() {
            let idPemilik = "<?= htmlspecialchars($nim_pemilik) ?>";
            let emailPemilik = idPemilik + "@student.ac.id";

            Swal.fire({
                icon: 'success',
                title: 'Kasus Terpecahkan! 🎉',
                html: 'Kerja bagus, Detektif! Silakan hubungi pemilik barang via email:<br><br><b style="font-size:1.2rem; color:#e91e63;">' + emailPemilik + '</b>',
                confirmButtonColor: '#e91e63',
                background: 'rgba(255, 255, 255, 0.9)'
            }).then(() => {
                window.location.href = 'beranda_user.php?action=reset';
            });
        }

        function tolakKlaim() {
            Swal.fire({
                icon: 'error',
                title: 'Klaim Ditolak',
                text: 'Ciri-ciri tidak cocok. Data klaim ini akan dihapus dari sistem.',
                confirmButtonColor: '#e91e63',
                background: 'rgba(255, 255, 255, 0.9)'
            }).then(() => {
                window.location.href = 'beranda_user.php?action=reset';
            });
        }
    </script>
</body>
</html>