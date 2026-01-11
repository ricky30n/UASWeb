<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data-barang/style.css">
</head>
<body>

    <div class="container">

        <div class="header-container">
            <div>
                <h2 style="margin-bottom: 5px;">Welcome, <?php echo ucfirst($_SESSION['username']); ?>! 👋</h2>
                <p style="color: #64748b; font-size: 14px;">Selamat datang di Dashboard Data Barang.</p>
            </div>
            
            <a href="logout" class="btn-logout">Logout</a>
        </div>
        
        <div class="toolbar">
            
            <div>
                <?php if($_SESSION['level'] == "admin") { ?>
                    <a href="tambah" class="btn-tambah">
                        <span>+</span> Tambah Barang
                    </a>
                <?php } ?>
            </div>

            <form action="home" method="GET" class="search-form">
                <input type="text" name="cari" class="search-input" placeholder="Cari nama atau kode..." value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
                
                <button type="submit" class="btn-cari">Cari</button>
                
                <?php if(isset($_GET['cari'])){ ?>
                    <a href="home" class="btn-reset" title="Reset Pencarian">X</a>
                <?php } ?>
            </form>

        </div>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <?php if($_SESSION['level'] == "admin") { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // --- LOGIKA PHP (Search + Pagination) ---
                
                $batas = 5;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    
                
                // Cek Pencarian
                $where = "";
                $url_pencarian = ""; // Untuk link pagination

                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $where = "WHERE nama_barang LIKE '%$cari%' OR kode_barang LIKE '%$cari%'";
                    $url_pencarian = "&cari=".$cari;
                }

                // Query 1: Hitung Total Data
                $query_jumlah = "SELECT * FROM barang $where";
                $data = mysqli_query($koneksi, $query_jumlah);
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                // Query 2: Ambil Data Tampil
                $query_tampil = "SELECT * FROM barang $where LIMIT $halaman_awal, $batas";
                $data_pegawai = mysqli_query($koneksi, $query_tampil);
                
                $nomor = $halaman_awal + 1;
                
                // Jika Data Kosong
                if($jumlah_data == 0){
                    echo "<tr><td colspan='7' style='text-align:center; padding:30px; color:red; font-weight:bold;'>Data tidak ditemukan!</td></tr>";
                }

                while($row = mysqli_fetch_array($data_pegawai)){
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $row['kode_barang']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    
                    <?php if($_SESSION['level'] == "admin") { ?>
                    <td>
                        <a href="edit/<?php echo $row['id']; ?>" class="btn-edit">Edit</a> |
                        <a href="hapus/<?php echo $row['id']; ?>" class="btn-hapus" style="background:none; color:red; padding:0; font-weight:bold;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav>
            <div class="pagination">
                <?php 
                $previous = $halaman - 1;
                $next = $halaman + 1;
                ?>

                <?php if($halaman > 1){ ?>
                    <a href="home?halaman=<?php echo $previous . $url_pencarian; ?>">Previous</a>
                <?php } ?>

                <?php for($x=1;$x<=$total_halaman;$x++){ ?>
                    <a class="<?php if($x == $halaman){ echo 'active'; } ?>" href="home?halaman=<?php echo $x . $url_pencarian; ?>"><?php echo $x; ?></a>
                <?php } ?>

                <?php if($halaman < $total_halaman){ ?>
                    <a href="home?halaman=<?php echo $next . $url_pencarian; ?>">Next</a>
                <?php } ?>
            </div>
        </nav>

    </div>

</body>
</html>