<?php
/* @var $this AirplaneController */
/* @var $model AirplaneDesc */

$this->breadcrumbs=array(
	'Airplane Descs'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	array('label'=>'List AirplaneDesc', 'url'=>array('index')),
	array('label'=>'Create AirplaneDesc', 'url'=>array('create')),
	array('label'=>'View AirplaneDesc', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Manage AirplaneDesc', 'url'=>array('admin')),
);
?>

<h1>Update AirplaneDesc <?php echo $model->cid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>