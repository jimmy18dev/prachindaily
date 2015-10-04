<?php
require_once'config/autoload.php';
include'sdk/facebook-sdk/autoload.php';
include'facebook.php';
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
		<form action="search.php" target="_parent" method="get">
		<input type="text" name="q" class="input-text" placeholder="ค้นหาสิ่งที่คุณต้องการ..." value="<?php echo $_GET['q'];?>">
		<button type="submit" class="button-submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="result-list">
		<?php
		$total_feed = $page->Search(array(
			'keyword' 	=> $_GET['q'],
			'page' => $_GET['page'],
		));
		?>
	</div>
	<div class="pagination">
		<div class="found">ค้นหาพบ <?php echo $total_feed;?> รายการ</div>
		<?php $page->Pagination($total_feed,$_GET['page'],$_GET['q'],'search');?>
	</div>
</div>

<?php include'footer.php';?>

<div class="web-analytics">
	<div class="left">สมาชิก 34,020 คน</div>
	<div class="right">ค้นหา 324,353 ครั้ง</div>
</div>
</body>
</html>