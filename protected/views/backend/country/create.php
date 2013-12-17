<?php
/* @var $this CountryController */
/* @var $model CountryDesc */

$this->breadcrumbs=array(
	'Country Descs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CountryDesc', 'url'=>array('index')),
	array('label'=>'Manage CountryDesc', 'url'=>array('admin')),
);
?>

<h1>Create CountryDesc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>