<?php
// $var['pa_name'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_name']);
// $var['pa_description'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_description']);
if($var['pa_status'] == "success"){
	$status = '<span class="status success"><i class="fa fa-check"></i> ทำงาน</span>';
}
else if($var['pa_status'] == "fail"){
	$status = '<span class="status fail">ไม่ผ่าน <i class="fa fa-exclamation"></i></span>';
}
else if($var['pa_status'] == "delete_request"){
	$status = '<span class="status"><i class="fa fa-trash-o"></i> ลบข้อมูล</span>';
}
else{
	$status = '<span class="status"><i class="fa fa-clock-o"></i> ตรวจสอบ</span>';
}


$timeupdate = $var['create_time_facebook_format'];

if($var['pe_create_time'] != $var['pa_update_time']){
	$timeupdate = $var['update_time_facebook_format'];
}

$phone = $var['pa_phone'];

// Location
if(empty($var['amphur_name'])){
	// $location = 'จังหวัด'.$var['province_name'];
}
else{
	// $location = 'อำเภอ'.$var['amphur_name'].' จังหวัด'.$var['province_name'];
	$location = $var['amphur_name'];
}
?>

<div class="result-items" id="items-<?php echo $var['pa_id'];?>">
	<div class="detail <?php echo (empty($var['im_id'])?'detail-fullsize':'');?>">
		<div class="title"><a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html"><?php echo $var['pa_name'];?></a></div>
		<div class="info">
			<span class="status"><?php echo $status;?></span>
			 · <span class="location"><?php echo $location;?></span>
			<?php if(!empty($var['pa_phone'])){?>
			 · <span class="phone"><?php echo $phone;?></span>
			<?php }?>

			 · <span class="timeupdate" title="<?php echo $var['update_time_thai_format'];?>"><?php echo $timeupdate;?></span>
		</div>
		<div class="description">
			<?php echo $var['pa_description'];?>
		</div>
		<div class="analytic">
			<?php if($var['pa_read'] > 10){?>
			<span class="read"><?php echo number_format($var['pa_read']);?> Read · </span>
			<?php }?>
			<span class="visit">ดูล่าสุด <?php echo $var['visit_time_facebook_format'];?></span>

			<span class="delete" onclick="javascript:UpdateStatus(<?php echo $var['pa_id'];?>,'delete_request');"><i class="fa fa-times"></i> Delete</span>
		</div>
	</div>
	<?php if(!empty($var['im_id'])){?>
	<div class="thumbnail">
		<a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html">
		<img src="image/upload/thumbnail/<?php echo $var['im_filename'];?>" alt="">
		</a>
	</div>
	<?php }?>
</div>