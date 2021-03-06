<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="backend/assets/images/favicon.ico">

	<title>POS | Login</title>

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
var baseurl = "{{ url('/post_login') }}";
</script>

<div class="login-container">

	<div class="login-header login-caret">

		<div class="login-content">

			<a href="index.html" class="logo">
				<img src="backend/assets/images/pos_logo.png" width="120" alt="" />
			</a>
            <h5> POS v2.0 </h5>
			<p class="description">Dear user, log in to access the admin area!</p>

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

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Please enter valid <strong>email and password</strong></p>
            </div>

			<form method="post" role="form" id="form_login" >
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>

						<input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off"  />

					</div>
				</div>
				<div class="form-group">

					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password"  autocomplete="off" />

					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login In
					</button>
                </div>

				<div class="form-group">
					<em>- or -</em>
				</div>


			</form>


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
	<script src="backend/assets/js/neon-login.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="backend/assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="backend/assets/js/neon-demo.js"></script>

</body>
</html>
