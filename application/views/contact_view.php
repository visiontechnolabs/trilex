<div class="container py-5">
    <div id="contact" class="page">

        <!-- Hero Section -->
        <div class="contact-hero">
            <h1>Get In Touch</h1>
            <p>We’re here to help. Reach out to us through any of the following ways.</p>
        </div>

        <div class="contact-container">

            <!-- Contact Cards -->
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon phone">📞</div>
                    <h3>Phone</h3>
                    <p><a href="tel:+1234567890">+1 (234) 567-8900</a></p>
                    <span>Available during business hours</span>
                </div>

                <div class="contact-card">
                    <div class="contact-icon email">✉️</div>
                    <h3>Email</h3>
                    <p><a href="mailto:trilexadvisory@gmail.com">trilexadvisory@gmail.com</a></p>
                    <span>Response within 24 hours</span>
                </div>

                <div class="contact-card">
                    <div class="contact-icon location">📍</div>
                    <h3>Office Address</h3>
                    <p>
                        123 Business Avenue<br>
                        Suite 100<br>
                        New York, NY 10001
                    </p>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="info-section">
                <h2>Business Hours</h2>
                <div class="info-box">
                    <div class="info-row">
                        <span>Monday – Friday</span>
                        <strong>9:00 AM – 6:00 PM</strong>
                    </div>
                    <div class="info-row">
                        <span>Saturday</span>
                        <strong>10:00 AM – 4:00 PM</strong>
                    </div>
                    <div class="info-row">
                        <span>Sunday</span>
                        <strong>Closed</strong>
                    </div>
                </div>
            </div>

            <!-- Contact Person -->
            <div class="info-section">
                <h2>Contact Person</h2>
                <div class="info-box">
                    <div class="info-row">
                        <span>Name</span>
                        <strong>Owen Mitchell</strong>
                    </div>
                    <div class="info-row">
                        <span>Designation</span>
                        <strong>Business Manager</strong>
                    </div>
                    <div class="info-row">
                        <span>Email</span>
                        <strong><a href="mailto:owen@company.com">owen@company.com</a></strong>
                    </div>
                    <div class="info-row">
                        <span>Phone</span>
                        <strong><a href="tel:+1234567891">+1 (234) 567-8901</a></strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Hero */
    .contact-hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 3rem;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .contact-hero p {
        color: #cbd5f5;
    }

    /* Layout */
    .contact-container {
        max-width: 1100px;
        margin: auto;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 2rem;
    }

    /* Cards */
    .contact-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 18px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .contact-icon {
        width: 70px;
        height: 70px;
        margin: auto;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .phone {
        background: #dbeafe;
    }

    .email {
        background: #dcfce7;
    }

    .location {
        background: #fee2e2;
    }

    .contact-card h3 {
        margin-bottom: 0.5rem;
        color: #0f172a;
    }

    .contact-card p a {
        text-decoration: none;
        color: #2563eb;
        font-weight: 500;
    }

    .contact-card span {
        font-size: 0.9rem;
        color: #64748b;
    }

    /* Info Sections */
    .info-section {
        margin-top: 3.5rem;
    }

    .info-section h2 {
        margin-bottom: 1.2rem;
        color: #0f172a;
    }

    .info-box {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.8rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-row span {
        color: #64748b;
    }

    .info-row a {
        text-decoration: none;
        color: #2563eb;
    }
</style>