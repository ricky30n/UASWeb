<?php

// Ambil data dari form
$id       = $_POST['id'];
$kode     = $_POST['kode_barang'];
$nama     = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$harga    = $_POST['harga'];
$stok     = $_POST['stok'];

// Update data di database
$query = "UPDATE barang SET kode_barang = '$kode', nama_barang = '$nama', kategori = '$kategori', harga = '$harga', stok = '$stok' WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if(!$result){
    die("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
}
?>