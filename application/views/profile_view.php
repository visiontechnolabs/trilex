<style>
    
</style>

<div class="container mt-3">
    <!-- Account Tab -->
    <div id="account" class="tab-content active">
        <div class="account-header">
            <div class="profile-avatar">👤</div>
            <div class="account-name" id="headerName">
                <?= isset($user->name) ? htmlspecialchars($user->name) : 'John Doe'; ?>
            </div>
            <div class="account-email" id="headerEmail">
                <?= isset($user->email) ? htmlspecialchars($user->email) : 'john@example.com'; ?>
            </div>
        </div>

        <div class="account-card">
            <div class="success-alert" id="successAlert">
                ✓ Account updated successfully!
            </div>

            <h5 class="form-section-title">✏️ Update Account Information</h5>

           <form id="accountForm" novalidate>
    <div class="form-row">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input 
                type="text" 
                class="form-control" 
                id="fullName" 
                name="name"
                placeholder="Enter your full name" 
                value="<?= isset($user->name) ? htmlspecialchars($user->name) : ''; ?>" 
                required
            >
            <div class="invalid-feedback">Please enter your full name.</div>
        </div>
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email Address</label>
            <input 
                type="email" 
                class="form-control" 
                id="emailInput" 
                name="email"
                placeholder="Enter your email" 
                value="<?= isset($user->email) ? htmlspecialchars($user->email) : ''; ?>" 
                required
            >
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-update">Update Account</button>
</form>
        </div>

        <div class="account-card">
            <h5 class="form-section-title">🔐 Account Details</h5>
            <div class="transaction-details">
                <div class="detail-item">
                    <div class="detail-label">Member Since</div>
                    <div class="detail-value">
                        <?= isset($user->created_on) ? date('F d, Y', strtotime($user->created_on)) : 'N/A'; ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Total Transactions</div>
                    <div class="detail-value">
                        <?= isset($order_count) ? $order_count : 0; ?>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Account Status</div>
                    <div class="detail-value" style="color: <?= (isset($user->isActive) && $user->isActive) ? '#22c55e' : '#f87171'; ?>;">
                        <?= (isset($user->isActive) && $user->isActive) ? 'Active' : 'Inactive'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script>
    $(document).ready(function() {
    // Bootstrap validation
    'use strict';
    var form = $('#accountForm');

    form.on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (form[0].checkValidity() === false) {
            form.addClass('was-validated');
            return;
        }

        var formData = form.serialize();

        $.ajax({
            url: "<?= base_url('home/update_user'); ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('.btn-update').prop('disabled', true).text('Updating...');
            },
            success: function(response) {
                $('.btn-update').prop('disabled', false).text('Update Account');

                if(response.status === 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Account Updated!',
                        text: response.message
                    }).then(() => {
                        location.reload(); 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function() {
                $('.btn-update').prop('disabled', false).text('Update Account');
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });
});
</script>