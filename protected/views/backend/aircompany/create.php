<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */

$this->breadcrumbs=array(
	'Descrieri companii'=>array('index'),
	'Adaugare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Creare descriere</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>