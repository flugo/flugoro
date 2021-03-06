<?php
/* @var $this WusersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Users <?php echo $model->uid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>