<?php
session_start();
session_destroy();
$_SESSION = array();
header('Location:index.php?msg_type=success&msg=Logout successfully');
