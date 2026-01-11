<?php 
// Mengaktifkan session
session_start();

// Menghapus semua session
session_destroy();

// Mengalihkan halaman kembali ke login
header("location:login.php");
?>