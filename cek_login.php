<?php 
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

// Ambil data user yang login
$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);

    // Simpan data username dan LEVEL-nya (admin/user) ke session
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $data['level']; // Ini bagian pentingnya
    $_SESSION['status'] = "login";
    
    header("location:index.php");
}else{
    header("location:login.php?pesan=gagal");
}
?>