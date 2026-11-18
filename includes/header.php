<?php
// 1. Deteksi lokasi file saat ini untuk mengatur path relatif secara otomatis
$current_page = basename($_SERVER['PHP_SELF']);
$in_pages_dir = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'pages');
$base_path    = $in_pages_dir ? '../' : '';

// 2. Judul halaman dinamis (bisa di-override dari masing-masing halaman sebelum include header)
$page_title = $page_title ?? 'Portofolio Diky Raihan Subagja';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS Eksternal Dinamis -->
    <link rel="stylesheet" href="<?= $base_path; ?>assets/css/style.css?v=2">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm background-header">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="<?= $base_path; ?>index.php">
      <i class="bi bi-code-slash text-info fs-3 me-2"></i>
      <span>Portofolio</span>
      <span class="ms-2 text-info">Diky Raihan Subagja</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link <?= ($current_page === 'index.php') ? 'active fw-semibold' : ''; ?>" 
               href="<?= $base_path; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page === 'about.php') ? 'active fw-semibold' : ''; ?>" 
               href="<?= $base_path; ?>pages/about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page === 'produk.php') ? 'active fw-semibold' : ''; ?>" 
               href="<?= $base_path; ?>pages/produk.php">Proyek &amp; Layanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page === 'galeri.php') ? 'active fw-semibold' : ''; ?>" 
               href="<?= $base_path; ?>pages/galeri.php">Galeri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page === 'kontak.php') ? 'active fw-semibold' : ''; ?>" 
               href="<?= $base_path; ?>pages/kontak.php">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>