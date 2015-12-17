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

<div class="page-items" id="items-<?php echo $var['pa_id'];?>">
	<div class="detail <?php echo (empty($var['im_id'])?'detail-fullsize':'');?>">
		<h2>
			<a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html"><?php echo $var['pa_name'];?></a>
		</h2>
		<p><?php echo $location;?></p>
		<p><?php echo $var['pa_description'];?></p>
	</div>

	<?php if(!empty($var['im_id'])){?>
	<figure class="thumbnail">
		<a href="page-<?php echo $var['pa_id'];?>-<?php echo $var['url_friendly'];?>.html#article">
		<img src="image/upload/thumbnail/<?php echo $var['im_filename'];?>" alt="">
		</a>
	</figure>
	<?php }?>
</div>