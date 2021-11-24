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
        <title>Home - Rentala Fantala</title>
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

        <div class="top-wrapper">
            <div class="container">
                <h1>Rentala Fantala</h1>
                <p>Merupakan sebuah sistem informasi penyewaan kendaraan</p>
                
            </div>
        </div>

        <div class="about-wrapper">
            <div class="container">
                <div class="heading">
                    <h2>Tentang Saya</h2>
                    <p>Hello, Saya Deka Fantala Agusta</p>
                </div>
                <div class="about">
                    <img src="Deka.jpeg" alt="">
                    <h3>Nama.</h3>
                    <p>Deka Fantala Agusta</p>
                    <hr>
                    <h3>Nomor Buku Pokok Mahasiswa.</h3>
                    <p>17101152610312</p>
                    <hr>
                    <h3>Tempat / Tanggal Lahir.</h3>
                    <p>Kumanis, Kabupaten Sijunjung / 19 Agustus 1998</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63834.32466801928!2d100.83953540806841!3d-0.5336070717133066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ad9473f6ddb4d%3A0x66e3be2558453df1!2sKumanis%2C%20Sumpur%20Kudus%2C%20Kabupaten%20Sijunjung%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1625165262477!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <hr>
                    <h3>Umur.</h3>
                    <?php
                        $dateOfBirth = "19-08-1998";
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    ?>
                    <p>Saat ini berumur <?php echo $diff->format('%y') ?> Tahun</p>
                    <hr>
                    <h3>Agama.</h3>
                    <div class="agama-wrapper">
                        <div class="container">
                            <h1>ISLAM</h1>
                        </div>
                    </div>
                    <hr>
                    <h3>Status</h3>
                    <p>Belum Menikah</p>
                    <hr>
                    <h3>Kewarganegaraan</h3>
                    <div class="kwn-wrapper">
                        <div class="container">
                            <h1>INDONESIA</h1>
                        </div>
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