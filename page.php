<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));

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

<div class="page-container">
	<h1><?php echo $page->name;?></h1>
	<p class="location"><i class="fa fa-map-marker"></i>อำเภอเมืองปราจีนุบรี จังหวัดปราจีนบุรี</p>
	<div class="description"><?php echo $page->description;?></div>

	<p class="phone"><i class="fa fa-phone"></i><?php echo $page->phone;?></p>
	<p class="guide"><i class="fa fa-map"></i><?php echo $page->guide;?></p>
	<p class="address"><i class="fa fa-map-pin"></i><?php echo $page->address;?></p>

	<div class="credit">
		<div class="thank"><i class="fa fa-heart-o"></i>Thank</div>
		<div class="poster">ข้อมูลโดยคุณ <span class="poster-name">Puwadon Sricharoen</span></div>
	</div>
</div>

<?php include'footer.php';?>

<div class="web-analytics">
	<div class="left">สมาชิก 34,020 คน</div>
	<div class="right">ค้นหา 324,353 ครั้ง</div>
</div>
</body>
</html>