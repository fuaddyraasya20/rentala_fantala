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
        <title>Tambah Kendaraan - Rentala Fantala</title>
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
                <div class="datas">
                    <div class="heads">
                        <h3>Tambah Data Kendaraan</h3>
                        <hr>
                    </div>
                    <div class="form">
                        <form action="simpan_kendaraan.php" method="post">
                            <table>
                                <tr>
                                    <td>No. Plat Kendaraan</td>
                                    <td><input type="text" name="no_plat" id="no_plat" placeholder="No. Plat Kendaraan" maxlength="10" required autofocus ></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kendaraan</td>
                                    <td>
                                        <select name="jenis_kendaraan" id="jenis_kendaraan" required>
                                            <option disabled selected>-Pilih Jenis Kendaraan-</option>
                                            <option value="Mobil">Mobil</option>
                                            <option value="Motor">Motor</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Merk Kendaraan</td>
                                    <td><input type="text" name="merk" id="merk" placeholder="Merk Kendaraan" required></td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td><input type="number" name="tahun" id="tahun" min="2010" max="2021" placeholder="Tahun"></td>
                                </tr>
                                <tr>
                                    <td>Harga Sewa per Hari</td>
                                    <td><input type="number" name="harga_sewa" id="harga_sewa" min="50000" placeholder="Harga Sewa per Hari"></td>
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