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
}
if($page->poster_id != MEMBER_ID){
	header("Location: me.php");
	die();
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

<div class="page-container">

	<form id="page_editor" action="gallery.process.php" method="post" enctype="multipart/form-data">
	<div class="page-editor">
		<div class="editor-items">
			<div class="caption">ภาพถ่ายหน้าร้านหรือภาพบรรยากาศ (<?php echo $page->poster_id;?>)</div>
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
		</div>
		<div class="editor-items">
			<div class="caption">Caption</div>
			<div class="input">
				<textarea name="caption" class="input-textarea animated"></textarea>
				<span class="length" id="description-length"></span>
			</div>
		</div>

		<div class="submit">
			<button type="submit" class="submit-button"><i class="fa fa-check"></i>บันทึก</button>
		</div>
		<input type="hidden" name="page_id" value="<?php echo $page->id;?>">
	</div>
	</form>
</div>

<!-- Loading process submit photo to uploading. -->
<div id="filter">
	<div id="loading-bar"></div>
	<div id="loading-message">กำลังส่งข้อมูล</div>
	<div class="cancel"><a href="me.php" target="_parent">ยกเลิก</a></div>
</div>

<?php include'footer.php';?>
<?php include'analytics_bar.php';?>

<script type="text/javascript" src="js/page.editor.js"></script>
<script type="text/javascript" src="js/page.editor.thumbnail.js"></script>

</body>
</html>