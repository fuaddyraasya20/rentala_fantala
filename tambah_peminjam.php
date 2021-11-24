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
        <title>Tambah Peminjam - Rentala Fantala</title>
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

        <div class="peminjam-wrapper">
            <div class="container">
                <h1>Data Peminjam</h1>
            </div>
        </div>

        <div class="data-wrapper">
            <div class="container">
                <div class="datas">
                    <div class="heads">
                        <h3>Tambah Data Peminjam</h3>
                        <hr>
                    </div>
                    <div class="form">
                        <form action="simpan_peminjam.php" method="post">
                            <table>
                                <?php
                                    $query = mysqli_query($koneksi,"SELECT max(id_data) as terbaru FROM tb_peminjam");
                                    $array = mysqli_fetch_array($query);
                                    $kode = $array['terbaru'];
                                    $kdbaru = $kode;
                                    $kdbaru++;
                                ?>
                                <tr>
                                    <td>ID Data</td>
                                    <td><input type="text" name="id_data" id="id_data" placeholder="No. Plat Kendaraan" value="<?php echo $kdbaru ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td>
                                    <td><input type="text" name="nama" id="nama" placeholder="Nama Peminjam" required autofocus></td>
                                </tr>
                                <tr>
                                    <td>No HP (08...)</td>
                                    <td><input type="number" name="no_hp" id="no_hp" placeholder="No. HP" required></td>
                                </tr>
                                <tr>
                                    <td>Pilih Kartu Identitas</td>
                                    <td>
                                        <select name="identitas" id="identitas">
                                            <option selected disabled value="">-Pilih Kartu Identitas-</option>
                                            <option value="KTP">KTP</option>
                                            <option value="KTM">KTM</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Identitas</td>
                                    <td><input type="number" name="no_identitas" id="no_identias" placeholder="No. Identitas" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-save"><input class="tambah" type="submit" name="simpan" id="simpan" value="SIMPAN">
                                    </td>
                                </tr>
                            </table>
                        </form>
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
        function logout () {
            return confirm ("Anda yakin logout ?");
        }
    </script>
</html>