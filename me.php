<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

if(!MEMBER_ONLINE){
	header("Location: login.php");
	die();
}
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

<?php include'favicon.php';?>

<title><?php echo $me->name;?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<!-- JS Lib -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/service/page.service.js"></script>

</head>

<body>

<?php include'header.php';?>

<div class="page-container">
	<div class="head">
		<div class="caption">ธุรกิจของฉัน (3)</div>
		<a href="page-editor.php" target="_parent">
		<div class="button-create"><i class="fa fa-plus"></i>เพิ่มธุรกิจของคุณ</div>
		</a>
	</div>
	<div class="page-list">
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
	</div>
</div>

<?php include'footer.php';?>
</body>
</html>