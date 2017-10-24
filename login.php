<?php
session_start(); ?>
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Login | Go.Price.Shop.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
<body>
	<?php
	$redirect = NULL;
	if($_POST['location'] != '') {
		$redirect = $_POST['location'];
		$redirect = substr($redirect, 1);
	}

    if (empty($_POST['username'])) {
        $errMessage[] = "Username is required";
    } else {
        $username = test_input($_POST['username']);
        $query = "SELECT * FROM cust_data WHERE username = '$username'";
        $result = $test_db->query($query);
        $result = $result->fetch_assoc();
        if($result == ''){
            $errMessage[0] = "This login information does not match our records, please try again.";
        }
    	if (empty($_POST['password'])) {
        $errMessage[] = "Password is required";
    } else {
        $password = test_input($_POST['password']);
		$encrypted = encryptIt( $password );
        $query = "SELECT * FROM cust_data WHERE username = '$username' AND passwd = '$encrypted'";
        $result = $test_db->query($query);
        $result = $result->fetch_assoc();
        if(!$result){
            $errMessage[0] = "This login information does not match our records, please try again.";
        }
  }
}

    if(count($errMessage) == 0){
	$checkauth = "SELECT * FROM cust_data WHERE username = '$username'";
	$resultauth = $test_db->query($checkauth);
	$resultauth = $resultauth->fetch_assoc();
	if($resultauth['emailval']!="TRUE"){
			$_SESSION['emailhash'] = $resultauth['emailhash'];
			$_SESSION['user'] = test_input($_POST['username']);
			header("Location:accountpending.php");
			exit();
		}
		elseif($resultauth['passreset']=="TRUE"){
			$_SESSION['status'] = "pass";
			header("Location:accountpending.php");
			exit();
		} else {
		$custid = $resultauth['id'];
		$username = test_input($_POST['username']);
		$_SESSION['username'] = $username;
		$_SESSION['cust_id'] = $custid;
		$_SESSION['usertype'] = $result['usertype'];
		$_SESSION['fname'] = $result['fname'];
		date_default_timezone_set("America/New_York");
		$timestamp = date("Y-m-d H:i:s");
		$query = "UPDATE cust_data SET signedin = 'TRUE', timestamp = '$timestamp' WHERE id = '$custid'";
		$result = $test_db->query($query);
		logActivity("1","login",$custid,"NA");
		if($redirect) {
			header("Location:".$path.$redirect);
			exit();
		} else {
			header("Location:".$path."dashboard.php");
			exit();
		}
		exit();
		}
	} ?>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="content">
						<div class="header">
							<div class="logo text-center"><img src="assets/img/logo.png" alt="Go.Price.Shop."></div>
							<p class="lead">Login to your account</p>
						</div>
						<form class="form-auth-small" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label for="signin-username" class="control-label sr-only">Username</label>
								<input type="text" name="username" class="form-control" id="signin-username" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" name="password" class="form-control" id="signin-password" value="" placeholder="Password">
							</div>
							<div class="form-group clearfix">
								<label class="fancy-checkbox element-left">
									<input type="checkbox">
									<span>Remember me</span>
								</label>
								<span class="helper-text element-right">Don't have an account? <a href="register.php">Register</a></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							<div class="bottom">
								<span class="helper-text"><i class="fa fa-lock"></i> <a href="forgot-password.php">Forgot password?</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
