<?php
session_start();
include 'koneksi.php'; // koneksi pakai $conn

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password']; // sesuaikan dengan hash di database

$sql   = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$query = $conn->query($sql);

if ($query->num_rows > 0) {
    $data = $query->fetch_assoc();

    $_SESSION['username']   = $data['username'];
    $_SESSION['level_user'] = $data['level_user'];

    // cek role
    if ($data['level_user'] == "admin" || $data['level_user'] == "maulana") {
        header("Location: admin/admin.php"); // admin & maulana masuk ke halaman admin
        exit;
    } elseif ($data['level_user'] == "operator") {
        header("Location: operator/operator.php");
        exit;
    } elseif ($data['level_user'] == "guest") {
        header("Location: guest/guest.php");
        exit;
    } else {
        echo "Role tidak dikenali.";
    }
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}
?>