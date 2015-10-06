<?php
class LocationController extends LocationModel{
  public function ListAmphur($param){
    $dataset = parent::ListAmphurProcess($param);
    $this->RenderOption($mode,$dataset,$param['current']);
  }

  private function RenderOption($mode,$data,$current){
    foreach ($data as $var){
      include'template/location/location.option.items.php';
    }
    unset($data);
  }
}
?>