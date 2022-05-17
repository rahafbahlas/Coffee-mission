<?php require_once "init.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> home</title>
	<link rel="stylesheet" href="StyleSheet.css ">
	<script src="javaScript.js"></script>
</head>

<body>
	<?php require_once "partials/nav.php"; ?>
	<main>
		<a href="index.html"><img src="photos/logo.jpg" alt="logo" width="270" height="100"></a><br>

		<br>
		<h1>Welcome to coffee mission</h1>


		<div class="aboutUs">
			<p>
			<h3>What is a coffe mission website?</h3>We are a coffee mission website. We help coffee lovers to know all the coffees in the area, the opinions of customers,
			and their evaluation of them
			<h4>Who makes these reviews?</h4> reviews can be made by registered users on the site can share their opinions and experiences in cafes


			</p>
		</div>
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