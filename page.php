<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));
$page->UpdateAnalytics(array('page_id' => $page->id,'type'=>'view'));

// Location
if(empty($page->amphur_name)){
	$location = $page->province_name;
}
else{
	$location = $page->amphur_name.' '.$page->province_name;
}

$timeupdate = $page->update_time_facebook_format;
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
$meta_title = $page->name.' - '.$location;
$meta_description = $page->description_metatag;
?>

<title><?php echo $meta_title;?></title>

<!-- Meta Tag Main -->
<meta name="description" 			content="<?php echo $meta_description;?>"/>
<meta property="og:title" 			content="<?php echo $meta_title;?>"/>
<meta property="og:description" 	content="<?php echo $meta_description;?>"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>/page-<?php echo $page->id;?>-<?php echo $page->url_friendly;?>.html"/>
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
<script type="text/javascript" src="js/service/page.service.js"></script>
<script type="text/javascript" src="js/page.app.js"></script>

</head>

<body>

<?php include'header.php';?>

<article class="article-page">
	<?php if(!empty($page->cover_id)){?>
	<figure class="page-cover" id="article">
		<!-- <img src="<?php echo $destination_folder['mini'].$page->cover_filename;?>" alt="<?php echo $meta_title;?>"> -->
		<img src="https://scontent-kul1-1.xx.fbcdn.net/hphotos-xla1/v/t1.0-9/12243071_10153314938397773_4595236392144964420_n.jpg?oh=44b4867dea5cb6106dcab1c39236236d&oe=56E63D43" alt="">

		<figcaption>
			<p><?php echo $page->name;?></p>
			<p class="mini"><?php echo $location;?></p>
		</figcaption>
	</figure>
	<?php }?>

	<header class="article-header">
		<h1><?php echo $page->name;?></h1>
		<p><span class="location"><?php echo $location;?></span></p>
	</header>

	<section class="article-content">
		<?php echo $page->description;?>
	</section>

	<!-- Infomation -->
	<section class="article-content">
		<h2>เบอร์ติดต่อ</h2>
		<p><?php echo $page->phone;?></p>
	</section>
	<section class="article-content">
		<h2>ที่ตั้ง</h2>
		<p><?php echo $page->guide;?> – <?php echo $page->address;?></p>
	</section>

	<section class="article-content article-gallery" id="gallery">
		<h2>ภาพ<?php echo $page->name;?> (23)</h2>
		<?php if(MEMBER_ID == $page->poster_id && $page->status == "success" || true){?>
		<a href="gallery-editor.php?id=<?php echo $page->id;?>">
		<div class="gallery-button">
			<i class="fa fa-camera"></i>
			เพิ่มภาพใหม่
		</div>
		</a>
		<?php }?>
		<?php $page->ListGallery(array('page_id' => $page->id));?>
	</section>


	<section class="article-content">
		<p class="name">Puwadon Sricharoen</p>
		<p class="time">12 December 2016 12:40PM</p>
	</section>

	<section class="save-btn">
		<span class="like-button liked-button"><i class="fa fa-star"></i>บันทึกเป็นร้านโปรด</span>
	</section>

	<input type="hidden" id="page_id" value="<?php echo $page->id;?>">
</article>

<?php include'footer.php';?>
</body>
</html>