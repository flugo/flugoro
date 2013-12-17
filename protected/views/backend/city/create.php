<?php
/* @var $this CityController */
/* @var $model CityDesc */

$this->breadcrumbs=array(
	'City Descs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CityDesc', 'url'=>array('index')),
	array('label'=>'Manage CityDesc', 'url'=>array('admin')),
);
?>

<h1>Create CityDesc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>