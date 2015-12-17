<?php
class MeController extends MeModel{

    public $member_id;
    public $email;
    public $phone;
    public $fname;
    public $lname;
    public $name;
    public $facebook_id;
    public $facebook_fname;
    public $facebook_lname;
    public $facebook_name;
    public $facebook_link;
    public $verified;
    public $gender;
    public $career;
    public $ip;
    public $type;
    public $status;

    public $register_time;
    public $update_time;
    public $visit_time;

    // Token
    public $token;

    public function CookieChecking(){
        if(!empty($_COOKIE['facebook_id']))
            return true;
        else
            return false; 
    }

    public function SessionOnline(){
        if(!empty($_SESSION['facebook_id']))
            return true;
        else
            return false;
    }

    public function Register($param){
        if(parent::DuplicateProcess($param)){
            parent::CreateProcess($param);
        }
        else{
            parent::UpdateProcess($param);
        }
    }

    public function Get($param){
        // Setup
        $param['device']        = DEVICE_TYPE;
        $param['model']         = DEVICE_MODEL;
        $param['os']            = DEVICE_OS;
        $param['browser']       = DEVICE_BROWSER;
        $param['user_agent']    = htmlentities($_SERVER['HTTP_USER_AGENT']);
        $param['expired']       = time() + (60*60*24*7);  // 1 Week.

        $dataset                = parent::GetProcess($param);
        $dataset_token          = parent::GetTokenProcess($param);

        if(empty($dataset_token['tk_token'])){
            $param['new_token'] = $this->GenerateMemberKey($param);
            parent::CreateTokenProcess($param);
            $dataset_token = parent::GetTokenProcess($param);
        }

        $this->member_id        = $dataset['pe_id'];
        $this->email            = $dataset['pe_email'];
        $this->phone            = $dataset['pe_phone'];
        $this->fname            = $dataset['pe_fname'];
        $this->lname            = $dataset['pe_lname'];
        $this->name             = $dataset['pe_fname'].' '.$dataset['pe_lname'];
        $this->facebook_id      = $dataset['pe_fb_id'];
        $this->facebook_fname   = $dataset['pe_fb_fname'];
        $this->facebook_lname   = $dataset['pe_fb_lname'];
        $this->facebook_name    = $dataset['pe_fb_fname'].' '.$dataset['pe_fb_lname'];
        $this->facebook_link    = $dataset['pe_link'];
        $this->verified         = $dataset['pe_verified'];
        $this->gender           = $dataset['pe_gender'];
        $this->career           = $dataset['pe_career'];
        $this->ip               = $dataset['pe_ip'];
        $this->type             = $dataset['pe_type'];
        $this->status           = $dataset['pe_status'];

        $this->register_time    = $dataset['pe_register_time'];
        $this->update_time      = $dataset['pe_update_time'];
        $this->visit_time       = $dataset['pe_visit_time'];

        $this->token            = $dataset_token['tk_token'];

        setcookie('token_key'   ,$this->token, COOKIE_TIME);
        setcookie('facebook_id' ,$this->facebook_id, COOKIE_TIME);
    }

    public function Authentication(){
        $param['facebook_id']   = MEMBER_ID;
        $param['device']        = DEVICE_TYPE;
        $param['user_agent']    = htmlentities($_SERVER['HTTP_USER_AGENT']);

        $dataset = parent::GetTokenProcess($param);
        
        $token_key_cookie       = $_COOKIE['token_key'];

        if($token_key_cookie == $dataset['tk_token'] && !empty(MEMBER_ID)){
            return true;
        }
        else{
            return false;
        }
    }

    private function GenerateMemberKey($param){
        return md5(time().$_SERVER['HTTP_USER_AGENT']);
    }

    public function VerifiedMemberKey($param){
        $param['key'] = $this->decrypt($param['key']);
        $param['member_id'] = $this->decrypt($param['member_id']);

        $key_ori = parent::GetKeyMemberProcess(array('member_id' => $param['member_id']));
        if($key_ori == $param['key']){
            return true;
        }
        else{
            return false;
        }
    }

    // public function UpdateMemberKey($param){
    //     // decrypt member_id
    //     $param['member_id'] = $this->decrypt($param['member_id']);
    //     $param['key'] = $this->decrypt($param['key']);

    //     $new_key = $this->GenerateMemberKey(array(
    //         'member_id' => $param['member_id']
    //     ));

    //     if($param['key'] == '' && $param['member_id'] != ''){
    //         parent::UpdateMemberFirstKeyProcess(array(
    //             'member_id' => $param['member_id'],
    //             'new_key' => $new_key,
    //         ));
    //     }
    //     else{
    //         parent::UpdateMemberKeyProcess(array(
    //             'member_id' => $param['member_id'],
    //             'key' => $param['key'],
    //             'new_key' => $new_key,
    //         ));
    //     }

    //     return true;
    // }
}
?>