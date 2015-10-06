<?php
class PageController extends PageModel{

	public $id;
	public $name;
	public $description;
	public $phone;
	public $address;
	public $guide;

	public function Get($param){
		$data = parent::GetProcess($param);

		$this->id = $data['pa_id'];
		$this->name = $data['pa_name'];
		$this->description = $data['pa_description'];
		$this->phone = $data['pa_phone'];
		$this->address = $data['pa_address'];
		$this->guide = $data['pa_guide'];
	}

	public function Create($param){
		parent::CreateProcess($param);
	}

	public function Update($param){
		parent::UpdateProcess($param);
	}

	public function MyPage($param){
		$dataset = parent::MyPageProcess($param);
		$this->RenderPage('mypage',$dataset,'null');
	}

	public function Search($param){
		$per_page = 30;
		$current_page = $param['page'];

		if(empty($param['page']))
			$current_page = 1;

		$param['start'] = ($current_page*$per_page)-$per_page;
		$param['total'] = $per_page;

		$dataset = parent::SearchProcess($param);
		$this->RenderPage('page',$dataset,$param['keyword']);

		return $dataset['total'];
	}

	public function SaveSearchLog($param){
		parent::SaveSearchLogProcess($param);
	}

	public function Pagination($total_feed,$current_page,$q,$mode){
		$per_page 	= 30;
		$total_page = ceil($total_feed/$per_page);
		$step_down 	= 3;
		$step_up 	= 2;

		if($total_page-$current_page < 2)
			$step_down = ($current_page-$total_page)+5;
		if($current_page <= 2)
			$step_up = 5 - $current_page;

		if(empty($current_page))
			$current_page = 1;

		if($mode == "search")
			$url = 'search.php?q='.$q.'&page=';

		if($total_page > 1){
			for($i=1;$i<=$total_page;$i++){
				if($i > $current_page-$step_down && $i<=$current_page){
					echo'<a href="'.$url.$i.'"><div class="pagination-items '.($current_page==$i?'pagination-active':'').'">'.$i.'</div></a>';
				}
				else if(($i > $current_page) && ($i <= $current_page+$step_up)){
					echo'<a href="'.$url.$i.'"><div class="pagination-items '.($current_page==$i?'pagination-active':'').'">'.$i.'</div></a>';
				}
			}
		}
	}

	private function RenderPage($mode,$data,$keyword){
        foreach ($data as $var){
        	if($mode == "mypage" && !empty($var['pa_id'])){
        		include'template/page/mypage.items.php';
        	}
        	else if($mode == "page" && !empty($var['pa_id'])){
        		include'template/page/page.items.php';
        	}
        }
        unset($data);
    }
}
?>