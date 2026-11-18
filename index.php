<?php
$page_title = "Home - Portofolio Diky Raihan Subagja";
include 'includes/header.php';

// Data layanan/keahlian utama agar tidak menulis ulang HTML 6 kali
$layanan = [
    [
        "ikon"      => "bi-laptop",
        "judul"     => "Web Development",
        "deskripsi" => "Membangun aplikasi web responsif dan dinamis dengan standar teknologi terkini."
    ],
    [
        "ikon"      => "bi-shield-check",
        "judul"     => "Cyber Security & System",
        "deskripsi" => "Fokus pada analisis keamanan sistem, jaringan, dan arsitektur perangkat lunak."
    ],
    [
        "ikon"      => "bi-cpu",
        "judul"     => "Problem Solving",
        "deskripsi" => "Mengatasi tantangan teknis kompleks dengan solusi berbasis algoritma yang efisien."
    ],
    [
        "ikon"      => "bi-cloud-arrow-up",
        "judul"     => "Cloud Computing",
        "deskripsi" => "Deployment, manajemen server, dan skalabilitas aplikasi berbasis cloud modern."
    ],
    [
        "ikon"      => "bi-palette",
        "judul"     => "UI/UX Design",
        "deskripsi" => "Merancang antarmuka pengguna yang intuitif dan pengalaman interaksi yang optimal."
    ],
    [
        "ikon"      => "bi-server",
        "judul"     => "Database Architecture",
        "deskripsi" => "Desain, optimasi, dan pengelolaan struktur basis data relasional maupun non-relasional."
    ]
];
?>

<main>
    <!-- Hero Section -->
    <section class="text-white py-5 mb-4 shadow-sm background-custom">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold">Selamat Datang di Portofolio Saya</h1>
            <p class="lead">Pengembang Web | Software Engineer | Tech Enthusiast</p>
            <div class="mt-4 d-flex justify-content-center gap-2 flex-wrap">
                <a href="pages/produk.php" class="btn btn-light btn-lg fw-semibold text-primary">Lihat Proyek</a>
                <a href="pages/kontak.php" class="btn btn-outline-light btn-lg">Hubungi Saya</a>
            </div>
        </div>
    </section>

    <!-- Section Bidang Keahlian -->
    <section class="container my-5">
        <div class="row text-center g-4">
            <?php foreach ($layanan as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm p-4 card-hover-effect">
                        <i class="bi <?= htmlspecialchars($item['ikon'], ENT_QUOTES, 'UTF-8'); ?> display-4 text-primary mb-3"></i>
                        <h2 class="h5 fw-bold"><?= htmlspecialchars($item['judul'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p class="text-muted mb-0"><?= htmlspecialchars($item['deskripsi'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>