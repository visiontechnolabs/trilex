<!-- start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <div class="stats-grid">

            <div class="stat-card stat-blue" style="--percent:75%"
                onclick="window.location.href='<?= base_url('customer') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Users</div>
                        <div class="stat-value"><?= $user_count ?></div>
                        <div class="stat-meta">Registered users</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-user"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-rose" style="--percent:65%"
                onclick="window.location.href='<?= base_url('post') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Posts</div>
                        <div class="stat-value"><?= $post_count ?></div>
                        <div class="stat-meta">Published posts</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-file"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-green" style="--percent:80%"
                onclick="window.location.href='<?= base_url('blog_category') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Blog Categories</div>
                        <div class="stat-value"><?= $blog_category_count ?></div>
                        <div class="stat-meta">Organized topics</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-category"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-yellow" style="--percent:70%"
                onclick="window.location.href='<?= base_url('blogs') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Blogs</div>
                        <div class="stat-value"><?= $blog_count ?></div>
                        <div class="stat-meta">Published & indexed</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-book"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-lime" style="--percent:55%"
                onclick="window.location.href='<?= base_url('order') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Orders</div>
                        <div class="stat-value"><?= $order_count ?></div>
                        <div class="stat-meta">Processing</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-cart"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-purple" style="--percent:75%"
                onclick="window.location.href='<?= base_url('service_category') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Services Categories</div>
                        <div class="stat-value"><?= $service_category_count ?></div>
                        <div class="stat-meta">Organized Services</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-layer"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-cyan" style="--percent:85%"
                onclick="window.location.href='<?= base_url('all_service') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Services</div>
                        <div class="stat-value"><?= $service_count ?></div>
                        <div class="stat-meta">Operational</div>
                    </div>
                    <div class="stat-icon"><i class="bx bxs-cog"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

            <div class="stat-card stat-orange" style="--percent:99%"
                onclick="window.location.href='<?= base_url('qr_codes') ?>'">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">QR Codes</div>
                        <div class="stat-value"><?= $qr_count ?></div>
                        <div class="stat-meta">Generated & Active</div>
                    </div>
                    <div class="stat-icon"><i class="bx bx-qr-scan"></i></div>
                </div>
                <div class="stat-progress"><span></span></div>
            </div>

        </div>

    </div>
</div>
<!-- end page wrapper -->

<style>
    /* ================= DASHBOARD LIGHT THEME ================= */

    .page-wrapper {
        background: #f8fafc;
        min-height: 100vh;
    }

    .page-content {
        padding: 40px;
        font-family: "Inter", system-ui, sans-serif;
    }

    /* ================= GRID ================= */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 28px;
    }

    /* ================= CARD ================= */
    .stat-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 26px;
        position: relative;
        border: 1px solid #e5e7eb;
        transition: all 0.35s ease;
        overflow: hidden;
        cursor: pointer;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.12);
    }

    /* subtle gradient highlight */
    .stat-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg,
                rgba(99, 102, 241, 0.12),
                transparent 60%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    /* ================= HEADER ================= */
    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* ================= TEXT ================= */
    .stat-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #64748b;
        font-weight: 600;
    }

    .stat-value {
        font-size: 38px;
        font-weight: 900;
        color: #020617;
        margin: 12px 0 6px;
    }

    .stat-meta {
        font-size: 14px;
        color: #64748b;
    }

    /* ================= ICON ================= */
    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: white;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* ================= COLOR VARIANTS ================= */
    .stat-blue .stat-icon {
        background: linear-gradient(135deg, #6366f1, #818cf8);
    }

    .stat-green .stat-icon {
        background: linear-gradient(135deg, #22c55e, #4ade80);
    }

    .stat-yellow .stat-icon {
        background: linear-gradient(135deg, #facc15, #fde047);
        color: #713f12;
    }

    .stat-lime .stat-icon {
        background: linear-gradient(135deg, #65a30d, #84cc16);
    }

    .stat-purple .stat-icon {
        background: linear-gradient(135deg, #8b5cf6, #a855f7);
    }

    .stat-cyan .stat-icon {
        background: linear-gradient(135deg, #06b6d4, #22d3ee);
    }

    .stat-orange .stat-icon {
        background: linear-gradient(135deg, #f97316, #fb923c);
    }

    .stat-rose .stat-icon {
        background: linear-gradient(135deg, #e11d48, #fb7185);
    }

    /* ================= PROGRESS LINE ================= */
    .stat-progress {
        height: 6px;
        border-radius: 999px;
        background: #e5e7eb;
        margin-top: 22px;
        overflow: hidden;
    }

    .stat-progress span {
        display: block;
        height: 100%;
        width: var(--percent);
        border-radius: 999px;
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
    }

    /* ================= MOBILE ================= */
    @media (max-width: 768px) {
        .page-content {
            padding: 25px;
        }

        .stat-value {
            font-size: 32px;
        }
    }
</style>