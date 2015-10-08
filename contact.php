<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));
$current_page = "contact";
?>

<!DOCTYPE html>
<html lang="th" itemscope itemtype="http://schema.org/Blog" prefix="og: http://ogp.me/ns#">
<head>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<!-- Meta Tag -->
<meta charset="utf-8">

<!-- Viewport (Responsive) -->
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="user-scalable=no">
<meta name="viewport" content="initial-scale=1,maximum-scale=1">	

<?php
//include'favicon.php';
?>

<title>Homepage</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<!-- JS Lib -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>

<body>

<?php include'header.php';?>

<div class="page-container">
	<header>
		<h1>ติดต่อทีมงานปราจีนเดลี่</h1>
	</header>
	<div class="entry-content">
		<p>หากต้องการติดต่อทีมงานปราจีนเดลี่ กรุณาใช้ช่องทางด้านล่าง เนื่องจากเรามีทีมงานหลายท่านจึงไม่มีนโยบายการให้เบอร์โทรศัพท์ส่วนตัวของท่านใดท่านหนึ่ง</p>
		<h2>ติดต่อ</h2>
		<p><strong>Email: </strong>prachindaily@gmail.com</p>
		<p><strong>Twitter: </strong> <a href="https://twitter.com/prachindaily">https://twitter.com/prachindaily</a></p>
		<p><strong>Facebook Page: </strong> <a href="https://facebook.com/prachindaily">https://facebook.com/prachindaily</a></p>
	</div>
</div>

<?php include'footer.php';?>
<?php include'analytics_bar.php';?>
</body>
</html>