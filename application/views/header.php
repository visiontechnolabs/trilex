<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trilex Advisory - Professional GST & Accounting Solutions</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/android-chrome-192x192.png'); ?>">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/android-chrome-192x192.png'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1C768F;
            --secondary-color: #032539;
            --accent-color: #39A9DB;
            --light-color: #F4F9F9;
            --dark-color: #01161E;
            --text-color: #0B3C5D;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            background-color: var(--light-color);
        }

        .navbar {
            background: white;
            /* box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); */
            padding: 15px 0;
        }

        .navbar-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
            display: flex;
            align-items: center;
            margin-right: 30px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 125px;
            height: 94px;
            background: white;
            border-radius: 10px;
            margin-right: 12px;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        }

        .logo-icon {
            color: var(--primary-color);
            font-size: 1.8rem;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        .nav-item {
            margin: 0 15px;
        }

        .nav-link {
            color: #000 !important;
            /* Default black text */
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 8px 20px !important;
            border-radius: 25px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
            background-color: var(--primary-color) !important;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
            transform: translateY(-2px);
        }

        #bottomNav a.active {
            color: var(--accent-color);
            font-weight: 700;
            transform: scale(1.1);
        }


        .hero-section {
            /* background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); */
            background: white;
            color: black;
            padding: 100px 0;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.05"><polygon fill="white" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            margin-bottom: 30px;
            background: white;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-video {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .price-tag {
            background: var(--accent-color);
            color: white;
            padding: 8px 25px;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: bold;
            display: inline-block;
            margin: 15px 0;
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
        }

        .btn-primary-custom {
            background: var(--primary-color) !important;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(192, 132, 252, 0.3);
        }

        .btn-primary-custom:hover {
            background: #f59e0b;
            transform: scale(1.05);
            color: white;
            box-shadow: 0 6px 20px rgba(206, 206, 206, 0.4);
        }

        .btn-buy-now {
            background: var(--accent-color);
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-buy-now:hover {
            background: #e58e0b;
            transform: scale(1.05);
            color: white;
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        footer {
            background: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
        }

        .feature-icon {
            font-size: 3.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
            background: rgba(192, 132, 252, 0.1);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px;
        }

        .detail-hero {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .detail-hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.05"><polygon fill="white" points="0,0 1000,1000 0,1000"/></svg>');
            background-size: cover;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 1.1rem;
        }

        .feature-list li:before {
            content: "✓ ";
            color: var(--secondary-color);
            font-weight: bold;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* .page {
            display: none;
        }

        .page.active {
            display: block;
        } */

        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
            font-weight: 700;
            color: var(--primary-color);
        }

        .section-title:after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        /* Bottom Navigation for Mobile */
        #bottomNav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: none;
            padding: 8px 0;
            z-index: 1000;
            box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.1);
        }

        #bottomNav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
        }

        #bottomNav li {
            flex: 1;
            text-align: center;
            padding: 4px;
        }

        #bottomNav a {
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.8rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        #bottomNav i {
            font-size: 1.2rem;
            margin-bottom: 2px;
        }

        #bottomNav span {
            font-size: 0.7rem;
            font-weight: 500;
        }

        #bottomNav a:hover,
        #bottomNav a.active {
            color: var(--accent-color);
            transform: scale(1.05);
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                margin-top: 15px;
                text-align: center;
            }

            .nav-item {
                margin: 5px 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                display: none;
            }

            #bottomNav {
                display: block;
            }

            .hero-section {
                padding: 60px 0;
                margin-top: 75px;
            }

            .hero-section h1 {
                font-size: 2.2rem;
            }

            /* Adjust for bottom nav padding */
            .page {
                padding-bottom: 90px;
            }
        }

        /* product details page */

        /* Media Section - Full Width */
        .media-section {
            width: 100%;
            position: relative;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            overflow: hidden;
        }

        .media-wrapper {
            width: 100%;
            position: relative;
        }

        .media-wrapper img,
        .media-wrapper video {
            width: 100%;
            height: auto;
            display: block;
            min-height: 400px;
            object-fit: cover;
        }

        .media-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent-color);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
            z-index: 10;
        }

        /* Content Section */
        .content-section {
            padding: 40px 30px;
        }

        .product-title {
            font-size: 36px;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .product-subtitle {
            font-size: 18px;
            color: var(--text-color);
            margin-bottom: 30px;
            opacity: 0.8;
        }

        /* Price Section */
        .price-container {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 25px 30px;
            border-radius: 16px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }

        .price-wrapper {
            display: flex;
            align-items: baseline;
            gap: 15px;
            flex-wrap: wrap;
        }

        .price {
            font-size: 42px;
            font-weight: 900;
            color: white;
        }

        .original-price {
            font-size: 22px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: line-through;
        }

        .discount-badge {
            background: var(--accent-color);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* Buy Button */
        .buy-button {
            width: 100%;
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 20px 40px;
            font-size: 20px;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);
        }

        .buy-button:hover {
            background: #ea580c;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(245, 158, 11, 0.5);
        }

        .buy-button:active {
            transform: translateY(-1px);
        }

        /* Description Section */
        .description-header {
            font-size: 26px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .description-header::before {
            content: '';
            width: 5px;
            height: 28px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .description-content {
            color: var(--text-color);
            font-size: 16px;
            line-height: 1.8;
        }

        .description-content p {
            margin-bottom: 20px;
        }

        .description-content strong {
            color: var(--dark-color);
            font-weight: 700;
        }

        .description-content ul,
        .description-content ol {
            margin-left: 25px;
            margin-bottom: 20px;
        }

        .description-content li {
            margin-bottom: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content-section {
                padding: 30px 20px;
            }

            .product-title {
                font-size: 28px;
            }

            .product-subtitle {
                font-size: 16px;
            }

            .price {
                font-size: 36px;
            }

            .original-price {
                font-size: 20px;
            }

            .price-container {
                padding: 20px;
            }

            .buy-button {
                font-size: 18px;
                padding: 18px 30px;
            }

            .description-header {
                font-size: 22px;
            }

            .description-content {
                font-size: 15px;
            }

            .media-wrapper img,
            .media-wrapper video {
                min-height: 300px;
            }
        }

        @media (max-width: 480px) {
            .product-title {
                font-size: 24px;
            }

            .price {
                font-size: 32px;
            }

            .media-badge {
                font-size: 12px;
                padding: 8px 16px;
                top: 15px;
                right: 15px;
            }
        }

        /* pagination css */
        .pagination .page-link {
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            margin: 0 3px;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .pagination .page-link:hover {
            background-color: var(--secondary-color);
            color: #fff;
            border-color: var(--secondary-color);
        }

        /* login register page */
        /* .auth-container {
            width: 100%;
            max-width: 450px;
            animation: fadeInUp 0.6s ease-out;
            
        } */

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

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(139, 92, 246, 0.15);
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
        }

        .form-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .form-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.3);
        }

        .form-icon svg {
            width: 32px;
            height: 32px;
            stroke: white;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: var(--text-color);
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 600;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-color);
            opacity: 0.6;
        }

        .input-icon svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            color: var(--dark-color);
            transition: all 0.3s ease;
            background: white;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .otp-inputs {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .otp-input {
            width: 56px;
            height: 56px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            padding: 0;
            border-radius: 12px;
        }

        .btn-primary {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .form-footer {
            text-align: center;
            margin-top: 24px;
            color: var(--text-color);
            font-size: 14px;
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: var(--secondary-color);
        }

        .forgot-password {
            text-align: right;
            margin-top: -12px;
            margin-bottom: 24px;
        }

        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 28px 0;
            color: var(--text-color);
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            padding: 0 16px;
        }

        .page-switcher {
            display: flex;
            gap: 12px;
            margin-bottom: 32px;
        }

        .page-switcher button {
            flex: 1;
            padding: 10px;
            border: 2px solid #e2e8f0;
            background: white;
            color: var(--text-color);
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .page-switcher button.active {
            border-color: var(--primary-color);
            background: var(--primary-color);
            color: white;
        }

        /* .form-page {
            display: none;
        } */

        .form-page.active {
            display: block;
        }

        .resend-code {
            text-align: center;
            margin-top: 20px;
            color: var(--text-color);
            font-size: 14px;
        }

        .resend-code button {
            background: none;
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            cursor: pointer;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .form-card {
                padding: 36px 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .otp-input {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }
        }

        /* Account Section */
        .account-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 25px;
        }

        .account-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 15px;
        }

        .account-name {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .account-email {
            font-size: 14px;
            opacity: 0.95;
        }

        .form-section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            outline: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .btn-update {
            padding: 10px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
        }

        .btn-update:active {
            transform: translateY(0);
        }

        .success-alert {
            display: none;
            padding: 12px 16px;
            background: #dcfce7;
            color: #166534;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #22c55e;
        }

        .success-alert.show {
            display: block;
        }

        /* Transaction History */
        .transaction-item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .transaction-item:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .product-info {
            flex: 1;
            min-width: 200px;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 4px;
        }

        .transaction-date {
            font-size: 13px;
            color: #64748b;
        }

        .transaction-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 600;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .price-value {
            color: var(--accent-color);
            font-size: 18px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 2px solid #e2e8f0;
            background: white;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .container-main {
                margin: 20px auto;
            }

            .account-card {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .transaction-details {
                grid-template-columns: 1fr;
            }

            .transaction-header {
                flex-direction: column;
            }

            .tab-section {
                gap: 10px;
            }

            .tab-btn {
                padding: 10px 16px;
                font-size: 14px;
            }

            .filter-section {
                justify-content: flex-start;
            }

            .filter-btn {
                font-size: 13px;
                padding: 6px 14px;
            }
        }

        /* About Page */
        .about-hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .about-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .about-hero p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .about-content {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .about-section {
            margin-bottom: 3rem;
        }

        .about-section h2 {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            border-left: 4px solid var(--accent-color);
            padding-left: 1rem;
        }

        .about-section p {
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-top: 4px solid var(--primary-color);
        }

        .value-card h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .value-card p {
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Contact Page */
        .contact-hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .contact-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .contact-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .contact-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .contact-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .contact-card h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .contact-card p {
            color: var(--text-color);
            line-height: 1.6;
        }

        .contact-card a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .contact-card a:hover {
            color: var(--secondary-color);
        }

        .hours-section {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-top: 2rem;
        }

        .hours-section h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            border-left: 4px solid var(--accent-color);
            padding-left: 1rem;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .hour-item {
            display: flex;
            justify-content: space-between;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .hour-item:last-child {
            border-bottom: none;
        }

        .day {
            font-weight: 600;
            color: var(--dark-color);
        }

        .time {
            color: var(--primary-color);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-img {
            height: 40px;
            /* adjust size as needed */
            width: auto;
        }

        /* mobile desing */
        /* Mobile Header */
        .mobile-header {
            background: white;
            padding: 8px 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .mobile-logo {
            width: 50px;
            height: 50px;
            transition: all 0.25s ease;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 24px;
            color: var(--primary-color);
            cursor: pointer;
            padding: 10px;
            position: relative;
            z-index: 1060;
            pointer-events: auto;
        }

        /* Mobile Sidebar */
        .mobile-sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1030;
            overflow-y: auto;
            transform: translateZ(0);
            /* Force hardware acceleration */
            display: block;
            /* Hidden by default */
        }

        .mobile-sidebar.active {
            right: 0;
            transform: translateZ(0);
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 1025;
            transform: translateZ(0);
            /* Force hardware acceleration */
            display: none;
            /* Hidden by default */
        }

        .mt-3 {
            margin-top: 5rem !important;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
            backdrop-filter: blur(3px);
        }

        /* Ensure sidebar appears above all content */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Prevent content from showing through sidebar */
        .mobile-sidebar.active {
            z-index: 1030;
        }

        .sidebar-overlay.active {
            z-index: 1025;
        }

        .sidebar-header {
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-logo {
            height: 50px;
            width: auto;
        }

        .sidebar-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 5px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 18px 20px;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar-menu a i {
            margin-right: 15px;
            font-size: 18px;
            color: var(--primary-color);
            width: 25px;
            text-align: center;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: linear-gradient(to right, var(--light-color), white);
            color: var(--primary-color);
            font-weight: 600;
            padding-left: 25px;
        }

        .sidebar-menu a.active {
            border-left: 4px solid var(--primary-color);
        }

        /* Mobile Sidebar Dropdown Styles */
        .sidebar-dropdown {
            position: relative;
        }

        .sidebar-dropdown-toggle {
            justify-content: space-between !important;
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
            font-size: 14px;
        }

        .sidebar-dropdown.active .dropdown-icon {
            transform: rotate(180deg);
        }

        .sidebar-submenu {
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
            background: #f8f9fa;
        }

        .sidebar-dropdown.active .sidebar-submenu {
            display: block;
        }

        .sidebar-submenu-item {
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-submenu-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px 15px 40px;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .sidebar-submenu-toggle:hover {
            background: linear-gradient(to right, #f0f2f5, #ffffff);
            color: var(--primary-color);
            padding-left: 45px;
        }

        .submenu-icon {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .sidebar-submenu-item.active .submenu-icon {
            transform: rotate(90deg);
        }

        .sidebar-sub-submenu {
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
            background: #ffffff;
        }

        .sidebar-submenu-item.active .sidebar-sub-submenu {
            display: block;
        }

        .sidebar-sub-submenu li {
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-sub-submenu a {
            display: block;
            padding: 12px 20px 12px 60px;
            color: var(--text-color);
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            font-size: 13px;
        }

        .sidebar-sub-submenu a:hover {
            background: linear-gradient(to right, #f0f2f5, #ffffff);
            color: var(--primary-color);
            padding-left: 65px;
        }

        /* Bottom Navigation for Mobile - Simplified */
        #bottomNav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: none;
            padding: 10px 0;
            z-index: 999;
            box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.1);
        }

        #bottomNav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
        }

        #bottomNav li {
            flex: 1;
            text-align: center;
        }

        #bottomNav a {
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.85rem;
            transition: all 0.3s;
            text-decoration: none;
            padding: 8px;
        }

        #bottomNav i {
            font-size: 1.4rem;
            margin-bottom: 4px;
        }

        #bottomNav span {
            font-size: 0.75rem;
            font-weight: 500;
        }

        #bottomNav a:hover,
        #bottomNav a.active {
            color: var(--accent-color);
            transform: scale(1.1);
        }

        /* Content padding for mobile */
        .content-wrapper {
            padding-top: 0;
        }

        /* Desktop styles - ensure mobile elements are hidden */
        @media (min-width: 769px) {
            .mobile-header {
                display: none !important;
            }

            .mobile-sidebar {
                right: -100%;
                display: block;
            }

            .sidebar-overlay {
                display: block;
                opacity: 0;
                visibility: hidden;
            }

            #bottomNav {
                display: none !important;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                margin-top: 15px;
                text-align: center;
            }

            .nav-item {
                margin: 5px 0;
            }
        }

        @media (max-width: 768px) {

            /* Hide desktop navbar */
            .navbar {
                display: none;
            }

            /* Show mobile elements */
            .mobile-header {
                display: flex;
            }

            #bottomNav {
                display: block;
            }

            /* Add padding for fixed header and bottom nav */
            .content-wrapper {
                padding-top: 70px;
            }

            /* Adjust dropdown menu for mobile */
            .dropdown-menu {
                position: absolute !important;
            }
        }

        /* service dropdown */
        /* Enable submenus */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: 0;
            display: none;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        /* Mobile adjustments for submenus */
        @media (max-width: 768px) {
            .dropdown-submenu>.dropdown-menu {
                position: static !important;
                display: none;
                margin-left: 20px;
                border: none;
                box-shadow: none;
                background: transparent;
            }

            .dropdown-submenu>.dropdown-menu.show {
                display: block;
            }

            .page {
                padding-bottom: 110px;
            }

            footer {
                margin-bottom: 0;
            }

            #bottomNav {
                position: fixed;
                bottom: 10px;
                left: 10px;
                right: 10px;
                background: white;
                border-radius: 20px;
                display: block;
                padding: 10px 5px;
                z-index: 999;
                box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.15);
            }

            #bottomNav ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

            #bottomNav a {
                color: var(--primary-color);
                display: flex;
                flex-direction: column;
                align-items: center;
                font-size: 0.85rem;
                text-decoration: none;
                padding: 8px;
                transition: all 0.3s ease;
            }

            #bottomNav i {
                font-size: 1.4rem;
                margin-bottom: 4px;
            }

            #bottomNav a.active {
                color: white;
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                border-radius: 15px;
                padding: 8px 12px;
                transform: scale(1.05);
            }

            .content-wrapper {
                padding-top: 70px;
            }
        }

        /* Hover colors */
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white !important;
        }

        /* Transition effect */
        .dropdown-menu {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
        }

        /* service details page */
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 20px;
            border-radius: 20px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(28, 118, 143, 0.3);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(57, 169, 219, 0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .service-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Service Content Card */
        .service-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--accent-color) 0%, var(--primary-color) 100%);
        }

        .section-label {
            display: inline-block;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .service-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-color);
            text-align: justify;
        }

        .service-description p {
            margin-bottom: 20px;
        }

        /* Icon decoration */
        .icon-decoration {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 10px 25px rgba(57, 169, 219, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .icon-decoration svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        /* Call to Action */
        .cta-section {
            margin-top: 40px;
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, var(--light-color) 0%, rgba(57, 169, 219, 0.1) 100%);
            border-radius: 15px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(28, 118, 143, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(28, 118, 143, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-title {
                font-size: 2rem;
            }

            .hero {
                padding: 40px 20px;
            }

            .service-card {
                padding: 25px;
            }

            .service-description {
                font-size: 1rem;
                text-align: left;
                /* overflow-x: hidden; */

            }



            .icon-decoration {
                width: 60px;
                height: 60px;
            }

            .icon-decoration svg {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .service-title {
                font-size: 1.5rem;
            }

            .hero {
                padding: 30px 15px;
                border-radius: 15px;
            }

            .service-card {
                padding: 20px;
                border-radius: 15px;
            }

            .cta-button {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }

        .ck-content {
            white-space: normal !important;
            word-wrap: break-word;
            overflow-x: hidden;
        }

        /* service listing page */
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 20px;
            border-radius: 20px;
            margin-bottom: 50px;
            box-shadow: 0 10px 40px rgba(28, 118, 143, 0.3);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(57, 169, 219, 0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 0.8s ease-out;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
            animation: fadeInDown 0.8s ease-out 0.2s both;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Category Section */
        .category-section {
            margin-bottom: 60px;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--accent-color);
        }

        .category-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(57, 169, 219, 0.3);
            flex-shrink: 0;
        }

        .category-icon svg {
            width: 25px;
            height: 25px;
            fill: white;
        }

        .category-title {
            font-size: 2rem;
            color: var(--primary-color);
            font-weight: 700;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-left: 4px solid var(--accent-color);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(57, 169, 219, 0.05) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(28, 118, 143, 0.2);
            border-left-color: var(--primary-color);
        }

        .service-card:hover::before {
            opacity: 1;
        }

        .service-number {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 3px 10px rgba(57, 169, 219, 0.3);
        }

        .service-title {
            font-size: 1.4rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-weight: 600;
            position: relative;
            z-index: 1;
            padding-right: 45px;
        }

        .service-excerpt {
            color: var(--text-color);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* 👈 Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 70px;
        }

        .view-details-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(28, 118, 143, 0.2);
            position: relative;
            z-index: 1;
        }

        .view-details-btn:hover {
            transform: translateX(5px);
            box-shadow: 0 6px 20px rgba(28, 118, 143, 0.3);
        }

        .view-details-btn svg {
            width: 16px;
            height: 16px;
            fill: white;
            transition: transform 0.3s ease;
        }

        .view-details-btn:hover svg {
            transform: translateX(3px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            fill: var(--accent-color);
            opacity: 0.5;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--text-color);
            opacity: 0.7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .hero {
                padding: 40px 20px;
            }

            .category-title {
                font-size: 1.5rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .service-card {
                padding: 25px;
            }

            .category-header {
                gap: 12px;
            }

            .category-icon {
                width: 40px;
                height: 40px;
            }

            .category-icon svg {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }

            .hero {
                padding: 30px 15px;
                border-radius: 15px;
            }

            .category-title {
                font-size: 1.3rem;
            }

            .service-title {
                font-size: 1.2rem;
            }

            .service-card {
                padding: 20px;
            }

            .view-details-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

        }
    </style>
</head>

<body>
    <?php $segment = $this->uri->segment(1);
    $CI =& get_instance();
    $CI->load->database();

    // Fetch all categories
    $query = $CI->db->get('service_category');
    $categories = $query->result_array();

    $main_categories = [];
    $subcategories = [];

    foreach ($categories as $cat) {
        if (empty($cat['parent_id'])) {
            $main_categories[$cat['id']] = $cat;
        } else {
            $subcategories[$cat['parent_id']][] = $cat;
        }
    }
    ?>

    <!-- ================= Desktop Navigation ================= -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <div class="navbar-container">

                <!-- Logo -->
                <a class="navbar-brand" href="<?= base_url('home'); ?>">
                    <div class="logo-container">
                        <img src="<?= base_url('assets/images/logo_new.png'); ?>" alt="Logo" class="img-fluid">
                    </div>
                </a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'home' || $segment == '') ? 'active' : '' ?>"
                                href="<?= base_url('home'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'product') ? 'active' : '' ?>"
                                href="<?= base_url('product'); ?>">Products</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= ($segment == 'service') ? 'active' : '' ?>" href="#"
                                id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <?php foreach ($main_categories as $main): ?>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">
                                            <?= htmlspecialchars($main['title'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                        <?php if (!empty($subcategories[$main['id']])): ?>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($subcategories[$main['id']] as $sub):
                                                    // Convert title into a clean, SEO-friendly slug
                                                    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $sub['title']));
                                                    $slug = trim($slug, '-');
                                                    ?>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url('service/' . $sub['id'] . '/' . $slug); ?>">
                                                            <?= htmlspecialchars($sub['title'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>

                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </li>


                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'blog') ? 'active' : '' ?>"
                                href="<?= base_url('blog'); ?>">
                                Blog
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'about') ? 'active' : '' ?>"
                                href="<?= base_url('about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'contact') ? 'active' : '' ?>"
                                href="<?= base_url('contact'); ?>">Contact</a>
                        </li>
                    </ul>

                    <!-- Profile / Login -->
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <div class="dropdown">
                            <button class="btn btn-primary-custom dropdown-toggle" type="button" id="profileDropdown"
                                data-bs-toggle="dropdown">
                                <?= $this->session->userdata('user_name'); ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('account'); ?>">Account</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('history'); ?>">History</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('login/logout'); ?>">Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?= base_url('login'); ?>" class="btn btn-primary-custom" style="cursor:pointer;">
                            Login <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>

    <!-- ================= Mobile Header ================= -->
    <div class="mobile-header">
        <img src="<?= base_url('assets/images/logo_new.png'); ?>" alt="Logo" class="mobile-logo">
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- ================= Mobile Sidebar ================= -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="mobile-sidebar" id="mobileSidebar">
        <div class="sidebar-header">
            <!-- <img src="<?= base_url('assets/images/logo_new.png'); ?>" alt="Logo" class="sidebar-logo"> -->
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-dropdown">
                <a href="#" class="sidebar-link sidebar-dropdown-toggle">
                    <i class="fas fa-concierge-bell"></i> Services <i class="fas fa-chevron-down dropdown-icon"></i>
                </a>
                <ul class="sidebar-submenu">
                    <?php foreach ($main_categories as $main): ?>
                        <li class="sidebar-submenu-item">
                            <a href="#" class="sidebar-submenu-toggle">
                                <?= htmlspecialchars($main['title'], ENT_QUOTES, 'UTF-8'); ?>
                                <?php if (!empty($subcategories[$main['id']])): ?>
                                    <i class="fas fa-chevron-right submenu-icon"></i>
                                <?php endif; ?>
                            </a>
                            <?php if (!empty($subcategories[$main['id']])): ?>
                                <ul class="sidebar-sub-submenu">
                                    <?php foreach ($subcategories[$main['id']] as $sub):
                                        $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $sub['title']));
                                        $slug = trim($slug, '-');
                                        ?>
                                        <li>
                                            <a href="<?= base_url('service/' . $sub['id'] . '/' . $slug); ?>">
                                                <?= htmlspecialchars($sub['title'], ENT_QUOTES, 'UTF-8'); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="<?= base_url('blog'); ?>" class="sidebar-link"><i class="fas fa-blog"></i> Blogs</a></li>
            <li><a href="<?= base_url('about'); ?>" class="sidebar-link"><i class="fas fa-info-circle"></i> About</a>
            </li>
            <li><a href="<?= base_url('contact'); ?>" class="sidebar-link"><i class="fas fa-envelope"></i> Contact</a>
            </li>


        </ul>
    </div>

    <!-- ================= Bottom Navigation (Mobile) ================= -->
    <nav id="bottomNav">
        <ul>
            <li>
                <a class="<?= ($segment == 'home' || $segment == '') ? 'active' : '' ?>"
                    href="<?= base_url('home'); ?>">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="<?= ($segment == 'product') ? 'active' : '' ?>" href="<?= base_url('product'); ?>">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <a href="<?= base_url('profile'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Login</span>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>

    <script>
        (function () {

            const menuToggle = document.getElementById('menuToggle');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarClose = document.getElementById('sidebarClose');

            // Close only when clicking FINAL service links
            const finalLinks = document.querySelectorAll('.sidebar-sub-submenu a');

            function closeSidebar() {
                mobileSidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                document.body.classList.remove('sidebar-open');

                document.querySelectorAll('.sidebar-dropdown.active, .sidebar-submenu-item.active')
                    .forEach(item => item.classList.remove('active'));
            }

            // ===== OPEN / CLOSE SIDEBAR =====
            menuToggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                if (mobileSidebar.classList.contains('active')) {
                    closeSidebar();
                } else {
                    mobileSidebar.classList.add('active');
                    sidebarOverlay.classList.add('active');
                    document.body.classList.add('sidebar-open');
                }
            });

            // Close when clicking overlay
            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close when clicking X button
            sidebarClose.addEventListener('click', closeSidebar);

            // Close ONLY when clicking final service link
            finalLinks.forEach(link => {
                link.addEventListener('click', closeSidebar);
            });

            // ===== DROPDOWN FIX (MOST IMPORTANT PART) =====
            const sidebarDropdownToggles = document.querySelectorAll('.sidebar-dropdown-toggle');
            const sidebarSubmenuToggles = document.querySelectorAll('.sidebar-submenu-toggle');

            // FIX: Services click will NOT close sidebar
            sidebarDropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();   // 🔥 CRITICAL

                    const parent = this.closest('.sidebar-dropdown');
                    parent.classList.toggle('active');
                });
            });

            // Sub-category toggle fix
            sidebarSubmenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const parent = this.closest('.sidebar-submenu-item');
                    parent.classList.toggle('active');
                });
            });

            // ===== FIX: CLICK OUTSIDE CLOSES SIDEBAR =====
            document.addEventListener('click', function (e) {

                const clickedInsideSidebar = mobileSidebar.contains(e.target);
                const clickedOnToggle = menuToggle.contains(e.target);
                const clickedOnServices = e.target.closest('.sidebar-dropdown-toggle');

                // Close ONLY if clicked completely outside AND not on Services
                if (!clickedInsideSidebar && !clickedOnToggle && !clickedOnServices) {
                    closeSidebar();
                }
            });

            // Prevent clicks inside sidebar from closing it
            mobileSidebar.addEventListener('click', function (e) {
                e.stopPropagation();
            });

        })();
    </script>