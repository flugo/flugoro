<?php

class IrsBase extends CFormModel {
   
    public $defaul = array('modul_worldspan'=>"N",
                    'modul_galileo'=>"Y",
                    'modul_ps'=>"N",
                    "modul_lcc4"=>"Y",
                    'modul_lcc2' => "N",
                    'modul_sirena' => "N",
                    'modul_lcc3' => "N",
                    'modul_gds4' => "N",
                    'modul_lcctt' => "N",
                    'afid' => 'zbor24'
        );
    
    
    
    public function setRequestApi($arrayparams){
      $arrayparams = array_merge( $arrayparams , $this->defaul);
        
      $run_one = Yii::app()->curl->run('http://zborv2.zbor.md/api2.php',$arrayparams);

      if (!$run_one->hasErrors()){
       return json_decode($run_one->getData(),true);
      } else {
       echo '<pre>';
       var_dump($run_one->getErrors());
       echo '</pre>';
      }
    }
    
    public function getCityHelper($arrayparams){
    	$connection = Yii::app()->db2;
    	$sqlStatement = 'select * from irs_dictionary."checkAirportDescListByName_int_v3"(:city, :lang) as ddd("airportCode" varchar,"airportName" varchar,"cityName" varchar,"countryCode" varchar,"countryName" varchar,"continentCode" varchar,"continentName" varchar,"moduleType" bit,"airport" boolean,"city_code" varchar,"country_continent_code" varchar,"cityId" integer)';
    	$command=$connection->createCommand($sqlStatement);
    	$command->bindParam(':city',$arrayparams['q']);
    	$command->bindParam(':lang',$arrayparams['lang']);
    	
  	 return ( $command->queryAll() );
    }
    /*
    $array = array();
    $array[':lang']=(string)  strtoupper($params['lang']);
    $array[':city']=(string)$params['q'];
    
    $array_cities = $this->getCityHelperByLang( $array );
    
    $return = array();
    if(isset($array_cities)){
    	foreach( $array_cities as $city){
    		$return[] = array('airportCode'=>strtoupper($city['airportCode']),'cityName'=>ucwords($city['cityName']),
    				'countryName'=>ucwords($city['countryName']),'airportName'=>ucwords($city['airportName']),
    				'cityCode'=>empty($city['city_code'])?$city['airportCode']:$city['city_code']/*,
    				'low'=>((($city['moduleType']>>2)==277)?'1':'0')*-/
    		);
    	}
    }
    */
    
}

