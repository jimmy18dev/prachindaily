<header class="header <?php echo ($current_page == "page"?'header-fixed':'');?>">
	<a href="index.php" class="navi-link"><i class="fa fa-home"></i><span class="caption">หน้าแรก</span></a>
	<a href="index.php" class="navi-link"><i class="fa fa-search"></i><span class="caption">ค้นหา</span></a>

	<?php if(DEVICE_TYPE != "Desktop" && $current_page == "editor"){?>
	<div class="submit-button" id="header-submit-button"><i class="fa fa-check"></i>บันทึก</div>
	<?php }else{?>
	<div class="account">
		<?php if(MEMBER_ONLINE){?>
		<div class="avatar">
			<a href="me.php">
				<img src="https://graph.facebook.com/<?php echo $me->facebook_id;?>/picture?type=square" alt="<?php echo $me->fname;?>">
			</a>
		</div>
		<?php }else{?>
		<?php if($current_page != "login"){?>
		<div class="login"><a href="login.php">เข้าสู่ระบบ <i class="fa fa-sign-in"></i></a></div>
		<?php }?>
		<?php }?>
	</div>
	<?php }?>
</header>