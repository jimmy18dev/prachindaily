<div class="web-analytics">
	<div class="left"><?php echo number_format($site->people_cout);?> People</div>
	<div class="left">Page loading <span><?php echo round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],4);?>s</span></div>
	<div class="right"><?php echo number_format($site->search_cout);?> Searching</div>
	<div class="right" id="process_update"></div>
</div>