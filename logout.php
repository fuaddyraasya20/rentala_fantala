<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama']);

session_destroy();
echo "<script>alert('Anda telah berhasil Logout!');document.location='index.php'</script>";
?>