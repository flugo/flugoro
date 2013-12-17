<?php
/* @var $this AirplaneController */
/* @var $model AirplaneDesc */

$this->breadcrumbs=array(
	'Airplane Descs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AirplaneDesc', 'url'=>array('index')),
	array('label'=>'Create AirplaneDesc', 'url'=>array('create')),
	array('label'=>'Update AirplaneDesc', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Delete AirplaneDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AirplaneDesc', 'url'=>array('admin')),
);
?>

<h1>View AirplaneDesc #<?php echo $model->cid; ?></h1>

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
