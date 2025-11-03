<?php
session_start();
include '../koneksi.php'; // karena file ini di dalam folder admin

// Cek apakah user sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['level_user'])) {
    header("Location: ../index.php"); // balik ke login kalau belum login
    exit;
}

// Cek apakah user benar-benar admin
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
    <title>Dashboard Admin | Galeri Foto Pesona Kalimantan Utara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Animasi fadeIn */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Judul utama */
        .gallery-title {
            text-align: center;
            margin: 40px 0;
            color: #1e4a35;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            animation: fadeIn 1s ease-in-out;
        }

        /* Tombol Tambah */
        .btn-tambah {
            display: block;
            margin: 0 auto 30px;
            padding: 10px 25px;
            font-weight: 600;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .btn-tambah:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        }

        /* Kartu galeri */
        .gallery-item {
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover img {
            opacity: 0.9;
        }

        /* Caption */
        .image-caption {
            padding: 15px;
            background-color: white;
            text-align: center;
        }

        .image-caption h5 {
            margin: 5px 0;
            font-weight: 600;
            color: #000;
        }

        .image-caption p {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Tombol warna */
        .btn-warna a, .btn-warna button {
            margin: 0 3px;
            border: none;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .lihat { background-color: #0d6efd; }
        .lihat:hover { background-color: #0056b3; transform: scale(1.1); }

        .edit { background-color: #f0ad4e; }
        .edit:hover { background-color: #ec971f; transform: scale(1.1); }

        .hapus { background-color: #dc3545; }
        .hapus:hover { background-color: #a71d2a; transform: scale(1.1); }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
      </ul>

      <div class="d-flex align-items-center">
        <span class="navbar-text text-white me-3">
          Selamat datang, <?= htmlspecialchars($_SESSION['nama_lengkap'] ?? $_SESSION['username'] ?? 'tamu') ?>
        </span>
        <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </div>
</nav>

<!-- ISI KONTEN -->
<div class="container my-5">
  <h1 class="gallery-title">GALERI PESONA KALIMANTAN UTARA</h1>

  <!-- Tombol Tambah -->
  <button type="button" class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
    + Tambah Foto
  </button>

  <!-- LIST FOTO -->
  <div class="row justify-content-center">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM foto ORDER BY id_foto DESC");
    if (mysqli_num_rows($result) == 0) {
        echo "<div class='text-center text-muted mt-5'>Belum ada foto yang ditambahkan.</div>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_foto'];
    ?>
    <div class="col-md-3 col-sm-6 mb-4">
      <div class="gallery-item">
        <img src="../img/<?= htmlspecialchars($row['lokasi_file']) ?>" alt="<?= htmlspecialchars($row['judul_foto']) ?>">
        <div class="image-caption">
          <h5><?= htmlspecialchars($row['judul_foto']) ?></h5>
          <p><?= htmlspecialchars($row['deskripsi_foto']) ?></p>
          <div class="btn-warna">
            <a href="../img/<?= htmlspecialchars($row['lokasi_file']) ?>" target="_blank" class="lihat">Lihat</a>
                <button class="edit btn" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $id; ?>">Edit</button>
                <a href="../proses/hapus_foto.php?id=<?= $id; ?>" class="hapus btn" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
    </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDIT FOTO -->
    <div class="modal fade" id="modalEdit<?= $id ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $id ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="../proses/edit_foto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel<?= $id ?>">Edit Foto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_foto" value="<?= $id ?>">
              <!-- Foto saat ini -->
<div class="text-center mb-3">
    <label class="form-label fw-bold d-block">Foto Saat Ini:</label>
    <img src="../img/<?= htmlspecialchars($row['lokasi_file']) ?>" 
         alt="<?= htmlspecialchars($row['judul_foto']) ?>" class="img-thumbnail rounded shadow-sm" 
         id="preview_old_<?= $id ?>" style="max-height:180px; object-fit:cover;">
        </div>
<!-- Preview Foto Baru -->
<div class="text-center mb-3" id="preview_new_container_<?= $id ?>" style="display:none;">
    <label class="form-label fw-bold d-block">Preview Foto Baru:</label>
    <img src=""  id="preview_new_<?= $id ?>" class="img-thumbnail rounded shadow-sm"
    style="max-height:180px; object-fit:cover;">
</div>
              <div class="mb-3">
                <label class="form-label">Judul Foto</label>
                <input type="text" name="judul_foto" class="form-control" value="<?= htmlspecialchars($row['judul_foto']) ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Lokasi Foto</label>
                <input type="text" name="lokasi_foto" class="form-control" value="<?= htmlspecialchars($row['lokasi_foto']) ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Deskripsi Foto</label>
                <textarea name="deskripsi_foto" class="form-control" rows="2" required><?= htmlspecialchars($row['deskripsi_foto']) ?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Ganti Foto (opsional)</label>
                <input type="file" name="lokasi_file" class="form-control" accept=".png,.jpg,.jpeg" onchange="previewImage(this, <?= $id ?>)">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
              </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" required>
              <label class="form-check-label">Saya yakin ingin melakukan perubahan.</label>
        </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
          </form>
        </div>
      </div>
    </div>
   <?php
        }
    }
    ?>
  </div>
</div>

<!-- MODAL TAMBAH FOTO -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="../proses/tambah_foto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Tambahkan Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judul_foto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Lokasi Foto</label>
            <input type="text" name="lokasi_foto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi Foto</label>
            <textarea name="deskripsi_foto" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Upload Foto</label>
            <input type="file" name="lokasi_file" class="form-control" accept=".png,.jpg,.jpeg" required>
            <small class="text-muted">Ukuran gambar maksimal 10MB (.png, jpg, .jpeg)</small>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" required>
          <label class="form-check-label">Saya yakin ingin menambahkan foto.</label>
         </div>
       </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <p>© 2025 Muhammad Maulana. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function previewImage(input, id) {
    const file = input.files[0];
    const previewOld = document.getElementById('preview_old_' + id);
    const previewNewContainer = document.getElementById('preview_new_container_' + id);
    const previewNew = document.getElementById('preview_new_' + id);
  
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewNew.src = e.target.result;
        previewNewContainer.style.display = 'block';
        previewOld.style.opacity = '0.3';
      }
      reader.readAsDataURL(file);
    } else {
      previewNewContainer.style.display = 'none';
      previewOld.style.opacity = '1';
    }
    }
    </script>
</body>
</html>
