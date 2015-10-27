<figure class="gallery-items">
	<img src="<?php echo 'image/upload/thumbnail/'.$var['im_filename'];?>" alt="">

	<?php if(!empty($var['im_caption'])){?>
	<figcaption class="caption"><?php echo $var['im_caption'];?></figcaption>
	<?php }?>
</figure>