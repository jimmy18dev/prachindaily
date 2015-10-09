<?php
class PageModel extends Database{
	public function SearchProcess($param){
		parent::query('SELECT pa_id,pa_name,pa_description,pa_phone,pa_create_time,pa_update_time,pa_visit_time,pa_read,pa_status,amphur_id,amphur_name,province_id,province_name 
			FROM base_page 
			LEFT JOIN th_amphur ON pa_city_id = amphur_id 
			LEFT JOIN th_province ON pa_province_id = province_id 
			WHERE (pa_name LIKE :keyword OR pa_description LIKE :keyword) 
			LIMIT '.$param['start'].','.$param['total']);
		parent::bind(':keyword','%'.$param['keyword'].'%');
		parent::execute();
		$dataset = parent::resultset();

		// Get Total Feed
		parent::query('SELECT COUNT(pa_id) count FROM base_page WHERE (pa_name LIKE :keyword OR pa_description LIKE :keyword)');
		parent::bind(':keyword','%'.$param['keyword'].'%');
		parent::execute();
		$data = parent::single();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['url_friendly'] 					= parent::url_friendly_process($var['pa_name']);
			$dataset[$k]['create_time_facebook_format'] 	= parent::date_facebookformat($var['pa_create_time']);
			$dataset[$k]['update_time_facebook_format'] 	= parent::date_facebookformat($var['pa_update_time']);
			$dataset[$k]['visit_time_facebook_format'] 		= parent::date_facebookformat($var['pa_visit_time']);
			$dataset[$k]['create_time_thai_format'] 		= parent::date_thaiformat($var['pa_create_time']);
			$dataset[$k]['update_time_thai_format'] 		= parent::date_thaiformat($var['pa_update_time']);
			$dataset[$k]['visit_time_thai_format'] 			= parent::date_thaiformat($var['pa_visit_time']);
		}

		$dataset['total'] = $data['count'];

		return $dataset;
	}

	public function SaveSearchLogProcess($param){
		parent::query('INSERT INTO log_search(lo_people_id,lo_keyword,lo_ip,lo_result,lo_execute_time,lo_create_time,lo_type) VALUE(:people_id,:keyword,:ip,:result,:execute_time,:create_time,:type)');

		parent::bind(':people_id', 		$param['people_id']);
		parent::bind(':keyword', 		$param['keyword']);
		parent::bind(':result', 		$param['result']);
		parent::bind(':execute_time', 	$param['execute_time']);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::bind(':type', 			$param['type']);

		parent::execute();
		return parent::lastInsertId();
	}

	public function MyPageProcess($param){
		parent::query('SELECT pa_id,pa_name,pa_description,pa_phone,pa_create_time,pa_update_time,pa_visit_time,pa_read,pa_status,amphur_id,amphur_name,province_id,province_name 
			FROM base_page 
			LEFT JOIN th_amphur ON pa_city_id = amphur_id 
			LEFT JOIN th_province ON pa_province_id = province_id WHERE pa_people_id = :people_id ORDER BY pa_create_time DESC');
		parent::bind(':people_id', 		$param['people_id']);
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['url_friendly'] 					= parent::url_friendly_process($var['pa_name']);
			$dataset[$k]['create_time_facebook_format'] 	= parent::date_facebookformat($var['pa_create_time']);
			$dataset[$k]['update_time_facebook_format'] 	= parent::date_facebookformat($var['pa_update_time']);
			$dataset[$k]['visit_time_facebook_format'] 		= parent::date_facebookformat($var['pa_visit_time']);
			$dataset[$k]['create_time_thai_format'] 		= parent::date_thaiformat($var['pa_create_time']);
			$dataset[$k]['update_time_thai_format'] 		= parent::date_thaiformat($var['pa_update_time']);
			$dataset[$k]['visit_time_thai_format'] 			= parent::date_thaiformat($var['pa_visit_time']);
		}

		return $dataset;
	}

