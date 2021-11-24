<?php
    include 'koneksi.php';
    session_start();
    if (empty($_SESSION['username']) or empty($_SESSION['nama'])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
    }

    if (isset($_POST['simpan']))
    {
        
        $id_data = $_POST['id_data'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $identitas = $_POST['identitas'];
        $no_identitas = $_POST['no_identitas'];

        $sql = mysqli_query($koneksi,"INSERT INTO tb_peminjam VALUES ('$id_data','$nama','$no_hp','$identitas','$no_identitas')");

        if ($sql)
        {
            echo "<script>alert('Berhasil Simpan Data')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=data_peminjam.php'>";
        }
        else {
            echo "<script>alert('Data Gagal Disimpan!')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0; url=tambah_peminjam.php'>";
        }
    }
?>