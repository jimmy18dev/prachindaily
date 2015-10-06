<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';
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

<div class="page">
	<div class="search-form">
		<form action="search.php" target="_parent" method="get">
		<input type="text" name="q" class="input-text" placeholder="ค้นหาสิ่งที่คุณต้องการ..." autofocus>
		<button type="submit" class="button-submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="menu">
		<a href="page-editor.php">เพิ่มธุรกิจของคุณ</a>
	</div>
</div>
<div class="web-analytics">
	<div class="left">สมาชิก 34,020 คน / </div>
	<div class="left">Process Time <?php echo round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],4);?>s / </div>
	<div class="left">This page loaded in <?php echo round(microtime(true)-StTime,4);?>s</div>
	<div class="right">ค้นหา 324,353 ครั้ง</div>
</div>
</body>
</html>