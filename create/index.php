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

<title>dotdotdot limited in comming soon...</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<script type="text/javascript" src="../js/lib/jquery-1.11.1.min.js"></script>

<script type="text/javascript">

var name;
var description;
var doing;
var good;

$(document).ready(function(){
	var i = 1;

	$('.form').hide();
	$('#form1').show();

	$('#btn-next').click(function(){
		FormSubmit();
		NextForm(++i);

		if(i == 5){
			ShowData();
		}
	});

	$('#btn-prev').click(function(){
		FormSubmit();
		NextForm(--i);
	});
});

function NextForm(i){
	$('.form').hide(500);
	$('#form'+i).show(1000);
}

function FormSubmit(){
	name = $('#name').val();
	description = $('#description').val();
	doing = $('#doing').val();
	good = $('#good').val();
}

function ShowData(){
	$('#sname').html(name);
	$('#sdescription').html(description);
	$('#sdoing').html(doing);
	$('#sgood').html(good);
}
</script>

</head>

<body>
<div class="page">
	<div class="form" id="form1">
		<p class="caption">ร้านของคุณชื่ออะไร ? <span class="progress">1/4</span></p>
		<input type="text" class="input-text" id="name">
	</div>
	<div class="form" id="form2">
		<p class="caption">ร้านของคุณอยู่ที่ไหน ? <span class="progress">2/4</span></p>
		<input type="text" class="input-text" id="description">
	</div>
	<div class="form" id="form3">
		<p class="caption">ร้านของคุกำลังทำอะไร ? <span class="progress">3/4</span></p>
		<input type="text" class="input-text" id="doing">
	</div>
	<div class="form" id="form4">
		<p class="caption">ร้านของคุณดีแค่ไหน ? <span class="progress">4/4</span></p>
		<input type="text" class="input-text" id="good">
	</div>

	<div class="form" id="form5">
		<p>Form submit successed!</p>
	</div>

	<div class="control">
		<div class="btn" id="btn-next">ถัดไป</div>
		<div class="btn btn-prev" id="btn-prev">ย้อนกลับ</div>
	</div>


	<div class="data">
		<p id="sname"></p>
		<p id="sdescription"></p>
		<p id="sdoing"></p>
		<p id="sgood"></p>
	</div>
</div>
</body>
</html>