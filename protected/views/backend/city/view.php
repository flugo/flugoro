<?php
/* @var $this CityController */
/* @var $model CityDesc */

$this->breadcrumbs=array(
	'City Descs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CityDesc', 'url'=>array('index')),
	array('label'=>'Create CityDesc', 'url'=>array('create')),
	array('label'=>'Update CityDesc', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Delete CityDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CityDesc', 'url'=>array('admin')),
);
?>

<h1>View CityDesc #<?php echo $model->cid; ?></h1>

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
