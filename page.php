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

<article class="page-container">
	<header>
		<h1><?php echo $page->name;?></h1>
		<p class="info">
			<span class="location"><?php echo $location;?></span>
			 · <span class="timeupdate" title="<?php echo $page->update_time_thai_format;?>"><?php echo $timeupdate;?></span>
			 <?php if(MEMBER_ID == $page->poster_id){?>
			 · <span class="edit"><a href="page-editor.php?id=<?php echo $page->id;?>">แก้ไข</a></span>
			 <?php }?>
		</p>
	</header>

	<?php if(!empty($page->cover_id)){?>
	<figure class="entry-cover">
		<img src="<?php echo $destination_folder['normal'].$page->cover_filename;?>" alt="<?php echo $meta_title;?>">
	</figure>
	<?php }?>

	<div class="entry-content">
		<?php echo $page->description;?>

		<div class="infomation">
			<?php if(!empty($page->phone)){?>
			<div class="items">
				<div class="icon"><i class="fa fa-phone-square"></i></div>
				<div class="text"><?php echo $page->phone;?></div>
			</div>
			<?php }?>

			<?php if(!empty($page->guide)){?>
			<div class="items">
				<div class="icon"><i class="fa fa-map"></i></div>
				<div class="text"><?php echo $page->guide;?></div>
			</div>
			<?php }?>

			<?php if(!empty($page->address)){?>
			<div class="items">
				<div class="icon"><i class="fa fa-map-pin"></i></div>
				<div class="text"><?php echo $page->address;?></div>
			</div>
			<?php }?>

			<div class="items">
				<div class="icon"><i class="fa fa-user"></i></div>
				<div class="text"><?php echo ($page->poster_type == "administrator"?'ทีมงานปราจีนเดลี่':$page->poster_name);?></div>
			</div>
		</div>

		<div class="gallery">
			<a href="gallery-editor.php?id=<?php echo $page->id;?>">
			<div class="gallery-button">
				<i class="fa fa-camera"></i> เลือกภาพ
			</div>
			</a>

			<?php $page->ListGallery(array('page_id' => $page->id));?>
		</div>

		<?php if(MEMBER_ID == $page->poster_id){?>
		<div class="url">
			<div class="caption"><i class="fa fa-link"></i> โพสต์ลิ้งนี้ลงใน Facebook ของคุณ</div>
			<div class="input">
				<input type="text" class="input-url" value="<?php echo $meta['domain'];?>/page-<?php echo $page->id;?>.html">
			</div>
		</div>
		<?php }?>
	</div>

	<input type="hidden" id="page_id" value="<?php echo $page->id;?>">
</article>

<?php include'footer.php';?>
<?php include'analytics_bar.php';?>
</body>
</html>