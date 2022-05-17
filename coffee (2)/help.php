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
		<div class="help">
			<h2>
				We are happy to help you, here are the most commonly asked questions,
				you can find what you are looking for here,
				if not, you can contact us via email, phone or our Twitter account.
			</h2>
			<br><br>
			<h3>Q1 can i view top rated coffee shop?</h3>
			<p>yes from high rated coffee shop section.</p>
			<h3>Q2 Can I search for specific coffee shop?</h3>
			<p>Yes from the search box.</p>
			<h3>Q3 How do I know if my review is submitted?</h3>
			<p>you will recieve notfication.</p>
			<h3>Q4 Can I submit more than one review?</h3>
			<p>Yes, you can. If you are a registered user</p>
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