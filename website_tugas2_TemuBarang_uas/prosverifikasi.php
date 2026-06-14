<?php
if(isset($_POST['status']) && isset($_POST['ciri'])) {
    
    $status = $_POST['status'];
    $ciri = htmlspecialchars($_POST['ciri']);
    
    if($status == "Sesuai") {
        echo "<b>Verifikasi Berhasil! ✨</b><br>Bukti kepemilikan (\"" . $ciri . "\") cocok. Barang dapat diserahkan kepada pengklaim.";
    } 
    else if ($status == "Tidak Sesuai") {
        echo "<b>Klaim Ditolak! ❌</b><br>Ciri khusus (\"" . $ciri . "\") tidak cocok dengan barang asli. Barang tetap ditahan.";
    }

} else {
    echo "Data verifikasi tidak lengkap.";
}
?>