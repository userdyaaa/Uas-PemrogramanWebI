<?php
session_start();

$nim_input = isset($_POST['nim_nip']) ? trim($_POST['nim_nip']) : '';
$pass_input = isset($_POST['password']) ? trim($_POST['password']) : '';
$html_bg = '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Memproses...</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><style>body { font-family: "Poppins", sans-serif; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("bc_barbie_detective.png"); background-size: cover; background-position: center; background-attachment: fixed; margin: 0; min-height: 100vh; }</style></head><body>';
$html_end = '</body></html>';

// Cek NIM terdaftar
if (isset($_SESSION['database_akun']) && array_key_exists($nim_input, $_SESSION['database_akun'])) {
    // Cek apakah passwordnya cocok
    if ($_SESSION['database_akun'][$nim_input] === $pass_input) {
        
        // login sukses
        $_SESSION['user_aktif'] = $nim_input;
        header("Location: beranda_user.php");
        exit();

    } else {
        // pw salah
        echo $html_bg;
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'Password yang kamu masukkan salah.',
                    confirmButtonColor: '#e91e63',
                    background: 'rgba(255, 255, 255, 0.9)',
                    backdrop: 'rgba(0,0,0,0.6)'
                }).then(() => {
                    window.location.href='log_in.html';
                });
              </script>";
        echo $html_end;
        exit();
    }
} else {
    // NIM belum daftar
    echo $html_bg;
    echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Akun Tidak Ditemukan!',
                text: 'Kamu harus mendaftar terlebih dahulu sebelum masuk.',
                confirmButtonColor: '#e91e63',
                background: 'rgba(255, 255, 255, 0.9)',
                backdrop: 'rgba(0,0,0,0.6)'
            }).then(() => {
                window.location.href='log_in.html';
            });
          </script>";
    echo $html_end;
    exit();
}
?>