<!doctype html>

<html lang="en" data-bs-theme="light">



<head>

	<!-- Required meta tags -->

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--favicon-->

	<link rel="icon" type="image/png" href="<?= base_url('assets/images/android-chrome-192x192.png'); ?>">

	<!--plugins-->

	<link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet">

	<link href="<?= base_url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">

	<link href="<?= base_url('assets/plugins/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">

	<!-- loader-->

	<link href="<?= base_url('assets/css/pace.min.css') ?>" rel="stylesheet">

	<script src="<?= base_url('assets/js/pace.min.js') ?>"></script>

	<!-- Bootstrap CSS -->

	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

	<link href="<?= base_url('assets/css/bootstrap-extended.css') ?>" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<link href="<?= base_url('assets/sass/app.css') ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/sass/dark-theme.css') ?>">

	<link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">

	<title>Nexusexcel pvt Ltd-Admin</title>

	<style>
		body {
			background: #f5f7fa;
		}



		.section-authentication-signin {
			min-height: 100vh;
		}

		.card {
			border-radius: 16px;
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
		}

		.login-brand img {
			border-radius: 50%;
			padding: 6px;
			background: #f2fbfb;
		}

		.btn-primary {
			background: #007bff;
			border: none;
		}

		.btn-primary:hover {
			background: #0056b3;
		}
	</style>


</head>


<body class="">

	<!--wrapper-->

	<div class="wrapper">

		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">

			<div class="container">

				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">

					<div class="col mx-auto">

						<div class="card mb-0">

							<div class="card-body">

								<?php if ($this->session->flashdata('success')): ?>

									<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">

										<div class="d-flex align-items-center">

											<div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>

											<div class="ms-3">

												<!-- <h6 class="mb-0 text-white">Success Alerts</h6> -->

												<div class="text-white">

													<?= $this->session->flashdata('success'); ?>

												</div>

											</div>
										</div>
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"></button>
									</div>

								<?php endif; ?>



								<!-- success alert  end-->



								<!-- Danger alert -->



								<?php if ($this->session->flashdata('error')): ?>



									<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">



										<div class="d-flex align-items-center">



											<div class="font-35 text-white"><i class="bx bxs-error"></i></div>



											<div class="ms-3">



												<!-- <h6 class="mb-0 text-white">Error Alert</h6> -->



												<div class="text-white">



													<?= $this->session->flashdata('error'); ?>



												</div>



											</div>



										</div>



										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"></button>



									</div>



								<?php endif; ?>



								<!-- Danger alert end-->



								<!-- alerts end -->

								<div class="p-4">

									<div class="login-brand text-center mb-4">
										<img src="<?= base_url('assets/images/logo_new.png	') ?>" width="70" alt="Company Logo" />
										<h4 class="mt-3 fw-bold">Trilex Advisory</h4>
										<p class="text-muted">Secure Admin Login</p>
									</div>

									<div class="form-body">

										<form class="row g-3 login-form needs-validation" id="loginForm"
											action="<?= base_url('admin') ?>" method="post" novalidate>


											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Mobile</label>
												<input type="text" name="mobile" class="form-control"
													id="inputEmailAddress" placeholder="+91 9090123456">
												<div class="invalid-feedback">Please enter your Mobile.</div>
											</div>

											<div class="col-12">

												<label for="inputChoosePassword" class="form-label">Password</label>

												<div class="input-group" id="show_hide_password">

													<input type="password" class="form-control border-end-0"
														name="password" id="inputChoosePassword" value=""
														placeholder="Enter Password">

													<a href="javascript:;" class="input-group-text bg-transparent"><i
															class='bx bx-hide'></i></a>

													<div class="invalid-feedback">Please enter your password.</div>



												</div>

											</div>





											<div class="col-12">

												<div class="d-grid">

													<button type="submit" class="btn btn-primary btn-lg w-100 shadow">
														Sign in to Dashboard
													</button>


												</div>

											</div>



										</form>

									</div>







								</div>

							</div>

						</div>

					</div>

				</div>

				<!--end row-->

			</div>

		</div>

	</div>

	<!--end wrapper-->

	<!-- Bootstrap JS -->

	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

	<!--plugins-->

	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

	<script src="<?= base_url('assets/plugins/simplebar/js/simplebar.min.js') ?>"></script>

	<script src="<?= base_url('assets/plugins/metismenu/js/metisMenu.min.js') ?>"></script>

	<script src="<?= base_url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') ?>"></script>

	<!--Password show & hide js -->

	<script>
		$(document).ready(function() {

			$("#show_hide_password a").on('click', function(event) {

				event.preventDefault();

				if ($('#show_hide_password input').attr("type") == "text") {

					$('#show_hide_password input').attr('type', 'password');

					$('#show_hide_password i').addClass("bx-hide");

					$('#show_hide_password i').removeClass("bx-show");

				} else if ($('#show_hide_password input').attr("type") == "password") {

					$('#show_hide_password input').attr('type', 'text');

					$('#show_hide_password i').removeClass("bx-hide");

					$('#show_hide_password i').addClass("bx-show");

				}

			});

		});
	</script>

	<!--app JS-->

	<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>



</html>