<?php
/* @var $this AirplaneController */
/* @var $model AirplaneDesc */

$this->breadcrumbs=array(
	'Descrieri avioane'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Editare descriere', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Sterge descrierea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Esti sigur ca doresti sa stergi?')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Vizualizare descriere: <?php echo $model->title; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'airplaneid',
		'title',
		'slug',
		'description',
		'content',
		'image',
		'status',
	),
)); ?>
