<?php

class CityHelper extends IrsBase {
	
	public $aver;
	public $data;
	public $q;
	public $owner=false;
	
	public function getCities() {
	 $array = array('q'=>$this->q,'lang'=>strtoupper($this->aver) );
	 $response = parent::getCityHelper($array);
	 $return['cities'] = array();
	 if(!$this->owner){
	  foreach($response as $key=>$city ){
	 	$return['cities'][] = array('airportCode'=>strtoupper($city['airportCode']),'cityName'=>ucwords($city['cityName']),
                              'countryName'=>ucwords($city['countryName']),'airportName'=>ucwords($city['airportName']),
                              'cityCode'=>empty($city['city_code'])?$city['airportCode']:$city['city_code'],
                              'low'=>((($city['moduleType']>>2)==277)?'1':'0') );
	  }
	 }else{
	  $return['cities'] = $response;
	 }
	 
	 $this->data = $return;
	}
	
}