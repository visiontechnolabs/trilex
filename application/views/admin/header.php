<!doctype html>

<html lang="en" data-bs-theme="light">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme Script - Must run before any CSS -->
    <script>
        // Immediately set theme to prevent flash
        (function () {
            try {
                // Add a class to hide content until theme is ready
                document.documentElement.classList.add('theme-loading');

                var savedTheme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', savedTheme);

                // Pre-apply critical dark styles to prevent flash
                if (savedTheme === 'dark') {
                    var style = document.createElement('style');
                    style.id = 'critical-theme-styles';
                    style.textContent = `
                        body { background-color: #212529 !important; color: #dee2e6 !important; }
                        .sidebar-wrapper { background-color: #1a202c !important; }
                        .main-header { background-color: #1a202c !important; }
                        .page-wrapper { background-color: #212529 !important; }
                        .card { background-color: #2d3748 !important; border-color: #4a5568 !important; color: #e2e8f0 !important; }
                        .bg-white, .bg-light { background-color: #2d3748 !important; }
                        .text-dark { color: #e2e8f0 !important; }
                        .table { background-color: #2d3748 !important; color: #e2e8f0 !important; }
                        .table thead th { background-color: #1a202c !important; color: #e2e8f0 !important; }
                        .form-control, .form-select { background-color: #374151 !important; border-color: #4a5568 !important; color: #e2e8f0 !important; }
                    `;
                    document.head.appendChild(style);
                }

                // Remove loading class after a short delay to ensure styles are applied
                setTimeout(function () {
                    document.documentElement.classList.remove('theme-loading');
                }, 10);

            } catch (e) {
                // Fallback if localStorage is not available
                document.documentElement.setAttribute('data-bs-theme', 'light');
                document.documentElement.classList.remove('theme-loading');
            }
        })();
    </script>

    <style>
        .theme-loading * {
            visibility: hidden !important;
        }

        .theme-loading {
            background: #fff !important;
        }

        [data-bs-theme="dark"].theme-loading {
            background: #212529 !important;
        }
    </style>

    <!--favicon-->

    <link rel="icon" href="<?= base_url('assets/images/android-chrome-192x192.png') ?>" type="image/png">

    <!--plugins-->

    <link href="<?= base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/plugins/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">

    <!-- loader-->

    <link href="<?= base_url('assets/css/pace.min.css') ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/js/pace.min.js') ?>"></script>

    <!-- Bootstrap CSS -->

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/bootstrap-extended.css') ?>" rel="stylesheet">

    <!-- Google Fonts (CDN) -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- App Styles -->

    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Theme Style CSS -->

    <link rel="stylesheet" href="<?= base_url('assets/sass/dark-theme.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/sass/semi-dark.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/sass/bordered-theme.css') ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <title>Admin-Trilex Advisory</title>

    <style>
        /* ====== CLEAN COLLAPSE BEHAVIOR ====== */

        /* When sidebar is collapsed */
        .wrapper.toggled .logo-text-wrapper {
            display: none !important;
            /* REMOVE TEXT COMPLETELY */
        }

        /* Make logo smaller in collapsed mode */
        .wrapper.toggled .admin-logo {
            width: 34px !important;
            height: 34px !important;
        }

        /* Keep normal size when open */
        .admin-logo {
            width: 44px;
            height: 44px;
            transition: all 0.25s ease;
        }

        /* Nice logo container */
        .logo-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, #6366f1, #22c55e);
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">

            <div class="sidebar-header">
                <div class="d-flex align-items-center gap-2 w-100">

                    <!-- Logo -->
                    <div class="logo-wrapper">
                        <a href="<?= base_url('home') ?>">
                            <img src="<?= base_url('assets/images/logo_new.png'); ?>" class="admin-logo"
                                alt="Trilex Logo" style="border-radius: 50%;">
                        </a>
                    </div>

                    <!-- Text (will disappear when sidebar collapses) -->
                    <div class="logo-text-wrapper">
                        <h5 class="logo-text mb-0 fw-bold">Trilex</h5>
                        <small class="text-muted">Admin Dashboard</small>
                    </div>

                    <div class="mobile-toggle-icon ms-auto"
                        onclick="document.querySelector('.wrapper').classList.toggle('toggled')">
                        <i class="bx bx-x"></i>
                    </div>
                </div>
            </div>

            <!--navigation-->

            <ul class="metismenu" id="menu">

                <li>

                    <a href="<?= base_url('dashboard'); ?>" class="">

                        <div class="parent-icon"><i class='bx bx-home-alt'></i></div>

                        <div class="menu-title">Dashboard</div>

                    </a>

                </li>



                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-category'></i></div> <!-- Post -->
                        <div class="menu-title">Post</div>
                    </a>
                    <ul>
                        <li><a href="<?= base_url('post'); ?>"><i class='bx bx-list-ul'></i>All Post</a></li>
                        <li><a href="<?= base_url('add_post'); ?>"><i class='bx bx-plus-circle'></i>Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bxl-blogger'></i></div> <!-- Blog main -->
                        <div class="menu-title">Blog</div>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= base_url('blogs'); ?>"><i class='bx bx-news'></i>All Blogs</a>
                        </li>
                        <li>
                            <a href="<?= base_url('add_blog'); ?>"><i class='bx bx-pencil'></i>Add New</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cog'></i></div> <!-- Blog main -->
                        <div class="menu-title">Services</div>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= base_url('all_service'); ?>"><i class='bx bx-cog'></i>All Service</a>
                        </li>
                        <li>
                            <a href="<?= base_url('add_service'); ?>"><i class='bx bx-pencil'></i>Add New</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="<?= base_url('order'); ?>" class="">
                        <div class="parent-icon"><i class='bx bx-message-dots'></i></div>
                        <div class="menu-title">Orders</div>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('customer'); ?>" class="">
                        <div class="parent-icon"><i class='bx bx-user'></i></div>
                        <div class="menu-title">Users</div>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('blog_category'); ?>" class="">
                        <div class="parent-icon"><i class='bx bx-collection'></i></div>
                        <div class="menu-title">Blog Category</div>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('service_category'); ?>" class="">
                        <div class="parent-icon"><i class='bx bx-category'></i></div>
                        <div class="menu-title">Service Category</div>
                    </a>
                </li>


                <li>
                    <a href="<?= base_url('logout'); ?>" class="">
                        <div class="parent-icon"><i class='bx bx-log-out'></i></div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>

            </ul>



            <!--end navigation-->

        </div>

        <!--end sidebar wrapper -->

        <!--start header -->

        <header>

            <div class="topbar">

                <nav class="navbar navbar-expand gap-2 align-items-center">

                    <button class="mobile-toggle-menu" type="button"
                        style="border: none; background: none; font-size: 26px; color: #404142; cursor: pointer;"
                        onclick="
                        var wrapper = document.querySelector('.wrapper'); 
                        wrapper.classList.toggle('toggled'); 
                        if (window.innerWidth > 1024) 
                            { 
                                var logo = document.querySelector('.admin-logo'); 
                                var text = document.querySelector('.logo-text-wrapper'); 
                                
                                if (logo && text) 
                                { 
                                    if (wrapper.classList.contains('toggled')) 
                                    { 
                                        logo.style.display = 'block'; 
                                        logo.style.width = '40px'; 
                                        text.style.display = 'none'; 
                                    } 
                                     else 
                                    { 
                                        logo.style.display = 'block'; 
                                        logo.style.width = '100px'; 
                                        text.style.display = 'block'; 
                                    } 
                                } 
                            }">
                        <i class='bx bx-menu'></i>
                    </button>

                    <!-- Theme Toggle Button -->
                    <button class="theme-toggle-btn" type="button" id="themeToggle"
                        style="border: none; background: none; font-size: 20px; color: #404142; cursor: pointer; margin-left: 10px; padding: 8px; border-radius: 50%; transition: all 0.3s ease;"
                        title="Toggle Theme">
                        <i class='bx bx-moon' id="themeIcon"></i>
                    </button>
                </nav>
            </div>
        </header>

        <!--end header -->

        <!--start page wrapper -->