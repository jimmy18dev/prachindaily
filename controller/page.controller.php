<?php
class PageController extends PageModel{

	public $id;
	public $name;
	public $url_friendly;
	public $description;
	public $description_metatag;
	public $phone;
	public $address;
	public $guide;
	public $latitude;
	public $longitude;
	public $district_id;
	public $district_name;
	public $amphur_id;
	public $amphur_name;
	public $province_id;
	public $province_name;
	public $create_time;
	public $Update_time;
	public $visit_time;
	public $create_time_facebook_format;
	public $update_time_facebook_format;
	public $visit_time_facebook_format;
	public $create_time_thai_format;
	public $update_time_thai_format;
	public $visit_time_thai_format;
	public $score;
	public $view;
	public $read;
	public $success;
	public $type;
	public $status;

	// Poster or Owner
	public $poster_id;
	public $poster_name;
	public $poster_type;

	// Photo Cover
	public $cover_id;
	public $cover_filename;
	public $cover_format;

	public function Get($param){
		$data = parent::GetProcess($param);

		$this->id = $data['pa_id'];
		$this->name = $data['pa_name'];
		$this->url_friendly = $data['url_friendly'];
		$this->description = $data['pa_description'];
		$this->description_metatag = $this->ConvertStringtoMetatag($data['pa_description']);
		$this->phone = $data['pa_phone'];
		$this->address = $data['pa_address'];
		$this->guide = $data['pa_guide'];
		$this->latitude = $data['pa_latitude'];
		$this->longitude = $data['pa_longitude'];
		$this->district_id = $data['district_id'];
		$this->district_name = $data['district_name'];
		$this->amphur_id = $data['amphur_id'];
		$this->amphur_name = $data['amphur_name'];
		$this->province_id = $data['province_id'];
		$this->province_name = $data['province_name'];
		$this->create_time = $data['pa_create_time'];
		$this->Update_time = $data['pa_update_time'];
		$this->visit_time = $data['pa_visit_time'];
		$this->create_time_facebook_format = $data['create_time_facebook_format'];
		$this->update_time_facebook_format = $data['update_time_facebook_format'];
		$this->visit_time_facebook_format = $data['visit_time_facebook_format'];
		$this->create_time_thai_format = $data['create_time_thai_format'];
		$this->update_time_thai_format = $data['update_time_thai_format'];
		$this->visit_time_thai_format = $data['visit_time_thai_format'];
		$this->view = $data['pa_view'];
		$this->read = $data['pa_read'];
		$this->score = $data['pa_score'];
		$this->success = $data['pa_success'];
		$this->type = $data['pa_type'];
		$this->status = $data['pa_status'];

		// Poster or Owner
		$this->poster_id = $data['pe_fb_id'];
		$this->poster_name = $data['pe_fname'].' '.$data['pe_lname'];
		$this->poster_type = $data['pe_type'];

		// Photo Cover
		$this->cover_id = $data['im_id'];
		$this->cover_filename = $data['im_filename'];
		$this->cover_format = $data['im_format'];
	}

	public function Create($param){
		return parent::CreateProcess($param);
	}

	public function Update($param){
		parent::UpdateProcess($param);
		return $param['page_id'];
	}

	public function MyPage($param){
		$dataset = parent::MyPageProcess($param);
		$this->RenderPage('mypage',$dataset,'null');
	}

	public function ListGallery($param){
		$dataset = parent::ListGalleryProcess($param);
		$this->RenderPage('gallery',$dataset,'null');
	}

	public function PendingPage($param){
		$dataset = parent::PendingPageProcess($param);
		$this->RenderPage('pendingpage',$dataset,'null');
	}
	public function PendingCount($param){
		return parent::PendingCountProcess($param);
	}

