<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi - Rentala Fantala</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="home.php">Rentala Fantala</a>
            </div>
            <div class="header-right">
                <ul>
                    <li>
                        <a href="home.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="data_kendaraan.php"><i class="fa fa-car"></i> Data Kendaraan</a>
                    </li>
                    <li>
                        <a href="data_peminjam.php"><i class="fa fa-group"></i> Data Peminjam</a>
                    </li>
                    <li>
                        <a href="data_transaksi.php"><i class="fa fa-money"></i> Data Transaksi</a>
                    </li>
                    <li>
                        <a href="logout.php" onclick="return logout()"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="transaksi-wrapper">
        <div class="container">
            <h1>Data Transaksi</h1>
        </div>
    </div>

    <div class="data-wrapper">
        <div class="container">
            <div class="tambah">
                <a href="tambah_transaksi.php"><i class="fa fa-file"></i> Tambah Data</a>
            </div>
            <div class="datas">
                <div class="heads">
                    <h3>Transaksi</h3>
                    <hr>
                </div>
                <div class="data">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">ID Data</th>
                                <th rowspan="2">Tanggal Pinjam</th>
                                <th rowspan="2">Tanggal Kembali</th>
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">No. Identitas</th>
                                <th rowspan="2">No. Plat</th>
                                <th rowspan="2">Jenis Kendaraan</th>
                                <th rowspan="2">Lama Sewa</th>
                                <th rowspan="2">Total Harga</th>
                                <th rowspan="2">Status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_harga = 0;
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_transaksi order by tgl_pinjam asc');
                            while ($hasil = mysqli_fetch_array($sql)) {
                                $hari = mysqli_query($koneksi, 'SELECT datediff(tgl_kembali,tgl_pinjam) as hari from tb_transaksi');
                                $beda = mysqli_fetch_array($hari);
                                $total_harga = (int)$beda * $hasil['harga_sewa'];
                                ?>
                                <tr>
                                    <td><?php echo $hasil['id_data'] ?></td>
                                    <td><?php echo $hasil['tgl_pinjam'] ?></td>
                                    <td><?php echo $hasil['tgl_kembali'] ?></td>
                                    <td><?php echo $hasil['nama_p'] ?></td>
                                    <td><?php echo $hasil['no_identitas'] ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['jenis_kendaraan'] ?></td>
                                    <td><?php echo (int)$beda ?></td>
                                    <td><?php echo "Rp. {$total_harga}" ?></td>
                                    <td><?php echo $hasil['stat'] ?></td>
                                    <td><?php echo "<a href='edit_transaksi.php?id_data=$hasil[id_data]'><i class='fa fa-edit'></i></a>" ?></td>
                                    <td><?php echo "<a href='hapus_transaksi.php?id_data=$hasil[id_data]' onclick='return hapus()'><i class='fa fa-trash'></i></a>" ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID Data</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Nama</th>
                                <th>No. Identitas</th>
                                <th>No. Plat</th>
                                <th>Jenis Kendaraan</th>
                                <th>Lama Sewa</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="copyright">
                <p>Copyright &copy; 2021. Deka Fantala Agusta - 17101152610312</p>
            </div>
        </div>
    </footer>
</body>

<script>
    function hapus () {
        return confirm ("Hapus data ini ?");
    }

    function logout () {
        return confirm ("Anda yakin logout ?");
    }
</script>
</html>