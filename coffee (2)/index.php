<?php
require_once "init.php";
Util::ensure_redirection();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title> home</title>
	<link rel="stylesheet" href="StyleSheet.css ">
	<script src="javaScript.js"></script>
</head>

<body>

	<?php
	require_once "partials/nav.php";
	Util::check_for_message();
	?>
	<main>
		<a href="index.html"><img src="photos/logo.jpg" alt="logo" width="270" height="100"></a><br>

		<br>
		<h1>Welcome to coffee mission</h1>

		<section class="cont">

			<a href="signup.php" class="hero-btn2">Sign Up </a>
			<br>
			<a href="login.php" class="hero-btn2">Log in </a>
			<br>
			<a href="shops.php" class="hero-btn2">View coffee shops</a>
			<br>
			<a href="shops.php?order=toprated" class="hero-btn2">View high rated coffee shops</a>

		</section>

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