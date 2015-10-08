<?php
class SiteModel extends Database{
	public function PeopleCountProcess(){
		parent::query('SELECT COUNT(pe_id) FROM base_people');
		parent::execute();
		$data = parent::single();
		return $data['COUNT(pe_id)'];
	}

	public function SearchLogCountProcess(){
		parent::query('SELECT COUNT(lo_id) FROM log_search');
		parent::execute();
		$data = parent::single();
		return $data['COUNT(lo_id)'];
	}
}
?>