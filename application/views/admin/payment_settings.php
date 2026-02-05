<div class="page-wrapper">
    <div class="page-content">

        <div class="card shadow-sm">
            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Payment QR Settings</h5>
            </div>

            <div class="card-body">

                <form method="post" action="<?= base_url('admin/paymentsettings/update_qr'); ?>">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">UPI ID</label>
                        <input type="text"
                            name="upi_id"
                            class="form-control"
                            value="<?= htmlspecialchars($qr->upi_id ?? ''); ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">QR Data</label>
                        <textarea name="qr_data"
                            class="form-control"
                            rows="3"
                            required><?= htmlspecialchars($qr->qr_data ?? ''); ?></textarea>
                        <small class="text-muted">
                            Example: UPI:9999999999@paytm
                        </small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Live QR Preview</label>
                        <div class="border p-3 text-center bg-white rounded">
                            <img
                                src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode($qr->qr_data ?? ''); ?>"
                                class="img-fluid"
                                style="max-width: 180px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>