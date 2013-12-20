<?php
/* @var $this AirplaneController */
/* @var $model AirplaneDesc */

$this->breadcrumbs=array(
	'Descriere avioane'=>array('index'),
	'Creare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Creaza descriere noua</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>