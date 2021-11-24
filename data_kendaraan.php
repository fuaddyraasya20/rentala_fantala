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
    <title>Data Kendaraan - Rentala Fantala</title>
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

    <div class="car-wrapper">
        <div class="container">
            <h1>Data Kendaraan</h1>
        </div>
    </div>

    <div class="data-wrapper">
        <div class="container">
            <div class="tambah">
                <a href="tambah_kendaraan.php"><i class="fa fa-file"></i> Tambah Data</a>
            </div>
            <div class="datas">
                <div class="heads">
                    <h3>Mobil</h3>
                    <hr>
                </div>
                <div class="data">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">No Plat Kendaraan</th>
                                <th rowspan="2">Merk</th>
                                <th rowspan="2">Tahun</th>
                                <th rowspan="2">Harga Sewa per Hari</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_kendaraan WHERE jenis_kendaraan = "Mobil"');
                            while ($hasil = mysqli_fetch_array($sql)) {
                                $no++;
                                $harga_sewa = number_format($hasil['harga_sewa'])
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['merk'] ?></td>
                                    <td><?php echo $hasil['tahun'] ?></td>
                                    <td><?php echo "Rp. {$harga_sewa}" ?></td>
                                    <td><?php echo "<a href='edit_kendaraan.php?no_plat=$hasil[no_plat]'><i class='fa fa-edit'></i></a>" ?></td>
                                    <td><?php echo "<a href='hapus_kendaraan.php?no_plat=$hasil[no_plat]' onclick='return hapus()'><i class='fa fa-trash'></i></a>" ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>No Plat Kendaraan</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>Harga Sewa per Hari</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="datas">
                <div class="heads">
                    <h3>Motor</h3>
                    <hr>
                </div>
                <div class="data">
                <table>
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">No Plat Kendaraan</th>
                                <th rowspan="2">Merk</th>
                                <th rowspan="2">Tahun</th>
                                <th rowspan="2">Harga Sewa per Hari</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_kendaraan WHERE jenis_kendaraan = "Motor"');
                            while ($hasil = mysqli_fetch_array($sql)) {
                                $no++;
                                $harga_sewa = number_format($hasil['harga_sewa'])
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['merk'] ?></td>
                                    <td><?php echo $hasil['tahun'] ?></td>
                                    <td><?php echo "Rp. {$harga_sewa}" ?></td>
                                    <td><?php echo "<a href='edit_kendaraan.php?no_plat=$hasil[no_plat]'><i class='fa fa-edit'></a>" ?></td>
                                    <td><?php echo "<a href='hapus_kendaraan.php?no_plat=$hasil[no_plat]' onclick='return hapus()'><i class='fa fa-trash'></a>" ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>No Plat Kendaraan</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>Harga Sewa per Hari</th>
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