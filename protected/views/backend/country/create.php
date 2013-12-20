<?php
/* @var $this CountryController */
/* @var $model CountryDesc */

$this->breadcrumbs=array(
	'Descriere tari'=>array('index'),
	'Adaugare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Creare descriere</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>