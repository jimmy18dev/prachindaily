<header class="header">
	<div class="logo"><a href="index.php">Prachindaily</a></div>
	<div class="account">
		<?php if(MEMBER_ONLINE){?>
		<div class="avatar">
			<a href="me.php">
				<img src="https://graph.facebook.com/<?php echo $me->facebook_id;?>/picture?type=square" alt="<?php echo $me->fname;?>">
			</a>
		</div>		
		<div class="name"><a href="me.php"><?php echo $me->name;?></a></div>
		<?php }else{?>
		<?php if($current_page != "login"){?>
		<div class="login"><a href="login.php">เข้าสู่ระบบ <i class="fa fa-sign-in"></i></a></div>
		<?php }?>
		<?php }?>
	</div>
</header>