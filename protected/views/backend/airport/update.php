<?php
/* @var $this AirportController */
/* @var $model AirportDesc */

$this->breadcrumbs=array(
	'Airport Descs'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	array('label'=>'List AirportDesc', 'url'=>array('index')),
	array('label'=>'Create AirportDesc', 'url'=>array('create')),
	array('label'=>'View AirportDesc', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Manage AirportDesc', 'url'=>array('admin')),
);
?>

<h1>Update AirportDesc <?php echo $model->cid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>