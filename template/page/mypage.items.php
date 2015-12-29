<?php
// $var['pa_name'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_name']);
// $var['pa_description'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_description']);
if($var['pa_status'] == "success"){
	$status = '<span class="status success"><i class="fa fa-check"></i></span>';
}
else if($var['pa_status'] == "fail"){
	$status = '<span class="status fail">ไม่ผ่าน <i class="fa fa-exclamation"></i></span>';
}
else if($var['pa_status'] == "delete_request"){
	$status = '<span class="status"><i class="fa fa-trash-o"></i></span>';
}
else{
	$status = '<span class="status"><i class="fa fa-clock-o"></i></span>';
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

<div class="page-items" id="items-<?php echo $var['pa_id'];?>">
	<?php if(!empty($var['im_id'])){?>
	<figure class="page-items-thumbnail">
		<a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html#article">
		<img src="image/upload/thumbnail/<?php echo $var['im_filename'];?>" alt="">
		</a>
	</figure>
	<?php }?>
	<div class="page-items-detail <?php echo (empty($var['im_id'])?'detail-fullsize':'');?>">
		<h2>
			<a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html#article"><?php echo $var['pa_name'];?></a>
		</h2>
		<p><?php echo $var['pa_description'];?></p>
	</div>

	<div class="page-items-footer"><span class="location"><?php echo $location;?></span></div>
</div>