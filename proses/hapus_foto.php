<?php
include '../koneksi.php'; // karena file ini ada di dalam folder admin
if (isset($_GET['id'])) {
// Ambil ID dan pastikan angka
$id = intval ($_GET['id']);
//Ambil data foto berdasarkan ID
$query = mysqli_query($conn, "SELECT lokasi_file FROM foto WHERE id_foto = $id");
$data = mysqli_fetch_assoc($query);
if ($data) {
$file_path = "../img/" . $data['lokasi_file']; // lokasi file gambar
// Hapus file jika ada
if (file_exists($file_path)) {
unlink($file_path);
}
// Hapus data dari database
$delete = mysqli_query($conn, "DELETE FROM foto WHERE id_foto = $id");
      if ($delete) {
      echo "<script>
	      alert('Foto berhasil dihapus!');
	      window.location='../admin/d-admin.php';
           </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data dari database.');
            window.location='../admin/d-admin.php';
            </script>";
} 
} else {
    echo "<script>
            alert('Foto tidak ditemukan di database.');
            window.location='../admin/d-admin.php';
	    </script>";
}
} else {
// jika tidak ada parameter id di URL
header("Location: ../admin/d-admin.php");
exit;
}
?>
