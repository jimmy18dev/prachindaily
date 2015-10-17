<div class="web-analytics">
	<div class="left"><?php echo number_format($site->people_cout);?> People · Page loading <span><?php echo round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],4);?>s</span></div>
	<div class="right"><span id="process_update"></span> · <?php echo number_format($site->search_cout);?> Searching</div>
</div>