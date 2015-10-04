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
        $dataset = parent::GetProcess($param);

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
    }

    public function Authentication_token($param){
        $param['device']        = DEVICE_TYPE;
        $param['model']         = DEVICE_MODEL;
        $param['user_agent']    = htmlentities($_SERVER['HTTP_USER_AGENT']);

        $user_id                = $param['member_id'];
        $user_token             = $param['token'];

        $tokenData              = parent::GetTokenProcess($param);

        if($user_id == $tokenData['member_id'] && $user_token == $tokenData['token'])
            return true;
        else
            return false;
    }
}
?>