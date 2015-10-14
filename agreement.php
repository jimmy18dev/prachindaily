<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

$page->Get(array('page_id' => $_GET['id']));
$current_page = "agreement";
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
$meta_title = 'ข้อตกลงในการใช้บริการ - ปราจีนเดลี่';
$meta_description = 'ทำความเข้าใจเพื่อประโยชน์สูงสุดของท่านเอง หากมีการกระทำผิดข้อตกการใช้บริการ ทางทีมงานจะใช้การแนะนำหรือตักเตือนเพื่อให้การใช้งานเป็นไปได้อย่างสะดวก';
?>

<title><?php echo $meta_title;?></title>

<!-- Meta Tag Main -->
<meta name="description" 			content="<?php echo $meta_description;?>"/>
<meta property="og:title" 			content="<?php echo $meta_title;?>"/>
<meta property="og:description" 	content="<?php echo $meta_description;?>"/>
<meta property="og:url" 			content="<?php echo $meta['domain'];?>/agreement.php"/>
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
		<h1>ข้อตกลงในการใช้บริการ</h1>
		<p class="info">ทำความเข้าใจเพื่อประโยชน์สูงสุดของท่านเอง</p>
	</header>

	<figure class="entry-cover">
		<img src="image/site/agreement.jpg" alt="">
		<figcaption></figcaption>
	</figure>

	<div class="entry-content">
		<p>หากมีการกระทำผิดข้อตกการใช้บริการ ทางทีมงานจะใช้การแนะนำหรือตักเตือนเพื่อให้การใช้งานเป็นไปได้อย่างสะดวก แต่ถ้าทางเราเห็น <strong>เจตนาจงใจทำผิด</strong> เราจะขอลบบัญชีของท่านออกจากระบบ จะทำให้ท่านไม่สามารถเข้าใจงานเว็บปราจีนเดลี่ได้ตลอดไป (ลบข้อมูล)</p>

		<h2>ข้อตกลงร่วมกัน</h2>
		<p>1. สร้างบัญชีของคุณบนเว็บปราจีนเดลี่ โดยคลิกที่ <a href="">เข้าสู่ระบบ</a> และ <a href="">เข้าระบบด้วย Facebook</a> จากนั้นระบบจะขอ Email ของคุณ หลังจากนั้นคุณจะได้บัญชีบนปราจีนเดลี่แล้ว</p>
		<p>2. คลิกที่ <a href="">เพิ่มธุรกิจของคุณ</a> จากนั้นใส่รายละเอียดของธุรกิจคุณ ตามช่องที่กำหนดไว้ให้ แนะนำว่าควรใช้คำที่เข้าใจง่ายและควบถ้วน จากนั้นคลิกที่ บันทึก</p>
		<p>3. ข้อมูลของคุณจะถูกส่งมาให้ทีมงานปราจีนเดลี่ตรวจสอบความถูกต้อง (ภายใน 24 ชั่วโมง) เมื่อข้อมูลของคุณผ่านการพิจารณาแล้ว จะมีอีเมลแจ้งให้ทราบ</p>
		<p>4. คุณสามารถทดลองค้นหาธุรกิจของคุณ ข้อมูลก็จะแสดงมาที่หน้าเว็บของปราจีนเดลี่</p>
		<br>
		<p>ปล.หากมีข้อสงสัย สามารถติดต่อทีมงานได้ตลอด เราจะอธิบายหรือแก้ไขเพื่อให้เกิดประโชยน์กับผู้ใช้ทุกท่าน</p>
		<p class="thank">การตัดสินของทีมงานปราจีนเดลี่ ถือเป็นที่สิ้นสุด</p>

		<p class="poster">ข้อมูลโดยคุณ <span class="poster-name">ทีมงานปราจีนเดลี่</span> · อัพเดทเมื่อ 12 ธันวาคม 2558</p>
	</div>
</div>

<?php include'footer.php';?>
<?php include'analytics_bar.php';?>
</body>
</html>