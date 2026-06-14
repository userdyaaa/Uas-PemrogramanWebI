<?php
$status = isset($_POST['status']) ? $_POST['status'] : '';

if ($status == 'sukses') {
    $judul = "Verifikasi Berhasil! ✨";
    $pesan = "Terima kasih! Bukti kepemilikan cocok. Silakan hubungi pemilik barang melalui kontak di bawah untuk mengatur lokasi serah terima.";
    $btn_class = "btn-success";
    $kontak_html = '
        <div class="mb-4">
            <a href="mailto:pemilik@mhs.ulm.ac.id" class="btn btn-outline-light rounded-pill py-2 px-3 fw-bold shadow-sm mb-2 w-100" style="z-index: 10000; position: relative;">📧 Email: pemilik@mhs.ulm.ac.id</a>
            <a href="#" class="btn btn-outline-light rounded-pill py-2 px-3 fw-bold shadow-sm w-100" style="z-index: 10000; position: relative;">📱 WhatsApp: 0812-XXXX-XXXX</a>
        </div>';
} else {
    $judul = "Klaim Ditolak ❌";
    $pesan = "Ciri khusus tidak cocok dengan fisik barang asli. Barang tetap aman disimpan di dalam sistem.";
    $btn_class = "btn-danger";
    $kontak_html = ''; 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Verifikasi | TemuBarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
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
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-11 col-md-8 col-lg-5">
            <div class="card card-bersih p-4 p-md-5 text-center shadow-lg">
                <h2 class="fw-bold mb-4"><?php echo $judul; ?></h2>
                <p class="mb-4"><?php echo $pesan; ?></p>
                
                <?php echo $kontak_html; ?>
                
                <div class="d-grid">
                    <a href="beranda_user.php" class="btn <?php echo $btn_class; ?> rounded-pill py-3 fw-bold shadow-sm" style="z-index: 10000; position: relative;">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>