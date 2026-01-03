// Script untuk menampilkan pesan saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    console.log('Halaman Laravel berhasil dimuat!');
    
    // Tambahkan animasi sederhana pada elemen
    const container = document.querySelector('.container');
    if (container) {
        container.style.opacity = '0';
        container.style.transition = 'opacity 0.5s';
        setTimeout(() => {
            container.style.opacity = '1';
        }, 100);
    }
});

// Fungsi untuk menampilkan alert
function showMessage() {
    alert('JavaScript berhasil diload dari folder js!');
}
