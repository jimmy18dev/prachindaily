<?php
class MeModel extends Database{
	public function CreateProcess($param){
		parent::query('INSERT INTO base_people(pe_email,pe_phone,pe_fname,pe_lname,pe_fb_id,pe_fb_fname,pe_fb_lname,pe_link,pe_verified,pe_gender,pe_about,pe_birthday,pe_register_time,pe_update_time,pe_visit_time,pe_ip) VALUE(:email,:phone,:fname,:lname,:fb_id,:fb_fname,:fb_lname,:link,:verified,:gender,:about,:birthday,:register_time,:update_time,:visit_time,:ip)');

		parent::bind(':email', 			$param['email']);
		parent::bind(':phone', 			$param['phone']);
		parent::bind(':fname', 			$param['fname']);
		parent::bind(':lname', 			$param['lname']);
		parent::bind(':fb_id', 			$param['facebook_id']);
		parent::bind(':fb_fname', 		$param['fname']);
		parent::bind(':fb_lname', 		$param['lname']);
		parent::bind(':link', 			$param['link']);
		parent::bind(':verified', 		$param['verified']);
		parent::bind(':about', 			$param['about']);
		parent::bind(':birthday', 		$param['birthday']);
		parent::bind(':gender', 		$param['gender']);
		parent::bind(':register_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':visit_time',		date('Y-m-d H:i:s'));
		parent::bind(':ip',				parent::GetIpAddress());

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