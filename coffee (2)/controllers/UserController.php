<?php
class UserController
{

    public static function register($form_data)
    {
        $form_data['email'] = '';
        $form_data['isAdmin'] = (isset($form_data['isAdmin']) ? 1 : 0);
        if (User::register(
            $form_data['firstname'],
            $form_data['lastname'],
            $form_data['username'],
            $form_data['email'],
            $form_data['password'],
            $form_data['isAdmin']
        )) {
            Util::alert("User register successfully");
            static::login($form_data);
        } else {
            $query_string = ['msg' => 'Signup failed', 'msg_type' => 'error'];
            Util::go("index.php?" . http_build_query($query_string));
        }
    }

    public static function login($form_data)
    {
        $query_string = ['msg' => 'Invalid Username or Password', 'msg_type' => 'error'];
        if (($user = User::verify($form_data['username'], $form_data['password']))) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['firstname'] . " " . $user['lastname'];
            $_SESSION['admin'] = $user['is_admin'];

            if (Util::is_admin()) {
                Util::go('admin.php');
            } else {
                Util::go('shops.php');
            }
        } else {
            Util::go("index.php?" . http_build_query($query_string));
        }
    }
}
