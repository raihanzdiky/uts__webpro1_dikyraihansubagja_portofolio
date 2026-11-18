<?php
session_start();

// 1. Panggil file koneksi & header
require_once '../config/koneksi.php';
$page_title = "Hubungi Saya - Portofolio Diky Raihan Subagja";
include '../includes/header.php';

// Ambil flash message dari session jika ada (hasil redirect PRG)
$success_msg = $_SESSION['success_msg'] ?? "";
$error_msg   = $_SESSION['error_msg'] ?? "";
$old_input   = $_SESSION['old_input'] ?? [];

// Hapus flash message setelah dibaca agar tidak muncul terus saat refresh
unset($_SESSION['success_msg'], $_SESSION['error_msg'], $_SESSION['old_input']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if (empty($nama) || empty($email) || empty($pesan)) {
        $_SESSION['error_msg'] = "Semua kolom wajib diisi dan tidak boleh hanya berisi spasi.";
        $_SESSION['old_input'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_msg'] = "Format alamat email tidak valid.";
        $_SESSION['old_input'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];
    } else {
        try {
            // 2. Query INSERT menggunakan Prepared Statement (Anti SQL Injection)
            $sql  = "INSERT INTO pesan_kontak (nama, email, pesan) VALUES (:nama, :email, :pesan)";
            $stmt = $pdo->prepare($sql);

            // 3. Eksekusi query dengan mengikat parameter
            $stmt->execute([
                ':nama'  => $nama,
                ':email' => $email,
                ':pesan' => $pesan
            ]);

            $safe_nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
            $_SESSION['success_msg'] = "Terima kasih, <strong>$safe_nama</strong>! Pesan Anda berhasil disimpan ke database.";
        } catch (PDOException $e) {
            // Catat detail error di log server, tampilkan pesan aman ke user
            error_log("Database Error (kontak.php): " . $e->getMessage());
            $_SESSION['error_msg'] = "Maaf, terjadi gangguan sistem saat menyimpan pesan Anda. Silakan coba lagi nanti.";
            $_SESSION['old_input'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];
        }
    }

    // Redirect ke halaman ini sendiri (Pola Post-Redirect-Get untuk mencegah duplicate submit saat F5)
    header("Location: kontak.php");
    exit;
}

// Isi ulang form jika sebelumnya gagal validasi
$nama  = $old_input['nama'] ?? '';
$email = $old_input['email'] ?? '';
$pesan = $old_input['pesan'] ?? '';
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4">
                <h1 class="h2 fw-bold mb-3 text-center">Hubungi Saya</h1>
                <p class="text-center text-muted mb-4">Kirimkan pesan atau tawaran kerja sama melalui form di bawah ini.</p>

                <!-- Alert Sukses -->
                <?php if (!empty($success_msg)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $success_msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Alert Error -->
                <?php if (!empty($error_msg)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($error_msg, ENT_QUOTES, 'UTF-8'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" id="contactForm">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan / Pertanyaan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="4" required><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                </form>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="text-muted small mb-2">Atau temukan saya di platform berikut:</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="https://github.com/raihanzdiky" target="_blank" rel="noopener noreferrer" class="text-dark text-decoration-none fw-semibold">
                        <i class="bi bi-github me-1"></i> GitHub
                    </a>
                    <span class="text-muted">|</span>
                    <a href="https://instagram.com/dikyrhnz_" target="_blank" rel="noopener noreferrer" class="text-danger text-decoration-none fw-semibold">
                        <i class="bi bi-instagram me-1"></i> Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>