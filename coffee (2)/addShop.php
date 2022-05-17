<?php
require_once "init.php";
Util::ensure_admin();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Add coffee shop</title>
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

		<div class="Add_form">
			<h1>Adding the information of new coffee shop now !</h1>
			<form action="route.php" method="post" enctype="multipart/form-data">
				<div class="section"><span class="num">1</span>Name of coffee shop :</div>
				<div class="inner-wrap">

					<input type="text" id="name" name="name" required>

				</div>

				<div class="section"><span class="num">2</span>Working hours:</div>
				<div class="inner-wrap">
					From: <input type="time" id="t" name="from_hour" required> To: <input type="time" id="t" name="to_hour" required> .


				</div>

				<div class="section"><span class="num">3</span>Number of branches :</div>
				<div class="inner-wrap">
					<input type="number" id="branches" name="branches" min="1" required>
				</div>

				<div class="section"><span class="num">4</span>Logo of the coffee shop :</div>
				<div class="inner-wrap">

					<input type="file" value="Attach File" name="profile_img" id="logo" required>

				</div>
				<div class="button-section">
					<br><input type="submit" value="Add">
					<input type="hidden" name="action" value="add-shop">
				</div>
		</div>
		<br> <br> <br>
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