<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data-barang/style.css">
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { width: 400px; padding: 20px; border: 1px solid #ccc; background: #f9f9f9; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 15px; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    
    <form action="proses_tambah" method="POST">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" placeholder="Contoh: BRG003" required>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang" required>

        <label>Kategori</label>
        <input type="text" name="kategori">

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <button type="submit">Simpan Data</button>
        
        <a href="home" style="margin-left:10px; text-decoration:none;">Batal</a>
    </form>
</body>
</html>