<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$current_page = "index";
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

<title>ค้นหา ร้านอาหาร ที่พัก เบอร์โทรศัพท์ ปราจีนบุรี - ปราจีนเดลี่</title>

<!-- Meta Tag Main -->
<meta name="description" 			content="ปราจีนเดลี่ เว็บอันดับหนึ่งของปราจีนบุรี ที่คุณสามารถค้นหา ร้านอาหาร ที่พัก ที่ท่องเที่ยว หอพักและเบอร์โทรศัพท์สถานที่ในจังหวัดปราจีนบุรี"/>
<meta property="og:title" 			content="ค้นหา ร้านอาหาร ที่พัก เบอร์โทรศัพท์ ปราจีนบุรี - ปราจีนเดลี่"/>
<meta property="og:description" 	content="ปราจีนเดลี่ เว็บอันดับหนึ่งของปราจีนบุรี ที่คุณสามารถค้นหา ร้านอาหาร ที่พัก ที่ท่องเที่ยว หอพักและเบอร์โทรศัพท์สถานที่ในจังหวัดปราจีนบุรี"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>"/>
<meta property="og:image" 			content="<?php echo $meta['domain'];?>/image/favicon/banner.jpg"/>
<meta property="og:type" 			content="website"/>
<meta property="og:site_name" 		content="<?php echo $meta['fb_app_id'];?>"/>
<meta property="fb:app_id" 			content="<?php echo $meta['fb_app_id'];?>"/>
<meta property="fb:admins" 			content="<?php echo $meta['fb_admins'];?>"/>
<meta name="author" 				content="<?php echo $meta['author'];?>">
<meta name="generator" 				content="<?php echo $meta['generator'];?>"/>
<meta itemprop="name" 				content="ค้นหา ร้านอาหาร ที่พัก เบอร์โทรศัพท์ ปราจีนบุรี - ปราจีนเดลี่">
<meta itemprop="description" 		content="ปราจีนเดลี่ เว็บอันดับหนึ่งของปราจีนบุรี ที่คุณสามารถค้นหา ร้านอาหาร ที่พัก ที่ท่องเที่ยว หอพักและเบอร์โทรศัพท์สถานที่ในจังหวัดปราจีนบุรี">
<meta itemprop="image" 				content="<?php echo $meta['domain'];?>/image/favicon/banner.jpg">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<!-- JS Lib -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>

<body>
<?php include'header.php';?>

<div class="page-container page-margin-top">
	<div class="search-form">
		<form action="search.php" target="_parent" method="get">
		<input type="text" name="q" class="input-text" placeholder="ค้นหาสิ่งที่คุณต้องการ..." autofocus>
		<button type="submit" class="button-submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="menu">
		<?php if(MEMBER_ONLINE){?>
		<a href="page-editor.php" target="_parent"><i class="fa fa-plus"></i>สร้างธุรกิจของคุณ</a>
		<?php }else{?>
		<a href="partner.php" target="_parent"><i class="fa fa-plus"></i>สร้างธุรกิจของคุณ</a>
		<?php }?>
	</div>

	<div class="link">
		<a href="partner.php" target="_parent">สร้างธุรกิจของคุณ<i class="fa fa-commenting-o"></i></a>
		 · <a href="agreement.php" target="_parent">ข้อตกลง</a>
		 · <a href="stat.php" target="_parent">สถิติ</a>
		 · <a href="contact.php" target="_parent">ติดต่อเรา</a>

		<?php if(MEMBER_TYPE == "administrator"){?>
		 · <a href="pending.php" target="_parent" class="<?php echo ($page->PendingCount(array('id' => 0))>0?'active':'');?>">Pending (<?php echo $page->PendingCount(array('id' => 0));?>)</a>
		<?php }?>
	</div>
</div>
<?php include'analytics_bar.php';?>
</body>
</html>