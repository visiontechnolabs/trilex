<!doctype html>

<html lang="en" data-bs-theme="light">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <link href="<?= base_url('assets/sass/app.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Theme Style CSS -->

    <link rel="stylesheet" href="<?= base_url('assets/sass/dark-theme.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/sass/semi-dark.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/sass/bordered-theme.css') ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <title>Admin-Trilex Advisory</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">

            <div class="sidebar-header">
                <div>
                    <img src="<?= base_url('assets/images/logo_new.png'); ?>" class="logo-icon ms-5 mt-2"
                        style="width:100px;" alt="logo icon">
                </div>

                <!-- <div>
                    <h4 class="logo-text fw-bold ms-5">Trilex Advisory</h4>
                </div> -->
                <div class="mobile-toggle-icon ms-auto"><i class="bx bx-x"></i>
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

                    <div class="mobile-toggle-menu d-flex"><i class='bx bx-menu'></i>

                    </div>
                </nav>
            </div>
        </header>

        <!--end header -->

        <!--start page wrapper -->
