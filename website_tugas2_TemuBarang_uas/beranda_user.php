<?php 
session_start(); 

//buat reset kalau user pilih lapor baru
if (isset($_GET['action']) && $_GET['action'] === 'reset') {
    unset($_SESSION['temuan_nama']);
    unset($_SESSION['temuan_warna']);
    unset($_SESSION['temuan_lokasi']);
    unset($_SESSION['temuan_tanggal']);
    unset($_SESSION['simpanan_ciri_khusus']);
    unset($_SESSION['ciri_khusus_klaim']);
    unset($_SESSION['pemilik_klaim']);
    
    // Kembalikan ke halaman ini lagi dalam kondisi memori bersih
    header("Location: beranda_user.php");
    exit();
}

if(!isset($_SESSION['user_aktif'])) {
    header("Location: log_in.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TemuBarang</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("bc_barbie_detective.png");
            background-size: cover; background-position: center; background-attachment: fixed; margin: 0;
        }
        .card-custom { 
            background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.5); border-radius: 20px; 
        }
        .btn-custom-1 { background-color: #e91e63; color: white; border: 2px solid white; transition: 0.3s; }
        .btn-custom-1:hover { background-color: #c2185b; color: white; transform: scale(1.02); }
        .btn-custom-2 { background-color: #d81b60; color: white; border: 2px solid white; transition: 0.3s; }
        .btn-custom-2:hover { background-color: #ad1457; color: white; transform: scale(1.02); }
        .btn-custom-3 { background-color: rgba(255, 255, 255, 0.2); color: white; border: 2px solid white; transition: 0.3s; }
        
        @keyframes pulse { 
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7); } 
            50% { transform: scale(1.02); box-shadow: 0 0 15px 10px rgba(255, 193, 7, 0); } 
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 193, 7, 0); } 
        }

        .navbar-super-top { z-index: 9999 !important; position: absolute; width: 100%; top: 0; }
        .main-content-safe { position: relative; z-index: 10; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 position-relative">

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent pt-4 navbar-super-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive; text-shadow: 1px 1px 3px rgba(0,0,0,0.8); font-size: 1.5rem;">
                Halo, <?php echo htmlspecialchars($_SESSION['user_aktif']); ?>! 🕵️‍♀️
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNav" style="background-color: rgba(233, 30, 99, 0.8); border: 2px solid white;">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="userNav">
                <ul class="navbar-nav align-items-center mt-2 mt-lg-0 p-3 p-lg-0 rounded-4" style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2);">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold px-3" href="beranda_user.php?action=reset" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8);">📝 Lapor Baru</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm w-100" href="logout.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container d-flex justify-content-center align-items-center flex-grow-1 main-content-safe" style="padding-top: 100px;">
        <div class="row w-100 justify-content-center">
            <div class="col-11 col-md-8 col-lg-5">

                <div class="card card-custom shadow-lg p-3 p-md-4 text-center">
                    <div class="card-body">
                        <h4 class="text-white mb-4" style="font-family: 'Pacifico', cursive; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Misi Kamu Hari Ini</h4>
                        
                        <div class="d-grid gap-3">
                            <a href="kehilangan.html" class="btn btn-custom-1 rounded-pill py-3 fw-bold shadow-sm">Laporkan kehilangan</a>
                            <a href="temuan.html" class="btn btn-custom-2 rounded-pill py-3 fw-bold shadow-sm">Laporkan penemuan</a>
                            
                            <?php if(isset($_SESSION['pemilik_klaim'])): ?>
                                
                                <?php if($_SESSION['user_aktif'] === $_SESSION['pemilik_klaim']): ?>
                                    <button class="btn btn-secondary rounded-pill py-3 fw-bold shadow-sm border border-white" disabled style="opacity: 0.9;">
                                        ⏳ Menunggu Penemu Memverifikasi...
                                    </button>
                                <?php else: ?>
                                    <a href="verifikasi.php" class="btn btn-warning rounded-pill py-3 fw-bold shadow-sm text-dark border border-white border-2" style="animation: pulse 2s infinite;">
                                        🚨 Ada Verifikasi Klaim Masuk!
                                    </a>
                                <?php endif; ?>

                            <?php else: ?>
                                <button class="btn btn-custom-3 rounded-pill py-3 fw-bold shadow-sm" disabled style="opacity: 0.6; cursor: not-allowed;">
                                    Cek Verifikasi Klaim (Kosong)
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>