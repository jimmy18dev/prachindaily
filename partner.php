<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));
$current_page = "partner";
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
$meta_title = 'สร้างธุรกิจของคุณบนโลกออนไลน์ในจังหวัดปราจีนบุรี - ปราจีนเดลี่';
$meta_description = 'ปราจีนเดลี่จะช่วยสร้างความน่าเชื่อถือให้กับธุรกิจของคุณ เรากำลังช่วยผลักดันอาชีพชุมชนและพัฒนาเศรษฐกิจของจังหวัดปราจีนบุรี โดยเน้นไปที่ธุรกิจในระดับ SMEs';
?>

<title><?php echo $meta_title;?></title>

<!-- Meta Tag Main -->
<meta name="description" 			content="<?php echo $meta_description;?>"/>
<meta property="og:title" 			content="<?php echo $meta_title;?>"/>
<meta property="og:description" 	content="<?php echo $meta_description;?>"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>/partner.php"/>
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

<div class="page-container">
	<header>
		<h1>สร้างธุรกิจของคุณบนโลกออนไลน์กับปราจีนเดลี่</h1>
		<p class="info"><i class="fa fa-diamond"></i> ปราจีนเดลี่จะช่วยสร้างความน่าเชื่อถือให้กับธุรกิจของคุณ</p>
	</header>
	
	<div class="entry-content">
		<p><strong>ปราจีนเดลี่</strong>เป็นแหล่งข้อมูลข่าวสารที่มีคนติดตามมากที่สุดในจังหวัดปราจีนบุรี ซึ่งก่อตั้งมาตั้งแต่ปี พ.ศ. 2556 จากช่วงเหตุการณ์น้ำท่วมปราจีนบุรีครั้งใหญ่ ซึ่งเราพยายามเป็นแหล่งข้อมูลข่าวสารให้คนปราจีนบุรีตลอดมา</p>
		<p>โครงการต่อไปที่เรากำลังพัฒนาคือ การช่วยผลักดันอาชีพชุมชนและพัฒนาเศรษฐกิจของจังหวัดปราจีนบุรี โดยเน้นไปที่ธุรกิจในระดับ <strong>SMEs</strong> ซึ่งเราเล็งเห็นว่าจังหวัดปราจีนบุรีมีสินค้าและบริการที่มีคุณภาพดี แต่ยังขาดการประชาสัมพันธ์ที่มีประสิทธิภาพและความเข้าใจในความต้องการของลูกค้า จึงทำให้หลายธุรกิจต้องปิดตัวลง</p>
		<h2>หากคุณเป็นเจ้าของธุรกิจ เราขอเชิญคุณเข้ามาร่วมกันเรา</h2>
		<p>หากคุณต้องการเข้าร่วมกับเรา มีวิธีการดังนี้</p>
		<p>1. สร้างบัญชีของคุณบนเว็บปราจีนเดลี่ โดยคลิกที่ <a href="">เข้าสู่ระบบ</a> และ <a href="">เข้าระบบด้วย Facebook</a> จากนั้นระบบจะขอ Email ของคุณ หลังจากนั้นคุณจะได้บัญชีบนปราจีนเดลี่แล้ว</p>
		<p>2. คลิกที่ <a href="">เพิ่มธุรกิจของคุณ</a> จากนั้นใส่รายละเอียดของธุรกิจคุณ ตามช่องที่กำหนดไว้ให้ แนะนำว่าควรใช้คำที่เข้าใจง่ายและควบถ้วน จากนั้นคลิกที่ บันทึก</p>
		<p>3. ข้อมูลของคุณจะถูกส่งมาให้ทีมงานปราจีนเดลี่ตรวจสอบความถูกต้อง (ภายใน 24 ชั่วโมง) เมื่อข้อมูลของคุณผ่านการพิจารณาแล้ว จะมีอีเมลแจ้งให้ทราบ</p>
		<p>4. คุณสามารถทดลองค้นหาธุรกิจของคุณ ข้อมูลก็จะแสดงมาที่หน้าเว็บของปราจีนเดลี่</p>
		<br>
		<p>ในช่วงเริ่มต้นโครงการ เราจะรวบรวมข้อมูลจากธุรกิจหลากแหล่งในปราจีนบุรี และเปิดให้ผู้ใช้ทั่วไปเข้าใช้บริการค้นหา หลังจากนี้ เราจะเพิ่มความสามารถให้ตรงความต้องการของผู้ใช้มากยิ่งขึ้น</p>
		<p class="thank">เราขอขอบคุณ ที่ท่านเข้าร่วมเป็นส่วนหนึ่งในโครงการของเรา ขอบคุณค่ะ</p>

		<p class="poster">ข้อมูลโดยคุณ <span class="poster-name">ทีมงานปราจีนเดลี่</span> · อัพเดทเมื่อ 12 ธันวาคม 2558</p>
	</div>

	<div class="menu">
		<?php if(MEMBER_ONLINE){?>
		<a href="page-editor.php" target="_parent">เพิ่มธุรกิจของคุณ</a>
		<?php }else{?>
		<a href="partner.php" target="_parent" class="facebook-loing"><i class="fa fa-facebook"></i> เข้าระบบด้วย Facebook</a>
		<?php }?>
	</div>
</div>

<?php include'footer.php';?>
<?php include'analytics_bar.php';?>
</body>
</html>