	public function PendingPageProcess($param){
		parent::query('SELECT pa_id,pa_name,pa_description,pa_phone,pa_create_time,pa_update_time,pa_visit_time,pa_read,pa_status,amphur_id,amphur_name,province_id,province_name 
			FROM base_page 
			LEFT JOIN th_amphur ON pa_city_id = amphur_id 
			LEFT JOIN th_province ON pa_province_id = province_id WHERE pa_status = "pending" ORDER BY pa_create_time DESC');
		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {
			$dataset[$k]['url_friendly'] 					= parent::url_friendly_process($var['pa_name']);
			$dataset[$k]['create_time_facebook_format'] 	= parent::date_facebookformat($var['pa_create_time']);
			$dataset[$k]['update_time_facebook_format'] 	= parent::date_facebookformat($var['pa_update_time']);
			$dataset[$k]['visit_time_facebook_format'] 		= parent::date_facebookformat($var['pa_visit_time']);
			$dataset[$k]['create_time_thai_format'] 		= parent::date_thaiformat($var['pa_create_time']);
			$dataset[$k]['update_time_thai_format'] 		= parent::date_thaiformat($var['pa_update_time']);
			$dataset[$k]['visit_time_thai_format'] 			= parent::date_thaiformat($var['pa_visit_time']);
		}

		return $dataset;
	}

	public function PendingCountProcess($param){
		parent::query('SELECT COUNT(pa_id) FROM base_page WHERE pa_status = "pending"');
		parent::execute();
		$data = parent::single();
		return $data['COUNT(pa_id)'];
	}

	public function CreateProcess($param){
		parent::query('INSERT INTO base_page(pa_people_id,pa_name,pa_description,pa_address,pa_phone,pa_guide,pa_latitude,pa_longitude,pa_district_id,pa_city_id,pa_province_id,pa_create_time,pa_update_time,pa_visit_time,pa_type) VALUE(:people_id,:name,:description,:address,:phone,:guide,:latitude,:longitude,:district_id,:city_id,:province_id,:create_time,:update_time,:visit_time,:type)');

		parent::bind(':people_id', 		$param['people_id']);
		parent::bind(':name', 			$param['name']);
		parent::bind(':description', 	$param['description']);
		parent::bind(':address', 		$param['address']);
		parent::bind(':phone', 			$param['phone']);
		parent::bind(':guide', 			$param['guide']);
		parent::bind(':latitude', 		$param['latitude']);
		parent::bind(':longitude', 		$param['longitude']);
		parent::bind(':district_id', 	$param['district_id']);
		parent::bind(':city_id', 		$param['city_id']);
		parent::bind(':province_id', 	$param['province_id']);
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':visit_time',		date('Y-m-d H:i:s'));
		parent::bind(':type', 			$param['type']);

		parent::execute();
		return parent::lastInsertId();
	}

