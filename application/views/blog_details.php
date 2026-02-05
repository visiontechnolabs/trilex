<style>
    /* ===== ROOT VARIABLES ===== */
    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
        --secondary-color: #1C768F;
        --accent-color: #2596b8;
        --dark-color: #1e293b;
        --light-bg: #f8fafc;
        --card-bg: #ffffff;
        --text-primary: #0f172a;
        --text-secondary: #64748b;
        --border-color: #e2e8f0;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
        --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.12);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
    }

    /* ===== RESET & BASE ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        color: var(--text-primary);
        background: var(--light-bg);
        line-height: 1.6;
    }

    /* ===== BREADCRUMB SECTION ===== */
    .breadcrumb-section {
        background: linear-gradient(135deg, #1C768F 0%, #155868 100%);
        padding: 20px 0;
        margin-bottom: 40px;
    }

    .breadcrumb-nav {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
    }

    .breadcrumb-nav a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-nav a:hover {
        color: #ffffff;
    }

    .breadcrumb-nav span {
        color: rgba(255, 255, 255, 0.6);
    }

    /* ===== HERO IMAGE SECTION ===== */
    .hero-image-section {
        position: relative;
        margin-bottom: 50px;
    }

    .hero-image-wrapper {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        height: 450px;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-xl);
        position: relative;
    }

    .hero-image-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .hero-image-wrapper:hover::before {
        opacity: 1;
    }

    .hero-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .hero-image-wrapper:hover img {
        transform: scale(1.05);
    }

    /* ===== BLOG HEADER ===== */
    .blog-header {
        max-width: 900px;
        margin: 0 auto 50px;
        text-align: center;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 20px;
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: white;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
        margin-bottom: 25px;
    }

    .category-badge:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .blog-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -0.02em;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-item i {
        color: var(--secondary-color);
        font-size: 1rem;
    }

    .meta-divider {
        width: 4px;
        height: 4px;
        background: var(--text-secondary);
        border-radius: 50%;
    }

    /* ===== BLOG CONTENT ===== */
    .blog-content-wrapper {
        max-width: 900px;
        margin: 0 auto;
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: 60px;
        box-shadow: var(--shadow-md);
        margin-bottom: 80px;
    }

    .content-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid var(--border-color);
    }

    .content-header i {
        font-size: 1.8rem;
        color: var(--secondary-color);
    }

    .content-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .blog-description {
        font-size: 1.1rem;
        line-height: 1.9;
        color: var(--text-primary);
    }

    .blog-description p {
        margin-bottom: 20px;
    }

    .blog-description h1,
    .blog-description h2,
    .blog-description h3,
    .blog-description h4 {
        margin-top: 35px;
        margin-bottom: 15px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .blog-description h1 { font-size: 2rem; }
    .blog-description h2 { font-size: 1.7rem; }
    .blog-description h3 { font-size: 1.4rem; }
    .blog-description h4 { font-size: 1.2rem; }

    .blog-description ul,
    .blog-description ol {
        margin: 20px 0 20px 30px;
    }

    .blog-description li {
        margin-bottom: 10px;
        padding-left: 10px;
    }

    .blog-description a {
        color: var(--secondary-color);
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: border-color 0.3s ease;
    }

    .blog-description a:hover {
        border-bottom-color: var(--secondary-color);
    }

    .blog-description blockquote {
        margin: 30px 0;
        padding: 20px 30px;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-left: 4px solid var(--secondary-color);
        border-radius: var(--radius-sm);
        font-style: italic;
        color: var(--text-secondary);
    }

    .blog-description img {
        max-width: 100%;
        height: auto;
        border-radius: var(--radius-md);
        margin: 30px 0;
        box-shadow: var(--shadow-md);
    }

    .blog-description code {
        background: #f1f5f9;
        padding: 3px 8px;
        border-radius: 4px;
        font-family: 'Monaco', 'Courier New', monospace;
        font-size: 0.9em;
        color: #e74c3c;
    }

    .blog-description pre {
        background: #1e293b;
        color: #f1f5f9;
        padding: 20px;
        border-radius: var(--radius-md);
        overflow-x: auto;
        margin: 25px 0;
    }

    .blog-description pre code {
        background: none;
        color: inherit;
        padding: 0;
    }

    /* ===== SOCIAL SHARE ===== */
    .social-share-section {
        max-width: 900px;
        margin: 0 auto 60px;
        padding: 30px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: var(--radius-lg);
        text-align: center;
    }

    .social-share-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: var(--text-primary);
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .social-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: 50px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .social-btn.facebook { background: #1877f2; }
    .social-btn.twitter { background: #1da1f2; }
    .social-btn.linkedin { background: #0a66c2; }
    .social-btn.whatsapp { background: #25d366; }
    .social-btn.email { background: #ea4335; }

    /* ===== RELATED BLOGS ===== */
    .related-blogs-section {
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        padding: 80px 0;
        margin-top: 80px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-subtitle {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        border-radius: 2px;
    }

    /* ===== BLOG CARDS ===== */
    .blog-card {
        background: var(--card-bg);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid var(--border-color);
    }

    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-xl);
    }

    .blog-card-image {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, #1C768F 0%, #155868 100%);
    }

    .blog-card-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .blog-card:hover .blog-card-image::before {
        opacity: 1;
    }

    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-card-image img {
        transform: scale(1.1);
    }

    .blog-card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--secondary-color);
        z-index: 2;
        box-shadow: var(--shadow-md);
    }

    .blog-card-body {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-card-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .blog-card-title a {
        color: var(--text-primary);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-card-title a:hover {
        color: var(--secondary-color);
    }

    .blog-card-excerpt {
        font-size: 0.95rem;
        color: var(--text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .blog-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .blog-card-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--text-secondary);
        font-size: 0.85rem;
    }

    .blog-card-date i {
        color: var(--secondary-color);
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
    }

    .read-more-btn:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-md);
        color: white;
    }

    .read-more-btn i {
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover i {
        transform: translateX(3px);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-state-icon {
        width: 120px;
        height: 120px;
        margin: 0 auto 30px;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-state-icon i {
        font-size: 3.5rem;
        color: var(--secondary-color);
    }

    .empty-state h5 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    /* ===== BACK TO BLOG BUTTON ===== */
    .back-to-blog-section {
        text-align: center;
        margin: 60px 0;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 16px 40px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-lg);
    }

    .back-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .back-btn i {
        transition: transform 0.3s ease;
    }

    .back-btn:hover i {
        transform: translateX(-3px);
    }

    /* ===== NOT FOUND STATE ===== */
    .not-found-section {
        text-align: center;
        padding: 120px 20px;
    }

    .not-found-icon {
        width: 150px;
        height: 150px;
        margin: 0 auto 30px;
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .not-found-icon i {
        font-size: 4rem;
        color: #ef4444;
    }

    .not-found-section h3 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 15px;
    }

    .not-found-section p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 992px) {
        .blog-content-wrapper {
            padding: 40px 30px;
        }

        .blog-title {
            font-size: 2.2rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .hero-image-wrapper {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .hero-image-wrapper {
            height: 300px;
            border-radius: var(--radius-lg);
        }

        .blog-content-wrapper {
            padding: 30px 20px;
        }

        .blog-title {
            font-size: 1.8rem;
        }

        .blog-meta {
            gap: 15px;
            font-size: 0.85rem;
        }

        .blog-description {
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.7rem;
        }

        .blog-card-image {
            height: 180px;
        }

        .social-buttons {
            flex-direction: column;
        }

        .social-btn {
            width: 100%;
            max-width: 300px;
        }
    }

    @media (max-width: 576px) {
        .breadcrumb-section {
            padding: 15px 0;
        }

        .blog-title {
            font-size: 1.5rem;
        }

        .content-header h2 {
            font-size: 1.4rem;
        }

        .related-blogs-section {
            padding: 60px 0;
        }

        .hero-image-wrapper {
            height: 250px;
        }
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out;
    }

    /* ===== CUSTOM SCROLLBAR ===== */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: var(--light-bg);
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, var(--secondary-color), var(--accent-color));
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-color);
    }
</style>

<?php if (!empty($blogs)): ?>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb-nav">
                <a href="<?= base_url(); ?>">
                    <i class="fas fa-home"></i> Home
                </a>
                <span>/</span>
                <a href="<?= base_url('blog'); ?>">Blog</a>
                <span>/</span>
                <span><?= htmlspecialchars(substr($blogs->title, 0, 30)); ?>...</span>
            </nav>
        </div>
    </div>

    <div class="container mt-4 mb-5">

        <!-- HERO IMAGE -->
        <div class="hero-image-section animate-fade-in">
            <div class="hero-image-wrapper">
                <?php if (!empty($blogs->file_path)): ?>
                    <img src="<?= base_url($blogs->file_path); ?>" 
                         alt="<?= htmlspecialchars($blogs->title); ?>" 
                         loading="lazy">
                <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=600&fit=crop" 
                         alt="Default Blog Image">
                <?php endif; ?>
            </div>
        </div>

        <!-- BLOG HEADER -->
        <div class="blog-header animate-fade-in">
            <?php if (!empty($blogs->category_title)):
                $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $blogs->category_title));
            ?>
                <a href="<?= base_url('blog/category/' . $blogs->category_id . '/' . $slug); ?>" 
                   class="category-badge">
                    <i class="fas fa-folder"></i>
                    <?= htmlspecialchars($blogs->category_title); ?>
                </a>
            <?php endif; ?>

            <h1 class="blog-title">
                <?= htmlspecialchars($blogs->title); ?>
            </h1>

            <div class="blog-meta">
                <div class="meta-item">
                    <i class="far fa-calendar-alt"></i>
                    <span><?= date('F d, Y', strtotime($blogs->created_on)); ?></span>
                </div>
                <div class="meta-divider"></div>
                <div class="meta-item">
                    <i class="far fa-user"></i>
                    <span>Admin</span>
                </div>
                <div class="meta-divider"></div>
                <div class="meta-item">
                    <i class="far fa-clock"></i>
                    <span><?= ceil(str_word_count(strip_tags($blogs->description)) / 200); ?> min read</span>
                </div>
            </div>
        </div>

        <!-- BLOG CONTENT -->
        <div class="blog-content-wrapper animate-fade-in">
            <div class="content-header">
                <i class="fas fa-file-alt"></i>
                <h2>Article Content</h2>
            </div>
            <div class="blog-description">
                <?= $blogs->description; ?>
            </div>
        </div>

        <!-- SOCIAL SHARE -->
        <div class="social-share-section animate-fade-in">
            <h3 class="social-share-title">
                <i class="fas fa-share-alt"></i> Share this article
            </h3>
            <div class="social-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url(); ?>" 
                   target="_blank" 
                   class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?= current_url(); ?>&text=<?= urlencode($blogs->title); ?>" 
                   target="_blank" 
                   class="social-btn twitter">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= current_url(); ?>&title=<?= urlencode($blogs->title); ?>" 
                   target="_blank" 
                   class="social-btn linkedin">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
                <a href="https://wa.me/?text=<?= urlencode($blogs->title . ' ' . current_url()); ?>" 
                   target="_blank" 
                   class="social-btn whatsapp">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:?subject=<?= urlencode($blogs->title); ?>&body=<?= urlencode(current_url()); ?>" 
                   class="social-btn email">
                    <i class="far fa-envelope"></i> Email
                </a>
            </div>
        </div>

    </div>

    <!-- RELATED BLOGS -->
    <div class="related-blogs-section">
        <div class="container">
            <div class="section-header">
                <p class="section-subtitle">Keep Reading</p>
                <h2 class="section-title">Related Blogs</h2>
            </div>

            <?php if (!empty($related_blogs)): ?>
                <div class="row">
                    <?php foreach ($related_blogs as $index => $related_blog): ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="blog-card" style="animation-delay: <?= $index * 0.1; ?>s;">
                                <div class="blog-card-image">
                                    <?php if (!empty($related_blog->file_path)): ?>
                                        <img src="<?= base_url($related_blog->file_path); ?>" 
                                             alt="<?= htmlspecialchars($related_blog->title); ?>">
                                    <?php else: ?>
                                        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=400&h=250&fit=crop" 
                                             alt="Default Image">
                                    <?php endif; ?>
                                    <span class="blog-card-badge">
                                        <i class="fas fa-star"></i> Featured
                                    </span>
                                </div>

                                <div class="blog-card-body">
                                    <h6 class="blog-card-title">
                                        <a href="<?= base_url('blog/detail/' . $related_blog->id); ?>">
                                            <?= htmlspecialchars(substr($related_blog->title, 0, 60)); ?>
                                            <?= strlen($related_blog->title) > 60 ? '...' : ''; ?>
                                        </a>
                                    </h6>

                                    <p class="blog-card-excerpt">
                                        <?= htmlspecialchars(substr(strip_tags($related_blog->description), 0, 100)); ?>
                                        <?= strlen(strip_tags($related_blog->description)) > 100 ? '...' : ''; ?>
                                    </p>

                                    <div class="blog-card-footer">
                                        <div class="blog-card-date">
                                            <i class="far fa-calendar"></i>
                                            <span><?= date('M j, Y', strtotime($related_blog->created_on)); ?></span>
                                        </div>
                                        <a href="<?= base_url('blog/detail/' . $related_blog->id); ?>" 
                                           class="read-more-btn">
                                            Read <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- EMPTY STATE -->
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h5>No Related Blogs Found</h5>
                    <p>We couldn't find any related Blogs in this category at the moment. Check back soon for more content!</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- BACK TO BLOG -->
    <div class="back-to-blog-section">
        <a href="<?= base_url('blog'); ?>" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to All Blogs
        </a>
    </div>

<?php else: ?>

    <!-- NOT FOUND STATE -->
    <div class="container">
        <div class="not-found-section">
            <div class="not-found-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3>Oops! Blog Not Found</h3>
            <p>The article you're looking for doesn't exist or has been removed.</p>
            <a href="<?= base_url('blog'); ?>" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Browse All Blogs
            </a>
        </div>
    </div>

<?php endif; ?>
