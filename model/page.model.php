<?php
class PageModel extends Database{
	public function SearchProcess($param){
		parent::query('SELECT * FROM base_page WHERE (pa_name LIKE :keyword OR pa_description LIKE :keyword) LIMIT '.$param['start'].','.$param['total']);
		parent::bind(':keyword','%'.$param['keyword'].'%');
		parent::execute();
		$dataset = parent::resultset();

		// Get Total Feed
		parent::query('SELECT COUNT(pa_id) count FROM base_page WHERE (pa_name LIKE :keyword OR pa_description LIKE :keyword)');
		parent::bind(':keyword','%'.$param['keyword'].'%');
		parent::execute();
		$data = parent::single();

		$dataset['total'] = $data['count'];

		return $dataset;
	}

	public function MyPageProcess($param){
		parent::query('SELECT * FROM base_page WHERE pa_people_id = :people_id');
		parent::bind(':people_id', 		$param['people_id']);
		parent::execute();
		$dataset = parent::resultset();

		// foreach ($dataset as $k => $var) {
		// 	$dataset[$k]['order_create_time_facebook_format'] 	= parent::date_facebookformat($var['od_create_time']);
		// 	$dataset[$k]['order_update_time_facebook_format'] 	= parent::date_facebookformat($var['od_update_time']);
		// 	$dataset[$k]['order_paying_time_facebook_format'] 	= parent::date_facebookformat($var['od_paying_time']);
		// 	$dataset[$k]['order_expire_time_facebook_format'] 	= parent::date_facebookformat($var['od_expire_time']);
		// 	$dataset[$k]['order_shipping_time_facebook_format'] = parent::date_facebookformat($var['od_shipping_time']);
		// 	$dataset[$k]['order_create_time_thai_format'] 		= parent::date_thaiformat($var['od_create_time']);
		// 	$dataset[$k]['order_update_time_thai_format'] 		= parent::date_thaiformat($var['od_update_time']);
		// 	$dataset[$k]['order_paying_time_thai_format'] 		= parent::date_thaiformat($var['od_paying_time']);
		// 	$dataset[$k]['order_expire_time_thai_format'] 		= parent::date_thaiformat($var['od_expire_time']);
		// 	$dataset[$k]['order_confirm_time_thai_format'] 		= parent::date_thaiformat($var['od_confirm_time']);
		// 	$dataset[$k]['order_shipping_time_thai_format'] 	= parent::date_thaiformat($var['od_shipping_time']);
		// 	$dataset[$k]['order_expire_time_datediff'] 			= parent::dateDifference($var['od_expire_time']);
		// }

		return $dataset;
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
		parent::query('UPDATE base_page SET pa_people_id = :people_id,pa_name = :name,pa_description = :description,pa_address = :address,pa_phone = :phone,pa_guide = :guide,pa_latitude = :latitude,pa_longitude = :longitude,pa_district_id = :district_id,pa_city_id = :city_id,pa_province_id = :province_id,pa_update_time = :update_time WHERE pa_id = :page_id');
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
		parent::query('SELECT * FROM base_page WHERE pa_id = :page_id');
		parent::bind(':page_id', $param['page_id']);
		parent::execute();
		$data = parent::single();
		return $data;
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
}
?>