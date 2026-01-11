<?php
// Tidak perlu include koneksi lagi (sudah dibawa index.php)

if (isset($_GET['id'])) {
    $id = ($_GET['id']);

    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
        // Ganti index.php jadi ../home
        echo "<script>alert('Data tidak ditemukan');window.location='../home';</script>";
    }
} else {
    // Ganti index.php jadi ../home
    echo "<script>alert('Masukkan data id.');window.location='../home';</script>";
}         
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data-barang/style.css">
</head>
<body>

    <div class="container">
        <h2>Edit Data Barang</h2>
        
        <form action="/data-barang/proses_edit" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label>Kode Barang</label>
            <input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required>

            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>

            <label>Kategori</label>
            <input type="text" name="kategori" value="<?php echo $data['kategori']; ?>">

            <label>Harga</label>
            <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required>

            <label>Stok</label>
            <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required>

            <button type="submit">Simpan Perubahan</button>
            
            <a href="../home" class="btn-batal" style="text-decoration:none;">Batal</a>
        </form>
    </div>

</body>
</html>