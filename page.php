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

<article class="article-page" id="article">
	<?php if(!empty($page->cover_id)){?>
	<figure class="page-cover">
		<!-- <img src="<?php echo $destination_folder['mini'].$page->cover_filename;?>" alt="<?php echo $meta_title;?>"> -->
		<img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xfp1/t31.0-8/11174309_1116212725063318_3321640511877751974_o.jpg" alt="">
	</figure>
	<?php }?>

	<header class="article-header">
		<p class="time">12 November 2016</p>
		<h1><?php echo $page->name;?></h1>
		<p><?php echo $location;?></p>
	</header>

	<div class="article-content">
		<?php echo $page->description;?>
	</div>

	<section class="article-content article-info">
		<h2><i class="fa fa-phone"></i>เบอร์ติดต่อ</h2>
		<p><?php echo $page->phone;?></p>
	</section>

	<section class="article-content article-info">
		<h2><i class="fa fa-map"></i>ที่อยู่ <?php echo $page->name;?></h2>
		<p><?php echo $page->guide;?> – <?php echo $page->address;?></p>
	</section>

	<section class="article-content article-info">
		<h2><i class="fa fa-camera"></i>ภาพ<?php echo $page->name;?> (23)</h2>

		<?php if(MEMBER_ID == $page->poster_id && $page->status == "success" || true){?>
		<a href="gallery-editor.php?id=<?php echo $page->id;?>" class="photo-btn">เพิ่มภาพใหม่<i class="fa fa-plus"></i></a>
		<?php }?>

		<div class="gallery-container">
			<?php $page->ListGallery(array('page_id' => $page->id));?>
		</div>
	</section>

	<section class="article-content article-info">
		<h2><i class="fa fa-map"></i>แผนที่ <?php echo $page->name;?></h2>
		<div id="map">Google Map API</div>
	</section>

	<input type="hidden" id="page_id" value="<?php echo $page->id;?>">
</article>

<?php include'footer.php';?>


    <script>

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXkAfuTeoH8cWbgRpvurxyjeo1wVvVXXg&callback=initMap"
        async defer></script>

</body>
</html>