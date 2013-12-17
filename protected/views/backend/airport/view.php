<?php
/* @var $this AirportController */
/* @var $model AirportDesc */

$this->breadcrumbs=array(
	'Airport Descs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AirportDesc', 'url'=>array('index')),
	array('label'=>'Create AirportDesc', 'url'=>array('create')),
	array('label'=>'Update AirportDesc', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Delete AirportDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AirportDesc', 'url'=>array('admin')),
);
?>

<h1>View AirportDesc #<?php echo $model->cid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'airportid',
		'title',
		'slug',
		'description',
		'content',
		'image',
		'status',
	),
)); ?>
