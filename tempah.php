<h1 class="page-title">Borang Tempahan</h1>

<script src="script.js" defer></script>

<form method="POST" action="tempahancontroller.php" id="orderForm">
    <div class="product-grid">
        <?php foreach ($data as $produk): ?>
            <div class="product-card">
                <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" class="product-image">
                
                <div class="product-info">
                    <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
                    
                    <div class="options-container">
                        <?php foreach ($produk['harga'] as $saiz => $harga): ?>
                            <div class="product-option">
                            <div class="option-details">
                                <div class="label-saiz"><?= ucwords(str_replace('_',' ',$saiz)) ?></div>
                                <div class="label-harga">RM <?= number_format($harga, 2) ?></div>
                            </div>
                            <input type="number" name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]" 
                                value="0" min="0" class="qty-input" 
                                data-price="<?= $harga ?>" oninput="calculateTotal()">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="checkout-container">
        <div class="checkout-card">
            <div class="price-row">
                <span class="total-label">Jumlah Harga:</span>
                <span id="totalPrice" class="grand-total" style="color: #2e7d32; font-weight: bold;">RM 0.00</span>
            </div>
            
            <div class="name-input-section">
                <label>Nama Penuh Anda:</label>
                <input type="text" name="nama_pelanggan" placeholder="Contoh: Ali Bin Abu" required 
                       style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <button type="submit" class="btn-teruskan" 
                    style="background-color: #e65124; color: white; border: none; padding: 12px; width: 100%; border-radius: 5px; cursor: pointer; font-weight: bold; margin-top: 15px;">
                Teruskan
            </button>
        </div>
    </div>
</form>