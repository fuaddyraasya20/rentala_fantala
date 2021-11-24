<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    $sql = mysqli_query($koneksi,"select * from tb_peminjam where id_data='$_GET[id_data]'");
    $hasil = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data Peminjam - Rentala Fantala</title>
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
                        <h3>Edit Data Peminjam</h3>
                        <hr>
                    </div>
                    <div class="form">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td>ID Data</td>
                                    <td>
                                        <input type="text" name="id_data" id="id_data" placeholder="id data" maxlength="10" value="<?php echo $hasil['id_data'] ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td>
                                    <td>
                                        <input type="text" name="nama" id="nama" placeholder="Nama Peminjam" value="<?php echo $hasil['nama_p'] ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. HP (0...)</td>
                                    <td>
                                        <input type="number" name="no_hp" id="no_hp" placeholder="No. HP Peminjam" value="<?php echo $hasil['no_hp'] ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Identitas</td>
                                    <td>
                                        <select name="identitas" id="identitas" required>
                                            <option disabled selected value="">-Pilih Jenis Identitas-</option>
                                            <option value="KTP">KTP</option>
                                            <option value="KTM">KTM</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Identias</td>
                                    <td>
                                        <input type="number" name="no_identitas" id="no_identitas" placeholder="No. Identitas Peminjam" value="<?php echo $hasil['no_identitas'] ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <i class="fa fa-save"><input class="tambah" type="submit" name="ubah" id="ubah" value="SIMPAN PERUBAHAN">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <div class="container">
            <div class="copyright">
                <p>Copyright &copy; 2021. Deka Fantala Agusta - 17101152610312</p>
            </div>
        </div>
    </footer>
    

    <script>
        function logout () {
            return confirm ("Anda yakin logout ?");
        }
    </script>
</html>

<?php
  if(isset($_POST['ubah']))
	{
        $id_data = $_POST['id_data'];
		$nama = $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$identitas = $_POST['identitas'];
		$no_identitas = $_POST['no_identitas'];
        
        $sql = mysqli_query ($koneksi,"UPDATE tb_peminjam set nama = '$nama', no_hp = '$no_hp', identitas = '$identitas', no_identitas = '$no_identitas' where id_data='$id_data'");
		if($sql)
		{
			echo "<script>alert('Data berhasil diubah.')</script>";
			echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_peminjam.php'>";
		}
		else
		{
			echo "<script>alert('Gagal mengubah data!')</script>";
			echo "<META HTTP-EQUIV='Refresh' Content='0; url=edit_peminjam.php?id_data=$hasil[id_data]'>";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_peminjam.php'>";
	}
?>