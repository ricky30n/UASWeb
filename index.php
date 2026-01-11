<?php
session_start();
include 'koneksi.php';

// Ambil URL yang diminta user, jika kosong set ke 'home'
$url = isset($_GET['url']) ? $_GET['url'] : 'home';

// Pecah URL agar bisa menangkap id (contoh: edit/1)
$url = rtrim($url, '/');
$url = explode('/', $url);

$page = $url[0]; // Halaman yang diminta (home, tambah, edit, dll)
$id   = isset($url[1]) ? $url[1] : null; // ID jika ada

// Cek Logika Login di sini (Global)
// Kecuali halaman login dan proses login, user wajib login
if ($page != 'login' && $page != 'cek_login' && !isset($_SESSION['status'])) {
    header("Location: login");
    exit;
}

// ROUTING: Arahkan ke file yang sesuai di folder pages
switch ($page) {
    case 'home':
        include 'pages/home.php';
        break;
    
    case 'login':
        include 'pages/login.php';
        break;
        
    case 'cek_login':
        include 'pages/cek_login.php';
        break;
        
    case 'logout':
        include 'pages/logout.php';
        break;

    case 'tambah':
        include 'pages/tambah.php';
        break;
        
    case 'proses_tambah':
        include 'pages/proses_tambah.php';
        break;

    case 'edit':
        // Kita kirim ID lewat variabel agar bisa ditangkap di edit.php
        $_GET['id'] = $id; 
        include 'pages/edit.php';
        break;

    case 'proses_edit':
        include 'pages/proses_edit.php';
        break;
        
    case 'hapus':
        $_GET['id'] = $id;
        include 'pages/proses_hapus.php';
        break;

    default:
        echo "<h1>404 Halaman Tidak Ditemukan</h1>";
        break;
}
?>