<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    if (isset($_POST['simpan']))
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

        $sql = mysqli_query($koneksi,"INSERT INTO tb_transaksi VALUES 
        ('$id_data',
        '$tgl_pinjam',
        '$tgl_kembali',
        '$nama_p',
        '$no_hp',
        '$identitas',
        '$no_identitas',
        '$no_plat',
        '$jenis_kendaraan',
        '$merk',
        '$tahun',
        '$harga_sewa',
        '$stat')");

        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_transaksi.php'>";
        }
        else {
            echo "<script>alert('Data Gagal Disimpan!')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=tambah_transaksi.php'>";
        }
    }
?>