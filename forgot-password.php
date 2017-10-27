<?php
session_start();
require 'assets/include/db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'assets/include/mail/Exception.php';
require 'assets/include/mail/PHPMailer.php';
require 'assets/include/mail/SMTP.php';
global $path;
$errMessage = array();
$error_css = $error_css1 = ""; ?>
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
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if(empty($_POST['username'])) {
			$errMessage[] = "Username is required";
			$error_css = 'background-color: #FFBABA;';
		} else {
			$username = test_input($_POST['username']);
		}
		if (empty($_POST['email'])) {
			$errMessage[] = "Email address is required";
			$error_css1 = 'background-color: #FFBABA;';
		} else {
			$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errMessage[] = "This is not a valid email address, please try again";
				$error_css1 = 'background-color: #FFBABA;';
			}
			$query = "SELECT * FROM cust_data WHERE email = '$email' AND username = '$username'";
	    $result = $test_db->query($query);
	    $result = $result->fetch_assoc();
	    if($result == ''){
				$errMessage[] = "This information does not match our records, please try again.";
				$error_css = 'background-color: #FFBABA;';
				$error_css1 = 'background-color: #FFBABA;';
			}
			$fullname = $result['fname'] . " " . $result['lname'];
			$cid = $result['id'];
		}
		if(count($errMessage) == 0){
			$newpass = mt_rand(10000000, 99999999);
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
				//Server settings
				$mail->SMTPDebug = 2;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'mail.gopriceshop.com;mail.gopriceshop.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'noreply@gopriceshop.com';                 // SMTP username
				$mail->Password = 'gps1234!';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to
				//Recipients
				$mail->setFrom('noreply@gopriceshop.com', 'Go Price Shop');
				$mail->addAddress($email, $fullname);     // Add a recipient
				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Go Price Shop - Password Reset';
				$mail->Body    = '<h3>Your password has been reset.</h3>
				<p>Your password has been reset for your protection.<br>
				Below you will find your temporary password to login with to create a new password.</p>
				<p>Temporary Password: '.$newpass.'</p>
				<p><a href="'.$path.'accountpending.php?code=pass">Click here</a> to put in your new password.</p>';
				$mail->AltBody = 'Your password has been reset.\n\n
				Your password has been reset for your protection.\n
				Below you will find your temporary password to login with to create a new password.\n\n
				Temporary Password: '.$newpass.'\n\n
				Click here to put in your new password: https://www.gopriceshop.com/accountpending.php?code=pass';
				$mail->send();
			} catch (Exception $e) {
				$errmess =  $mail->ErrorInfo;
				logError("2","forgot-password","NA", $errmess);
			}
			$encrypted = encryptIt( $newpass );
			$query = "UPDATE cust_data SET passwd = '$encrypted', passreset = 'TRUE' WHERE id = '$cid'";
			$result = $test_db->query($query);
			logActivity("4","forgot",$cid,"NA");
			header("Location:".$path."accountpending.php?code=pass");
			exit();
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
							<p class="lead">Recover my password</p>
						</div>
						<p class="text-center margin-bottom-30">Please enter your email address below to receive instructions for resetting password.</p>
						<form class="form-auth-small" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label for="signup-username" class="control-label sr-only">Password</label>
								<input type="text" name="username" class="form-control" id="signup-username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" placeholder="Username" style="<?php echo $error_css; ?>">
							</div>
							<div class="form-group">
								<label for="signup-email" class="control-label sr-only">Password</label>
								<input type="text" name="email" class="form-control" id="signup-email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" placeholder="Email" style="<?php echo $error_css1; ?>">
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>
							<div class="bottom">
								<span class="helper-text">Know your password? <a href="login.php">Login</a></span>
							</div>
						</form>
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
