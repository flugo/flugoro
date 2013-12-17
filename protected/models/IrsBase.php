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
    
}

