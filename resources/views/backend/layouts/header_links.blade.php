
<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Shuvra Roy Sajal" />



	<link rel="icon" href="backend/assets/images/favicon.ico">

    <title>{{ isset($main_menu) ? $main_menu : "Welcome" }}</title>

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
