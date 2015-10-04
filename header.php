<header class="header">
	<div class="logo"><a href="index.php">Prachindaily</a></div>
	<div class="account">
		<?php if(MEMBER_ONLINE){?>
		<div class="avatar">
			<a href="me.php">
				<img src="https://graph.facebook.com/<?php echo $me->facebook_id;?>/picture?type=square" alt="<?php echo $me->fname;?>">
			</a>
		</div>

		<a href="page-editor.php">
		<div class="button">เพิ่มธุรกิจคุณ</div>
		</a>
		
		<div class="name"><a href="me.php"><?php echo $me->name;?></a></div>
		<?php }else{?>
		<div class="name"><a href="login.php">เข้าสู่ระบบ <i class="fa fa-sign-in"></i></a></div>
		<?php }?>
	</div>
</header>