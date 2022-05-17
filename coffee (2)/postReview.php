<?php
require_once "init.php";

Util::ensure_login();


if (!isset($_GET['id']) || Util::is_admin()) {
	Util::go('index.php');
}

$shop_id = Util::secure($_GET['id']);
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<form action="route.php" method="post">
			<h2 class="title-2">
				Post your review
			</h2>
			<textarea cols="70" rows="10" name="review_text" required></textarea>
			<input type="hidden" name="shop_id" value="<?= $shop_id ?>">
			<input type="hidden" name="action" value="add-review">
			<br />
			<span style="color:white;">Give rating from 1 - 5: </span><input name="rating" type="number" min="1" max="5" value="1" required />
			<input type="submit" />
		</form>



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
