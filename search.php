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
include'favicon.php';
$meta_title = 'ค้นหา '.$_GET['q'].' - ปราจีนเดลี่';
$meta_description = 'ปราจีนเดลี่ เว็บอันดับหนึ่งของปราจีนบุรี ที่คุณสามารถค้นหา ร้านอาหาร ที่พัก ที่ท่องเที่ยว หอพักและเบอร์โทรศัพท์สถานที่ในจังหวัดปราจีนบุรี';
?>

<title><?php echo $meta_title;?></title>

<!-- Meta Tag Main -->
<meta name="description" 			content="<?php echo $meta_description;?>"/>
<meta property="og:title" 			content="<?php echo $meta_title;?>"/>
<meta property="og:description" 	content="<?php echo $meta_description;?>"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>/search.php?q=<?php echo $_GET['q'];?>"/>
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

</head>

<body>

<?php include'header.php';?>

<div class="page-container search-page">
	<div class="search-form">
		<form action="search.php" target="_parent" method="get">
		<input type="text" name="q" class="input-text" placeholder="ค้นหาสิ่งที่คุณต้องการ..." value="<?php echo $_GET['q'];?>">
		<button type="submit" class="button-submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="page-list">
		<?php
		$total_feed = $page->Search(array(
			'keyword' 	=> $_GET['q'],
			'page' => $_GET['page'],
		));
		?>
	</div>
	<div class="pagination">
		<div class="found">ค้นหาพบ <?php echo $total_feed;?> รายการ</div>
		<?php $page->Pagination($total_feed,$_GET['page'],$_GET['q'],'search');?>
	</div>
</div>

<?php include'footer.php';?>
</body>
</html>

<?php
// Save Search log
$page->SaveSearchLog(array(
	'people_id' 	=> MEMBER_ID,
	'keyword' 		=> $_GET['q'],
	'result' 		=> $total_feed,
	'execute_time' 	=> round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],4),
	'type' 			=> 'normal',
));
?>