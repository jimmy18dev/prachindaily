<?php
//require_once'config/autoload.php';
//include'sdk/facebook-sdk/autoload.php';
//include'facebook.php';
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

<div class="page result">
	<div class="search-form">
		<input type="text" class="input-text" placeholder="ค้นหาสิ่งที่คุณต้องการ...">
		<div class="button-submit"><i class="fa fa-search"></i></div>
	</div>
	<div class="result-list">

		<?php for($i=0;$i<20;$i++){?>
		<div class="result-items">
			<div class="title">ร้านแป้งปั้น ขนมปัง - ปราจีนริเวอร์</div>
			<div class="location">อำเภอเมืองปราจีนบุรี ปราจีนบุรี 0801051940 · <span class="timeupdate">อัพเดท 4 มกราคม 2558</span></div>
			<div class="description">ร้านเบเกอรี่ เค้ก ยอดนิยม พร้อมรูป รีวิว ส่วนลด ในจังหวัดปราจีนบุรี - Wongnai. ... ขนมอร่อย , อาหารหลากหลาย , ที่นั่งสบาย ร้านตกแต่งโทนสีขาว-เทา แบบ Modern Café </div>
		</div>
		<?php }?>
	</div>
	<div class="pagination">
		<div class="pagination-items pagination-active">1</div>
		<div class="pagination-items">2</div>
		<div class="pagination-items">3</div>
		<div class="pagination-items">4</div>
		<div class="pagination-items">5</div>
	</div>
</div>

<footer class="footer">
	<div class="menu">
		<div class="menu-items">Work</div>
		<div class="menu-items">Shopping</div>
		<div class="menu-items">Awesome</div>
		<div class="menu-items">Project</div>
	</div>

	<p>Show and tell for designers</p>
	<p>What are you working on? Dribbble is a community of designers sharing screenshots of their work, process, and projects.</p>
	<p>Copyright © 2009–2015 Dribbble LLC. All screenshots © their respective owners. Shipped from Salem, Mass. USA.</p>
</footer>

<div class="web-analytics">
	<div class="left">สมาชิก 34,020 คน</div>
	<div class="right">ค้นหา 324,353 ครั้ง</div>
</div>
</body>
</html>