<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    if (isset($_GET['id_data']))
    {
        mysqli_query($koneksi, "DELETE from tb_peminjam WHERE id_data='$_GET[id_data]'");
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_peminjam.php'>";
    }
?>