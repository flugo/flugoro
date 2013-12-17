<?php
/* @var $this CityController */
/* @var $model CityDesc */

$this->breadcrumbs=array(
	'City Descs'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CityDesc', 'url'=>array('index')),
	array('label'=>'Create CityDesc', 'url'=>array('create')),
	array('label'=>'View CityDesc', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Manage CityDesc', 'url'=>array('admin')),
);
?>

<h1>Update CityDesc <?php echo $model->cid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>