	public function Search($param){
		$per_page = 5;
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
		$per_page 	= 5;
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
        	$var['pa_description'] = $this->ConvertStringtoMetatag($var['pa_description']);
        	if($mode == "mypage" && !empty($var['pa_id'])){
        		include'template/page/mypage.items.php';
        	}
        	else if($mode == "page" && !empty($var['pa_id'])){
        		include'template/page/page.items.php';
        	}
        	else if($mode == "pendingpage" && !empty($var['pa_id'])){
        		include'template/page/pending.items.php';
        	}
        	else if($mode == "gallery" && !empty($var['im_id'])){
        		include'template/page/gallery.items.php';
        	}

        }
        unset($data);
    }

    public function ConvertStringtoMetatag($text){
		$text = strip_tags($text);
		$text = str_replace(array("\t","\n"),"",$text);
		$text = str_replace(array('\"'),'',$text);

		if(mb_strlen($text) > 200){
			return mb_substr($text,0,120,'utf-8').'...';
		}
		else{
			return $text;
		}
		
	}

    public function UpdateAnalytics($param){
    	if($param['type'] == "view"){
    		parent::UpdateViewProcess($param);
    	}
    	else if($param['type'] == "read"){
    		parent::UpdateReadProcess($param);
    	}
    	else if($param['type'] == "success"){
    		parent::UpdateSuccessProcess($param);
    	}
    }

    public function Score($param){
    	$name_score 			= 0; // 15
    	$description_score 		= 0; // 20
    	$phone_score 			= 0; // 15
    	$address_score 			= 0; // 20
    	$guide_score 			= 0; // 20
    	$location_score 		= 0; // 10
    	$total 					= 0;

    	if(!empty($param['name'])){
    		$name_score = 5;

    		if(mb_strlen($param['name'],'utf-8') > 20)
    			$name_score = 15;
    		else if(mb_strlen($param['name'],'utf-8') > 15)
    			$name_score = 12;
    		else if(mb_strlen($param['name'],'utf-8') > 10)
    			$name_score = 7;
    	}
    	if(!empty($param['description'])){
    		$description_score = 5;
    		if(mb_strlen($param['description'],'utf-8') > 120)
    			$description_score = 20;
    		else if(mb_strlen($param['description'],'utf-8') > 80)
    			$description_score = 18;
    		else if(mb_strlen($param['description'],'utf-8') > 50)
    			$description_score = 14;
    		else if(mb_strlen($param['description'],'utf-8') > 30)
    			$description_score = 8;
    	}
    	if(!empty($param['address'])){
    		$address_score = 5;
    		if(mb_strlen($param['address'],'utf-8') > 40)
    			$address_score = 20;
    		else if(mb_strlen($param['address'],'utf-8') > 30)
    			$address_score = 17;
    		else if(mb_strlen($param['address'],'utf-8') > 20)
    			$address_score = 12;
    		else if(mb_strlen($param['address'],'utf-8') > 10)
    			$address_score = 8;
    	}
    	if(!empty($param['guide'])){
    		$guide_score = 5;
    		if(mb_strlen($param['guide'],'utf-8') > 50)
    			$guide_score = 20;
    		else if(mb_strlen($param['guide'],'utf-8') > 30)
    			$guide_score = 16;
    		else if(mb_strlen($param['guide'],'utf-8') > 20)
    			$guide_score = 12;
    		else if(mb_strlen($param['guide'],'utf-8') > 10)
    			$guide_score = 7;
    	}
    	if(!empty($param['phone'])){
    		if(mb_strlen($param['phone'],'utf-8') > 18)
    			$phone_score = 15;
    		else if(mb_strlen($param['phone'],'utf-8') > 9)
    			$phone_score = 13;
    	}
    	if(!empty($param['location'])){
    		$location_score = 10;
    	}

    	return $total = $name_score + $description_score + $phone_score + $address_score + $guide_score + $location_score;
    }

    public function Delete($param){
    	parent::DeleteProcess($param);
    }

    // Administrator
    public function UpdateStatus($param){
    	parent::UpdateStatusProcess($param);
    }
}
?>