<?php
class PageModel extends Database{
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
		parent::query('UPDATE base_people SET pe_email = :email,pe_fb_fname = :fb_fname,pe_fb_lname = :fb_lname,pe_link = :link,pe_verified = :verified,pe_gender = :gender,pe_about = :about,pe_birthday = :birthday,pe_phone = :phone,pe_update_time = :update_time,pe_ip = :ip WHERE pe_fb_id = :fb_id');

		parent::bind(':email', 			$param['email']);
		parent::bind(':phone', 			$param['phone']);
		parent::bind(':fb_id', 			$param['facebook_id']);
		parent::bind(':fb_fname', 		$param['fname']);
		parent::bind(':fb_lname', 		$param['lname']);
		parent::bind(':link', 			$param['link']);
		parent::bind(':verified', 		$param['verified']);
		parent::bind(':gender', 		$param['gender']);
		parent::bind(':about', 			$param['about']);
		parent::bind(':birthday', 		$param['birthday']);
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());
		parent::execute();
	}

	public function GetProcess($param){
		parent::query('SELECT * FROM base_people WHERE pe_fb_id = :facebook_id');
		parent::bind(':facebook_id', $param['facebook_id']);
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