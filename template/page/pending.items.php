<?php
// $var['pa_name'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_name']);
// $var['pa_description'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_description']);

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
			<span class="score"><?php echo $var['pa_score'];?>%</span>
		 	· <span class="location"><?php echo $location;?></span>
			<?php if(!empty($var['pa_phone'])){?>
			 · <span class="phone"><?php echo $phone;?></span>
			<?php }?>

			 · <span class="timeupdate" title="<?php echo $var['update_time_thai_format'];?>"><?php echo $timeupdate;?></span>
		</div>
		<div class="description">
			<?php echo $var['pa_description'];?>
		</div>

		<div class="control">
			<div class="button success" onclick="javascript:UpdateStatus(<?php echo $var['pa_id'];?>,'success');"><i class="fa fa-check"></i></div>
			<div class="button fail" onclick="javascript:UpdateStatus(<?php echo $var['pa_id'];?>,'fail');"><i class="fa fa-times"></i></div>
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