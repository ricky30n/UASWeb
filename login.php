<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data-barang/style.css">
    
    <style>
        /* CSS Tambahan khusus untuk pesan Alert */
        .alert { padding: 12px; margin-bottom: 20px; border-radius: 8px; text-align: center; font-size: 14px; font-weight: 500;}
        .alert-danger { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
        .alert-warning { background-color: #ffedd5; color: #c2410c; border: 1px solid #fed7aa; }
        .alert-success { background-color: #d1fae5; color: #047857; border: 1px solid #a7f3d0; }
        
        /* Ubah warna tombol login jadi Biru biar beda sama tombol tambah */
        .btn-login { 
            background-color: #3b82f6 !important; 
            width: 100%; 
            font-size: 16px;
            padding: 12px;
        }
        .btn-login:hover { background-color: #2563eb !important; }
    </style>
</head>
<body>

    <div class="login-wrapper">
        
        <h2 style="text-align:center; margin-bottom:10px; color:#1e293b;">Welcome Back! 👋</h2>
        <p style="text-align:center; color:#64748b; margin-bottom:30px; font-size:14px;">
            Silakan login untuk masuk ke aplikasi
        </p>

        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-danger'>Login Gagal! Username atau Password salah.</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='alert alert-warning'>Akses ditolak! Silakan login terlebih dahulu.</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
            }
        }
        ?>

        <form action="cek_login" method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username..." required autofocus>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password..." required>

            <button type="submit" class="btn-login">Masuk Sekarang</button>
        </form>
        
        <div style="text-align:center; margin-top:20px; font-size:12px; color:#94a3b8;">
            &copy; 2026 Aplikasi Data Barang
        </div>

    </div>

</body>
</html>