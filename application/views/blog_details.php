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

<style>
    /* Related Blogs Styles */
    .related-blogs-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 60px 0;
        margin-top: 60px;
    }

    .related-blogs-title {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 40px;
        position: relative;
    }

    .related-blogs-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(135deg, var(--secondary-color, #6c7cff) 0%, var(--dark-color, #1C768F) 100%);
        border-radius: 2px;
    }

    .related-blog-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        background: #ffffff;
    }

    .related-blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .related-blog-image {
        height: 180px;
        overflow: hidden;
    }

    .related-blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-blog-card:hover .related-blog-image img {
        transform: scale(1.05);
    }

    .related-blog-card .card-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .related-blog-card .card-title a {
        color: #333;
        transition: color 0.3s ease;
    }

    .related-blog-card .card-title a:hover {
        color: var(--secondary-color, #6c7cff);
    }

    .related-blog-card .card-text {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.5;
    }

    .related-blog-card .btn-outline-primary {
        border-color: var(--secondary-color, #6c7cff);
        color: var(--secondary-color, #6c7cff);
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
    }

    .related-blog-card .btn-outline-primary:hover {
        background: var(--secondary-color, #6c7cff);
        border-color: var(--secondary-color, #6c7cff);
        color: #fff;
    }

    @media (max-width: 768px) {
        .related-blogs-title {
            font-size: 1.6rem;
            margin-bottom: 30px;
        }

        .related-blog-card {
            margin-bottom: 20px;
        }

        .related-blog-image {
            height: 150px;
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

        <!-- RELATED BLOGS -->
        <div class="related-blogs-section mt-5">
            <div class="container">

                <h3 class="related-blogs-title text-center mb-4">Related Blogs</h3>

                <?php if (!empty($related_blogs)): ?>

                    <div class="row">
                        <?php foreach ($related_blogs as $related_blog): ?>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card related-blog-card h-100">
                                    <div class="related-blog-image">
                                        <?php if (!empty($related_blog->file_path)): ?>
                                            <img src="<?= base_url($related_blog->file_path); ?>" class="card-img-top"
                                                alt="<?= htmlspecialchars($related_blog->title); ?>">
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top"
                                                alt="No Image">
                                        <?php endif; ?>
                                    </div>

                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">
                                            <a href="<?= base_url('blog/detail/' . $related_blog->id); ?>"
                                                class="text-decoration-none">
                                                <?= htmlspecialchars(substr($related_blog->title, 0, 50)); ?>
                                                <?= strlen($related_blog->title) > 50 ? '...' : ''; ?>
                                            </a>
                                        </h6>

                                        <p class="card-text flex-grow-1">
                                            <?= htmlspecialchars(substr(strip_tags($related_blog->description), 0, 80)); ?>
                                            <?= strlen(strip_tags($related_blog->description)) > 80 ? '...' : ''; ?>
                                        </p>

                                        <div class="mt-auto">
                                            <small class="text-muted">
                                                <?= date('M j, Y', strtotime($related_blog->created_on)); ?>
                                            </small>

                                            <a href="<?= base_url('blog/detail/' . $related_blog->id); ?>"
                                                class="btn btn-sm btn-outline-primary float-end">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php else: ?>

                    <!-- NO RELATED BLOG FOUND -->
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <h5 class="mb-3">No related blogs found</h5>
                        <p class="text-muted mb-4">
                            There are no other blogs available in this category.
                        </p>
                    </div>

                <?php endif; ?>

            </div>
        </div>

        <div class="container text-center my-4">
            <a href="<?= base_url('blog'); ?>" class="btn btn-primary">
                ← Go to Blogs Page
            </a>
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