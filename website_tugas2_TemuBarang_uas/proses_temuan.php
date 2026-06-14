<?php
session_start();

if(isset($_POST['namaBarang'])) {
    // Menyimpan data barang ke memori
    $_SESSION['temuan_nama'] = htmlspecialchars($_POST['namaBarang']);
    $_SESSION['temuan_warna'] = htmlspecialchars($_POST['warnaBarang']);
    $_SESSION['temuan_lokasi'] = htmlspecialchars($_POST['lokasiTerakhir']);
    $_SESSION['temuan_tanggal'] = htmlspecialchars($_POST['tanggalTemuan']);

    // tombol verifikasi di Dashboard bisa menyala
    $_SESSION['simpanan_ciri_khusus'] = "ada_barang";
    $nama = $_SESSION['temuan_nama'];
    $warna = $_SESSION['temuan_warna'];
    $lokasi = $_SESSION['temuan_lokasi'];
    $tanggal = $_SESSION['temuan_tanggal'];



    echo '<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Temuan Sukses | TemuBarang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            body { font-family: \'Poppins\', sans-serif; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("bc_barbie_detective.png"); background-size: cover; background-position: center; background-attachment: fixed; margin: 0; min-height: 100vh;}
            .glass-box { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 20px; }
            .detail-box { background: rgba(255, 255, 255, 0.2); border-radius: 10px; }
            .btn-custom { background-color: #c2185b; color: white; border: 2px solid white; transition: 0.3s; }
            .btn-custom:hover { background-color: #ad1457; color: white; transform: scale(1.02); }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100 position-relative">
        <main class="container d-flex justify-content-center align-items-center flex-grow-1" style="padding-top: 40px;">
            <div class="glass-box p-4 p-md-5 shadow-lg col-11 col-sm-8 col-md-6 col-lg-5 text-center">
                <h2 class="mb-4 text-white fw-bold">Laporan Diterima! 📦</h2>
                
                <p class="text-white mb-4" style="font-size: 0.95rem;">Data barang temuan berhasil masuk ke sistem!</p>

                <div class="detail-box p-3 mb-4 text-white text-start shadow-sm" style="font-size: 0.9rem; line-height: 1.6;">
                    <strong>Barang:</strong> ' . $nama . ' (' . $warna . ')<br>
                    <strong>Lokasi:</strong> ' . $lokasi . '<br>
                    <strong>Tanggal:</strong> ' . $tanggal . '
                </div>

                <div class="d-grid">
                    <a href="beranda_user.php" class="btn btn-custom rounded-pill py-3 fw-bold shadow-sm w-100">Kembali ke Dashboard</a>
                </div>
            </div>
        </main>
    </body>
    </html>';
} else {
    header("Location: index.html");
    exit();
}
?>