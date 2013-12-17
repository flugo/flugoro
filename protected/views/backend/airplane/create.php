<?php
/* @var $this AirplaneController */
/* @var $model AirplaneDesc */

$this->breadcrumbs=array(
	'Airplane Descs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AirplaneDesc', 'url'=>array('index')),
	array('label'=>'Manage AirplaneDesc', 'url'=>array('admin')),
);
?>

<h1>Create AirplaneDesc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>