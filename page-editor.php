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
<script type="text/javascript" src="js/lib/jquery.autosize.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.form.min.js"></script>

</head>

<body>

<?php include'header.php';?>

<div class="page-container">

	<form id="page_editor" action="page.process.php" method="post" enctype="multipart/form-data">
	<div class="page-editor">
		<div class="editor-items">
			<div class="caption">ชื่อร้านชื่อสถานที่</div>
			<div class="input">
				<input type="text" name="name" class="input-text" value="<?php echo $page->name;?>">
			</div>
		</div>
		<div class="editor-items">
			<div class="caption">รายละเอียด</div>
			<div class="input">
				<textarea name="description" class="input-textarea animated"><?php echo $page->description;?></textarea>
			</div>
		</div>
		<div class="editor-items">
			<div class="caption">ที่อยู่</div>
			<div class="input">
				<textarea name="address" class="input-textarea animated"><?php echo $page->address;?></textarea>
			</div>
		</div>
		<div class="editor-items">
			<div class="caption">เบอร์โทรศัพท์</div>
			<div class="input">
				<input type="text" name="phone" class="input-text" value="<?php echo $page->phone;?>">
			</div>
		</div>
		<div class="editor-items">
			<div class="caption">อธิบายเส้นทางไปร้านหรือสถานที่นี้</div>
			<div class="input">
				<textarea name="guide" class="input-textarea animated"><?php echo $page->guide;?></textarea>
			</div>
		</div>
		<div class="agreement">กรุณาอ่าน <a href="agreement.php">ข้อตกลงในการใช้บริการ</a></div>
		<div class="submit">
			<button type="submit"class="submit-button">บันทึก</button>
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

<div class="web-analytics">
	<div class="left">สมาชิก 34,020 คน</div>
	<div class="right">ค้นหา 324,353 ครั้ง</div>
</div>

<script type="text/javascript" src="js/page.editor.js"></script>

</body>
</html>