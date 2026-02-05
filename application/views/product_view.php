<style>
    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }

    .product-hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 1rem;
    }

    .product-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .product-hero p {
        color: #cbd5f5;
    }

    /* ---------- GRID ---------- */
    #product-container {
        row-gap: 36px;
    }

    /* ---------- PRODUCT CARD ---------- */
    .product-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #e5e7eb;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 28px 60px rgba(15, 23, 42, 0.22);
    }

    /* ---------- MEDIA ---------- */
    .product-card .media {
        position: relative;
        aspect-ratio: 16 / 9;
        background: #020617;
        overflow: hidden;
    }

    /* subtle overlay */
    .product-card .media::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom,
                rgba(2, 6, 23, 0.05),
                rgba(2, 6, 23, 0.35));
        pointer-events: none;
    }

    .product-card img,
    .product-card video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .product-card:hover img,
    .product-card:hover video {
        transform: scale(1.06);
    }

    /* ---------- BODY ---------- */
    .product-card-body {
        padding: 22px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* Title */
    .product-card-title {
        font-size: 18px;
        font-weight: 700;
        color: #020617;
        margin-bottom: 12px;
        line-height: 1.4;

        /* Clamp */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
    }

    /* Price */
    .product-card-price {
        font-size: 21px;
        font-weight: 800;
        color: #16a34a;
        margin-bottom: 18px;
    }

    /* ---------- BUTTON ---------- */
    .product-card .btn {
        margin-top: auto;
        padding: 13px;
        border-radius: 14px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #ffffff;
        font-weight: 700;
        border: none;
        transition: all 0.3s ease;
    }

    .product-card .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 26px rgba(99, 102, 241, 0.45);
    }

    /* ---------- PAGINATION ---------- */
    #pagination-container {
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        gap: 10px;
    }

    .pagination a {
        padding: 10px 16px;
        border-radius: 12px;
        background: #f1f5f9;
        color: #020617;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .pagination a:hover {
        background: #6366f1;
        color: #ffffff;
    }

    .pagination a.active {
        background: #4f46e5;
        color: #ffffff;
        box-shadow: 0 6px 18px rgba(79, 70, 229, 0.4);
    }

    /* ---------- MOBILE ---------- */
    @media (max-width: 768px) {
        .hero-section {
            padding: 60px 0;
        }

        .hero-section h1 {
            font-size: 34px;
        }

        .hero-section p {
            font-size: 15px;
        }

        .product-card-body {
            padding: 18px;
        }
    }
</style>

<div id="products" class="page active">
    <section class="hero-section">
        <div class="container text-center product-hero">
            <h1 class="display-4 fw-bold">Our Products</h1>
            <p class="lead">Choose the perfect automation tool for your practice</p>
        </div>
    </section>

    <div class="container py-5" style="max-width:1050px;">
        <div class="row" id="product-container"></div>
        <div id="pagination-container" class="mt-4"></div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        function isMobile() {
            return window.innerWidth <= 768;
        }

        function loadProducts(page = 1) {
            $.ajax({
                url: "<?= base_url('product/fetch_products') ?>",
                type: "GET",
                data: {
                    page: page,
                    device: isMobile() ? 'mobile' : 'desktop'
                },
                dataType: "json",
                success: function(res) {
                    $("#product-container").html(res.html);
                    $("#pagination-container").html(res.pagination);
                }
            });
        }

        loadProducts();

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).data('page');
            loadProducts(page);
        });

        $(window).on('resize', function() {
            loadProducts(1); // reload for new device layout
        });
    });
</script>