<?php
require_once "init.php";
Util::ensure_admin();
$user = User::find($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
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
		<br><br><br><br>

		<section class="cont">

			<div class='head'>
				<h1 class='company'> Welcome <?= $user['firstname'] . " " . $user['lastname'] ?>!</h1>
			</div>
			<p class='msg'> you can :</p>

			<a href="shops.php" class="hero-btn2">View coffee shops </a>
			<br>
			<a href="addShop.php" class="hero-btn2">Add coffee shop </a>
			<br>
			<a href="shops.php" class="hero-btn2">Update coffee shop </a>
			<br>
			<a href="shops.php" class="hero-btn2">Delete coffee shop </a>

			<br><br>
			<p class='msg'> To sign out click here :</p>
			<a href="logout.php" class="hero-btn2">Sign out </a>
			<br><br>

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