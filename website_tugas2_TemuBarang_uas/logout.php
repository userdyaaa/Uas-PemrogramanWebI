<?php
session_start();
// hanya menghapus tentang siapa yang sedang login. Data barang dibiarkan utuh.
unset($_SESSION['user_aktif']);
header("Location: log_in.html");
exit();
?>