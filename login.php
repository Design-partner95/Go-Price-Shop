<?php
session_start();
require 'assets/include/db.php';
global $path;
$errMessage = array();
$error_css = $error_css1 = ""; ?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> <!-- For FB Login -->
</head>
<body>
	<script src="assets/scripts/fb.js"></script> <!-- For FB Login -->
	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$redirect = NULL;
	if($_POST['location'] != '') {
		$redirect = $_POST['location'];
		$redirect = substr($redirect, 1);
	}

    if (empty($_POST['username'])) {
        $errMessage[] = "Username is required";
				$error_css = 'background-color: #FFBABA;';
			} else {
        $username = test_input($_POST['username']);
        $query = "SELECT * FROM cust_data WHERE username = '$username'";
        $result = $test_db->query($query);
        $result = $result->fetch_assoc();
        if($result == ''){
            $errMessage[] = "This login information does not match our records, please try again.";
						$error_css = 'background-color: #FFBABA;';
						$error_css1 = 'background-color: #FFBABA;';
        }
			}

    	if (empty($_POST['password'])) {
        $errMessage[] = "Password is required";
				$error_css1 = 'background-color: #FFBABA;';
    } else {
        $password = test_input($_POST['password']);
				$encrypted = encryptIt( $password );
        $query = "SELECT * FROM cust_data WHERE username = '$username' AND passwd = '$encrypted'";
        $result = $test_db->query($query);
        $result = $result->fetch_assoc();
        if(!$result){
            $errMessage[] = "This login information does not match our records, please try again.";
						$error_css = 'background-color: #FFBABA;';
						$error_css1 = 'background-color: #FFBABA;';
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
		}
	}

if(count($errMessage) > 0){ ?>
		<div class="alert alert-danger alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <p><strong>Error!</strong><br /><?php
              foreach($errMessage as $e){
              	echo " * " . $e . "<br />";
              } ?></p></div>
    <?php }
	}
	if(isset($_SESSION['status'])){
	if($_SESSION['status'] == "passreset"){ ?>
            <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><strong>Success!</strong> Your password has been successfully updated.  Please login with your username and new password.</p>
                </div>
     <?php session_destroy(); }
		 if($_SESSION['status'] == "noneed"){ ?>
	             <div class="alert alert-info alert-dismissable">
	 						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	             <p><strong>Heads Up!</strong> Looks like you tried to verify your information but it returned you to try to login again.  Try logging in again.</p>
	                 </div>
	      <?php session_destroy(); }
			}?>
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
								<input type="text" name="username" class="form-control" id="signin-username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" placeholder="Username" style="<?php echo $error_css; ?>">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" name="password" class="form-control" id="signin-password" value="" placeholder="Password" style="<?php echo $error_css1; ?>">
								<input type="hidden" name="location" value="<?php if(isset($_GET['location'])) { echo htmlspecialchars($_GET['location']); } if(isset($redirect)) { echo htmlspecialchars($redirect); } ?>" />
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
						<div class="separator-linethrough"><span>OR</span></div>
						<button class="btn btn-signin-social" onclick="Login();"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
						<button class="btn btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/common.js"></script>
</body>
</html>
