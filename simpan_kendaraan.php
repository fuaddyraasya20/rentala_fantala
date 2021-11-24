<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    if (isset($_POST['simpan']))
    {
        
        $no_plat = $_POST['no_plat'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $merk = $_POST['merk'];
        $tahun = $_POST['tahun'];
        $harga_sewa = $_POST['harga_sewa'];

        $sql = mysqli_query($koneksi,"INSERT INTO tb_kendaraan VALUES ('$no_plat','$jenis_kendaraan','$merk','$tahun','$harga_sewa')");

        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_kendaraan.php'>";
        }
        else {
            echo "<script>alert('Data Gagal Disimpan!')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=tambah_kendaraan.php'>";
        }
    }
?>