	public function UpdateProcess($param){
		parent::query('UPDATE base_page SET pa_name = :name,pa_description = :description,pa_address = :address,pa_phone = :phone,pa_guide = :guide,pa_latitude = :latitude,pa_longitude = :longitude,pa_district_id = :district_id,pa_city_id = :city_id,pa_province_id = :province_id,pa_update_time = :update_time,pa_status = "pending" WHERE pa_id = :page_id AND pa_people_id = :people_id');
		parent::bind(':people_id', 		$param['people_id']);
		parent::bind(':name', 			$param['name']);
		parent::bind(':description', 	$param['description']);
		parent::bind(':address', 		$param['address']);
		parent::bind(':phone', 			$param['phone']);
		parent::bind(':guide', 			$param['guide']);
		parent::bind(':latitude', 		$param['latitude']);
		parent::bind(':longitude', 		$param['longitude']);
		parent::bind(':district_id', 	$param['district_id']);
		parent::bind(':city_id', 		$param['city_id']);
		parent::bind(':province_id', 	$param['province_id']);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':page_id', 		$param['page_id']);
		parent::execute();
	}

	public function GetProcess($param){
		parent::query('SELECT pa_id,pa_name,pa_description,pa_address,pa_guide,pa_phone,pa_latitude,pa_longitude,pa_score,pa_view,pa_read,pa_success,pa_create_time,pa_update_time,pa_visit_time,pa_read,pa_score,pa_type,pa_status,amphur_id,amphur_name,province_id,province_name,pe_id,pe_fb_id,pe_fname,pe_lname,pe_type 
			FROM base_page 
			LEFT JOIN th_amphur ON pa_city_id = amphur_id 
			LEFT JOIN th_province ON pa_province_id = province_id 
			LEFT JOIN base_people ON pa_people_id = pe_fb_id 
			WHERE pa_id = :page_id');
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
		$dataset = parent::single();

		$dataset['url_friendly'] 					= parent::url_friendly_process($dataset['pa_name']);
		$dataset['create_time_facebook_format'] 	= parent::date_facebookformat($dataset['pa_create_time']);
		$dataset['update_time_facebook_format'] 	= parent::date_facebookformat($dataset['pa_update_time']);
		$dataset['visit_time_facebook_format'] 		= parent::date_facebookformat($dataset['pa_visit_time']);
		$dataset['create_time_thai_format'] 		= parent::date_thaiformat($dataset['pa_create_time']);
		$dataset['update_time_thai_format'] 		= parent::date_thaiformat($dataset['pa_update_time']);
		$dataset['visit_time_thai_format'] 			= parent::date_thaiformat($dataset['pa_visit_time']);

		return $dataset;
	}

	// Check Member ID already
	public function DuplicateProcess($param){
		parent::query('SELECT pe_fb_id FROM base_people WHERE pe_fb_id = :facebook_id');
		parent::bind(':facebook_id', $param['facebook_id']);
		parent::execute();
		$data = parent::single();

		if(empty($data['pe_fb_id']))
			return true;
		else
			return false;
	}

	// Update Page analytics
	public function UpdateViewProcess($param){
		parent::query('SELECT pa_view FROM base_page WHERE pa_id = :page_id');
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
		$data = parent::single();

		parent::query('UPDATE base_page SET pa_view = :view WHERE pa_id = :page_id');
		parent::bind(':view', $data['pa_view']+1);
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
	}

	public function UpdateReadProcess($param){
		parent::query('SELECT pa_read FROM base_page WHERE pa_id = :page_id');
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
		$data = parent::single();

		parent::query('UPDATE base_page SET pa_read = :read WHERE pa_id = :page_id');
		parent::bind(':read', $data['pa_read']+1);
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
	}

	public function UpdateSuccessProcess($param){
		parent::query('SELECT pa_success FROM base_page WHERE pa_id = :page_id');
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
		$data = parent::single();

		parent::query('UPDATE base_page SET pa_success = :success WHERE pa_id = :page_id');
		parent::bind(':success', $data['pa_success']+1);
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
	}

	public function DeleteProcess($param){
		parent::query('DELETE FROM base_page WHERE pa_id = :page_id AND pa_status != "success"');
		parent::bind(':page_id', 		$param['page_id']);
		parent::execute();
	}

	// Administrator
	public function UpdateStatusProcess($param){
		parent::query('UPDATE base_page SET pa_status = :status,pa_update_time = :update_time WHERE pa_id = :page_id');
		parent::bind(':status', 		$param['status']);
		parent::bind(':page_id', 		$param['page_id']);
		parent::bind(':update_time', 	date('Y-m-d H:i:s'));
		parent::execute();
	}

	// Analytics
	public function LocationAnalyticsProcess($param){
		parent::query('SELECT amphur_name amphur, COUNT(pa_id) *100 / (SELECT COUNT(pa_id) FROM base_page WHERE pa_city_id != "") percent FROM base_page LEFT JOIN th_amphur ON amphur_id = pa_city_id WHERE pa_city_id != "" GROUP BY pa_city_id ORDER BY percent DESC');
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}
}
?>