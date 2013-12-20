<?php
/* @var $this AirportController */
/* @var $model AirportDesc */

$this->breadcrumbs=array(
	'Descriere aeroporturi'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Editare',
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Vizualizeaza descrierea', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Editare descriere: <?php echo $model->title; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>