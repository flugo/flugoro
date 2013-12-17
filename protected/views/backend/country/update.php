<?php
/* @var $this CountryController */
/* @var $model CountryDesc */

$this->breadcrumbs=array(
	'Country Descs'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CountryDesc', 'url'=>array('index')),
	array('label'=>'Create CountryDesc', 'url'=>array('create')),
	array('label'=>'View CountryDesc', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Manage CountryDesc', 'url'=>array('admin')),
);
?>

<h1>Update CountryDesc <?php echo $model->cid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>