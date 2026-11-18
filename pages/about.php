<?php
$page_title = "Tentang Saya - Portofolio Diky Raihan Subagja";
include '../includes/header.php';

$skills = [
    ['name' => 'PHP / MySQL', 'level' => 85, 'color' => 'bg-primary'],
    ['name' => 'Linux & Networking', 'level' => 90, 'color' => 'bg-success'],
    ['name' => 'JavaScript', 'level' => 75, 'color' => 'bg-warning'],
    ['name' => 'HTML5 / CSS3 / Bootstrap', 'level' => 80, 'color' => 'bg-info']
];
?>

<main class="container my-5">
    <!-- Section Profil -->
    <section class="row align-items-center mb-5">
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="../assets/images/Diky_Rs.jpg" 
                 class="rounded-circle shadow profile-avatar" 
                 alt="Foto Profil Diky Raihan Subagja">
        </div>
        <div class="col-md-8">
            <h1 class="fw-bold mb-3">Tentang Saya</h1>
            <p class="lead">Halo! Saya seorang mahasiswa Teknik Informatika yang berfokus pada pengembangan web dinamis dan pemrosesan sistem backend.</p>
            <p class="text-muted">Saya memiliki ketertarikan tinggi pada pembuatan solusi digital responsif, arsitektur sistem modular, serta analisis keamanan jaringan.</p>
            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="https://github.com/raihanzdiky" target="_blank" rel="noopener noreferrer" class="btn btn-dark btn-sm px-3">
                <i class="bi bi-github me-1"></i> GitHub
                </a>
                <a href="https://instagram.com/dikyrhnz_" target="_blank" rel="noopener noreferrer" class="btn btn-outline-danger btn-sm px-3">
                <i class="bi bi-instagram me-1"></i> Instagram
                </a>
            </div>     
        </div>
    </section>

    <hr class="my-5">

    <!-- Section Keahlian -->
    <section>
        <h2 class="fw-bold mb-4">Keahlian Utama</h2>
        <div class="row">
            <?php foreach ($skills as $skill): ?>
                <?php 
                    $skill_name  = htmlspecialchars($skill['name'], ENT_QUOTES, 'UTF-8');
                    $skill_level = (int) $skill['level'];
                    $bar_color   = htmlspecialchars($skill['color'] ?? 'bg-success', ENT_QUOTES, 'UTF-8');
                ?>
                <div class="col-md-6 mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold"><?= $skill_name; ?></span>
                        <span class="text-muted fw-semibold"><?= $skill_level; ?>%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar <?= $bar_color; ?>" 
                             role="progressbar" 
                             style="width: <?= $skill_level; ?>%;" 
                             aria-valuenow="<?= $skill_level; ?>" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include '../includes/footer.php'; ?>