<!--start overlay-->

		 <div class="overlay mobile-toggle-icon"></div>

		<!--end overlay-->

		<!--Start Back To Top Button-->

		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

		<!--End Back To Top Button-->
	</div>

	<!--end wrapper-->

    <!-- Bootstrap JS -->

	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>



<!--plugins-->

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- SweetAlert2 CDN -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>

  const site_url = "<?= base_url() ?>";

</script>

<script src="<?= base_url('assets/js/app.js') ?>"></script>



<script src="<?= base_url('assets/plugins/simplebar/js/simplebar.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/metismenu/js/metisMenu.min.js') ?>"></script>

<script>
  $('#menu').metisMenu();
</script>

<script src="<?= base_url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') ?>"></script>


<!--app JS-->

<script src="<?= base_url('assets/js/index.js') ?>"></script>

<script src="<?= base_url('assets/plugins/peity/jquery.peity.min.js') ?>"></script>



    <script>

       $(".data-attributes span").peity("donut")

    </script>

    <!-- Theme Toggle JavaScript -->
    <!-- <script>
        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const htmlElement = document.documentElement;

            // Function to set theme
            function setTheme(theme) {
                htmlElement.setAttribute('data-bs-theme', theme);
                localStorage.setItem('theme', theme);

                // Update icon
                if (theme === 'dark') {
                    themeIcon.className = 'bx bx-sun';
                    themeToggle.style.color = '#ffffff';
                    themeToggle.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
                } else {
                    themeIcon.className = 'bx bx-moon';
                    themeToggle.style.color = '#404142';
                    themeToggle.style.backgroundColor = 'transparent';
                }

                // Apply additional dark theme fixes
                applyThemeFixes(theme);
            }

            // Function to apply additional theme fixes
            function applyThemeFixes(theme) {
                const styleId = 'theme-fixes';
                let styleElement = document.getElementById(styleId);

                if (!styleElement) {
                    styleElement = document.createElement('style');
                    styleElement.id = styleId;
                    document.head.appendChild(styleElement);
                }

                if (theme === 'dark') {
                    styleElement.textContent = `
                        [data-bs-theme="dark"] .card,
                        [data-bs-theme="dark"] .bg-white,
                        [data-bs-theme="dark"] .bg-light {
                            background-color: #2d3748 !important;
                            border-color: #4a5568 !important;
                        }
                        [data-bs-theme="dark"] .text-dark {
                            color: #e2e8f0 !important;
                        }
                        [data-bs-theme="dark"] .border {
                            border-color: #4a5568 !important;
                        }
                        [data-bs-theme="dark"] .table {
                            background-color: #2d3748;
                            color: #e2e8f0;
                        }
                        [data-bs-theme="dark"] .table thead th {
                            background-color: #1a202c;
                            border-color: #4a5568;
                            color: #e2e8f0;
                        }
                        [data-bs-theme="dark"] .table tbody tr {
                            background-color: #2d3748;
                            border-color: #4a5568;
                        }
                        [data-bs-theme="dark"] .table tbody tr:hover {
                            background-color: #374151;
                        }
                        [data-bs-theme="dark"] .form-control,
                        [data-bs-theme="dark"] .form-select {
                            background-color: #374151;
                            border-color: #4a5568;
                            color: #e2e8f0;
                        }
                        [data-bs-theme="dark"] .form-control:focus,
                        [data-bs-theme="dark"] .form-select:focus {
                            background-color: #374151;
                            border-color: #63b3ed;
                            color: #e2e8f0;
                        }
                        [data-bs-theme="dark"] .btn-outline-primary {
                            color: #63b3ed;
                            border-color: #63b3ed;
                        }
                        [data-bs-theme="dark"] .btn-outline-primary:hover {
                            background-color: #63b3ed;
                            color: #1a202c;
                        }
                        [data-bs-theme="dark"] .sidebar-wrapper,
                        [data-bs-theme="dark"] .main-header {
                            background-color: #1a202c;
                            border-color: #4a5568;
                        }
                        [data-bs-theme="dark"] .page-wrapper {
                            background-color: #212529;
                        }
                        [data-bs-theme="dark"] .breadcrumb {
                            background-color: #2d3748;
                            border-color: #4a5568;
                        }
                        [data-bs-theme="dark"] .breadcrumb-item a {
                            color: #63b3ed;
                        }
                        [data-bs-theme="dark"] .breadcrumb-item.active {
                            color: #e2e8f0;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-success {
                            background-color: #28a745 !important;
                            border-color: #28a745 !important;
                            color: #fff !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-success:hover {
                            background-color: #218838 !important;
                            border-color: #1e7e34 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-warning {
                            background-color: #ffc107 !important;
                            border-color: #ffc107 !important;
                            color: #212529 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-warning:hover {
                            background-color: #e0a800 !important;
                            border-color: #d39e00 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-danger {
                            background-color: #dc3545 !important;
                            border-color: #dc3545 !important;
                            color: #fff !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-danger:hover {
                            background-color: #c82333 !important;
                            border-color: #bd2130 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-success {
                            background-color: #28a745 !important;
                            border-color: #28a745 !important;
                            color: #fff !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-success:hover {
                            background-color: #218838 !important;
                            border-color: #1e7e34 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-warning {
                            background-color: #ffc107 !important;
                            border-color: #ffc107 !important;
                            color: #212529 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-warning:hover {
                            background-color: #e0a800 !important;
                            border-color: #d39e00 !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-danger {
                            background-color: #dc3545 !important;
                            border-color: #dc3545 !important;
                            color: #fff !important;
                        }
                        [data-bs-theme="dark"] .action-buttons .btn-danger:hover {
                            background-color: #c82333 !important;
                            border-color: #bd2130 !important;
                        }
                    `;
                } else {
                    styleElement.textContent = '';
                }
            }

            // Function to toggle theme
            function toggleTheme() {
                const currentTheme = htmlElement.getAttribute('data-bs-theme') || 'light';
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                setTheme(newTheme);
            }

            // Get current theme and apply fixes (theme is already set in header)
            const currentTheme = htmlElement.getAttribute('data-bs-theme') || 'light';
            applyThemeFixes(currentTheme);

            // Update button icon based on current theme
            if (currentTheme === 'dark') {
                themeIcon.className = 'bx bx-sun';
                themeToggle.style.color = '#ffffff';
                themeToggle.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
            } else {
                themeIcon.className = 'bx bx-moon';
                themeToggle.style.color = '#404142';
                themeToggle.style.backgroundColor = 'transparent';
            }

            // Ensure theme loading is complete
            document.documentElement.classList.remove('theme-loading');

            // Clean up critical styles after proper styles are loaded
            setTimeout(function() {
                const criticalStyles = document.getElementById('critical-theme-styles');
                if (criticalStyles) {
                    criticalStyles.remove();
                }
            }, 100);

            // Add click event listener to theme toggle button
            if (themeToggle) {
                themeToggle.addEventListener('click', toggleTheme);
            }
        });
    </script> -->

</body>



</html>