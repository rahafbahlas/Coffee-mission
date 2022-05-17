<?php
require_once "init.php";
Util::ensure_redirection();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet" href="StyleSheet.css ">
	<script src="javaScript.js"></script>
</head>

<body>
	<?php require_once "partials/nav.php"; ?>
	<main>
		<a href="index.php"><img src="photos/logo.jpg" alt="logo" width="270" height="100"></a><br>
		<br><br><br><br>

		<section class='login' id='login'>

			<div class='head'>
				<h1 class='company'>Log in</h1>
			</div>
			<p class='msg'>A Window To Get All The Features!</p>
			<div class='form'>
				<form action="route.php" method="post">
					<div>
						<input type="text" name="username" placeholder='username' class='text' id='Uname' required><br>
						<input type="hidden" name="action" value="login" />
					</div>
					<div>
						<input type="password" placeholder='**************' class='password' id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, 
					  and at least 8 or more characters" required><br>
					</div>
					<br><br>
					<div class="buttons">

						<input type="submit" value="Log in" class='btn-login'>

						</br>
						</br>

				</form>
			</div>
		</section>

		<br><br><br><br><br><br><br><br>



	</main>

	<footer>
		<img src="photos/twitter.png" alt="Twitter" width="30" height="30" onclick="twitter()">
		<img src="photos/email.png" alt="Email" width="30" height="30" onclick="email()">
		<img src="photos/call.png" alt="phoneNumber" width="30" height="30" onclick="phone()">
		<aside>
			<P>&copy;2021 KSU</P>
		</aside>
	</footer>
</body>

</html>