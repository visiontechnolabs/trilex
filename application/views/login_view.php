 <div class="container mt-5">
     <div class="form-page active" id="loginPage">
         <div class="form-card">
             <div class="form-header">
                 <div class="form-icon">
                     <svg viewBox="0 0 24 24">
                         <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                         <circle cx="12" cy="7" r="4"></circle>
                     </svg>
                 </div>
                 <h1 class="form-title">Welcome Back</h1>
                 <p class="form-subtitle">Sign in to continue to your account</p>
             </div>

             <form id="loginForm" novalidate>
                 <div class="form-group">
                     <label>Email Address</label>
                     <div class="input-wrapper">
                         <div class="input-icon">
                             <svg viewBox="0 0 24 24">
                                 <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                 <polyline points="22,6 12,13 2,6"></polyline>
                             </svg>
                         </div>
                         <input type="email" name="email" placeholder="Enter your email" required>
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
                         <input type="password" name="password" placeholder="Enter your password" required>
                     </div>
                 </div>

                 <div class="forgot-password">
                     <a href="#">Forgot Password?</a>
                 </div>

                 <button type="submit" class="btn-primary">Sign In</button>
             </form>


             <div class="form-footer">
                 Don't have an account? <a href="<?= base_url('register'); ?>">Sign Up</a>
             </div>
         </div>
     </div>
 </div>
 <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

 <script>
     $(document).ready(function() {
         $('#loginForm').on('submit', function(e) {
             e.preventDefault();
             var form = this;

             // Bootstrap validation
             if (form.checkValidity() === false) {
                 e.stopPropagation();
                 $(form).addClass('was-validated');
                 return;
             }

             $.ajax({
                 url: "<?= base_url('login/process_login') ?>",
                 type: "POST",
                 data: $(form).serialize(),
                 dataType: "json",
                 beforeSend: function() {
                     $('.btn-primary').prop('disabled', true).text('Signing In...');
                 },
                 success: function(res) {
                     if (res.status === 'success') {
                         Swal.fire({
                             icon: 'success',
                             title: 'Welcome!',
                             text: 'Login successful.',
                             timer: 1500,
                             showConfirmButton: false
                         }).then(() => {
                             window.location.href = "<?= base_url() ?>";
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
                         text: 'Server error. Try again.'
                     });
                 },
                 complete: function() {
                     $('.btn-primary').prop('disabled', false).text('Sign In');
                 }
             });
         });
     });
 </script>