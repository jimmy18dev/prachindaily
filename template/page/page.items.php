<?php
$var['pa_name'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_name']);
$var['pa_description'] = str_ireplace($keyword,'<span class="highlight">'.$keyword.'</span>',$var['pa_description']);
?>

<div class="result-items">
	<div class="title"><a href="page.php?id=<?php echo $var['pa_id'];?>"><?php echo $var['pa_name'];?></a></div>
	<div class="info"><span class="location">ประจันตคาม</span> · <span class="location">ปราจีนบุรี</span> · <span class="phone">0801051940</span> · <span class="timeupdate">อัพเดท 4 มกราคม 2558</span></div>
	<div class="description"><?php echo $var['pa_description'];?></div>
</div>