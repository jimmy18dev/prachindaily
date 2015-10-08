<?php
class MemberModel extends Database{

	// Create New Post /////////////
	public function CreateMemberProcess($param){
		parent::query('INSERT INTO dy_member(me_id,me_email,me_name,me_fname,me_lname,me_link,me_verified,me_gender,me_register_time,me_update_time,me_visit_time,me_ip) VALUE(:id,:email,:name,:fname,:lname,:link,:verified,:gender,:register_time,:update_time,:visit_time,:ip)');

		parent::bind(':id', $param['member_id']);
		parent::bind(':email', $param['email']);
		parent::bind(':name', $param['name']);
		parent::bind(':fname', $param['fname']);
		parent::bind(':lname', $param['lname']);
		parent::bind(':link', $param['link']);
		parent::bind(':verified', $param['verified']);
		parent::bind(':gender', $param['gender']);
		
		// Timer
		parent::bind(':register_time', date('Y-m-d H:i:s'));
		parent::bind(':update_time', date('Y-m-d H:i:s'));
		parent::bind(':visit_time', date('Y-m-d H:i:s'));

		parent::bind(':ip', parent::GetIpAddress());

		parent::execute();
		return parent::lastInsertId();
	}

	public function UpdateMemberProcess($param){
		parent::query('UPDATE dy_member SET me_email = :email, me_name = :name, me_fname = :fname, me_lname = :lname, me_link = :link, me_gender = :gender,me_update_time = :update_time WHERE me_id = :id');

		parent::bind(':id', $param['member_id']);
		parent::bind(':email', $param['email']);
		parent::bind(':name', $param['name']);
		parent::bind(':fname', $param['fname']);
		parent::bind(':lname', $param['lname']);
		parent::bind(':link', $param['link']);
		parent::bind(':gender', $param['gender']);
		
		// Timer
		parent::bind(':update_time', date('Y-m-d H:i:s'));

		parent::execute();
	}

