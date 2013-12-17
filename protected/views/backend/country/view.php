<?php
/* @var $this CountryController */
/* @var $model CountryDesc */

$this->breadcrumbs=array(
	'Country Descs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CountryDesc', 'url'=>array('index')),
	array('label'=>'Create CountryDesc', 'url'=>array('create')),
	array('label'=>'Update CountryDesc', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Delete CountryDesc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CountryDesc', 'url'=>array('admin')),
);
?>

<h1>View CountryDesc #<?php echo $model->cid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'countryid',
		'title',
		'slug',
		'description',
		'content',
		'image',
		'status',
	),
)); ?>
