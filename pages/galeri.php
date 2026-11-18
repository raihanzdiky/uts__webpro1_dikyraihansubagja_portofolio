<?php
$page_title = "Galeri Kegiatan - Portofolio Diky Raihan Subagja";
include '../includes/header.php';

$galeri = [
    [
        "judul"     => "Workspace Setup",
        "deskripsi" => "Lingkungan kerja pengembangan aplikasi dan eksperimen jaringan lokal.",
        "img"       => "../assets/images/ws.png"
    ],
    [
        "judul"     => "Simulasi Jaringan",
        "deskripsi" => "Perancangan topologi dan konfigurasi routing jaringan.",
        "img"       => "../assets/images/sjj.png"
    ],
    [
        "judul"     => "Coding Camp",
        "deskripsi" => "Pelatihan intensif pengembangan aplikasi web modern.",
        "img"       => "../assets/images/cc.png" 
    ],
    [
        "judul"     => "Diskusi Tim",
        "deskripsi" => "Kolaborasi analisis kebutuhan sistem dan pembagian tugas proyek.",
        "img"       => "../assets/images/dt.png"
    ],
    [
        "judul"     => "Sertifikasi & Audit",
        "deskripsi" => "Evaluasi standar keamanan dan sertifikasi kompetensi teknis.",
        "img"       => "../assets/images/sa.png"
    ],
    [
        "judul"     => "Pengembangan Web",
        "deskripsi" => "Implementasi antarmuka responsif dan integrasi backend PHP/MySQL.",
        "img"       => "../assets/images/pw.png"
    ]
];
?>

<main class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2">Galeri Kegiatan</h1>
        <p class="text-muted">Dokumentasi proyek, aktivitas perkuliahan, dan eksperimen teknis.</p>
    </div>

    <div class="row g-4">
        <?php foreach ($galeri as $index => $g): ?>
            <?php
                $safe_judul = htmlspecialchars($g['judul'], ENT_QUOTES, 'UTF-8');
                $safe_desk  = htmlspecialchars($g['deskripsi'], ENT_QUOTES, 'UTF-8');
                $safe_img   = htmlspecialchars($g['img'], ENT_QUOTES, 'UTF-8');
            ?>
            <div class="col-lg-4 col-md-6">
                <figure class="card border-0 shadow-sm overflow-hidden h-100 mb-0 card-hover-effect">
                    <div class="bg-white p-2 text-center" style="cursor: pointer;" 
                         data-bs-toggle="modal" data-bs-target="#modalGaleri<?= $index; ?>">
                        <img src="<?= $safe_img; ?>" 
                             class="card-img-top object-fit-contain" 
                             style="height: 200px;" 
                             loading="lazy" 
                             alt="<?= $safe_judul; ?>">
                    </div>
                    <figcaption class="card-body text-center border-top">
                        <h2 class="card-title h6 fw-bold mb-1"><?= $safe_judul; ?></h2>
                        <p class="card-text text-muted small mb-0"><?= $safe_desk; ?></p>
                    </figcaption>
                </figure>
            </div>

            <!-- Modal Preview Gambar Saat Diklik -->
            <div class="modal fade" id="modalGaleri<?= $index; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header">
                            <h3 class="modal-title h5 fw-bold"><?= $safe_judul; ?></h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center bg-light">
                            <img src="<?= $safe_img; ?>" class="img-fluid rounded" alt="<?= $safe_judul; ?>">
                            <p class="text-muted mt-3 mb-0"><?= $safe_desk; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../includes/footer.php'; ?>