<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    if (isset($_GET['no_plat']))
    {
        mysqli_query($koneksi, "DELETE from tb_kendaraan WHERE no_plat='$_GET[no_plat]'");
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_kendaraan.php'>";
    }
?>