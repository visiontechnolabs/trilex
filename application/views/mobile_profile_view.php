<style>
    :root {
        --primary-color: #1C768F;
        --primary-dark: #155868;
    }

    /* Profile Card */
    .profile-card {
        background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
        border-radius: 20px;
        padding: 40px 20px;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .profile-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .avatar {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
        margin: 0 auto 20px;
        position: relative;
        z-index: 1;
    }

    .profile-name {
        font-size: 28px;
        font-weight: 700;
        color: white;
        margin-bottom: 8px;
        position: relative;
        z-index: 1;
    }

    .profile-email {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        position: relative;
        z-index: 1;
    }

    .stat-box {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: white;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    /* Account Management Section */
    .section-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 12px;
    }

    .section-subtitle {
        font-size: 16px;
        color: #94a3b8;
        margin-bottom: 25px;
    }

    /* Menu Items */
    .menu-section {
        margin-bottom: 20px;
    }

    .menu-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px;
        background: white;
        border-radius: 12px;
        margin-bottom: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .menu-header:hover {
        background: #f8fafc;
    }

    .menu-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .menu-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--dark-color);
    }

    .submenu-item {
        background: white;
        padding: 16px;
        border-left: 4px solid transparent;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 2px;
    }

    .submenu-item:hover {
        background: #f8fafc;
        border-left-color: var(--primary-color);
    }

    .submenu-icon {
        font-size: 18px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        border-radius: 8px;
    }

    .submenu-text {
        font-size: 15px;
        color: var(--text-color);
        font-weight: 500;
    }

    .submenu-arrow {
        margin-left: auto;
        font-size: 20px;
        color: #cbd5e1;
    }

    /* Divider */
    .divider {
        height: 1px;
        background: #e2e8f0;
        margin: 15px 0;
    }

    @media (max-width: 480px) {
        .container {
            padding: 15px;
        }

        .profile-card {
            padding: 30px 15px;
        }

        .profile-name {
            font-size: 24px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            font-size: 48px;
        }

        .section-title {
            font-size: 24px;
        }

        .section-subtitle {
            font-size: 14px;
        }

        .stats-grid {
            gap: 12px;
        }

        .stat-box {
            padding: 16px;
        }

        .stat-number {
            font-size: 28px;
        }
    }
</style>

<div class="container">
    <!-- Profile Card -->
    <div class="profile-card">
        <div class="avatar">👤</div>
        <div class="profile-name">
            <?= isset($this->session) && $this->session->userdata('user_name') ? htmlspecialchars($this->session->userdata('user_name')) : 'Guest User'; ?>
        </div>
        <div class="profile-email">
            <?= isset($this->session) && $this->session->userdata('user_email') ? htmlspecialchars($this->session->userdata('user_email')) : 'No Email'; ?>
        </div>
    </div>


    <!-- Account Management Section -->
    <div class="section-title">Account<br>Management</div>
    <div class="section-subtitle mt-5">Manage your profile, bookings, and account settings</div>

    <!-- Profile Settings -->
    <div class="menu-section">
        <div class="menu-header">
            <div class="menu-icon">👤</div>
            <div class="menu-title">Profile Settings</div>
        </div>
        <a href="<?= base_url('account'); ?>" class="submenu-item">
            <div class="submenu-icon">✏️</div>
            <div class="submenu-text">Edit Profile</div>
            <div class="submenu-arrow">›</div>
        </a>
    </div>

    <div class="divider"></div>



    <div class="divider"></div>

    <!-- Bookings -->
    <div class="menu-section">
        <div class="menu-header">
            <div class="menu-icon">📋</div>
            <div class="menu-title">My Bookings</div>
        </div>
        <a href="<?= base_url('history'); ?>" class="submenu-item">
            <div class="submenu-icon">🔍</div>
            <div class="submenu-text">View All Bookings</div>
            <div class="submenu-arrow">›</div>
        </a>
    </div>

    <div class="divider"></div>



</div>
</div>