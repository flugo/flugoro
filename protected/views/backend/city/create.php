<?php
/* @var $this CityController */
/* @var $model CityDesc */

$this->breadcrumbs=array(
	'Descrieri orase'=>array('index'),
	'Adaugare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Creaza descriere noua</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>