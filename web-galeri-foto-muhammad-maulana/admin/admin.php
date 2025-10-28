<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['level_user'])) {
    header("Location: ../index.php"); // balik ke login kalau belum login
    exit;
}

// cek apakah user benar-benar admin
if ($_SESSION['level_user'] !== "admin") {
    echo "Akses ditolak! Halaman ini hanya untuk Admin.";
 exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri foto pesona kalimantan utara</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-container{
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .dashboard-container{
        padding: 20px;
    }
    .navbar-brand{
        font-weight: 700;
    }
    .gallery-container{
        padding: 20px 0;
    }
    .gallery-title{
        text-align: center;
        margin: 30px 0;
        color: #343a40;
    }
    .gallery-item{
        margin-bottom: 30px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .gallery-item:hover{
        transform: scale(1.03);
    }
    .gallery-item img{
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover img{
        opacity: 0.9;
    }
    .image-caption{
        padding: 15px;
        background-color: white;
        text-align: center;
    }
    footer{
        background-color: #343a40;
        color: white;
        padding: 20px 0;
        margin-top: 40px;
    }
    
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
              <!-- Menu kiri -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="../logout.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Kontak</a>
        </li>
      </ul>

      <!-- Bagian kanan -->
      <div class="d-flex align-items-center">
        <span class="navbar-text text-white me-3">
          Selamat datang, <?php echo $_SESSION['username']; ?>!
        </span>
        <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
</div>
</nav>
 </div>
</nav>
   </div>
</div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container gallery-container">
            <h1 class="gallery-title">Galeri Pesona Kalimantan Utara</h1>
            <div class="row">

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="mangrove.jpg" 
                        alt="Pemandangan pantai tropis di bali dengan air biru jernih dan pasir putih" class="img-fluid">
                        <div class="image-caption">
                            <h5>Hutan Mangrove(Tarakan)</h5>
                            <p class="text-muted">Kawasan Konservasi Mangrove dan Bekantan (KKMB) merupakan wisata alam yang terletak di dalam Kota Tarakan.<br>
                                 Letaknya di Jalan Gajah Mada, persis bersebelahan dengan kompleks Pasar Gusher, salah satu pusat perekonomian di Tarakan</p>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalMangrove">Lihat</button>
              <button class="btn btn-primary btn-sm" onclick="window.location.href='../proses/tambah_foto.php'">Tambah</button>   
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                        </div>
                    </div>
                </div>
                <!-- Modal Hutan Mangrove -->
<div class="modal fade" id="modalMangrove" tabindex="-1" aria-labelledby="modalMangroveLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMangroveLabel">Hutan Mangrove (Tarakan)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="mangrove.jpg" class="img-fluid mb-3" alt="Hutan Mangrove">
        <p>Kawasan Konservasi Mangrove dan Bekantan (KKMB) merupakan wisata alam yang terletak di dalam Kota Tarakan.<br>
        Letaknya di Jalan Gajah Mada, persis bersebelahan dengan kompleks Pasar Gusher, salah satu pusat perekonomian di Tarakan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="pantaiBinalatung.jpg"
                        alt="Gunung Bromo di Jawa Timur dengan kabut pagi dan sinar matahari keemasan" class="img-fluid">
                        <div class="image-caption">
                            <h5>Pantai Binalatung(Tarakan)</h5>
                            <p class="text-muted">Pantai Binalatung terletak tidak jauh dari pusat kota Tarakan.<br>
                                 Hanya butuh 30 menit perjalanan dengan kendaraan bermotor. Lokasi Pantai Binalatung masih satu garis pantai dengan Pantai Amal.<br>
                                 Pantai Binalatung memiliki ciri khas pasir putih dan dikelilingi oleh pohon pinus di sekitar pantai.<br>
                                 <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalBinalatung">Lihat</button>
              <button class="btn btn-success btn-sm" onclick="tambah()">Tambah</button>
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Modal Pantai Binalatung -->
<div class="modal fade" id="modalBinalatung" tabindex="-1" aria-labelledby="modalBinalatungLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBinalatungLabel">Pantai Binalatung (Tarakan)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="pantaiBinalatung.jpg" class="img-fluid mb-3" alt="Pantai Binalatung">
        <p>Pantai Binalatung terletak tidak jauh dari pusat kota Tarakan. Hanya butuh 30 menit perjalanan dengan kendaraan bermotor.<br>
        Lokasi Pantai Binalatung masih satu garis pantai dengan Pantai Amal. Pantai ini memiliki ciri khas pasir putih dan dikelilingi pohon pinus di sekitar pantai.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
                
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="hutanpinus.jpg" 
                        alt="Candi Borobudur di magelang dengan stupa-stupa bersejarah dan langit cerah" class="img-fluid">
                        <div class="image-caption">
                            <h5>Hutan Tanah Tidung(Tanah Tidung)</h5>
                            <p class="text-muted">Kabupaten Tana Tidung memiliki objek wisata hutan pinus yang menjadi jujukan wisatawan di Kalimantan Utara.<br>
                                 Lokasi Hutan Pinus Tana Tidung cukup strategis, yakni di jalan poros yang menghubungkan Kabupaten Malinau dan Tanjung Selor<br>
                                  di Kabupaten Bulungan, tepatnya di tengah ibu kota Tana Tidung, Tideng Pale.</p>
                                  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTidung">Lihat</button>
              <button class="btn btn-success btn-sm" onclick="tambah()">Tambah</button>
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                </div>
                </div>
                </div>
                <!-- Modal Hutan Tanah Tidung -->
<div class="modal fade" id="modalTidung" tabindex="-1" aria-labelledby="modalTidungLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTidungLabel">Hutan Tanah Tidung (Tanah Tidung)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="hutanpinus.jpg" class="img-fluid mb-3" alt="Hutan Tanah Tidung">
        <p>Kabupaten Tana Tidung memiliki objek wisata hutan pinus yang menjadi jujukan wisatawan di Kalimantan Utara.<br>
        Lokasinya strategis di jalan poros penghubung Kabupaten Malinau dan Tanjung Selor di Kabupaten Bulungan, tepat di pusat ibu kota Tana Tidung, Tideng Pale.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="airterjunsemolon.jpg" 
                        alt="Danau Toba di Sumatera Utara dengan perahu tradisional dan perbukitan hijau" class="img-fluid">
                        <div class="image-caption">
                            <h5>Air Terjun Semolon(Malinau)</h5>
                            <p class="text-muted">Air Terjun Semolon berada di Kabupaten Malinau, tepatnya di Desa Paking Kecamatan Mentarang. Jaraknya sekitar 44 km<br>
                                 dari Kota Malinau dan dapat diakses dengan kendaraan bermotor, dengan waktu tempuh sekitar 1,5 jam hingga 2 jam.</p>
                                 <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSemolon">Lihat</button>
              <button class="btn btn-success btn-sm" onclick="tambah()">Tambah</button>
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                        </div>
                    </div>
                </div>
                <!-- Modal Air Terjun Semolon -->
<div class="modal fade" id="modalSemolon" tabindex="-1" aria-labelledby="modalSemolonLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSemolonLabel">Air Terjun Semolon (Malinau)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="airterjunsemolon.jpg" class="img-fluid mb-3" alt="Air Terjun Semolon">
        <p>Air Terjun Semolon berada di Kabupaten Malinau, tepatnya di Desa Paking Kecamatan Mentarang. Jaraknya sekitar 44 km dari Kota Malinau dan dapat ditempuh sekitar 1,5 - 2 jam dengan kendaraan bermotor.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="pantaiamal.jpg" 
                        alt="Pantai Amal" class="img-fluid">
                        <div class="image-caption">
                            <h5>Pantai Amal(Tarakan)</h5>
                            <p class="text-muted">Pantai Amal merupakan wisata pantai ikonik di Tarakan. Pantai ini memiliki luas wilayah 12,5 km persegi,<br>
                                 membentang di sepanjang pesisir timur Pulau Tarakan. Dikutip dari situs Indonesia Kaya, dulunya pantai ini menjadi tempat istirahat dan makan bagi para nelayan suku Tidung. <br>
                                Aktivitas itu disebut 'tarak ngakan' dalam bahasa lokal, sehingga kemudian pulau itu dinamakan Tarakan.</p>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAmal">Lihat</button>
              <button class="btn btn-success btn-sm" onclick="tambah()">Tambah</button>
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                        </div>
                    </div>
                </div>
                <!-- Modal Pantai Amal -->
<div class="modal fade" id="modalAmal" tabindex="-1" aria-labelledby="modalAmalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAmalLabel">Pantai Amal (Tarakan)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="pantaiamal.jpg" class="img-fluid mb-3" alt="Pantai Amal">
        <p>Pantai Amal merupakan pantai ikonik di Tarakan dengan luas 12,5 km persegi di pesisir timur Pulau Tarakan.<br>
        Dulunya pantai ini menjadi tempat istirahat para nelayan suku Tidung. Aktivitas itu disebut 'tarak ngakan', sehingga pulau itu dinamakan Tarakan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


                <div class="col-md-4 col-sm-6 col-12">
                    <div class="gallery-item">
                        <img src="taneolen.jpg" 
                        alt="Pura Lempuyang di Bali dengan gerbang megah dan latar belakang Gunung Agung" class="img-fluid">
                        <div class="image-caption">
                            <h5>Tane Olen(Malinau)</h5>
                            <p class="text-muted">Tane Olen merupakan objek wisata alam yang terletak di Malinau yang cocok untuk aktivitas trekking.<br>
                                 Pengunjung dapat menyusuri hutan dan sungai dengan perahu yang tersedia.<br>
                                 Wisata ini pas untuk detikers yang ingin menikmati suasana alam pedalaman Kalimantan.</p>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTaneOlen">Lihat</button>
              <button class="btn btn-success btn-sm" onclick="tambah()">Tambah</button>
              <button class="btn btn-warning btn-sm text-white" onclick="edit('Mentarang')">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="hapus('Mentarang')">Hapus</button>
                        </div>
                    </div>
                </div>
                <!-- Modal Tane Olen -->
<div class="modal fade" id="modalTaneOlen" tabindex="-1" aria-labelledby="modalTaneOlenLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTaneOlenLabel">Tane Olen (Malinau)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img src="taneolen.jpg" class="img-fluid mb-3" alt="Tane Olen">
        <p>Tane Olen merupakan objek wisata alam di Malinau yang cocok untuk trekking.<br>
        Pengunjung dapat menyusuri hutan dan sungai dengan perahu yang tersedia, cocok untuk menikmati suasana alam pedalaman Kalimantan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
        <footer>
            <div class="container text-center">
                <p> 2025 Muhammad Maulana. All Rights Reserved.</p>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </div>
        </footer>
   </body>
</html>
                        