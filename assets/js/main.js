document.addEventListener('DOMContentLoaded', () => {
    // 1. Auto-hide Alert (Pesan sukses/error otomatis tertutup setelah 5 detik)
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alertEl => {
        setTimeout(() => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alertEl);
            bsAlert.close();
        }, 5000);
    });

    // 2. Validasi Client-Side Real-Time & Loading State pada Form Kontak
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            const nama  = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const pesan = document.getElementById('pesan').value.trim();

            // Cegah pengiriman jika input hanya berisi spasi kosong
            if (!nama || !email || !pesan) {
                event.preventDefault();
                alert('Harap isi semua kolom dengan benar (tidak boleh hanya spasi).');
                return;
            }

            // Ubah tombol submit menjadi state loading agar user tidak klik berkali-kali
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mengirim...';
            }
        });
    }
});