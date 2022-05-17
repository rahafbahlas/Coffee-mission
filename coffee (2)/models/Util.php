<?php
class Util
{

    public static function ensure_redirection()
    {
        if (static::is_login()) {
            if (static::is_admin()) {
                static::go('admin.php');
            }
            static::go('shops.php');
        }
    }

    public static function ensure_login()
    {
        if (!static::is_login()) {
            static::go('index.php');
        }
    }


    public static function ensure_admin()
    {
        if (!static::is_admin()) {
            static::go('index.php');
        }
    }


    public static function is_login()
    {
        return isset($_SESSION['id']) && isset($_SESSION['name']);
    }
    public static function is_admin()
    {
        return isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
    }
    public static function render_rating_div(int $rating)
    {
        $i = 1;
        while ($i <= $rating) {
            echo '<i class="star"><img src="photos/checkStar.png" alt="logo" width="30" height="30"></i>';
            $i++;
        }

        while ($i <= 5) {
            echo '<i><img src="photos/star2.jpg" alt="logo" width="30" height="30"></i>';
            $i++;
        }
    }
    public static function alert(string $msg)
    {
        echo "<script>alert('$msg')</script>";
    }
    public static function secure($val, $db = null)
    {
        $link = DB::get_db()->get_connection();
        return htmlspecialchars($link->real_escape_string($val));
    }

    public static function go(string $url)
    {
        echo "<script>window.open('$url','_self')</script>";
    }


    public static function secureArray(array $array)
    {
        $new_array = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $new_array[static::secure($key)] = static::secureArray($value);
            } else {
                $new_array[static::secure($key)] = static::secure($value);
            }
        }
        return $new_array;
    }

    public static function getCurrentDateTime()
    {
        return date("Y-m-d H:i:s");
    }

    public static function checkFileSize($size)
    {
        return ($size <= (1024 * 1024 * 5));
    }



    public static function checkExtension($ext)
    {
        $ext = strtolower(static::secure($ext));
        if (!($ext == "jpg" || $ext == "png" || $ext == "gif" || $ext == "jpeg"))
            return false;
        return true;
    }



    public static function uploadFile($file)
    {
        $upload = 0; // Not upload
        $msg = "";
        $newFile = "";
        if (trim(static::secure($file['name']))) {
            $upload = 2; // Uploaded but not verify
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (!static::checkExtension($ext)) {
                $msg = "Invalid Extension. Extension must be .jpg, .png, .gif or .zip";
            } else if (!static::checkFileSize($file['size'])) {
                $msg = "Size of file must not exceed 5MB";
            } else {
                $upload = 1; // File Verified
                $newFile = rand(111111111, 999999999) . ".$ext";
                if (!move_uploaded_file($file['tmp_name'], "assets/shop_images/$newFile"))
                    die("<h3>Something went wrong</h3>");
            }
        }
        return array("status" => $upload, "msg" => $msg, "newFileName" => $newFile);
    }




    public static function check_for_message()
    {
        if (isset($_GET['msg_type']) && isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            static::alert($msg);
        }
    }
}
