<?php
	session_start();
	error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<title>CarPool</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
	<img class="wave" src="img/wave.svg">
	<header>
		<span href="#" class="banner">Dsatm CarPool</span>
	</header>

	<div class="container">
		<div class="img">
			<img src="img/personalization.svg">
		</div>
		<div class="container-box" id="container-box">
			<div class="form-container sign-up-container">
				<form action="validation-signup.php" method="POST">
					<h1>Create Account</h1>
					<input type="text" placeholder="Name" name="newName" required>
					<input type="text" placeholder="Username" name="newUsername" required>
					<input type="password" placeholder="Password" name="newPassword0" required>
					<input type="password" placeholder="Connfirm Password" name="newPassword1" required>
					<button type="submit" name="signup">Sign Up</button>
					<span><?php echo $_SESSION['signup_error'] ?></span>

				</form>
			</div>
			<div class="form-container sign-in-container">
				<form action="validation-login.php" method="POST">
					<h1>Sign in</h1>
					<input type="text" placeholder="Username" name="username" required>
					<input type="password" placeholder="Password" name="password" required>
					<a href="#">Forgot your password?</a>
					<button type="submit" name="signin">Sign In</button>
					<span><?php echo $_SESSION['login_error'] ?></span>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Hello, Friend!</h1>
						<p>
							Enter your details and start journey with us
						</p>
						<button class="ghost" id="signIn">Sign In</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Welcome Back!</h1>
						<p>
							Login with your account to continue
						</p>
						<button class="ghost" id="signUp">Sign Up</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>