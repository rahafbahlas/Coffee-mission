<?php
class User
{
    public static function verify(string $username, string $password)
    {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = DB::get_db()->execute($query);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return null;
    }

    public static function register(string $firstname, string $lastname, string $username, string $email, string $password, int $is_admin)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (firstname,lastname,username,email,password,is_admin)
        VALUES ('$firstname','$lastname','$username','$email','$password',$is_admin)";
        return DB::get_db()->executeUpdate($query);
    }

    public static function find(int $id)
    {
        $query = "SELECT * FROM users WHERE id=$id";
        $result = DB::get_db()->execute($query);
        $user = null;
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }
        return $user;
    }
}
