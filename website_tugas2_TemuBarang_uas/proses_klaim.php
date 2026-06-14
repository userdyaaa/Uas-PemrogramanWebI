<?php
session_start();

// 1. simpan ciri khusus yang diketik dari klaim.html
if(isset($_POST['ciri_khusus'])) {
    $_SESSION['ciri_khusus_klaim'] = htmlspecialchars(trim($_POST['ciri_khusus']));
}

// 2. catat ID user yang saat ini login sebagai si Pemilik Barang yang sedang mengklaim
if(isset($_SESSION['user_aktif'])) {
    $_SESSION['pemilik_klaim'] = $_SESSION['user_aktif'];
}

// 3. Muncul notifikasi sukses lalu dan kembali ke dashboard
echo '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Memproses Klaim...</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><style>body { font-family: "Poppins", sans-serif; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("bc_barbie_detective.png"); background-size: cover; background-position: center; background-attachment: fixed; margin: 0; min-height: 100vh; }</style></head><body>';
echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Klaim Berhasil Diajukan! 🕵️‍♀️',
            text: 'Bukti ciri khususmu sudah dikirim. Silakan tunggu penemu memverifikasinya.',
            confirmButtonColor: '#e91e63',
            background: '#ffffff',
            backdrop: 'rgba(0,0,0,0.6)'
        }).then(() => {
            window.location.href='beranda_user.php';
        });
      </script></body></html>";
exit();
?>