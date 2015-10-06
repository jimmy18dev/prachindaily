<?php
class LocationController extends LocationModel{

  public $province_id;
  public $province_name;
  public $province_latitude;
  public $province_longitude;
  public $city_id;
  public $city_name;
  public $city_latitude;
  public $city_longitude;
  public $district_id;
  public $district_name;
  public $district_latitude;
  public $district_longitude;

  public function GetLocation($param){
    // Valid location format
    if($param['province_id'] != '' && !empty($param['province_id']))
      $data = parent::GetProviceDataProcess($param);
    else if($param['city_id'] != '' && !empty($param['city_id']))
      $data = parent::GetCityDataProcess($param);
    else if($param['district_id'] != '' && !empty($param['district_id']))
      $data = parent::GetDistrictDataProcess($param);
    else
      return false;

    // Setup
    $this->province_id        = $data['pv_id'];
    $this->province_name      = $data['pv_title'];
    $this->province_latitude  = $data['pv_latitude'];
    $this->province_longitude = $data['pv_longitude'];
    $this->city_id            = $data['cy_id'];
    $this->city_name          = $data['cy_title'];
    $this->city_latitude      = $data['cy_latitude'];
    $this->city_longitude     = $data['cy_longitude'];
    $this->district_id        = $data['ds_id'];
    $this->district_name      = $data['ds_title'];
    $this->district_latitude  = $data['ds_latitude'];
    $this->district_longitude = $data['ds_longitude'];
  }

	// List all City
	public function ListCity($param){
		$data = parent::ListCityProcess(array('province_id' => '1'));

    if($param['render'] == 'html-link-item' || $param['render'] == 'html-location-item'){
      $this->Render($param['render'],$data,$param['current'],$param['sort'],$param['search'],$param['category_id'],$param['category_title']);
    }
    else{
      $this->ToJson($data,$ProvinceData,'city');
    }
	}

  public function GetCity($param){
    return parent::GetCityProcess($param);
  }

	public function ListDistrict($param){
		$data = parent::ListDistrictProcess(array('city_id' => $param['city_id']));
    $CityData = $this->GetCity(array('city_id' => $param['city_id']));
		$this->ToJson($data,$CityData,'district');
	}

	// Render to View (HTML,JSON)
	private function Render($mode,$data,$current,$sort,$search,$category_id,$category_title){
		if($mode == 'html-item-select'){
			foreach ($data as $var){
				include'template/location/location.item.link.php';
			}
		}
    else if($mode == 'html-link-item'){
      foreach ($data as $var){
        include'template/location/location.items.link.php';
      }
    }
    else if($mode == 'html-location-item'){
      // Render to Feature bar
      foreach ($data as $var){
        include'template/location/location.items.feature_bar.php';
      }
    }
		unset($data);
	}

	public function ToJson($data,$CityData,$mode){
  	$total = 0;

  	if($mode == 'city'){
  		foreach ($data as $var){
    		extract($var);
    		$dataset[] = array(
    			"id" => $var['cy_id'],
    			"title" => $var['cy_title'],
          "latitude" => $var['cy_latitude'],
          "longitude" => $var['cy_longitude'],
    		);
    		$total++;
    	}
  	}
  	else if($mode == 'district'){
  		foreach ($data as $var){
    		extract($var);
    		$dataset[] = array(
    			"id" => $var['ds_id'],
    			"title" => $var['ds_title'],
          "latitude" => $var['ds_latitude'],
          "longitude" => $var['ds_longitude'],
    		);
    		$total++;
    	}
  	}

    $data = array(
    	"apiVersion" => "1.0",
    	"data" => array(
    		"update" => time(),
    		"message" => 'Location list (json format) of '.$CityData['cy_title'],
        "latitude" => $CityData['cy_latitude'],
        "longitude" => $CityData['cy_longitude'],
    		"execute" => round(microtime(true)-StTime,4)."s",
    		"totalFeeds" => floatval($total),
    		"items" => $dataset
    	),
    );

    echo json_encode($data);
  }
}
?>