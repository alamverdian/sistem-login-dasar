<?php
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Sistem Login</a>
    <div class="d-flex align-items-center">
      <span class="navbar-text text-white me-3">
        Hai, <strong><?= htmlspecialchars($username); ?></strong>
      </span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container mt-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Selamat Datang, <?= htmlspecialchars($username); ?> 👋</h2>
    <p class="text-muted">Kamu berhasil login ke sistem.</p>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h5 class="card-title text-primary">Total Produk</h5>
          <h2 class="fw-bold">24</h2>
          <p class="text-muted mb-0">Data barang di sistem</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h5 class="card-title text-success">Total Pengguna</h5>
          <h2 class="fw-bold">5</h2>
          <p class="text-muted mb-0">User terdaftar</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h5 class="card-title text-warning">Transaksi Hari Ini</h5>
          <h2 class="fw-bold">8</h2>
          <p class="text-muted mb-0">Aktivitas terbaru</p>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="text-center mt-5 text-muted">
  <small>© <?= date('Y'); ?> Sistem Login Sederhana by Alam Verdian</small>
</footer>

</body>
</html>
