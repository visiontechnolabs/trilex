    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-teal: #1a8b9d;
            --dark-navy: #003d4d;
            --light-bg: #f5f8fa;
            --white: #ffffff;
            --text-dark: #1a1a1a;
            --text-gray: #5a6c7d;
            --border-light: #e1e8ed;
            --success-green: #10b981;
            --shadow-sm: 0 2px 8px rgba(0, 61, 77, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 61, 77, 0.12);
            --shadow-lg: 0 8px 24px rgba(0, 61, 77, 0.15);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .product-page {
            max-width: 1320px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--text-gray);
            margin-bottom: 30px;
        }

        .breadcrumb a {
            color: var(--primary-teal);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: var(--dark-navy);
        }

        .breadcrumb i {
            font-size: 12px;
        }

        /* Main Layout */
        .product-layout {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        /* LEFT: Image Section */
        .product-image-section {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-md);
        }

        .main-image-container {
            width: 100%;
            min-height: 450px;
            background: linear-gradient(135deg, #f8fafb 0%, #e8f0f2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 20px;
            border: 1px solid var(--border-light);
        }

        .main-image-container img,
        .main-image-container video {
            max-width: 100%;
            max-height: 550px;
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
        }

        /* Trust Badges */
        .trust-indicators {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding-top: 20px;
            border-top: 1px solid var(--border-light);
        }

        .trust-item {
            text-align: center;
            padding: 15px;
            background: #f8fafb;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .trust-item:hover {
            background: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .trust-item i {
            font-size: 24px;
            color: var(--primary-teal);
            margin-bottom: 8px;
            display: block;
        }

        .trust-item span {
            font-size: 12px;
            color: var(--text-gray);
            font-weight: 500;
            display: block;
        }

        /* RIGHT: Product Info */
        .product-info-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-card {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-md);
        }

        /* Title */
        .product-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
            margin-bottom: 15px;
        }

        /* Meta Info */
        .product-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 20px;
        }

        .rating-display {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stars {
            display: flex;
            gap: 3px;
        }

        .stars i {
            color: #fbbf24;
            font-size: 16px;
        }

        .rating-count {
            font-size: 14px;
            color: var(--text-gray);
        }

        .stock-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: #d1fae5;
            color: #065f46;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .stock-indicator i {
            font-size: 12px;
        }

        /* Price Section */
        .price-container {
            background: linear-gradient(135deg, #f0fdfa 0%, #e6f7f4 100%);
            padding: 25px;
            border-radius: 12px;
            border: 2px solid #99f6e4;
        }

        .price-header {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-gray);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .price-row {
            display: flex;
            align-items: baseline;
            gap: 15px;
            margin-bottom: 12px;
        }

        .current-price {
            font-size: 36px;
            font-weight: 800;
            color: var(--primary-teal);
        }

        .original-price {
            font-size: 20px;
            color: var(--text-gray);
            text-decoration: line-through;
        }

        .discount-label {
            display: inline-block;
            background: var(--success-green);
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
        }

        .savings-amount {
            font-size: 14px;
            color: var(--success-green);
            font-weight: 600;
            margin-top: 5px;
        }

        /* CTA Button */
        .cta-button {
            width: 100%;
            padding: 16px;
            background: var(--primary-teal);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(26, 139, 157, 0.3);
        }

        .cta-button:hover {
            background: var(--dark-navy);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26, 139, 157, 0.4);
        }

        .cta-button i {
            font-size: 18px;
        }

        /* Secondary Actions */
        .secondary-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .secondary-btn {
            padding: 12px;
            background: white;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .secondary-btn:hover {
            border-color: var(--primary-teal);
            color: var(--primary-teal);
            background: #f0fdfa;
        }

        /* Key Features */
        .features-card {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-md);
        }

        .features-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .features-title i {
            color: var(--primary-teal);
            font-size: 20px;
        }

        .features-list {
            list-style: none;
        }

        .features-list li {
            padding: 12px 0;
            color: var(--text-gray);
            font-size: 14px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            line-height: 1.6;
            border-bottom: 1px solid var(--border-light);
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .features-list li i {
            color: var(--success-green);
            margin-top: 2px;
            flex-shrink: 0;
            font-size: 16px;
        }

        /* Support Card */
        .support-card {
            background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-teal) 100%);
            color: white;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            box-shadow: var(--shadow-lg);
        }

        .support-card i {
            font-size: 36px;
            margin-bottom: 12px;
            display: block;
            opacity: 0.9;
        }

        .support-card h4 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .support-card p {
            font-size: 13px;
            opacity: 0.9;
            line-height: 1.5;
        }

        /* Description Section */
        .description-section {
            background: var(--white);
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--shadow-md);
        }

        .description-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--border-light);
            position: relative;
        }

        .description-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-teal);
        }

        .description-content {
            font-size: 15px;
            line-height: 1.8;
            color: var(--text-gray);
        }

        .description-content p {
            margin-bottom: 18px;
        }

        .description-content h1,
        .description-content h2,
        .description-content h3 {
            margin: 28px 0 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .description-content ul,
        .description-content ol {
            margin: 18px 0 18px 26px;
        }

        .description-content li {
            margin-bottom: 10px;
        }

        .description-content img {
            max-width: 100%;
            border-radius: 12px;
            margin: 28px 0;
            box-shadow: var(--shadow-sm);
        }

        .description-content a {
            color: var(--primary-teal);
            font-weight: 600;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: border-color 0.2s;
        }

        .description-content a:hover {
            border-bottom-color: var(--primary-teal);
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .product-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .product-page {
                padding: 24px 16px;
            }

            .product-image-section,
            .info-card,
            .features-card,
            .support-card,
            .description-section {
                padding: 24px;
            }

            .product-title {
                font-size: 22px;
            }

            .current-price {
                font-size: 30px;
            }

            .main-image-container {
                min-height: 320px;
            }

            .main-image-container img,
            .main-image-container video {
                max-height: 400px;
            }

            .trust-indicators {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .trust-item {
                padding: 12px 8px;
            }

            .trust-item i {
                font-size: 20px;
            }

            .trust-item span {
                font-size: 11px;
            }

            .secondary-actions {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .product-title {
                font-size: 20px;
            }

            .current-price {
                font-size: 28px;
            }

            .cta-button {
                font-size: 15px;
                padding: 14px;
            }

            .main-image-container {
                min-height: 280px;
            }
        }
    </style>

    <div class="product-page">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="<?= base_url(); ?>">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="<?= base_url('product'); ?>">Products</a>
            <i class="fas fa-chevron-right"></i>
            <span><?= $product->title; ?></span>
        </div>

        <!-- Main Product Layout -->
        <div class="product-layout">
            <!-- LEFT: Product Image -->
            <div class="product-image-section">
                <div class="main-image-container">
                    <?php if (!empty($product->file_path)): ?>
                        <?php if (pathinfo($product->file_path, PATHINFO_EXTENSION) === 'mp4'): ?>
                            <video src="<?= base_url($product->file_path); ?>" controls muted loop></video>
                        <?php else: ?>
                            <img src="<?= base_url($product->file_path); ?>" alt="<?= $product->title; ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="https://via.placeholder.com/800x600?text=Product+Image" alt="No Image">
                    <?php endif; ?>
                </div>

                <div class="trust-indicators">
                    <div class="trust-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure Payment</span>
                    </div>
                    <div class="trust-item">
                        <i class="fas fa-truck-fast"></i>
                        <span>Fast Delivery</span>
                    </div>
                    <div class="trust-item">
                        <i class="fas fa-rotate-left"></i>
                        <span>Easy Returns</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Product Information -->
            <div class="product-info-section">
                <!-- Main Info Card -->
                <div class="info-card">
                    <h1 class="product-title"><?= $product->title; ?></h1>

                    <div class="product-meta">
                        <div class="rating-display">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-count">4.5 (238 reviews)</span>
                        </div>
                        <div class="stock-indicator">
                            <i class="fas fa-circle-check"></i>
                            In Stock
                        </div>
                    </div>

                    <div class="price-container">
                        <div class="price-header">Product Price</div>
                        <div class="price-row">
                            <span class="current-price">₹<?= number_format($product->price, 2); ?></span>
                            <?php if (!empty($product->original_price) && $product->original_price > $product->price): ?>
                                <span class="original-price">₹<?= number_format($product->original_price, 2); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($product->original_price) && $product->original_price > $product->price): ?>
                            <?php
                            $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                            $savings = $product->original_price - $product->price;
                            ?>
                            <div class="discount-label"><?= $discount; ?>% OFF</div>
                            <div class="savings-amount">You save ₹<?= number_format($savings, 2); ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- CTA Button -->
                <button class="cta-button" onclick="goToCheckout(<?= $product->id; ?>)">
                    <i class="fas fa-cart-shopping"></i>
                    View Details
                </button>

                <!-- Secondary Actions -->
                <div class="secondary-actions" onclick="window.location.href='<?= base_url('product'); ?>'">
                    <button class="secondary-btn">
                        <i class="far fa-heart"></i>
                        More Products
                    </button>
                    <button class="secondary-btn">
                        <i class="fas fa-share-nodes"></i>
                        Share
                    </button>
                </div>

                <!-- Key Features -->
                <div class="features-card">
                    <h3 class="features-title">
                        <i class="fas fa-circle-check"></i>
                        Key Features
                    </h3>
                    <ul class="features-list">
                        <li>
                            <i class="fas fa-check"></i>
                            Premium quality materials and craftsmanship
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            100% satisfaction guarantee or money back
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            Free shipping on orders over ₹999
                        </li>
                        <li>
                            <i class="fas fa-check"></i>
                            1-year warranty included with purchase
                        </li>
                    </ul>
                </div>

                <!-- Support Card -->
                <div class="support-card">
                    <i class="fas fa-headset"></i>
                    <h4>Need Help?</h4>
                    <p>Our expert team is available 24/7 to assist you with any questions or concerns.</p>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="description-section">
            <h2 class="description-title">Product Description</h2>
            <div class="description-content">
                <?= $product->description; ?>
            </div>
        </div>
    </div>

    <script>
        function goToCheckout(productId) {
            window.location.href = "<?= base_url('checkout/'); ?>" + productId;
        }

        // Wishlist toggle
        document.querySelector('.secondary-actions').addEventListener('click', function(e) {
            const btn = e.target.closest('.secondary-btn');
            if (btn && btn.innerHTML.includes('Wishlist')) {
                const icon = btn.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    btn.style.borderColor = '#f43f5e';
                    btn.style.color = '#f43f5e';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    btn.style.borderColor = '';
                    btn.style.color = '';
                }
            }
        });
    </script>