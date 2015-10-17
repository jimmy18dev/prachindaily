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

<title>404 ERROR!</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>

<body>

<?php include'header.php';?>

<div class="page-container error-page">
	<header>
		<h1>404 ERROR</h1>
	</header>
	<div class="entry-content">
		<p>ไม่พบหน้าที่คุณต้องการ หากพบปัญหาในการใช้งาน กรุณาติดต่อทีมงานค่ะ</p>
	</div>
</div>
</body>
</html>