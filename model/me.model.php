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




	// TOKEN CONTROL
	// Create token
	public function CreateTokenProcess($param){
		parent::query('INSERT INTO base_token(tk_people_id,tk_token,tk_device,tk_model,tk_os,tk_browser,tk_user_agent,tk_ip,tk_create_time,tk_update_time,tk_expired) VALUE(:people_id,:token,:device,:model,:os,:browser,:user_agent,:ip,:create_time,:update_time,:expired)');

		parent::bind(':people_id',		$param['facebook_id']);
		parent::bind(':token',			$param['new_token']);
		parent::bind(':device',			$param['device']);
		parent::bind(':model',			$param['model']);
		parent::bind(':os',				$param['os']);
		parent::bind(':browser',		$param['browser']);
		parent::bind(':user_agent',		$param['user_agent']);
		parent::bind(':ip',				parent::GetIpAddress());
		parent::bind(':create_time',	date('Y-m-d H:i:s'));
		parent::bind(':update_time',	date('Y-m-d H:i:s'));
		parent::bind(':expired',		$param['expired']);

		parent::execute();
		return parent::lastInsertId();
	}

	// Update token
	// public function UpdateTokenProcess($param){
	// 	parent::query('UPDATE base_token SET tk_token = :new_token WHERE (tk_people_id = :people_id AND tk_token = :old_token AND tk_device = :device AND tk_model = :model AND tk_os  = :os)');

	// 	parent::bind(':new_token',		$param['new_token']);
	// 	parent::bind(':old_token',		$param['old_token']);
	// 	parent::bind(':people_id',		$param['people_id']);
	// 	parent::bind(':device',			$param['device']);
	// 	parent::bind(':model',			$param['model']);
	// 	parent::bind(':os',				$param['os']);

	// 	parent::execute();
	// }

	// Get token
	public function GetTokenProcess($param){
		parent::query('SELECT tk_people_id,tk_token,tk_device,tk_model,tk_os,tk_browser,tk_user_agent,tk_ip,tk_create_time,tk_update_time,tk_expired FROM base_token WHERE (tk_people_id = :people_id AND tk_device = :device AND tk_user_agent = :user_agent)');

		parent::bind(':people_id',		$param['facebook_id']);
		parent::bind(':device',			$param['device']);
		parent::bind(':user_agent',		$param['user_agent']);

		parent::execute();
		return parent::single();
	}

	// Delete token
	public function DeleteTokenKeyProcess($param){
		parent::query('DELETE FROM dy_token WHERE (tk_id = :member_id AND tk_token = :old_token AND tk_device = :device AND tk_model = :model AND tk_os  = :os)');

		parent::bind(':old_token',		$param['old_token']);
		parent::bind(':member_id',		$param['member_id']);
		parent::bind(':device',			$param['device']);
		parent::bind(':model',			$param['model']);
		parent::bind(':os',				$param['os']);

		parent::execute();
	}
}
?>