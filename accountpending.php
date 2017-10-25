<?php
session_start();
require 'assets/include/db.php';
$status = isset($_GET['code']) ? $_GET['code'] : '';
if($status == ""){
$status = isset($_SESSION['status']) ? $_SESSION['status'] : '';
}
global $path;
$errMessage = array();
$error_css = $error_css1 = $error_css2 = "";?>
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Forgot Password | Go.Price.Shop.</title>
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
	if($status == "pass"){
		$_SESSION['status'] = "pass";
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (empty($_POST['temp-password'])) {
				$errMessage[] = "You need to put in the temporary password from your email.";
				$error_css = 'background-color: #FFBABA;';
			} else {
				$temppass = test_input($_POST['temp-password']);
				$encrypted = encryptIt( $temppass );
			}
			if (empty($_POST['password'])) {
				$errMessage[] = "Please type in a new password.";
				$error_css1 = 'background-color: #FFBABA;';
			} else {
				$password = test_input($_POST['password']);
			}
			if (empty($_POST['ver-password'])) {
						$errMessage[] = "Please type in the same new password, just to make sure you typed in what you meant to.";
						$error_css2 = 'background-color: #FFBABA;';
			} else {
				$verpass = test_input($_POST['ver-password']);
			}
			if($password != $verpass){
						$errMessage[] = "The two new passwords you typed do not match.  Please try again.";
						$error_css1 = 'background-color: #FFBABA;';
						$error_css2 = 'background-color: #FFBABA;';
			}
			if(count($errMessage) == 0){
				$checktemp = "SELECT * FROM cust_data WHERE passwd = '$encrypted'";
				$result = $test_db->query($checktemp);
				$hash_rows = mysqli_num_rows($result);
				$result = $result->fetch_assoc();
				$cid = $result['id'];
				if ($hash_rows == 1){
					$encrypted = encryptIt( $password );
					$verify_user = "UPDATE cust_data SET passwd = '$encrypted', passreset = 'FALSE' WHERE id = '$cid'";
					$result = $test_db->query($verify_user);
					if($result){
						$_SESSION['status'] = "passreset";
						header("Location:login.php");
						exit();
					}
				} else {
					$errMessage[] = "Temporary password is incorrect.  Please check your email.";
					$error_css = 'background-color: #FFBABA;';
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
			} ?>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box forgot-password">
					<div class="content">
						<div class="header">
							<div class="logo text-center"><img src="assets/img/logo.png" alt="DiffDash"></div>
							<p class="lead">Update Your Password</p>
						</div>
						<p class="text-center margin-bottom-30">Please enter your email address below to receive instructions for resetting password.</p>
						<form class="form-auth-small" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label for="temp-password" class="control-label sr-only">Temporary Password</label>
								<input type="password" name="temp-password" class="form-control" id="temp-password" placeholder="Temporary Password" style="<?php echo $error_css; ?>">
							</div>
							<div class="form-group">
								<label for="password" class="control-label sr-only">New Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="New Password" style="<?php echo $error_css1; ?>">
							</div>
							<div class="form-group">
								<label for="ver-password" class="control-label sr-only">Verify New Password</label>
								<input type="password" name="ver-password" class="form-control" id="ver-password" placeholder="Verify New Password" style="<?php echo $error_css2; ?>">
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT NEW PASSWORD</button>
						</form>
					<?php } else {
						$_SESSION['status'] = "noneed";
						header("Location:login.php");
						exit();
					 } ?>
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
