<?php

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data berdasarkan ID
$query = "DELETE FROM barang WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if(!$result){
    die("Gagal menghapus data: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
}
?>