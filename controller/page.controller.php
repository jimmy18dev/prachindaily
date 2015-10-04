<?php
class PageController extends PageModel{

	public function Create($param){
		parent::CreateProcess($param);
	}

	private function RenderOrder($mode,$data){
        foreach ($data as $var){
        	include'template/order/order.items.php';
        }
        unset($data);
    }
}
?>