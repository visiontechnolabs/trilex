<style>
:root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }

    .hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 1rem;
    }

    .service-title {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        display: flex;
        text-align: center;
        color: #fff;
    }

    .service-description {
        max-width: 100%;
        overflow: visible !important;
        padding: 10px 0;
    }

    .ck-content {
        overflow: visible !important;
        white-space: normal !important;
        word-wrap: break-word;
        line-height: 1.6;
    }

    .ck-content pre {
        white-space: pre-wrap;
        word-break: break-word;
    }

    @media (max-width: 768px) {
        .hero {
            margin-top: 5rem;
        }
    }
</style>

<div class="container">
    <?php if (isset($service) && !empty($service)): ?>
        <!-- ✅ Hero Section -->
        <div class="hero">
            <div class="hero-content">
                <h1 class="service-title">
                    <?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8'); ?>
                </h1>
            </div>
        </div>

        <!-- ✅ Service Details Card -->
        <div class="service-card">
            <div class="icon-decoration">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM4 19V5h16v14H4z" />
                    <path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h8v2H6z" />
                </svg>
            </div>

            <span class="section-label">Service Description</span>


            <div class="service-description">
                <?php if (!empty($service['description'])): ?>
                    <div class="ck-content">
                        <?= $service['description']; ?>
                    </div>
                <?php else: ?>
                    <p>No description available for this service.</p>
                <?php endif; ?>

                <p class="text-muted" style="margin-top: 15px;">
                    <strong>Created on:</strong> <?= date('d M, Y', strtotime($service['created_on'])); ?>
                </p>
            </div>


        </div>

        <!-- ✅ Call to Action -->
        <div class="cta-section">
            <h3 style="color: var(--primary-color); margin-bottom: 20px;">Ready to Get Started?</h3>
            <a href="<?= base_url('contact'); ?>" class="cta-button">Contact Us Today</a>
        </div>

    <?php else: ?>
        <!-- ❌ No Data Found -->
        <div class="no-service text-center py-5">
            <h3>No Service Found</h3>
            <p>We couldn’t find the service you’re looking for. Please check the URL or explore other services.</p>
            <a href="<?= base_url('home'); ?>" class="btn btn-primary mt-3">Back to Services</a>
        </div>
    <?php endif; ?>
</div>