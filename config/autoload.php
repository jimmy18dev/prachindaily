<?php
	//Start Session and Cookie.
	session_start();
	ob_start();

	// Starttime /////////////////////
	define('StTime', microtime(true));

	// Time Zone ////////////////////////////
	date_default_timezone_set('Asia/Bangkok');

	error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	//error_reporting(E_ERROR);

	include'config.php';

	// Database (PDO class) ///////////////
	include_once'model/database.class.php';

	// Mobile Detect is a lightweight PHP
	// include_once'plugin/mobile-detect/mobile_detect.php';
	// include_once'plugin/mobile-detect/desktop_detect.php';

	// Site Setting include /////////////
	// Model ////////////////////////////
	include_once'model/site.model.php';
	include_once'model/me.model.php';
	include_once'model/member.model.php';
	include_once'model/page.model.php';
	include_once'model/location.model.php';

	// Controller ///////////////////////
	include_once'controller/site.controller.php';
	include_once'controller/api.controller.php';
	include_once'controller/me.controller.php';
	include_once'controller/member.controller.php';
	include_once'controller/page.controller.php';
	include_once'controller/location.controller.php';

	// Object of Controller
	$site 			= new SiteController;
	$api 			= new ApiController;
	$me 			= new MeController;
	$member 		= new MemberController;
	$page 			= new PageController;
	$location 		= new LocationController;

	// Device access detact process
	//include'device.access.php';

	$_SESSION['facebook_id'] = '1818320188';

	// Device define data
	define('DEVICE_TYPE',		$deviceType);
	define('DEVICE_MODEL',		$deviceModel);
	define('DEVICE_OS', 		$deviceOS);
	define('DEVICE_BROWSER',	$deviceBrowser);

	// Cookie Checking
	if($me->CookieChecking()){
		$_SESSION['facebook_id'] = $_COOKIE['facebook_id'];
	}	

	// Member online checking
	define('PRIVETE_KEY','dinsorsee');
	define('MEMBER_ONLINE',$me->SessionOnline());

	// Get member info
	if(MEMBER_ONLINE){
		$me->Get(array('facebook_id' => $_SESSION['facebook_id']));
	}

	// Define member data
	define('MEMBER_ID',			$me->facebook_id);
	define('MEMBER_TOKEN',		$me->token);
	define('MEMBER_TYPE',		$me->type);

	$site->GetSiteInfo();
?>