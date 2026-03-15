<?php
session_start();
require 'data.php';
require 'functions.php';

$menu = $_GET['menu'] ?? 'utama';

if ($menu === 'utama') {
    include 'header.php';
    renderHeader('utama');
    ?>
    <h1 class="page-title">Selamat Datang</h1>
    <div class="gallery-row">
        <?php foreach ($produkList as $produk): ?>
            <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>" class="gallery-thumb">
        <?php endforeach; ?>
    </div>
    <?php include 'footer.php'; ?>

<?php } elseif ($menu === 'tempah') {
    include 'header.php';
    renderHeader('tempah');
    // Kod borang tempahan di sini (boleh modularkan juga)
    include 'footer.php';

} elseif ($menu === 'invois') {
    if (!isset($_SESSION['invois_data'])) {
        echo "<script>alert('Invois belum ada.'); window.location.href='index.php?menu=tempah';</script>";
        exit();
    }
    include 'header.php';
    renderHeader('invois');
    $invois = $_SESSION['invois_data'];
    // Kod invois
    include 'footer.php';

} else {
    echo "<h1>Menu tidak ditemukan</h1>";
}