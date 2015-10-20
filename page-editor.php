<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';

if(!MEMBER_ONLINE){
	header("Location: login.php");
	die();
}
if(!empty($_GET['id'])){
	$page->Get(array('page_id' => $_GET['id']));

	if($page->poster_id != MEMBER_ID){
		header("Location: me.php");
	}
}

$current_page = "editor";

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

<title><?php echo (empty($page->id)?'Editor':'แก้ไข '.$page->name);?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<!-- JS Lib -->
<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.autosize.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>

</head>

<body>

<?php include'header.php';?>

<article class="page-container">
	<!-- Start form -->
	<form id="page_editor" action="page.process.php" method="post" enctype="multipart/form-data">
	<div class="page">
		<div class="score">คะแนน: <span class="value" id="score"><?php echo $page->score;?>/100</span></div>
		<header>
			<input type="text" id="name" name="page_name" class="input-page-name" value="<?php echo $page->name;?>" onblur="javascript:Score();" required placeholder="ชื่อร้าน...">
		</header>

		<div class="info">
			<select name="city_id" id="city_id" class="input-text input-select" onblur="javascript:Score();">
				<option value="">เลือกอำเภอ...</option>
				<?php $location->ListAmphur(array('province_id' => 16,'current' => $page->amphur_id));?>
			</select>
		</div>

		<figure class="entry-cover">
			<div class="image-input">
				<span id="photo_files_div"></span>
				<span id="photo_thumbnail">
					<?php if(empty($page->cover_id)){?>
					<div class="icon"><i class="fa fa-camera"></i> เลือกภาพ</div>
					<?php }else{?>
					<img src="<?php echo $destination_folder['normal'].$page->cover_filename;?>" alt="">
					<?php }?>
				</span>
				<input type="file" class="input-file" id="photo_files" name="image_file" accept="image/*">
			</div>
		</figure>

		<section class="entry-content">
			<textarea name="description" id="description" class="input-text input-textarea animated" onblur="javascript:Score();" placeholder="อธิบายรายละเอียดร้าน..."><?php echo $page->description;?></textarea>
		</section>

		<section class="entry-content">
			<div class="infomation">
				<div class="items">
					<div class="icon"><i class="fa fa-phone-square"></i></div>
					<div class="text">
						<input type="phone" name="phone" id="phone" class="input-text" value="<?php echo $page->phone;?>" onblur="javascript:Score();" required placeholder="เบอร์โทรศัพท์...">
					</div>
				</div>

				<div class="items">
					<div class="icon"><i class="fa fa-map"></i></div>
					<div class="text">
						<textarea name="guide" id="guide" class="input-text input-textarea animated" onblur="javascript:Score();" placeholder="ร้านของคุณอยู่ตรงไหน..."><?php echo $page->guide;?></textarea>
					</div>
				</div>

				<div class="items">
					<div class="icon"><i class="fa fa-map-pin"></i></div>
					<div class="text">
						<textarea name="address" id="address" class="input-text input-textarea animated" onblur="javascript:Score();" placeholder="ที่อยู่จริง..."><?php echo $page->address;?></textarea>
					</div>
				</div>
			</div>
		</section>

		<?php if(empty($page->id)){?>
		<div class="agreement">กรุณาอ่าน <a href="agreement.php" target="_blank">ข้อตกลงในการใช้บริการ</a></div>
		<?php }?>

		<div class="submit">
			<button type="submit" class="submit-button"><i class="fa fa-check"></i>บันทึก</button>
		</div>
		<input type="hidden" name="province_id" value="16">
		<input type="hidden" name="page_id" value="<?php echo $page->id;?>">
	</div>
	</form>
	<!-- End form -->
</article>


<!-- Loading process submit photo to uploading. -->
<div id="filter">
	<div id="loading-bar"></div>
	<div id="loading-message">กำลังส่งข้อมูล</div>
	<div class="cancel"><a href="me.php" target="_parent">ยกเลิก</a></div>
</div>

<?php include'footer.php';?>

<script type="text/javascript" src="js/page.editor.js"></script>
<script type="text/javascript" src="js/editor.thumbnail.js"></script>
<script type="text/javascript" src="js/score.js"></script>

</body>
</html>