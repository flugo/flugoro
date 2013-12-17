<?php
/* @var $this AirportController */
/* @var $model AirportDesc */

$this->breadcrumbs=array(
	'Airport Descs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AirportDesc', 'url'=>array('index')),
	array('label'=>'Manage AirportDesc', 'url'=>array('admin')),
);
?>

<h1>Create AirportDesc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>