<div id="blogs" class="page active">

    <!-- HERO -->
    <section class="hero-section">
        <div class="container text-center blog-hero">
            <h1 class="display-4 fw-bold">Our Blogs</h1>
            <p class="lead">Read insights, guides, and updates from our experts</p>
        </div>
    </section>

    <div class="container py-5" style="max-width:1050px;">

        <!-- CATEGORY FILTER -->
        <div class="category-filter">
            <h4><i class="fas fa-filter me-2"></i>Filter by Category</h4>

            <div class="category-scroll">
                <button class="category-btn active" data-id="all">All Blogs</button>
                <?php foreach ($categories as $cat): ?>
                    <button class="category-btn" data-id="<?= $cat->id; ?>">
                        <?= htmlspecialchars($cat->title); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- BLOG LIST (AJAX ONLY – SINGLE SOURCE) -->
        <div class="row" id="blogContainer"></div>

    </div>
</div>

<!-- ================= CSS (REQUIRED) ================= -->
<style>
    .blog-hero {
        text-align: center;
        padding: 3rem 1rem;
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
        color: #fff;
        border-radius: 16px;
        margin-bottom: 1rem;
    }

    .blog-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .blog-hero p {
        color: #cbd5f5;
    }

    /* Blog Card Layout */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    /* Image */
    .product-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    /* Title */
    .card-title {
        min-height: 56px;
    }

    .card-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #666;

        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;

        margin-bottom: 20px;
    }

    /* Button at Bottom */
    .card-body .btn {
        margin-top: auto;
    }

    /* No results */
    .no-results {
        padding: 60px 0;
        color: #777;
    }

    /* ================= CATEGORY FILTER UI ================= */

    .category-filter {
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        margin-bottom: 50px;
    }

    .category-filter h4 {
        font-weight: 600;
        margin-bottom: 20px;
        color: #222;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .category-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }

    /* Button */
    .category-btn {
        padding: 10px 26px;
        border-radius: 30px;
        border: 2px solid #6c7cff;
        background: #ffffff;
        color: #6c7cff;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    /* Hover */
    .category-btn:hover {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #ffffff;
        box-shadow: 0 6px 15px rgba(108, 124, 255, 0.35);
        transform: translateY(-2px);
    }

    /* Active */
    .category-btn.active {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #ffffff;
        box-shadow: 0 6px 18px rgba(108, 124, 255, 0.45);
    }

    /* ================= CATEGORY SCROLL BAR ================= */

    .category-scroll {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding-bottom: 10px;
        scrollbar-width: thin;
    }

    .category-scroll::-webkit-scrollbar {
        height: 6px;
    }

    .category-scroll::-webkit-scrollbar-thumb {
        background: #6c7cff;
        border-radius: 10px;
    }

    .category-btn {
        white-space: nowrap;
        padding: 10px 26px;
        border-radius: 30px;
        border: 2px solid #6c7cff;
        background: #fff;
        color: #6c7cff;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-btn:hover,
    .category-btn.active {
        background: #1C768F;
        color: #fff;
        box-shadow: 0 6px 15px rgba(108, 124, 255, 0.35);
    }

    /* ================= NO BLOG MESSAGE ================= */

    .no-blog-box {
        text-align: center;
        padding: 80px 20px;
        background: #f9fafc;
        border-radius: 16px;
        border: 1px dashed #d0d5ff;
        color: #555;
    }

    .no-blog-box i {
        font-size: 3rem;
        color: #6c7cff;
        margin-bottom: 15px;
    }

    .no-blog-box h4 {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .no-blog-box p {
        font-size: 0.95rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const buttons = document.querySelectorAll('.category-btn');
        const blogContainer = document.getElementById('blogContainer');

        // Attach click listeners FIRST
        buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                // Active state
                buttons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const categoryId = this.dataset.id;

                fetch("<?= base_url('blog/fetch'); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "category_id=" + encodeURIComponent(categoryId)
                })
                    .then(res => res.text())
                    .then(html => {
                        blogContainer.innerHTML = html;
                    })
                    .catch(err => {
                        blogContainer.innerHTML = '<div class="col-12 text-center">Error loading blogs</div>';
                        console.error(err);
                    });
            });
        });

        // ✅ AUTO LOAD ALL BLOGS (AFTER listeners exist)
        const allBtn = document.querySelector('.category-btn[data-id="all"]');
        if (allBtn) {
            allBtn.click();
        }

    });
</script>