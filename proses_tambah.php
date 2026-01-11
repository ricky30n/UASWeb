<?php
// Perhatikan: include '../koneksi.php' (karena file ini ada di dalam folder pages)

$kode     = $_POST['kode_barang'];
$nama     = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$harga    = $_POST['harga'];
$stok     = $_POST['stok'];

$query = "INSERT INTO barang (kode_barang, nama_barang, kategori, harga, stok) VALUES ('$kode', '$nama', '$kategori', '$harga', '$stok')";
$result = mysqli_query($koneksi, $query);

if(!$result){
    die("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    // ✅ PERBAIKAN DI SINI:
    // Arahkan ke "home", bukan "index.php"
    echo "<script>alert('Data berhasil ditambahkan!');window.location='home';</script>";
}
?>