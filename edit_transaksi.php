<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    $sql = mysqli_query($koneksi,"select * from tb_transaksi where id_data='$_GET[id_data]'");
    $hasil = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi</title>
    <script src="jquery.min.js"></script>
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
        <div class="contain">
            <div class="datas">
                <div class="heads">
                    <h3>Edit Data Transaksi</h3>
                    <hr>
                </div>
                <div class="form">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <th style="text-align:center;">Data Transaksi</th>
                                <th style="text-align:center;">Data Peminjam</th>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border:1px solid rgb(190, 190, 190);">
                                        <tr>
                                            <td>ID Data</td>
                                            <td><input type="text" name="id_data" id="id_data" value=<?php echo $hasil['id_data'] ?> readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pinjam</td>
                                            <td><input type="date" name="tgl_pinjam" id="tgl_pinjam" value=<?php echo $hasil['tgl_pinjam'] ?> required></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Kembali</td>
                                            <td><input type="date" name="tgl_kembali" id="tgl_kembali" value=<?php echo $hasil['tgl_kembali'] ?> required></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table style="border:1px solid rgb(190, 190, 190);">
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <select name="nama_p" id="nama_p" onchange="peminjam()" required>
                                                    <option disabled selected value=""><?php echo $hasil['nama_p'] ?></option>
                                                    <?php
                                                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_peminjam");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                        <option data-value[2] = "<?=$data['no_hp']?>" data-value[3] = "<?=$data['identitas']?>" data-value[4] = "<?=$data['no_identitas']?>" value="<?=$data['nama_p']?>"><?=$data['nama_p']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. HP (08...)</td>
                                            <td><input type="number" name="no_hp" id="no_hp" placeholder="No. HP" value="<?php echo $hasil['no_hp'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Identitas</td>
                                            <td><input type="text" name="identitas" id="identitas" placeholder="Identitas" value="<?php echo $hasil['identitas'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>No. Identitas</td>
                                            <td><input type="number" name="no_identitas" id="no_identitas" placeholder="No. Identitas" value="<?php echo $hasil['no_identitas'] ?>" readonly></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align:center;">Data Kendaraan</th>
                                <th style="text-align:center;">Pembayaran</th>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border:1px solid rgb(190, 190, 190);">
                                        <tr>
                                            <td>No. Plat Kendaraan</td>
                                            <td>
                                                <select name="no_plat" id="no_plat" onchange="kendaraan()" required>
                                                    <option disabled selected value=""><?php echo $hasil['no_plat'] ?></option>
                                                    <?php
                                                    $sql = mysqli_query($koneksi,"SELECT * FROM tb_kendaraan");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                        <option data-value[2] = "<?=$data['jenis_kendaraan']?>" data-value[3] = "<?=$data['merk']?>" data-value[4] = "<?=$data['tahun']?>" data-value[5] = "<?=$data['harga_sewa']?>" value="<?=$data['no_plat']?>"><?=$data['no_plat']?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kendaraan</td>
                                            <td><input type="text" name="jenis_kendaraan" id="jenis_kendaraan" placeholder="Jenis Kendaraan" value="<?php echo $hasil['jenis_kendaraan'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Merk Kendaraan</td>
                                            <td><input type="text" name="merk" id="merk" placeholder="Merk Kendaraan" value="<?php echo $hasil['merk'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun</td>
                                            <td><input type="number" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $hasil['tahun'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><input type="number" name="harga_sewa" id="harga_sewa" placeholder="Harga Sewa" value="<?php echo $hasil['harga_sewa'] ?>" readonly></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table style="border:1px solid rgb(190, 190, 190);">
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select name="stat" id="stat" required>
                                                    <option disabled selected value=""><?php echo $hasil['stat'] ?></option>
                                                    <option value="Belum Selesai">Belum Selesai</option>
                                                    <option value="Selesai">Selesai</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-save"><input class="tambah" type="submit" name="ubah" id="ubah" value="SIMPAN PERUBAHAN"></td>
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

    function peminjam() {
        var no_hp = $('#nama_p').find(':selected').data('value[2]');
        $('#no_hp').val(no_hp);
        var identitas = $('#nama_p').find(':selected').data('value[3]');
        $('#identitas').val(identitas);
        var no_identitas = $('#nama_p').find(':selected').data('value[4]');
        $('#no_identitas').val(no_identitas);
    }

    function kendaraan() {
        var jenis_kendaraan = $('#no_plat').find(':selected').data('value[2]');
        $('#jenis_kendaraan').val(jenis_kendaraan);
        var merk = $('#no_plat').find(':selected').data('value[3]');
        $('#merk').val(merk);
        var tahun = $('#no_plat').find(':selected').data('value[4]');
        $('#tahun').val(tahun);
        var harga_sewa = $('#no_plat').find(':selected').data('value[5]');
        $('#harga_sewa').val(harga_sewa);
    }
</script>
</html>

<?php
  if(isset($_POST['ubah']))
	{
        
        $id_data = $_POST['id_data'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $nama_p = $_POST['nama_p'];
        $no_hp = $_POST['no_hp'];
        $identitas = $_POST['identitas'];
        $no_identitas = $_POST['no_identitas'];
        $no_plat = $_POST['no_plat'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $merk = $_POST['merk'];
        $tahun = $_POST['tahun'];
        $harga_sewa = $_POST['harga_sewa'];
        $stat = $_POST['stat'];

        $sql = mysqli_query ($koneksi,"UPDATE tb_transaksi set 
        tgl_pinjam = '$tgl_pinjam',
        tgl_kembali = '$tgl_kembali',
        nama_p = '$nama_p',
        no_hp = '$no_hp',
        identitas = '$identitas',
        no_identitas = '$no_identitas',
        no_plat = '$no_plat',
        jenis_kendaraan = '$jenis_kendaraan',
        merk = '$merk',
        tahun = '$tahun',
        harga_sewa = '$harga_sewa',
        stat = '$stat'
        where id_data='$id_data'");
		if($sql)
		{
			echo "<script>alert('Data berhasil diubah.')</script>";
			echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_transaksi.php'>";
		}
		else
		{
			echo "<script>alert('Gagal mengubah data!')</script>";
			echo "<META HTTP-EQUIV='Refresh' Content='0; url=edit_transaksi.php?id_data=$hasil[id_data]'>";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_transaksi.php'>";
	}
?>