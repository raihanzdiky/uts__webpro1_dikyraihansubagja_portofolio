<?php
// Deteksi otomatis apakah halaman diakses dari subfolder 'pages/' atau dari root
$base_path = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'pages') ? '../' : '';
?>

<footer class="background-header text-white text-center py-4 mt-auto">
    <div class="container">
        <!-- Tautan Media Sosial -->
        <div class="d-flex justify-content-center gap-3 mb-3">
            <a href="https://github.com/raihanzdiky" target="_blank" rel="noopener noreferrer" 
               class="text-white fs-4 social-link" aria-label="GitHub">
                <i class="bi bi-github"></i>
            </a>
            <a href="https://instagram.com/dikyrhnz_" target="_blank" rel="noopener noreferrer" 
               class="text-white fs-4 social-link" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/diky-raihanz-207a77287/" target="_blank" rel="noopener noreferrer" 
               class="text-white fs-4 social-link" aria-label="LinkedIn">
                <i class="bi bi-linkedin"></i>
            </a>
        </div>
        <p class="mb-1">
            &copy; <?= date('Y'); ?> Portofolio 
            <span class="text-info fw-bold">Diky Raihan Subagja.</span> All Rights Reserved.
        </p>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS (Sesuai nama file di folder assets/js/main.js) -->
<script src="<?= $base_path; ?>assets/js/main.js"></script>
</body>
</html>