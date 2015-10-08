<?php
class SiteController extends SiteModel{

    public $people_cout;
    public $search_cout;

    public function GetSiteInfo(){
    	$this->people_cout = parent::PeopleCountProcess();
    	$this->search_cout = parent::SearchLogCountProcess();
    }
}
?>