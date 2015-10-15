<?php
// Autoload include
require_once'config/autoload.php';

unset($_COOKIE['facebook_id']);
unset($_COOKIE['token_key']);
setcookie('facebook_id','');
setcookie('token_key','');

unset($_SESSION['facebook_id']);
session_destroy();

header("Location: index.php");
die();
?>