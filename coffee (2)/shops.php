<?php
require_once "init.php";
$shops = ShopController::get_all();
if (isset($_GET['order']) && $_GET['order'] == 'toprated') {
    $shops = ShopController::get_top_rated_shops();
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>home</title>
    <link rel="stylesheet" href="StyleSheet.css " />
    <script src="javaScript.js"></script>
</head>

<body>

    <?php
    require_once "partials/nav.php";
    Util::check_for_message();
    ?>

    <main>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" />
        <br /><br /><br /><br /><br />

        <div class="container">
            <ul id="myUL">

                <?php
                foreach ($shops as $shop) {
                ?>
                    <li>
                        <div class="testimonials">
                            <div class="inner">
                                <a href="shop.php?id=<?= $shop['id'] ?>">
                                    <div class="fix">
                                        <h1><?= $shop['name'] ?></h1>
                                    </div>
                                </a>
                                <a href="shop.php?id=<?= $shop['id'] ?>"><img src="assets/shop_images/<?= $shop['profile_img'] ?>" alt="logo" width="100" height="100" /></a>
                                <p>working hours:<br />from: <?= $shop['from_hour'] ?> to: <?= $shop['to_hour'] ?></p>
                                <div class="border"></div>
                                <p>number of branches :<?= $shop['branches'] ?></p>
                                <div class="row" style="display:flex">
                                    <?php
                                    if (Util::is_login()) {
                                        if (Util::is_admin()) {
                                        ?>
                                            <a href="editShop.php?id=<?= $shop['id'] ?>">
                                                <button class="postreview">Edit Post</button>
                                            </a>

                                            <form action="route.php" method="post">
                                                <input type="hidden" name="action" value="delete-shop">
                                                <input type="hidden" name="shop_id" value="<?= $shop['id'] ?>">
                                                <button type="submit" class="postreview" style="background-color: red;">Delete Post</button>
                                            </form>
                                    <?php
                                        }else{
                                            ?>
                                            <a href="postreview.php?id=<?= $shop['id'] ?>">
                                                <button class="postreview">Post review</button>
                                            </a>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </main>

    <footer>
        <img src="photos/twitter.png" alt="Twitter" width="30" height="30" onclick="twitter()" />
        <img src="photos/email.png" alt="Email" width="30" height="30" onclick="email()" />
        <img src="photos/call.png" alt="phoneNumber" width="30" height="30" onclick="phone()" />
        <aside>
            <p>&copy;2021 KSU</p>
        </aside>
    </footer>

    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById('myUL');
            li = ul.getElementsByTagName('li');
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName('h1')[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = '';
                } else {
                    li[i].style.display = 'none';
                }
            }
        }
    </script>
</body>

</html>
