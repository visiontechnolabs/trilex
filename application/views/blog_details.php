<style>
    .media-section {
        display: flex;
        justify-content: center;
        margin: 40px 0;
    }

    .media-wrapper {
        width: 100%;
        max-width: 900px;
        aspect-ratio: 16 / 9;
        background: #f5f7fa;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .media-wrapper img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .media-wrapper:hover img {
        transform: scale(1.03);
    }

    .content-section {
        max-width: 900px;
        margin: auto;
    }

    .product-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product-subtitle {
        font-size: 0.95rem;
        margin-bottom: 25px;
    }

    .description-section {
        margin-top: 40px;
    }

    .description-header {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .description-content {
        font-size: 1rem;
        line-height: 1.8;
        color: #444;
    }

    .description-content p {
        margin-bottom: 15px;
    }
    
    @media (max-width: 768px) {
        .product-title {
            font-size: 1.8rem;
        }

        .media-wrapper {
            border-radius: 12px;
        }
    }
</style>

<?php if (!empty($blogs)): ?>

    <div class="container mt-4 mb-5">
 
        <!-- BLOG IMAGE -->
        <div class="media-section">
            <div class="media-wrapper">
                <?php if (!empty($blogs->file_path)): ?>
                    <img src="<?= base_url($blogs->file_path); ?>" alt="<?= htmlspecialchars($blogs->title); ?>" loading="lazy">
                <?php else: ?>
                    <img src="https://via.placeholder.com/1200x600?text=No+Image" alt="No Image">
                <?php endif; ?>
            </div>
        </div>

        <!-- BLOG CONTENT -->
        <div class="content-section">

            <!-- CATEGORY -->
            <?php if (!empty($blogs->category_title)):
                $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $blogs->category_title));
                ?>
                <p class="text-muted mb-2">
                    Category:
                    <a href="<?= base_url('blog/category/' . $blogs->category_id . '/' . $slug); ?>">
                        <?= htmlspecialchars($blogs->category_title); ?>
                    </a>
                </p>
            <?php endif; ?>

            <!-- TITLE -->
            <h1 class="product-title">
                <?= htmlspecialchars($blogs->title); ?>
            </h1>

            <!-- META -->
            <p class="product-subtitle text-muted">
                Published on <?= date('F d, Y', strtotime($blogs->created_on)); ?> · By Admin
            </p>

            <!-- DESCRIPTION -->
            <div class="description-section">
                <h2 class="description-header">Blog Details</h2>
                <div class="description-content">
                    <?= $blogs->description; ?>
                </div>
            </div>

        </div>
    </div>

<?php else: ?>

    <div class="container text-center py-5">
        <h3>Blog not found</h3>
        <a href="<?= base_url('blog'); ?>" class="btn btn-primary mt-3">
            Back to Blogs
        </a>
    </div>

<?php endif; ?>