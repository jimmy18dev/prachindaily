<?php
// $var['pa_name'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_name']);
$var['pa_description'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_description']);

$timeupdate = $var['create_time_facebook_format'];
if($var['pa_create_time'] != $var['pa_update_time']){
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
	<div class="title"><a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html"><?php echo $var['pa_name'];?></a></div>
	<div class="info">
		<span class="location"><?php echo $location;?></span>

		<?php if(!empty($var['pa_phone'])){?>
		 · <span class="phone"><?php echo $phone;?></span>
		<?php }?>

		 · <span class="timeupdate" title="<?php echo $var['update_time_thai_format'];?>"><?php echo $timeupdate;?></span>
	</div>
	<div class="description">
		<?php echo $var['pa_description'];?>
	</div>
</div>