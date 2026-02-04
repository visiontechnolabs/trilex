<!-- Home Page -->
<div id="home" class="page active">

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 hero-content">
                    <span class="badge">Trilex Advisory</span>

                    <h1>
                        From <span class="gradient-text">Vision</span> to
                        <span class="gradient-text">Vanguard</span> —
                        Leading the Next Era of Finance, Law & Technology
                    </h1>

                    <p>
                        Empowering a smarter world through Finance, Law & Technology with
                        <strong>Trilex Advisory</strong>. We combine innovation, strategy, and compliance
                        to help businesses thrive in the digital age.
                    </p>

                    <div class="hero-buttons">
                        <a href="<?= site_url('product') ?>" class="btn-primary-custom">
                            Explore Products <i class="fas fa-arrow-right"></i>
                        </a>

                        <a href="<?= site_url('about') ?>" class="btn-secondary-custom">
                            Learn More <i class="fas fa-info-circle"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <i class="fas fa-chart-line hero-illustration"></i>
                </div>

            </div>
        </div>
    </section>

    <!-- TRUSTED BY -->
    <section class="trusted-section">
        <div class="container text-center">
            <h5>Trusted by innovative companies worldwide</h5>
            <div class="trusted-logos">
                <i class="fab fa-google"></i>
                <i class="fab fa-microsoft"></i>
                <i class="fab fa-amazon"></i>
                <i class="fab fa-apple"></i>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
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
                        Bridging Finance, Law & Technology to shape the future globally.
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
                        Turning complex challenges into transformative opportunities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title text-white">What We Do</h2>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="service-box">
                        <i class="fas fa-balance-scale"></i>
                        <h4>Legal Advisory</h4>
                        <p>Smart legal strategies for modern businesses.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box">
                        <i class="fas fa-chart-pie"></i>
                        <h4>Financial Consulting</h4>
                        <p>Data-driven financial planning and growth.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box">
                        <i class="fas fa-laptop-code"></i>
                        <h4>Technology Solutions</h4>
                        <p>Digital transformation with cutting-edge tech.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats-section">
        <div class="container text-center">
            <div class="row">

                <div class="col-md-4">
                    <h2>120+</h2>
                    <p>Clients Served</p>
                </div>

                <div class="col-md-4">
                    <h2>45+</h2>
                    <p>Global Partners</p>
                </div>

                <div class="col-md-4">
                    <h2>10+</h2>
                    <p>Years Experience</p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container text-center">
            <h2>Ready to Transform Your Business?</h2>
            <p>Let’s build the future together with Trilex Advisory.</p>
            <a href="<?= site_url('contact') ?>" class="btn-primary-custom">
                Contact Us <i class="fas fa-phone"></i>
            </a>
        </div>
    </section>

</div>

<style>
    
    :root {
        --brand-teal: #0B3C5D;
        --brand-teal-light: #E7F1F7;
        --brand-teal-soft: #F1F7FA;
        --brand-teal-dark: #072A42;
        --text-dark: #0F172A;
        --text-muted: #475569;
    }

    /* ================= HERO SECTION ================= */

    .hero-section {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #f8fafc, var(--brand-teal-light));
        overflow: hidden;
    }

    .hero-section::after {
        content: "";
        position: absolute;
        right: -200px;
        top: -200px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(11, 107, 107, 0.12), transparent 70%);
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 900;
        line-height: 1.25;
        color: var(--text-dark);
    }

    .hero-section p {
        font-size: 1.1rem;
        color: var(--text-muted);
        max-width: 520px;
    }

    /* Badge (fixed color) */
    .badge {
        background: rgba(11, 107, 107, 0.12);
        color: var(--brand-teal);
        padding: 6px 14px;
        border-radius: 999px;
        font-weight: 700;
    }

    /* Gradient text above buttons (NO PURPLE) */
    .gradient-text {
        background: linear-gradient(135deg, var(--brand-teal), #0d8a8a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* ================= BUTTONS ================= */

    .hero-buttons {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    /* PRIMARY BUTTON — KEEP YOUR COLOR */
    .btn-primary-custom {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 30px;
        border-radius: 14px;
        font-weight: 700;
        background: linear-gradient(135deg, var(--brand-teal), #0d8a8a);
        color: white;
        text-decoration: none;
        box-shadow: 0 12px 28px rgba(11, 107, 107, 0.35);
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 40px rgba(11, 107, 107, 0.45);
    }

    /* LEARN MORE — MATCHES EXPLORE PRODUCTS */
    .btn-secondary-custom {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 30px;
        border-radius: 14px;
        font-weight: 700;

        background: transparent;
        color: var(--brand-teal);
        border: 2px solid var(--brand-teal);

        text-decoration: none;
        box-shadow: 0 8px 18px rgba(11, 107, 107, 0.12);
        transition: all 0.3s ease;
    }

    .btn-secondary-custom:hover {
        background: var(--brand-teal);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(11, 107, 107, 0.25);
    }

    /* Hero icon — NO PURPLE */
    .hero-illustration {
        font-size: 16rem;
        color: var(--brand-teal);
        opacity: 0.12;
    }

    /* ================= SECTION TITLES ================= */

    .section-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 900;
        margin-bottom: 60px;
        color: var(--text-dark);
    }

    /* ================= FEATURES ================= */

    .feature-card {
        background: white;
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

    /* Feature icons — NO PURPLE */
    .feature-icon {
        width: 72px;
        height: 72px;
        margin: 0 auto 22px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        background: linear-gradient(135deg, var(--brand-teal), #0d8a8a);
        box-shadow: 0 12px 30px rgba(11, 107, 107, 0.35);
    }

    .feature-card h4 {
        font-size: 1.25rem;
        font-weight: 800;
        margin-bottom: 12px;
        color: var(--text-dark);
    }

    .feature-card p {
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    /* ================= TRUSTED SECTION ================= */

    .trusted-section {
        padding: 40px 0;
        background: #f8fafc;
    }

    .trusted-logos i {
        font-size: 40px;
        margin: 0 20px;
        color: var(--brand-teal);
    }

    /* ================= SERVICES SECTION ================= */

    .services-section {
        background: linear-gradient(135deg, var(--brand-teal), #0d8a8a);
        padding: 80px 0;
    }

    .service-box {
        background: white;
        padding: 30px;
        border-radius: 16px;
        text-align: center;
    }

    .service-box h4 {
        color: var(--text-dark);
    }

    .service-box p {
        color: var(--text-muted);
    }

    .service-box i {
        font-size: 40px;
        color: var(--brand-teal);
    }

    /* ================= STATS SECTION ================= */

    .stats-section {
        padding: 60px 0;
        background: var(--brand-teal-soft);
    }

    .stats-section h2 {
        font-size: 3rem;
        font-weight: 900;
        color: var(--brand-teal);
    }

    .stats-section p {
        color: var(--text-muted);
    }

    /* ================= CTA SECTION ================= */

    .cta-section {
        padding: 80px 0;
        background: var(--text-dark);
        color: white;
    }

    .cta-section p {
        color: #e5e7eb;
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

        .hero-buttons {
            justify-content: center;
        }
    }
</style>