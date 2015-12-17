<footer class="footer">
	<div class="menu">
		<div class="menu-items <?php echo ($current_page == "partner"?'menu-active':'');?>"><a href="partner.php#start">ฝากร้าน</a></div>
		<div class="menu-items <?php echo ($current_page == "agreement"?'menu-active':'');?>"><a href="agreement.php#start">ข้อตกลง</a></div>
		<div class="menu-items <?php echo ($current_page == "stat"?'menu-active':'');?>"><i class="fa fa-pie-chart"></i><a href="stat.php#start">สถิติ</a></div>
		<div class="menu-items <?php echo ($current_page == "contact"?'menu-active':'');?>"><a href="contact.php#start">ติดต่อเรา</a></div>
	</div>

	<p>Copyright @<?php echo date("Y");?> prachindaily.com All right reserved. | Powered by DailyPoint 1.0</p>
	<p>Prachindaily Attribution-NonCommercial-NoDerivatives 4.0 International</p>
	<p><a href="https://www.facebook.com/prachindaily">Facebook</a> · <a href="https://twitter.com/PrachinDaily">Twitter</a> · prachindaily@gmail.com</p>

	<?php if(DEVICE_TYPE != "Desktop"){?>
	<p class="device"><?php echo DEVICE_TYPE.', Model:'.DEVICE_MODEL.', OS:'.DEVICE_OS.', Browser:'.DEVICE_BROWSER;?></p>
	<?php }?>

	<p><?php echo'Token: '.$_COOKIE['token_key'].' | FacebookID: '.$_COOKIE['facebook_id'].'| MemberID: '.MEMBER_ID;?></p>
	<p><?php echo number_format($site->people_cout);?> People · Page loading <span><?php echo round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],4);?>s</span> <span id="process_update"></span> · <?php echo number_format($site->search_cout);?> Searching</p>
</footer>