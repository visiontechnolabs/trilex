<style>
    /* ================= ROOT ================= */
    .container {
        max-width: 1200px;
    }

    /* ================= MEDIA SECTION ================= */
    .media-section {
        margin-bottom: 50px;
    }

    .media-wrapper {
        max-width: 980px;
        /* prevents huge image */
        margin: auto;
        position: relative;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        border-radius: 20px;
        background: #020617;
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.35);
    }

    /* subtle overlay for depth */
    .media-wrapper::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom,
                rgba(2, 6, 23, 0.15),
                rgba(2, 6, 23, 0.55));
        pointer-events: none;
    }

    .media-wrapper img,
    .media-wrapper video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* ================= CONTENT ================= */
    .content-section {
        max-width: 900px;
        margin: auto;
    }

    /* Product Title */
    .content-section .product-title {
        font-size: 32px;
        font-weight: 800;
        color: #020617;
        margin-bottom: 18px;
        line-height: 1.3;
    }

    /* ================= PRICE ================= */
    .price-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
        margin-bottom: 26px;
    }

    .price-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .price {
        font-size: 30px;
        font-weight: 800;
        color: #ffffff;
    }

    .original-price {
        font-size: 18px;
        color: #64748b;
        text-decoration: line-through;
    }

    .discount-badge {
        background: #dcfce7;
        color: #166534;
        padding: 6px 14px;
        font-size: 14px;
        font-weight: 700;
        border-radius: 999px;
    }

    /* ================= BUY BUTTON ================= */
    .buy-button {
        display: inline-block;
        padding: 15px 36px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        margin-bottom: 50px;
        box-shadow: 0 14px 32px rgba(99, 102, 241, 0.45);
        transition: all 0.3s ease;
    }

    .buy-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 22px 45px rgba(99, 102, 241, 0.6);
    }

    /* Sticky buy button (desktop) */
    @media (min-width: 992px) {
        .buy-button {
            position: sticky;
            top: 100px;
            z-index: 10;
        }
    }

    /* ================= DESCRIPTION ================= */
    .description-section {
        max-width: 900px;
        margin: 60px auto 0;
        background: #ffffff;
        border-radius: 20px;
        padding: 36px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
    }

    .description-header {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 22px;
        color: #020617;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 12px;
    }

    /* Typography for raw HTML content */
    .description-content {
        font-size: 16px;
        line-height: 1.85;
        color: #334155;
    }

    /* paragraphs */
    .description-content p {
        margin-bottom: 18px;
    }

    /* headings inside description */
    .description-content h1,
    .description-content h2,
    .description-content h3 {
        margin: 32px 0 14px;
        font-weight: 800;
        color: #020617;
    }

    /* lists */
    .description-content ul,
    .description-content ol {
        margin: 18px 0 18px 22px;
    }

    .description-content li {
        margin-bottom: 10px;
    }

    /* images inside description */
    .description-content img {
        max-width: 100%;
        border-radius: 14px;
        margin: 26px 0;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
    }

    /* links */
    .description-content a {
        color: #4f46e5;
        font-weight: 600;
        text-decoration: underline;
    }

    /* ================= MOBILE ================= */
    @media (max-width: 768px) {
        .content-section .product-title {
            font-size: 24px;
        }

        .price {
            font-size: 26px;
        }

        .media-wrapper {
            border-radius: 16px;
        }

        .description-section {
            padding: 24px;
        }
    }
</style>

<div class="container mt-3">
    <div class="media-section">
        <div class="media-wrapper" id="mediaWrapper">
            <?php if (!empty($product->file_path)): ?>
                <?php if (pathinfo($product->file_path, PATHINFO_EXTENSION) === 'mp4'): ?>
                    <video src="<?= base_url($product->file_path); ?>" controls autoplay muted loop></video>
                <?php else: ?>

                    <img src="<?= base_url($product->file_path); ?>" alt="<?= $product->title; ?>">
                <?php endif; ?>
            <?php else: ?>
                <img src="https://via.placeholder.com/1200x600?text=No+Image" alt="No Image">
            <?php endif; ?>
        </div>
    </div>

    <div class="content-section">
        <h1 class="product-title"><?= $product->title; ?></h1>

        <div class="price-container">
            <div class="price-wrapper">
                <?php if (!empty($product->original_price) && $product->original_price > $product->price): ?>
                    <span class="original-price">₹<?= number_format($product->original_price, 2); ?></span>
                <?php endif; ?>
                <span class="price">₹<?= number_format($product->price, 2); ?></span>
            </div>

            <?php if (!empty($product->original_price) && $product->original_price > $product->price): ?>
                <?php
                $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                ?>
                <div class="discount-badge"><?= $discount; ?>% OFF</div>
            <?php endif; ?>
        </div>

        <button class="buy-button" onclick="goToCheckout(<?= $product->id; ?>)">Buy Now <i class="fas fa-shopping-cart ms-2"></i></button>

        <div class="description-section">
            <h2 class="description-header">Product Description</h2>
            <div class="description-content">
                <?= $product->description; ?>
            </div>
        </div>
    </div>
</div>
<script>
    function goToCheckout(productId) {
        window.location.href = "<?= base_url('checkout/'); ?>" + productId;
    }
</script>