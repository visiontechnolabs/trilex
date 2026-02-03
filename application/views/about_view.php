<div id="about" class="page">
    <div class="container py-5">

        <!-- Hero -->
        <div class="about-hero">
            <h1>About Our Company</h1>
            <p>Delivering excellence, trust, and innovation for a smarter future</p>
        </div>

        <div class="about-content">

            <!-- Story -->
            <div class="about-section">
                <h2>Our Story</h2>
                <p>
                    Founded in 2020, our company emerged with a clear vision — to redefine industry standards through
                    innovation, integrity, and client-focused solutions. What began as a small team of passionate
                    professionals has evolved into a trusted organization serving clients across diverse sectors.
                </p>
                <p>
                    Our growth has been driven by strong relationships, consistent performance, and an unwavering
                    commitment to quality. We measure our success by the long-term value we create for our clients.
                </p>
            </div>

            <!-- Mission -->
            <div class="about-section highlight">
                <h2>Our Mission</h2>
                <p>
                    To empower businesses and individuals with reliable, innovative, and result-driven solutions
                    that foster sustainable growth and long-term success in an ever-evolving global landscape.
                </p>
            </div>

            <!-- Values -->
            <div class="about-section">
                <h2>Our Core Values</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">🎯</div>
                        <h3>Excellence</h3>
                        <p>We uphold the highest standards of quality and precision in every engagement.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">💡</div>
                        <h3>Innovation</h3>
                        <p>We embrace change, creativity, and forward-thinking solutions to stay ahead.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">🤝</div>
                        <h3>Integrity</h3>
                        <p>We operate with honesty, transparency, and strong ethical principles.</p>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="about-section highlight">
                <h2>Why Choose Us?</h2>
                <p>
                    Our experienced team, industry expertise, and proven methodologies make us a reliable partner
                    for your business. We combine strategic insight with practical execution to deliver measurable,
                    impactful results that truly matter.
                </p>
            </div>

        </div>
    </div>
</div>

<style>
    /* Hero */
    .about-hero {
        text-align: center;
        padding: 3.5rem 1.5rem;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
        color: #fff;
        border-radius: 18px;
        margin-bottom: 3.5rem;
    }

    .about-hero h1 {
        font-size: 2.6rem;
        margin-bottom: 0.6rem;
    }

    .about-hero p {
        color: #c7d2fe;
        max-width: 700px;
        margin: auto;
    }

    /* Content */
    .about-content {
        max-width: 1000px;
        margin: auto;
    }

    .about-section {
        margin-bottom: 3rem;
    }

    .about-section h2 {
        color: #0f172a;
        margin-bottom: 1rem;
    }

    .about-section p {
        color: #475569;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    /* Highlight Section */
    .about-section.highlight {
        background: #f8fafc;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.06);
    }

    /* Values */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.8rem;
        margin-top: 1.5rem;
    }

    .value-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 45px rgba(0, 0, 0, 0.15);
    }

    .value-icon {
        width: 64px;
        height: 64px;
        margin: auto;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 1.6rem;
        background: #e0e7ff;
        margin-bottom: 1rem;
    }

    .value-card h3 {
        margin-bottom: 0.5rem;
        color: #0f172a;
    }

    .value-card p {
        color: #64748b;
        font-size: 0.95rem;
    }
</style>