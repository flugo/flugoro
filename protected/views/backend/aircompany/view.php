<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */

$this->breadcrumbs=array(
	'Aircompany Descs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AircompanyDesc', 'url'=>array('index')),
	array('label'=>'Create AircompanyDesc', 'url'=>array('create')),
	array('label'=>'Update AircompanyDesc', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Delete AircompanyDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AircompanyDesc', 'url'=>array('admin')),
);
?>

<h1>View AircompanyDesc #<?php echo $model->cid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'aircompanyid',
		'title',
		'slug',
		'description',
		'content',
		'image',
		'status',
	),
)); ?>
