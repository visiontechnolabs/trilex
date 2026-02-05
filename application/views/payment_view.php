<style>
    .payment-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 0 15px;
    }

    .payment-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .product-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 30px 20px;
        text-align: center;
    }

    .product-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .product-price {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .product-meta {
        font-size: 14px;
        opacity: 0.95;
    }

    .form-section {
        padding: 30px 20px;
    }

    .form-section h5 {
        font-size: 16px;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 20px;
        /* display: flex; */
        align-items: center;
        gap: 10px;
    }

    .section-divider {
        margin: 30px 0;
        border: none;
        border-top: 1px solid #e2e8f0;
    }

    .qr-code-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .qr-code-image {
        width: 200px;
        height: 200px;
        border: 3px solid var(--primary-color);
        border-radius: 8px;
        padding: 8px;
        background: white;
        object-fit: contain;
    }

    .qr-instruction {
        font-size: 13px;
        color: #64748b;
        margin-top: 12px;
    }

    .form-label {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 8px;
        font-size: 14px;
        display: block;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        outline: none;
    }

    .upload-container {
        position: relative;
        margin-bottom: 20px;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Hide actual input */
    #receiptInput {
        display: none;
    }

    /* Label looks like upload area/button */
    .file-input-label {
        display: block;
        width: 100%;
        padding: 12px 16px;
        background: #f1f5f9;
        border: 2px dashed var(--primary-color);
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        color: var(--primary-color);
        font-weight: 500;
    }

    .file-input-label:hover {
        background: #e0e7ff;
        border-color: var(--secondary-color);
    }

    /* File name after upload */
    .file-name {
        font-size: 13px;
        color: #475569;
        margin-top: 8px;
        padding: 8px;
        background: #f8fafc;
        border-radius: 6px;
        display: none;
        word-wrap: break-word;
    }

    .file-name.show {
        display: block;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .icon {
        font-size: 18px;
    }

    .success-message {
        display: none;
        padding: 12px;
        background: #dcfce7;
        color: #166534;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .success-message.show {
        display: block;
    }

    @media (max-width: 576px) {
        .payment-container {
            margin: 20px auto;
        }

        .product-section {
            padding: 25px 15px;
        }

        .product-title {
            font-size: 20px;
        }

        .product-price {
            font-size: 28px;
        }

        .form-section {
            padding: 20px 15px;
        }

        .qr-code-image {
            width: 160px;
            height: 160px;
        }
    }

    .qr-section {
        margin-bottom: 30px;
    }

    .qr-title {
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        color: var(--dark-color);
        margin-bottom: 20px;
    }

    .qr-code-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .qr-instruction {
        font-size: 15px;
        color: #1e293b;
        margin-top: 12px;
        font-weight: 600;
    }

    .upi-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;
        margin-top: 15px;
    }

    .upi-icon {
        width: 25px;
        height: auto;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
        transition: transform 0.2s ease;
    }

    .upi-icon:hover {
        transform: scale(1.1);
    }
</style>

<div class="payment-container">
    <div class="payment-card">
        <!-- Product Section -->
        <div class="product-section">
            <?php if (isset($product->title) && !empty($product->title)): ?>
                <div class="product-title"><?= htmlspecialchars($product->title); ?></div>
            <?php else: ?>
                <div class="product-title text-muted">Untitled Product</div>
            <?php endif; ?>

            <?php if (isset($product->price) && !empty($product->price)): ?>
                <div class="product-price">₹<?= htmlspecialchars($product->price); ?></div>
            <?php else: ?>
                <div class="product-price text-muted">Price not available</div>
            <?php endif; ?>

            <div class="product-meta">One-time Payment</div>
        </div>

        <!-- Form Section -->
        <form id="paymentForm" class="form-section" enctype="multipart/form-data" novalidate>
            <div class="success-message" id="successMessage"></div>

            <!-- QR Section -->
            <div class="qr-section text-center">
                <h5 class="qr-title">
                    <span class="icon">📱</span> Scan QR Code
                </h5>
                <div class="qr-code-container">
                    <img
                        src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode($qr->qr_data); ?>"
                        alt="QR Code" class="qr-code-image">

                    <div class="qr-instruction"><b>Use any UPI app to scan and complete payment</b></div>
                    <div class="upi-icons">
                        <img src="<?= base_url('assets/images/phonpay.png'); ?>" alt="PhonePe" class="upi-icon">
                        <img src="<?= base_url('assets/images/gpay.png'); ?>" alt="Google Pay" class="upi-icon">
                        <img src="<?= base_url('assets/images/paytm.png'); ?>" alt="Paytm" class="upi-icon">
                        <img src="<?= base_url('assets/images/bhim.png'); ?>" alt="BHIM" class="upi-icon">
                    </div>
                </div>
            </div>

            <hr class="section-divider">

            <!-- Upload Receipt -->
            <h5><span class="icon">📄</span> Upload Payment Receipt</h5>
            <label for="receiptInput" class="form-label">Receipt Image/Document</label>
            <div class="upload-container">
                <div class="file-input-wrapper">
                    <label for="receiptInput" class="file-input-label">📎 Click to upload or drag and drop</label>
                    <input type="file" id="receiptInput" name="payment_receipt" accept="image/*,.pdf" required>
                    <div class="file-name" id="fileName"></div>
                </div>
            </div>

            <!-- Email Section -->
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email Address</label>
                <?php if (isset($this->session) && $this->session->userdata('user_email')): ?>
                    <input type="email" class="form-control" id="emailInput" name="email"
                        value="<?= htmlspecialchars($this->session->userdata('user_email')); ?>" readonly>
                <?php else: ?>
                    <input type="email" class="form-control" id="emailInput" name="email" placeholder="your@email.com"
                        required>
                <?php endif; ?>
            </div>

            <!-- Transaction Reference -->
            <div class="mb-3">
                <label for="notesInput" class="form-label">Transaction Reference (Optional)</label>
                <input type="text" class="form-control" id="notesInput" name="transaction_ref"
                    placeholder="Enter UPI Transaction ID or reference">
            </div>

            <!-- Hidden Product Info -->
            <input type="hidden" name="product_title" value="<?= htmlspecialchars($product->title); ?>">
            <input type="hidden" name="product_price" value="<?= htmlspecialchars($product->price); ?>">

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Submit Payment</button>
        </form>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>


<script>
    document.getElementById('receiptInput').addEventListener('change', function() {
        const fileNameDiv = document.getElementById('fileName');
        if (this.files.length) {
            fileNameDiv.textContent = '📄 ' + this.files[0].name;
            fileNameDiv.classList.add('show');
        } else {
            fileNameDiv.textContent = '';
            fileNameDiv.classList.remove('show');
        }
    });
    $(document).ready(function() {
        $("#paymentForm").on("submit", function(e) {
            e.preventDefault();

            var fileInput = $("#receiptInput")[0].files.length;
            if (fileInput === 0) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Please upload your payment receipt."
                });
                e.preventDefault();
                return false;
            }

            var formData = new FormData(this);

            $.ajax({
                url: "<?= base_url('product/submit'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    $(".btn-submit").prop("disabled", true).text("Processing...");
                },
                success: function(response) {
                    $(".btn-submit").prop("disabled", false).text("Submit Payment");

                    if (response.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Payment Successful!",
                            text: "Payment successful. We will verify and give you access shortly."
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to booking page
                                window.location.href = "<?= base_url('history'); ?>";
                            }
                        });

                        // Reset form
                        $("#paymentForm")[0].reset();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: response.message
                        });
                    }
                },

                error: function() {
                    $(".btn-submit").prop("disabled", false).text("Submit Payment");
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong. Please try again."
                    });
                }
            });
        });
    });
</script>