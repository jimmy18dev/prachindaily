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

<title>ปราจีนเดลี่</title>

<!-- Meta Tag Main -->
<meta name="description" 			content="เว็บอันดับหนึ่งของปราจีนบุรี ที่คุณสามารถค้นหา ร้านอาหาร ที่พัก ที่ท่องเที่ยว หอพักและเบอร์โทรศัพท์สถานที่ในจังหวัดปราจีนบุรี"/>
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
<div class="page-container">
	<div class="page-list">
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
		<?php $page->MyPage(array('people_id' => $me->facebook_id));?>
	</div>

	<div class="pagination">
		<div class="found">ค้นหาพบ <?php echo $total_feed;?>343 รายการ</div>
		<?php $page->Pagination($total_feed,$_GET['page'],$_GET['q'],'search');?>

		<div class="pagination-items pagination-active">1</div>
		<div class="pagination-items">2</div>
		<div class="pagination-items">3</div>
		<div class="pagination-items">4</div>
		<div class="pagination-items">5</div>
		<div class="pagination-items">6</div>
		<div class="pagination-items">7</div>
	</div>
</div>

<?php include'footer.php';?>
</body>
</html>