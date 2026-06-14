<?php
session_start();

if (!isset($_SESSION['database_akun'])) {
    $_SESSION['database_akun'] = []; 
}

$id_user = isset($_POST['nim']) ? $_POST['nim'] : (isset($_POST['nip']) ? $_POST['nip'] : '');
$password = isset($_POST['pass']) ? $_POST['pass'] : '';
$html_bg = '<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Mendaftar...</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><style>body { font-family: "Poppins", sans-serif; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("bc_barbie_detective.png"); background-size: cover; background-position: center; background-attachment: fixed; margin: 0; min-height: 100vh; }</style></head><body>';
$html_end = '</body></html>';

if ($id_user != '' && $password != '') {
    $_SESSION['database_akun'][$id_user] = $password;

    echo $html_bg;
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Pendaftaran Berhasil! ✨',
                text: 'Silakan masuk menggunakan NIM/NIP dan Password.',
                confirmButtonColor: '#e91e63',
                background: '#ffffff',
                backdrop: 'rgba(0,0,0,0.6)'
            }).then(() => {
                window.location.href='log_in.html';
            });
          </script>";
    echo $html_end;
} else {
    echo $html_bg;
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Pendaftaran gagal! Pastikan semua data terisi.',
                confirmButtonColor: '#e91e63',
                background: '#ffffff'
            }).then(() => {
                window.history.back();
            });
          </script>";
    echo $html_end;
}
exit();
?>