<?php
// Autoload include
require_once'config/autoload.php';

unset($_COOKIE['facebook_id']);
setcookie('facebook_id','');
unset($_SESSION['facebook_id']);
session_destroy();

header("Location: index.php");
die();
?>