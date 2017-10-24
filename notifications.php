<!doctype html>
<html lang="en">

<head>
	<title>Notifications | DiffDash - Free Admin Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<!-- logo -->
				<div class="navbar-brand">
					<a href="index.html"><img src="assets/img/logo.png" alt="DiffDash Logo" class="img-responsive logo"></a>
				</div>
				<!-- end logo -->
				<div class="navbar-right">
					<!-- search form -->
					<form id="navbar-search" class="navbar-form search-form">
						<input value="" class="form-control" placeholder="Search here..." type="text">
						<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
					</form>
					<!-- end search form -->
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-alarm"></i>
									<span class="notification-dot"></span>
								</a>
								<ul class="dropdown-menu notifications">
									<li class="header"><strong>You have 7 new notifications</strong></li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-flag-checkered text-muted"></i>
												</div>
												<div class="media-body">
													<p class="text">Your campaign <strong>Holiday Sale</strong> is starting to engage potential customers.</p>
													<span class="timestamp">24 minutes ago</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
												</div>
												<div class="media-body">
													<p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
													<span class="timestamp">2 hours ago</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-bar-chart text-muted"></i>
												</div>
												<div class="media-body">
													<p class="text">Website visits from Facebook is 27% higher than last week.</p>
													<span class="timestamp">Yesterday</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-check-circle text-success"></i>
												</div>
												<div class="media-body">
													<p class="text">Your campaign <strong>Holiday Sale</strong> is approved.</p>
													<span class="timestamp">2 days ago</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="media">
												<div class="media-left">
													<i class="fa fa-fw fa-exclamation-circle text-danger"></i>
												</div>
												<div class="media-body">
													<p class="text">Error on website analytics configurations</p>
													<span class="timestamp">3 days ago</span>
												</div>
											</div>
										</a>
									</li>
									<li class="footer"><a href="#" class="more">See all notifications</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-cog"></i>
								</a>
								<ul class="dropdown-menu user-menu menu-icon">
									<li class="menu-heading">ACCOUNT SETTINGS</li>
									<li><a href="#"><i class="fa fa-fw fa-edit"></i> <span>Basic</span></a></li>
									<li><a href="#"><i class="fa fa-fw fa-bell"></i> <span>Notifications</span></a></li>
									<li><a href="#"><i class="fa fa-fw fa-sliders"></i> <span>Preferences</span></a></li>
									<li><a href="#"><i class="fa fa-fw fa-lock"></i> <span>Privacy</span></a></li>
									<li class="menu-heading">BILLING</li>
									<li><a href="#"><i class="fa fa-fw fa-file-text-o"></i> <span>Invoices</span></a></li>
									<li><a href="#"><i class="fa fa-fw fa-credit-card"></i> <span>Payments</span></a></li>
									<li><a href="#"><i class="fa fa-fw fa-refresh"></i> <span>Renewals</span></a></li>
									<li class="menu-button">
										<a href="#" class="btn btn-primary"><i class="fa fa-rocket"></i> UPGRADE PLAN</a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-question-circle"></i>
								</a>
								<ul class="dropdown-menu user-menu">
									<li>
										<form class="search-form help-search-form">
											<input value="" class="form-control" placeholder="How can we help?" type="text">
											<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
										</form>
									</li>
									<li class="menu-heading">HOW-TO</li>
									<li><a href="#">Setting up Campaign</a></li>
									<li><a href="#">Understanding Website Analytics</a></li>
									<li><a href="#">Boost Your Sales</a></li>
									<li><a href="#">Knowing Your Audience</a></li>
									<li class="menu-heading">ACCOUNT</li>
									<li><a href="#">Change Password</a></li>
									<li><a href="#">Privacy &amp; Security</a></li>
									<li><a href="#">Membership</a></li>
									<li class="menu-heading">BILLING</li>
									<li><a href="#">Setup Payment</a></li>
									<li><a href="#">Auto-Renewal Program</a></li>
									<li><a href="#">Cancellation</a></li>
									<li class="menu-button">
										<a href="#" class="btn btn-primary"><i class="fa fa-question-circle"></i> HELP CENTER</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- end navbar menu -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
					<img src="assets/img/user.png" class="img-responsive img-circle user-photo" alt="User Profile Picture">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>Austin Hoffman</strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a href="#">My Profile</a></li>
							<li><a href="#">Messages</a></li>
							<li><a href="#">Settings</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</div>
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="index.html"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li class="">
							<a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="lnr lnr-magic-wand"></i> <span>UI Elements</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="ui-tabs.html">Tabs</a></li>
								<li class=""><a href="ui-buttons.html">Buttons</a></li>
								<li class=""><a href="ui-bootstrap.html">Bootstrap UI</a></li>
								<li class=""><a href="ui-icons.html"><span>Icons</span></a></li>
							</ul>
						</li>
						<li class="">
							<a href="#subPages" class="has-arrow" aria-expanded="false"><i class="lnr lnr-file-empty"></i> <span>Pages</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="page-profile.html">User Profile</a></li>
								<li class=""><a href="page-login.html">Login</a></li>
								<li class=""><a href="page-register.html">Register</a></li>
								<li class=""><a href="page-lockscreen.html">Lockscreen</a></li>
								<li class=""><a href="page-forgot-password.html">Forgot Password</a></li>
								<li class=""><a href="page-404.html">Page 404</a></li>
								<li class=""><a href="page-500.html">Page 500</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#forms" class="has-arrow" aria-expanded="false"><i class="lnr lnr-pencil"></i> <span>Forms</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="forms-validation.html">Form Validation</a></li>
								<li class=""><a href="forms-advanced.html">Advanced Form Elements</a></li>
								<li class=""><a href="forms-basic.html">Basic Form Elements</a></li>
								<li class=""><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>
								<li class=""><a href="forms-texteditor.html">Text Editor</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#charts" class="has-arrow" aria-expanded="false"><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a>
							<ul aria-expanded="true">
								<li class=""><a href="charts-chartist.html">Chartist</a></li>
								<li class=""><a href="charts-sparkline.html">Sparkline Chart</a></li>
							</ul>
						</li>
						<li class="active"><a href="notifications.html"><i class="lnr lnr-alarm"></i> <span>Notifications</span> <span class="badge bg-danger">15</span></a></li>
						<li class=""><a href="typography.html"><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
					</ul>
				</nav>
				<div style="padding: 30px; text-align: center;">
					<h2 style="font-size: 16px; margin-bottom: 15px; font-weight: 700;">Other Similar Template</h2>
					<a href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=diffdash&utm_medium=template&utm_campaign=KlorofilPro" target="_blank"><img src="assets/img/klorofilpro.png" class="img-responsive thumbnail" alt=""></a>
					<a href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=diffdash&utm_medium=template&utm_campaign=KlorofilPro" target="_blank" class="btn btn-primary">VIEW DEMO</a>
				</div>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">
			<div class="container-fluid">
				<div class="section-heading">
					<h1 class="page-title">Notifications</h1>
				</div>
				<div class="panel-content">
					<strong>Message Context</strong>
					<br>
					<br>
					<p class="demo-button">
						<button type="button" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="bottom-right">General Info</button>
						<button type="button" class="btn btn-success btn-toastr" data-context="success" data-message="This is success info" data-position="bottom-right">Success Info</button>
						<button type="button" class="btn btn-warning btn-toastr" data-context="warning" data-message="This is warning info" data-position="bottom-right">Warning Info</button>
						<button type="button" class="btn btn-danger btn-toastr" data-context="error" data-message="This is error info" data-position="bottom-right">Error Info</button>
					</p>
					<div class="margin-bottom-30"></div>
					<strong>Popup Positions</strong>
					<br>
					<br>
					<p class="demo-button">
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="bottom-right">Bottom Right</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="bottom-left">Bottom Left</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="top-left">Top Left</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="top-right">Top Right</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="top-full-width">Top Full Width</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="bottom-full-width">Bottom Full Width</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="top-center">Top Center</button>
						<button type="button" class="btn btn-default btn-toastr" data-context="info" data-message="Hi, I'm here" data-position="bottom-center">Bottom Center</button>
					</p>
					<div class="margin-bottom-30"></div>
					<strong>Callback Events</strong>
					<br>
					<br>
					<p class="demo-button">
						<button type="button" class="btn btn-default btn-toastr-callback" id="toastr-callback1" data-context="info" data-message="onShown and onHidden callback demo">onShown and onHidden</button>
						<button type="button" class="btn btn-default btn-toastr-callback" id="toastr-callback2" data-context="info" data-message="Please click me">onclick</button>
						<button type="button" class="btn btn-default btn-toastr-callback" id="toastr-callback3" data-context="info" data-message="Please click close button">onCloseClick</button>
					</p>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
		<footer>
			<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script>
	$(function() {
		toastr.options.timeOut = "false";
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr['info']('Hi there, this is notification demo with HTML support. So, you can add HTML elements like <a href="#">this link</a>');

		$('.btn-toastr').on('click', function() {
			$context = $(this).data('context');
			$message = $(this).data('message');
			$position = $(this).data('position');

			if ($context === '') {
				$context = 'info';
			}

			if ($position === '') {
				$positionClass = 'toast-bottom-right';
			} else {
				$positionClass = 'toast-' + $position;
			}

			toastr.remove();
			toastr[$context]($message, '', {
				positionClass: $positionClass
			});
		});

		$('#toastr-callback1').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "300",
				"onShown": function() {
					alert('onShown callback');
				},
				"onHidden": function() {
					alert('onHidden callback');
				}
			};

			toastr['info']($message);
		});

		$('#toastr-callback2').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"onclick": function() {
					alert('onclick callback');
				},
			};

			toastr['info']($message);

		});

		$('#toastr-callback3').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"closeButton": true,
				"onCloseClick": function() {
					alert('onCloseClick callback');
				}
			};

			toastr['info']($message);
		});
	});
	</script>
</body>

</html>
