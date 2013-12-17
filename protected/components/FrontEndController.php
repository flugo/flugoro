<?php

class FrontEndController extends BaseController
{
    
    
    
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        
        if( isset($_GET['lang']) ){
          Yii::app()->language = $_GET['lang']; 
        }elseif( isset($_POST['lang'])){
          Yii::app()->language = $_POST['lang'];   
        }
        
    }
    
    public $layout = 'main';

    public $menu = array();

    public $breadcrumbs = array();
    
    public $pageDescription = '';
    
    public $companyName = ' Wise Travel Solutions';
        
    public $languages = array('ro'=>'Română','en'=>'Engleză'/*,'it'=>'Italiană'*/);
    
    public $cssRun = array();
    
    public $jsRun = array();
    
}