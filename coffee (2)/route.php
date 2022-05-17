<?php
require_once 'init.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action'])) {
    $form_data = Util::secureArray($_POST);
    if ($_POST['action'] == "register") {
        UserController::register($form_data);
    } else if ($_POST['action'] == 'login') {
        UserController::login($form_data);
    } else if ($_POST['action'] == 'add-shop' && isset($_FILES['profile_img']) && !empty($_FILES['profile_img']['name'])) {
        Util::ensure_admin();
        ShopController::create($form_data, $_FILES['profile_img']);
    } else if ($_POST['action'] == 'add-review') {
        Util::ensure_login();
        ReviewController::create($form_data);
    } else if ($_POST['action'] == 'update-shop' && isset($_FILES['profile_img']) && empty($_FILES['profile_img']['name'])) {
        Util::ensure_admin();
        ShopController::update($form_data, null);
    } else if ($_POST['action'] == 'update-shop' && isset($_FILES['profile_img']) && !empty($_FILES['profile_img']['name'])) {
        Util::ensure_admin();
        ShopController::update($form_data, $_FILES['profile_img']);
    } else if ($_POST['action'] == 'delete-shop') {
        Util::ensure_admin();
        ShopController::delete($form_data);
    }
} else {
    Util::go('index.php');
}
