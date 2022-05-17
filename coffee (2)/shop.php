<?php
require_once "init.php";
if (!isset($_GET['id'])) {
	Util::go('coffeeShopsAdmin.php');
}
$id = intval(Util::secure($_GET['id']));
$shop = Shop::find($id);

if (!$shop) {
	Util::alert("Shop with id $id not found");
	Util::go('coffeeShopsAdmin.php');
}
$reviews = Shop::get_reviews($id);
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

		<div class="testimonials1">
			<div class="inner">
				<a href="index.php"><img src="assets/shop_images/<?=$shop['profile_img']?>" alt="logo" width="100" height="100"></a><br>
				<h1><?= $shop['name'] ?></h1>
				<p><?= $shop['from_hour'] ?> - <?= $shop['to_hour'] ?></p>
				<div class="border"></div>
				<div class="row">

					<?php

					if (count($reviews) == 0) {
						echo '<h1>There is no review for this shop</h1>';
					}
					foreach ($reviews as $review) {
					?>
						<div class="col">
							<div class="testimonial">
								<img src="photos/profile.png" alt="">
								<div class="name"><?= $review['name'] ?></div>
								<div class="stars">
									<?php Util::render_rating_div($review['rating']) ?>
								</div>
								<p><?= $review['review_text'] ?></p>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
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
