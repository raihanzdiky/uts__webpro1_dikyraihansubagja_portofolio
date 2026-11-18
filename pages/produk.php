<?php
$page_title = "Proyek & Layanan - Portofolio Diky Raihan Subagja";
include '../includes/header.php';

// Data portofolio proyek
$proyek = [
    [
        "judul"     => "Aplikasi Pengelolaan KRS",
        "kategori"  => "Web & Desktop App",
        "deskripsi" => "Sistem informasi pengelolaan data rencana studi berbasis PHP & Swing Java.",
        "tech"      => ["PHP", "Java", "MySQL"]
    ],
    [
        "judul"     => "Personal Interactive Dashboard",
        "kategori"  => "Frontend App",
        "deskripsi" => "Dashboard interaktif dengan fitur toggle tema dark/light dan custom greeting.",
        "tech"      => ["JavaScript", "HTML5", "CSS3"]
    ],
    [
        "judul"     => "Analisis ERP Industri",
        "kategori"  => "Enterprise System",
        "deskripsi" => "Evaluasi implementasi modul ERP dan transformasi bisnis sistem perusahaan.",
        "tech"      => ["Research", "Enterprise", "ERP"]
    ],
    [
        "judul"     => "Sistem Deteksi Objek AI",
        "kategori"  => "Artificial Intelligence",
        "deskripsi" => "Implementasi model computer vision untuk identifikasi dan klasifikasi objek real-time.",
        "tech"      => ["Python", "OpenCV", "TensorFlow"]
    ],
    [
        "judul"     => "E-Commerce Mobile App",
        "kategori"  => "Mobile Development",
        "deskripsi" => "Aplikasi belanja online lintas platform dengan integrasi gateway pembayaran digital.",
        "tech"      => ["Flutter", "Dart", "REST API"]
    ],
    [
        "judul"     => "Cloud Inventory System",
        "kategori"  => "Cloud Computing",
        "deskripsi" => "Manajemen inventaris gudang berbasis cloud dengan fitur laporan otomatis harian.",
        "tech"      => ["Node.js", "Express", "PostgreSQL"]
    ]
];

// Ambil daftar kategori unik secara otomatis untuk tombol filter
$daftar_kategori = array_unique(array_column($proyek, 'kategori'));

// Tangkap parameter filter dari URL (?kategori=...)
$kategori_dipilih = trim($_GET['kategori'] ?? 'Semua');

// Filter array proyek jika user memilih kategori tertentu
if ($kategori_dipilih !== 'Semua') {
    $proyek_tampil = array_filter($proyek, function ($item) use ($kategori_dipilih) {
        return $item['kategori'] === $kategori_dipilih;
    });
} else {
    $proyek_tampil = $proyek;
}
?>

<main class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold mb-2">Proyek &amp; Layanan</h1>
        <p class="text-muted">Daftar portofolio karya dan bidang keahlian yang ditawarkan.</p>
    </div>

    <!-- Tombol Filter Kategori Dinamis (GET Request) -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
        <a href="produk.php" 
           class="btn btn-sm <?= ($kategori_dipilih === 'Semua') ? 'btn-primary' : 'btn-outline-primary'; ?>">
            Semua
        </a>
        <?php foreach ($daftar_kategori as $kat): ?>
            <?php $safe_kat = htmlspecialchars($kat, ENT_QUOTES, 'UTF-8'); ?>
            <a href="produk.php?kategori=<?= urlencode($kat); ?>" 
               class="btn btn-sm <?= ($kategori_dipilih === $kat) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <?= $safe_kat; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Grid Daftar Proyek -->
    <div class="row g-4">
        <?php if (empty($proyek_tampil)): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Tidak ada proyek pada kategori tersebut.</p>
                <a href="produk.php" class="btn btn-primary btn-sm">Tampilkan Semua Proyek</a>
            </div>
        <?php else: ?>
            <?php foreach ($proyek_tampil as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <article class="card h-100 border-0 shadow-sm card-hover-effect">
                        <div class="card-body">
                            <span class="badge bg-primary-subtle text-primary mb-2">
                                <?= htmlspecialchars($item['kategori'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <h2 class="card-title fw-bold h5">
                                <?= htmlspecialchars($item['judul'], ENT_QUOTES, 'UTF-8'); ?>
                            </h2>
                            <p class="card-text text-muted small">
                                <?= htmlspecialchars($item['deskripsi'], ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3 pt-0">
                            <div class="d-flex flex-wrap gap-1">
                                <?php foreach ($item['tech'] as $teknologi): ?>
                                    <span class="badge bg-light text-secondary border">
                                        <?= htmlspecialchars($teknologi, ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>