<!-- Home Page -->
<div id="home" class="page active">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="mb-4">
                        From Vision to Vanguard — Leading the Next Era of Finance, Law & Technology
                    </h1>

                    <p class="mb-4">
                        Empowering a smarter world through Finance, Law & Technology with
                        <strong>Trilex Advisory</strong>.
                    </p>

                    <a href="<?= site_url('product') ?>" class="btn-primary-custom">
                        Explore Products <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="col-lg-6 text-center">
                    <i class="fas fa-chart-line hero-illustration"></i>
                </div>

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container py-5 mb-5">
        <h2 class="section-title">Why Choose Trilex Advisory?</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Quality Service</h4>
                    <p>
                        Delivering precision, integrity, and excellence in every solution we provide.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Global Vision</h4>
                    <p>
                        Bridging Finance, Law & Technology to shape the future on a global scale.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Innovative Thinking</h4>
                    <p>
                        Turning complex challenges into transformative opportunities through innovation.
                    </p>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    /* ================= HOME PAGE ================= */

    .hero-section {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #f8fafc, #eef2ff);
        overflow: hidden;
    }

    .hero-section::after {
        content: "";
        position: absolute;
        right: -200px;
        top: -200px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.15), transparent 70%);
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 900;
        line-height: 1.25;
        color: #020617;
    }

    .hero-section p {
        font-size: 1.1rem;
        color: #475569;
        max-width: 520px;
    }

    .btn-primary-custom {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 28px;
        border-radius: 14px;
        font-weight: 700;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #ffffff;
        text-decoration: none;
        box-shadow: 0 14px 30px rgba(99, 102, 241, 0.4);
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 22px 45px rgba(99, 102, 241, 0.55);
    }

    /* Hero icon */
    .hero-illustration {
        font-size: 16rem;
        color: #6366f1;
        opacity: 0.12;
    }

    /* ================= FEATURES ================= */

    .section-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 900;
        margin-bottom: 60px;
        color: #020617;
    }

    .feature-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 36px 28px;
        text-align: center;
        height: 100%;
        border: 1px solid #e5e7eb;
        transition: all 0.35s ease;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.12);
    }

    .feature-icon {
        width: 72px;
        height: 72px;
        margin: 0 auto 22px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #ffffff;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        box-shadow: 0 12px 30px rgba(99, 102, 241, 0.45);
    }

    .feature-card h4 {
        font-size: 1.25rem;
        font-weight: 800;
        margin-bottom: 12px;
        color: #020617;
    }

    .feature-card p {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
    }

    /* ================= MOBILE ================= */
    @media (max-width: 768px) {
        .hero-section {
            padding: 70px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.2rem;
        }

        .hero-illustration {
            font-size: 11rem;
            margin-top: 30px;
        }
    }
</style>