<?php
/* @var $this AirportController */
/* @var $model AirportDesc */

$this->breadcrumbs=array(
	'Descriere aeroporturi'=>array('index'),
	'Adaugare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Creare descriere</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>