	// Get Member Data //////////////////////
	public function GetMemberProcess($param){
		parent::query('SELECT * FROM dy_member WHERE me_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		$data['me_age'] = parent::dateDifference($data['me_register_time']);

		return $data;
	}

	public function CountMemberProcess($param){
		if($param['option'] == 'all'){
			parent::query('SELECT COUNT(me_id) count FROM dy_member');
		}
		parent::execute();
		return parent::single();
	}

	// Check Member ID already
	public function AlreadyMemberProcess($param){
		parent::query('SELECT me_id FROM dy_member WHERE me_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();

		if($data['me_id'] == ''){
			return true;
		}
		else{
			return false;
		}
	}

	// Update New Key for Member /////////////////
	public function UpdateMemberKeyProcess($param){
		parent::query('UPDATE dy_member SET me_key = :new_key WHERE me_id = :member_id AND me_key = :key');
		parent::bind(':member_id', $param['member_id']);
		parent::bind(':key', $param['key']);
		parent::bind(':new_key', $param['new_key']);
		parent::execute();
	}
	// First Key //////////////////////////////////
	public function UpdateMemberFirstKeyProcess($param){
		parent::query('UPDATE dy_member SET me_key = :new_key WHERE me_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::bind(':new_key', $param['new_key']);
		parent::execute();
	}

	// Get Member Data //////////////////////
	public function GetKeyMemberProcess($param){
		parent::query('SELECT me_key FROM dy_member WHERE me_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		return $data['me_key'];
	}

	// Save Place to History //////////////////
	public function SaveHistoryProcess($param){
		parent::query('INSERT INTO dy_history(hi_member_id,hi_place_id,hi_create_time,hi_update_time,hi_ip) VALUE(:member_id,:place_id,:create_time,:update_time,:ip)');

		parent::bind(':member_id', $param['member_id']);
		parent::bind(':place_id', $param['place_id']);
		
		// Timer
		parent::bind(':create_time', date('Y-m-d H:i:s'));
		parent::bind(':update_time', date('Y-m-d H:i:s'));

		parent::bind(':ip', parent::GetIpAddress());

		parent::execute();
		return parent::lastInsertId();
	}

	// Checking History ////////////////////////
	public function CheckHistoryProcess($param){
		parent::query('SELECT hi_id,hi_view,hi_read FROM dy_history WHERE (hi_place_id = :place_id AND hi_member_id = :member_id)');
		parent::bind(':place_id', $param['place_id']);
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		return $data = parent::single();
	}

	// Update View History //////////////////////////
	public function UpdateViewHistoryProcess($param){
		parent::query('UPDATE dy_history SET hi_view = :view, hi_update_time = :update_time WHERE (hi_place_id = :place_id AND hi_member_id = :member_id)');
		parent::bind(':member_id', $param['member_id']);
		parent::bind(':place_id', $param['place_id']);
		parent::bind(':view', $param['view']);

		parent::bind(':update_time', date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function CreateSearchKeywordProcess($param){
		parent::query('INSERT INTO dy_keyword(kw_member_id,kw_keyword,kw_create_time,kw_update_time) VALUE(:member_id,:keyword,:create_time,:update_time)');

		parent::bind(':member_id', $param['member_id']);
		parent::bind(':keyword', $param['keyword']);
		
		// Timer
		parent::bind(':create_time', date('Y-m-d H:i:s'));
		parent::bind(':update_time', date('Y-m-d H:i:s'));

		parent::execute();
		return parent::lastInsertId();
	}

	public function GetSearchKeywordProcess($param){
		parent::query('SELECT kw_id,kw_total FROM dy_keyword WHERE (kw_member_id = :member_id) AND (kw_keyword = :keyword)');
		parent::bind(':member_id', $param['member_id']);
		parent::bind(':keyword', $param['keyword']);
		parent::execute();
		return parent::single();
	}

	public function UpdateSearchKeywordProcess($param){
		parent::query('UPDATE dy_keyword SET kw_total = :total, kw_update_time = :update_time WHERE (kw_member_id = :member_id) AND kw_id = :keyword_id');

		parent::bind(':member_id', $param['member_id']);
		parent::bind(':keyword_id', $param['keyword_id']);
		parent::bind(':total', $param['total']);

		parent::bind(':update_time', date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function ListSearchKeywordProcess($param){
		parent::query('SELECT * FROM dy_keyword WHERE kw_member_id = :member_id ORDER BY kw_update_time DESC LIMIT 3');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::resultset();
		return $data;
	}

	// Admin only can change member status to active, caution, banned
	public function MemberStatusProcess($param){
		parent::query('UPDATE dy_member SET me_status = :status,me_update_time = :update_time WHERE me_id = :people_id');
		parent::bind(':people_id', 		$param['people_id']);
		parent::bind(':status', 		$param['status']);
		parent::bind(':update_time', 	date('Y-m-d H:i:s'));
		parent::execute();
	}



	///////////////////////////////////////
	// Member priority process
	///////////////////////////////////////
	public function CalculatePriorityProcess($param){
		parent::query('UPDATE dy_member SET me_priority = :priority,me_update_time = :update_time WHERE me_id = :member_id');
		parent::bind(':member_id', 		$param['member_id']);
		parent::bind(':priority', 		$param['priority']);
		parent::bind(':update_time', 	date('Y-m-d H:i:s'));
		parent::execute();
	}

	// Get activity of member action to post
	public function CalPriorityAllActivityProcess($param){

		// Get priority of Thanks action
		parent::query('SELECT SUM(po_priority) thanks_priority FROM (SELECT po_priority FROM dy_activity,dy_post WHERE (ac_to_post_id = po_id) AND po_member_id = :member_id AND (ac_action = "thanks_post") GROUP BY ac_member_id,ac_action,ac_to_post_id) AS x');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		$thanks_priority = $data['thanks_priority'];
		

		// Get priority of Comment action
		parent::query('SELECT SUM(po_priority) comment_priority FROM (SELECT po_priority FROM dy_activity,dy_post,dy_comment WHERE (ac_to_post_id = po_id) AND (ac_to_comment_id = cm_id) AND po_member_id = :member_id AND (ac_action = "new_comment") AND (cm_status = "active") GROUP BY ac_member_id,ac_action,ac_to_post_id) AS x');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		$comment_priority = $data['comment_priority'];

		return $thanks_priority + $comment_priority;
	}



	//////////////////////////////////////////
	// LIVE BOARD ////////////////////////////
	//////////////////////////////////////////
	public function LiveMemberProcess($param){
		if($param['time_now'] == 0)
			$param['time_now'] = date('Y-m-d H:i:s');

		// List Member has visit time within 15 minutes.
		$diff_time 	= strtotime($param['time_now']) - 300;
		$date 		= date('Y-m-d H:i:s',$diff_time);

		parent::query('SELECT me_id member_id,me_name member_name,me_register_time member_register_time,me_update_time member_update_time,me_visit_time member_visit_time,me_type member_type 
			FROM dy_member 
			WHERE (me_id LIKE :search OR me_name LIKE :search OR me_email LIKE :search) 
			ORDER BY me_visit_time DESC 
			LIMIT 0,100');

		parent::bind(':search', '%'.$param['search'].'%');

		parent::execute();
		$dataset = parent::resultset();

		foreach ($dataset as $k => $var) {

			// Online checking
			if($var['member_visit_time'] > $date)
				$dataset[$k]['member_online'] = 'online';
			else
				$dataset[$k]['member_online'] = 'offline';

			// New member checking
			if(time() - strtotime($var['member_register_time']) < 86400)
				$dataset[$k]['member_types'] = 'new';
			else
				$dataset[$k]['member_types'] = 'old';

			$dataset[$k]['member_register_time'] 	= parent::date_facebookformat($var['member_register_time']);
			$dataset[$k]['member_update_time'] 		= parent::date_facebookformat($var['member_update_time']);
			$dataset[$k]['member_visit_time'] 		= parent::date_facebookformat($var['member_visit_time']);
		}

		return $dataset;
	}

	// Member Counter
	public function TotalPostProcess($param){
		parent::query('SELECT COUNT(po_id) total_post FROM dy_post WHERE (po_member_id = :member_id AND po_status = "active")');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		return $data['total_post'];
	}
	public function TotalPhotoProcess($param){
		parent::query('SELECT COUNT(im_id) total_photo FROM dy_image WHERE (im_member_id = :member_id AND im_status = "active" AND im_type = "normal")');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();
		$data = parent::single();
		return $data['total_photo'];
	}





/* -----------------------------------------------
 * Administrator only.
 * Administrator can access to all functions only.
 * -----------------------------------------------
 */



	// Administrator function
	public function DeleteMemberProcess($param){
		// Delete Activity
		parent::query('DELETE FROM dy_activity WHERE ac_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Delete Comment
		parent::query('DELETE FROM dy_comment WHERE cm_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Delete Post
		parent::query('DELETE FROM dy_post WHERE po_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Delete Token
		parent::query('DELETE FROM dy_token WHERE tk_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Delete Place
		parent::query('DELETE FROM dy_place WHERE pl_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Delete Keyword
		parent::query('DELETE FROM dy_keyword WHERE kw_member_id = :member_id');
		parent::bind(':member_id', $param['member_id']);
		parent::execute();

		// Set Member status to Banned
		parent::query('UPDATE dy_member SET me_status = "delete",me_update_time = :update_time WHERE me_id = :member_id');
		parent::bind(':member_id', 		$param['member_id']);
		parent::bind(':update_time', 	date('Y-m-d H:i:s'));
		parent::execute();
	}

	public function ListAllImageMemberProcess($param){
		parent::query('SELECT im_id image_id,im_link_thumbnail image_thumbnail,im_link_square image_square,im_link_mini image_mini,im_link_normal image_normal,im_link_large image_large FROM dy_image WHERE im_member_id = :member_id');
		parent::bind(':member_id',		$param['member_id']);
		parent::execute();
		return parent::resultset();
	}
}
?>