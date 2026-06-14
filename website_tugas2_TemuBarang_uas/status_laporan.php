<?php
session_start();

$data_hilang = isset($_SESSION['lapor_hilang']) ? $_SESSION['lapor_hilang'] : null;
$data_temuan = isset($_SESSION['lapor_temuan']) ? $_SESSION['lapor_temuan'] : null;
$status_cocok = false;

if ($data_hilang != null && $data_temuan != null) {
    // Bandingkan isi keduanya
    if (strtolower($data_hilang['nama']) == strtolower($data_temuan['nama']) && 
        strtolower($data_hilang['warna']) == strtolower($data_temuan['warna']) && 
        strtolower($data_hilang['lokasi']) == strtolower($data_temuan['lokasi'])) {
        
        $status_cocok = true; // Jika ketiganya sama persis, status jadi COCOK!
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Laporan</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body style="display: flex; justify-content: center; padding-top: 50px;">
    
    <a href="beranda_user.html" class="back-link">← Kembali ke Dashboard</a>
    <div class="form-box" style="width: 400px; text-align: center; background: rgba(255,255,255,0.9); padding: 20px; border-radius: 15px;">
        <h2 style="color: #d81b60;">Status Laporan Saya 🔎</h2>
        
        <div style="text-align: left; margin: 20px 0; font-family: 'Poppins', sans-serif;">
            <p><strong>Nama:</strong> <?php echo $data_hilang ? $data_hilang['nama'] : '-'; ?></p>
            <p><strong>Warna:</strong> <?php echo $data_hilang ? $data_hilang['warna'] : '-'; ?></p>
            <p><strong>Lokasi:</strong> <?php echo $data_hilang ? $data_hilang['lokasi'] : '-'; ?></p>
        </div>

        <?php if ($status_cocok == true): ?>
            <div style="background-color: #ff69b4; color: white; padding: 15px; border-radius: 20px; font-weight: bold;">
                ✨ Kemungkinan Cocok
                <br><br>
                <a href="klaim.html" style="background: white; color: #ff69b4; padding: 5px 15px; border-radius: 10px; text-decoration: none;">Ajukan Klaim 🕵️‍♀️</a>
            </div>
        <?php else: ?>
            <div style="background-color: #e0e0e0; color: #666; padding: 15px; border-radius: 20px; font-weight: bold;">
                Belum ada yang cocok
            </div>
        <?php endif; ?>
    </div>

</body>
</html>