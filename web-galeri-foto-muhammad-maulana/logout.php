<?php
session_start();

// hapus semua session
session_unset();
session_destroy();

// kembali ke halaman login utama
header("Location : index.php");
exit;
?>