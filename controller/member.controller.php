<?php
class MemberController extends MemberModel{

    public $id;
    public $email;
    public $name;
    public $fname;
    public $lname;
    public $link;
    public $verified;
    public $gender;
    public $token_id;
    public $token;
    public $register_time;
    public $update_time;
    public $visit_time;
    public $priority;
    public $ip;
    public $key;
    public $type;
    public $status;
    public $status_text;

    public $age;
    public $total_photo     = 0;
    public $total_post      = 0;


    public function GetMember($param){
        $param['device']        = DEVICE_TYPE;
        $param['model']         = DEVICE_MODEL;
        $param['os']            = DEVICE_OS;
        $param['browser']       = DEVICE_BROWSER;
        $param['user_agent']    = htmlentities($_SERVER['HTTP_USER_AGENT']);
        $param['expired']       = time() + (60*60*24*7);

        // Get MemberData
        $data = parent::GetMemberProcess($param);

        // Setdata
        $this->id =             $data['me_id'];
        $this->email =          $data['me_email'];
        $this->name =           $data['me_name'];
        $this->fname =          $data['me_fname'];
        $this->lname =          $data['me_lname'];
        $this->link =           $data['me_link'];
        $this->verified =       $data['me_verified'];
        $this->gender =         $data['me_gender'];
        $this->token_id =       $token['token_id'];
        $this->token =          $token['token'];
        $this->register_time =  $data['me_register_time'];
        $this->age              = $data['me_age'];
        $this->update_time =    $data['me_update_time'];
        $this->visit_time =     $data['me_visit_time'];
        $this->priority =       $data['me_priority'];
        $this->ip =             $data['me_ip'];
        $this->key =            $data['me_key'];
        $this->type =           $data['me_type'];
        $this->status =         $data['me_status'];

        $this->total_post       = parent::TotalPostProcess($param);
        $this->total_photo      = parent::TotalPhotoProcess($param);

        if($this->status == 'active')
            $this->status_text = 'ปกติ';
        else if($this->status == 'caution')
            $this->status_text = 'ถูกเตือน';
        else if($this->status == 'banned')
            $this->status_text = 'ถูกยกเลิก';
        else
            $this->status_text = 'n/a';
    }

    public function MemberStatus($param){
        
        // Set status
        if($param['status'] == 'active')
            $param['status'] = 'active';
        else if($param['status'] == 'caution')
            $param['status'] = 'caution';
        else if($param['status'] == 'banned')
            $param['status'] = 'banned';
        else
            return 0;

        parent::MemberStatusProcess($param);
    }

    // public function SaveHistory($param){
    //     // decrypt member_id
    //     $param['member_id'] = $this->decrypt($param['member_id']);
    //     $history = parent::CheckHistoryProcess($param);

    //     if($history['hi_id'] == ''){
    //         // Save new History.
    //         parent::SaveHistoryProcess($param);
    //     }
    //     else{
    //         // Update total Read of place.
    //         $param['view'] = ++$history['hi_view'];
    //         parent::UpdateViewHistoryProcess($param);
    //     }
        
    // }

    public function CountMember($param){
        $val = parent::CountMemberProcess($param);
        return $val['count'];
    }

 //    public function CookieChecking(){
 //        if(!empty($_COOKIE['member_id'])){
 //            // Have Cookie
 //            return true; 

 //        }
 //        else{
 //            // Not Have Cookie
 //            return false; 
 //        }
 //    }

	// public function SessionMemberOnline(){
 //    	if(!empty($_SESSION['member_id'])){
 //            // Member is Online
 //      		return true; 

 //    	}
 //    	else{
 //            // Member is Offline
 //    		return false; 
 //    	}
 //    }

 //    public function UpdateMemberKey($param){
 //        // decrypt member_id
 //        $param['member_id'] = $this->decrypt($param['member_id']);
 //        $param['key'] = $this->decrypt($param['key']);

 //    	$new_key = $this->GenerateMemberKey(array(
 //            'member_id' => $param['member_id']
 //        ));

 //        if($param['key'] == '' && $param['member_id'] != ''){
 //            parent::UpdateMemberFirstKeyProcess(array(
 //                'member_id' => $param['member_id'],
 //                'new_key' => $new_key,
 //            ));
 //        }
 //        else{
 //            parent::UpdateMemberKeyProcess(array(
 //                'member_id' => $param['member_id'],
 //                'key' => $param['key'],
 //                'new_key' => $new_key,
 //            ));
 //        }

 //    	return true;
 //    }
    // private function GenerateMemberKey($param){
    // 	return md5(md5(time().$param['member_id']));
    // }

    // public function VerifiedMemberKey($param){
    //     $param['key'] = $this->decrypt($param['key']);
    //     $param['member_id'] = $this->decrypt($param['member_id']);

    // 	$key_ori = parent::GetKeyMemberProcess(array('member_id' => $param['member_id']));
    // 	if($key_ori == $param['key']){
    // 		return true;
    // 	}
    // 	else{
    // 		return false;
    // 	}
    // }

    // Keyword Manage
    // public function SaveSearchKeyword($param){
    //     $param['member_id'] = $this->decrypt($param['member_id']);
    //     $data = parent::GetSearchKeywordProcess($param);

    //     if($data['kw_id'] != '' && $data['kw_total'] > 0){
    //         $param['keyword_id'] = $data['kw_id'];
    //         $param['total'] = ++$data['kw_total'];

    //         parent::UpdateSearchKeywordProcess($param);
    //     }
    //     else{
    //         parent::CreateSearchKeywordProcess($param);
    //     }    
    // }

    // public function ListSearchKeyword($param){
    //     $param['member_id'] = $this->decrypt($param['member_id']);
    //     $data = parent::ListSearchKeywordProcess($param);

    //     foreach ($data as $var){
    //         echo'<a href="index.php?q='.$var['kw_keyword'].'" target="_parent">'.$var['kw_keyword'].'</a>';
    //     }
    // }

    // Update Priority to member id 
    public function CalculatePriority($param){
        // Get total activity of post.
        $priority = parent::CalPriorityAllActivityProcess($param);

        if($priority < 1){$priority = 1;}

        // Process
        parent::CalculatePriorityProcess(array('member_id' => $param['member_id'], 'priority' => $priority));
    }

    // Get Live member (Online) for live page
    public function LiveMember($param){
        $data = parent::LiveMemberProcess($param);
        if($param['export'] == 'html')
            ;//$this->Render($param['render'],$data);
        else if($param['export'] == 'json')
            return $data;
        else
            return false;
    }

    // private function Render($mode,$data){
    //     if($mode == 'live-item'){
    //         $count = 0;
    //         foreach ($data as $var){
    //             include'template/live/member.items.php';
    //             $count++;
    //         }

    //         // if($count == 0){
    //         //     include'template/post/empty.item.php';
    //         // }
    //     }
    //     unset($data);
    // }

    public function DeleteMember($param){
        $this->DeleteImageFileByMember($param);
        parent::DeleteMemberProcess($param);
    }
    
    private function DeleteImageFileByMember($param){
        // List all image file
        $dataset = parent::ListAllImageMemberProcess(array('member_id' => $param['member_id']));

        // Delete file
        foreach ($dataset as $k => $var) {
            unlink($var['image_thumbnail']);
            unlink($var['image_square']);
            unlink($var['image_mini']);
            unlink($var['image_normal']);
            unlink($var['image_large']);
        }
    }
}
?>