<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="backend/assets/images/favicon.ico">

	<title>Neon | Register</title>

	<link rel="stylesheet" href="backend/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="backend/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="backend/assets/css/bootstrap.css">
	<link rel="stylesheet" href="backend/assets/css/neon-core.css">
	<link rel="stylesheet" href="backend/assets/css/neon-theme.css">
	<link rel="stylesheet" href="backend/assets/css/neon-forms.css">
	<link rel="stylesheet" href="backend/assets/css/custom.css">

	<script src="backend/assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="backend/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="index.html" class="logo">
				<img src="backend/assets/images/logo@2x.png" width="120" alt="" />
			</a>

			<p class="description">Create an account, it's free and takes few moments only!</p>

			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>

	</div>

	<div class="login-progressbar">
		<div></div>
	</div>

	<div class="login-form">

		<div class="login-content">

			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="form-register-success">
					<i class="entypo-check"></i>
					<h3>You have been successfully registered.</h3>
					<p>We have emailed you the confirmation link for your account.</p>
				</div>

				<div class="form-steps">

					<div class="step current" id="step-1">

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>

								<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User Name" name="name" id="name"value="{{ old('name') }}" required autocomplete="name" autofocus>
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>

								<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" >

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-password"></i>
								</div>

								<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" required autocomplete="new-password">

								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-password"></i>
								</div>

								<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">

                                <input type="hidden" class="form-control" value="1" name="privilegio" id="privilegio" />
                            </div>
						</div>




						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Complete Registration
							</button>
						</div>

						<div class="form-group">
							Step 2 of 2
						</div>

					</div>

				</div>

			</form>


			<div class="login-bottom-links">

				<a href="{{ route('login') }}" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>

				<br />

				<a href="#">ToS</a>  - <a href="#">Privacy Policy</a>

			</div>

		</div>

	</div>

</div>


	<!-- Bottom scripts (common) -->
	<script src="backend/assets/js/gsap/TweenMax.min.js"></script>
	<script src="backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="backend/assets/js/bootstrap.js"></script>
	<script src="backend/assets/js/joinable.js"></script>
	<script src="backend/assets/js/resizeable.js"></script>
	<script src="backend/assets/js/neon-api.js"></script>
	<script src="backend/assets/js/jquery.validate.min.js"></script>
	<script src="backend/assets/js/neon-register.js"></script>
	<script src="backend/assets/js/jquery.inputmask.bundle.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="backend/assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="backend/assets/js/neon-demo.js"></script>

</body>
</html>
