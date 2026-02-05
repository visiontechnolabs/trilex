<div class="container">
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="page-title">Our Services</h1>
            <p class="page-subtitle">Explore our comprehensive range of professional services</p>
        </div>
    </div>

    <div class="category-section">
        <div class="category-header">
            <div class="category-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z" />
                </svg>
            </div>
            <h2 class="category-title">
                <?= !empty($slug) ? ucfirst(str_replace('-', ' ', $slug)) : 'Services'; ?>
            </h2>


        </div>

        <div class="services-grid">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="service-card">
                        <span class="service-number">
                            <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                        </span>

                        <h3 class="service-title">
                            <?= htmlspecialchars($service['title']); ?>
                        </h3>

                        <p class="service-excerpt">
                            <?php
                            // Remove HTML and limit to ~200 chars (≈ 3 lines)
                            $shortDesc = strip_tags($service['description']);
                            echo strlen($shortDesc) > 200
                                ? substr($shortDesc, 0, 200) . '...'
                                : $shortDesc;
                            ?>
                        </p>

                        <a href="<?= base_url('service_details/' . $service['id']); ?>" class="view-details-btn">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                            </svg>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-service" style="text-align:center; color:#888; font-size:18px;">
                    No service found
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>


<style>
    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }

    .container {
        max-width: 1200px;
        /* margin-top: 3rem; */
        margin-bottom: 2rem;
        padding-top: 5rem;
        padding: 0 1rem;
    }

    .hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 1rem;

    }

    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .hero p {
        color: #cbd5f5;
    }

    @media(max-width:764px) {
        .container {
            margin-top: 10rem;
        }
    }
</style>