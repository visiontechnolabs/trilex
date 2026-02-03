<div class="container mt-5">
  <!-- OTP Verification Form -->
  <div class="form-page">
    <div class="form-card">
      <div class="form-header">
        <div class="form-icon">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
          </svg>
        </div>
        <h1 class="form-title">Verify Your Email</h1>
        <p class="form-subtitle">Enter the 6-digit code sent to your email</p>
      </div>

      <!-- ✅ Added ID -->
      <form id="otpForm">
        <div class="form-group">
          <div class="otp-inputs">
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
            <input type="text" maxlength="1" class="otp-input" pattern="[0-9]" required>
          </div>
        </div>

        <button type="submit" class="btn-primary">Verify Code</button>
      </form>

      <div class="resend-code">
        Didn't receive the code? <button type="button" id="resendBtn">Resend</button>
      </div>

     
    </div>
  </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script>
$(document).ready(function(){

  // Combine 6 digits into one string before sending
  $('#otpForm').on('submit', function(e){
    e.preventDefault();

    var otp = '';
    $('.otp-input').each(function(){
      otp += $(this).val();
    });

    if(otp.length !== 6){
      Swal.fire({icon: 'warning', text: 'Please enter all 6 digits of the OTP'});
      return;
    }

    $.ajax({
      url: "<?= base_url('login/verify_otp') ?>",
      type: "POST",
      data: { otp: otp },
      dataType: "json",
      success: function(res){
        if(res.status === 'success'){
          Swal.fire({
            icon: 'success',
            title: 'Account Created!',
            text: 'Your email has been verified.',
            timer: 2000,
            showConfirmButton: false
          }).then(() => {
            window.location.href = "<?= base_url() ?>";
          });
        } else {
          Swal.fire({icon: 'error', title: 'Invalid OTP', text: res.message});
        }
      }
    });
  });

  // Auto move to next input
  $('.otp-input').on('input', function(){
    if (this.value.length === this.maxLength) {
      $(this).next('.otp-input').focus();
    }
  });

  // Move back on backspace
  $('.otp-input').on('keydown', function(e){
    if (e.key === "Backspace" && this.value === '') {
      $(this).prev('.otp-input').focus();
    }
  });

});
</script>

