<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));
$current_page = "stat";
$current_page = "page";
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
include'favicon.php';
$meta_title = 'สถิติการใช้งานปราจีนเดลี่ - ปราจีนเดลี่';
$meta_description = 'ปราจีนเดลี่ยินดีแบ่งปันข้อมูลที่มีประโยชน์ ที่จะช่วยในด้านการศึกษากับนักเรียน นักศึกษา ในจังหวัดปราจีนบุรี้';
?>

<title><?php echo $meta_title;?></title>

<!-- Meta Tag Main -->
<meta name="description" 			content="<?php echo $meta_description;?>"/>
<meta property="og:title" 			content="<?php echo $meta_title;?>"/>
<meta property="og:description" 	content="<?php echo $meta_description;?>"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>/stat.php"/>
<meta property="og:image" 			content="<?php echo $meta['domain'];?>/image/favicon/banner.jpg"/>
<meta property="og:type" 			content="website"/>
<meta property="og:site_name" 		content="<?php echo $meta['fb_app_id'];?>"/>
<meta property="fb:app_id" 			content="<?php echo $meta['fb_app_id'];?>"/>
<meta property="fb:admins" 			content="<?php echo $meta['fb_admins'];?>"/>
<meta name="author" 				content="<?php echo $meta['author'];?>">
<meta name="generator" 				content="<?php echo $meta['generator'];?>"/>
<meta itemprop="name" 				content="<?php echo $meta_title;?>">
<meta itemprop="description" 		content="<?php echo $meta_description;?>">
<meta itemprop="image" 				content="<?php echo $meta['domain'];?>/image/favicon/banner.jpg">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<!-- JS Lib -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/highcharts.js"></script>
<script type="text/javascript" src="js/service/page.service.js"></script>
<script type="text/javascript" src="js/page.chart.app.js"></script>
</head>

<body>

<?php include'header.php';?>

<div class="article">
	<header class="article-header">
		<h1>สถิติการใช้งาน....</h1>
		<p class="info">เรายินดีแบ่งปันข้อมูลที่มีประโยชน์ในด้านการศึกษา</p>
	</header>
		
	<div class="article-content">
		<div class="chart" id="location"></div>
	</div>
</div>

<?php include'footer.php';?>
</body>
</html>