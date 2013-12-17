<?php
/* @var $this AircompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descrieri companii',
);

$this->menu=array(
    array('label'=>'Creaza descriere noua', 'url'=>array('create')),
    array('label'=>'Administrare descrieri', 'url'=>array('admin'))
);
?>

<h4>Descrieri companii aeriene</h4>


<?php

$wdata = $dataProvider->getData();
if(count($wdata))
{   echo '<div class="row">';
    foreach($wdata as $item=>$data){

        echo $this->renderFile($this->getViewFile('_view'),array('data'=>$data));
        if(($item+1) % 3 == 0) echo '</div><div class="row">';
    }
    echo '</div>';
}
?>