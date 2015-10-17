<?php
class LocationModel extends Database{
	
	// public function ListDistrictProcess($param){
	// 	parent::query('SELECT * FROM base_page WHERE pa_people_id = :people_id');
	// 	parent::bind(':people_id', 		$param['people_id']);
	// 	parent::execute();
	// 	$dataset = parent::resultset();
	// 	return $dataset;
	// }
	public function ListAmphurProcess($param){
		echo'province_id: '.$param['province_id'];
		parent::query('SELECT * FROM th_amphur WHERE amphur_province_id = :province_id AND amphur_postcode != "00000"');
		parent::bind(':province_id', $param['province_id']);
		parent::execute();
		$dataset = parent::resultset();
		return $dataset;
	}
	
	// public function ListProvinceProcess($param){
	// 	parent::query('SELECT * FROM base_page WHERE pa_people_id = :people_id');
	// 	parent::bind(':people_id', 		$param['people_id']);
	// 	parent::execute();
	// 	$dataset = parent::resultset();
	// 	return $dataset;
	// }
}
?>