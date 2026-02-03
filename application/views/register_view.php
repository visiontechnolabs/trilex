<div class="container">
     <!-- Register Form -->
        <div class="" id="">
            <div class="form-card">
                <div class="form-header">
                    <div class="form-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                    </div>
                    <h1 class="form-title">Create Account</h1>
                    <p class="form-subtitle">Sign up to get started</p>
                </div>

                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <input type="text" placeholder="First name" name="first_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <input type="text" placeholder="Last name" name="last_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <div class="input-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <input type="email" placeholder="Enter your email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <div class="input-icon">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <input type="password" placeholder="Create a password" name="password">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">Create Account</button>
                </form>

                <div class="form-footer">
                    Already have an account? <a href="<?= base_url('login');?>" >Sign In</a>
                </div>
            </div>
        </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script>
$(document).ready(function() {

  $('form').on('submit', function(e) {
    e.preventDefault();

    var first_name = $('input[placeholder="First name"]').val().trim();
    var last_name  = $('input[placeholder="Last name"]').val().trim();
    var email      = $('input[placeholder="Enter your email"]').val().trim();
    var password   = $('input[placeholder="Create a password"]').val().trim();

    if (!first_name || !last_name || !email || !password) {
      Swal.fire({
        icon: 'warning',
        title: 'Missing Fields',
        text: 'Please fill in all fields.'
      });
      return;
    }

    // Send AJAX request
    $.ajax({
      url: "<?= base_url('login/send_otp_email') ?>",
      type: "POST",
      data: {
        first_name: first_name,
        last_name: last_name,
        email: email,
        password: password
      },
      dataType: "json",
      beforeSend: function() {
        $('.btn-primary').prop('disabled', true).text('Sending OTP...');
      },
      success: function(res) {
        if (res.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'OTP Sent!',
            text: 'Check your email for the OTP.',
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = "<?= base_url('login/send_otp') ?>";
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: res.message
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Server error. Try again later.'
        });
      },
      complete: function() {
        $('.btn-primary').prop('disabled', false).text('Create Account');
      }
    });
  });
});
</script>
