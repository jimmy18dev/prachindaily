<?php
require_once'config/autoload.php';
header("Content-type: text/json");
// API Request $_POST
if($_POST['calling'] != ''){
	switch ($_POST['calling']) {
		case 'Page':
			switch ($_POST['action']) {
				case 'UpdateAnalytics':
					if(true){
						$page->UpdateAnalytics(array(
							'page_id' 	=> $_POST['page_id'],
							'type'		=> $_POST['type'],
						));
						$api->successMessage($_POST['type'].' updated!','','');
					}
					else{
						$api->errorMessage('Access Token Error!');
					}
					break;
				case 'UpdateStatus':
					if(true){
						$page->UpdateStatus(array(
							'page_id' 	=> $_POST['page_id'],
							'status'	=> $_POST['status'],
						));
						$api->successMessage($_POST['status'].' updated!','','');
					}
					else{
						$api->errorMessage('Access Token Error!');
					}
					break;
				default:
					break;
			}
			break;
		default:
			$api->errorMessage('PAGE POST API ERROR!');
			break;
	}
}
// API Request $_GET
else if($_GET['calling'] != ''){
	switch ($_GET['calling']) {
		case 'Page':
			switch ($_GET['action']) {
				case 'LocationAnalytics':
					$dataset = $page->LocationAnalyticsProcess(array('id' => 0));
					$api->ExportLocationInfoJson('Device Access on PLace',$dataset);
					break;
				default:
					break;
			}
			break;
		default:
			$api->errorMessage('PAGE GET API ERROR!');
			break;
	}
}
// API Request is Fail or Null calling
else{
	$api->errorMessage('API NOT FOUND!');
}
exit();
?>