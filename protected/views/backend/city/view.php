<?php
/* @var $this CityController */
/* @var $model CityDesc */

$this->breadcrumbs=array(
	'Descrieri orase'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Lisa descrierilor', 'url'=>array('index')),
	array('label'=>'Creaza o descriere noua', 'url'=>array('create')),
	array('label'=>'Modifica descrierea', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Sterge descrierea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Esti sigur ca doresti sa stergi?')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h1>Vizualizare descriere: <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'cityid',
		'title',
		'slug',
		'description',
		'content',
		'image',
		'status',
	),
)); ?>
