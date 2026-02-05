<!-- Footer -->
<style>

    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }
    /* Footer Styles */
    footer {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: var(--light-color);
        padding: 60px 0 0;
        position: relative;
        overflow: hidden;
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 50%, var(--primary-color) 100%);
    }

    /* Logo Container */
    .logo-container {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        border-radius: 12px;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(28, 118, 143, 0.3);
    }

    .logo-icon {
        color: white;
        font-size: 24px;
    }

    footer h5 {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    footer h6 {
        color: #ffffff;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 12px;
    }

    footer h6::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
        border-radius: 2px;
    }

    /* Footer Description */
    footer p {
        color: var(--light-color);
        opacity: 0.9;
        line-height: 1.8;
        font-size: 0.95rem;
    }

    /* Social Media Links */
    .social-links {
        margin-top: 25px;
    }

    .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: #ffffff;
        margin-right: 12px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .social-links a:hover {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(28, 118, 143, 0.4);
    }

    /* Footer Links */
    footer ul {
        list-style: none;
        padding: 0;
    }

    footer ul li {
        margin-bottom: 12px;
    }

    footer ul li a {
        color: var(--light-color);
        opacity: 0.9;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        font-size: 0.95rem;
    }

    footer ul li a::before {
        content: '›';
        margin-right: 8px;
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--accent-color);
        transition: all 0.3s ease;
    }

    footer ul li a:hover {
        color: #ffffff;
        padding-left: 8px;
    }

    footer ul li a:hover::before {
        margin-right: 12px;
    }

    /* Contact Info */
    .contact-info {
        color: var(--light-color);
        opacity: 0.9;
    }

    .contact-info i {
        color: var(--accent-color);
        width: 25px;
        font-size: 1.1rem;
    }

    .contact-info-item {
        display: flex;
        align-items: start;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover {
        color: #ffffff;
        padding-left: 5px;
    }

    .contact-info-item:hover i {
        color: var(--primary-color);
    }

    /* Divider */
    footer hr {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        margin: 50px 0 25px;
    }

    /* Copyright Section */
    .footer-bottom {
        text-align: center;
        padding: 25px 0;
        background: rgba(1, 22, 30, 0.3);
        margin-top: 50px;
    }

    .footer-bottom p {
        margin: 0;
        color: var(--light-color);
        opacity: 0.7;
        font-size: 0.9rem;
    }

    .footer-bottom a {
        color: var(--accent-color);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-bottom a:hover {
        color: var(--primary-color);
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        footer {
            padding: 50px 0 0;
        }

        footer h5 {
            font-size: 1.3rem;
        }

        .logo-container {
            width: 45px;
            height: 45px;
        }

        .logo-icon {
            font-size: 22px;
        }
    }

    @media (max-width: 768px) {
        footer {
            padding: 40px 0 0;
            text-align: center;
        }

        footer h6::after {
            left: 50%;
            transform: translateX(-50%);
        }

        footer ul li a {
            justify-content: center;
        }

        .social-links {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .social-links a {
            margin: 0 6px;
        }

        .contact-info-item {
            justify-content: center;
            text-align: left;
        }

        footer hr {
            margin: 40px 0 20px;
        }

        .footer-bottom {
            padding: 20px 0;
            margin-top: 40px;
        }
    }

    @media (max-width: 576px) {
        footer h5 {
            font-size: 1.2rem;
            flex-direction: column;
            gap: 10px;
        }

        footer h6 {
            font-size: 1rem;
        }

        .logo-container {
            width: 40px;
            height: 40px;
        }

        .logo-icon {
            font-size: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
        }

        footer p,
        footer ul li a,
        .contact-info {
            font-size: 0.9rem;
        }
    }
</style>


<footer>
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-3">
                    <div class="logo-container d-inline-flex me-3">
                        <img src="<?= base_url('assets/images/logo_new.png'); ?>" alt="Logo" class="img-fluid">
                    </div>
                    <span>Trilex Advisories</span>
                </h5>
                <p>Professional automation tools and comprehensive solutions designed for Chartered Accountants and Tax
                    Professionals to streamline their workflow.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6>Quick Links</h6>
                <ul>
                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                    <li><a href="<?= base_url('product') ?>">Products</a></li>
                    <li><a href="<?= base_url('service') ?>">Services</a></li>
                    <li><a href="<?= base_url('about') ?>">About Us</a></li>
                    <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                    <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                </ul>
            </div>

            <!-- Products -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>Our Products</h6>
                <ul>
                    <li><a href="#">GST Tools</a></li>
                    <li><a href="#">TDS Solutions</a></li>
                    <li><a href="#">Tax Planning</a></li>
                    <li><a href="#">Audit Tools</a></li>
                    <li><a href="#">Compliance Suite</a></li>
                    <li><a href="#">Reporting Tools</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>Contact Us</h6>
                <div class="contact-info">
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        <span>Ahmedabad, Gujarat,<br>India - 380001</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone me-2"></i>
                        <span>+91 98765 43210</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope me-2"></i>
                        <span>info@trilexadvisories.com</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock me-2"></i>
                        <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p>&copy; 2026 Trilex Advisories. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p>
                        <a href="#">Privacy Policy</a> |
                        <a href="#">Terms of Service</a> |
                        <a href="#">Sitemap</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--plugins-->

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- SweetAlert2 CDN -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Mobile sidebar toggle
    const menuToggle = document.getElementById('menuToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        mobileSidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        mobileSidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    menuToggle.addEventListener('click', openSidebar);
    sidebarClose.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Close sidebar when clicking a link
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    // Active link highlighting for bottom nav
    const bottomNavLinks = document.querySelectorAll('#bottomNav a');
    bottomNavLinks.forEach(link => {
        link.addEventListener('click', function () {
            bottomNavLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Active link highlighting for sidebar
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function () {
            sidebarLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const submenuLinks = document.querySelectorAll('.has-submenu > a');

        submenuLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('open');
                const submenu = parent.querySelector('.submenu');
                if (submenu) {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                }
                // Rotate arrow
                const icon = this.querySelector('.toggle-icon');
                if (icon) icon.classList.toggle('rotated');
            });
        });
    });
</script>

</body>

</html>