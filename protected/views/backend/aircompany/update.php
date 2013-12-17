<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */

$this->breadcrumbs=array(
	'Descrieri companii'=>array('index'),
	$model->title=>array('view','id'=>$model->cid),
	'Editare',
);

$this->menu=array(
    array('label'=>'Lista descrierilor', 'url'=>array('index')),
    array('label'=>'Creaza descriere noua', 'url'=>array('create')),
    array('label'=>'Vizualizeaza descrierea', 'url'=>array('view', 'id'=>$model->cid)),
    array('label'=>'Administrare descrieri', 'url'=>array('admin'))
);
?>

<h4>Editare descriere companie aeriana  <?php $model->title; ?> (ID: <?php echo $model->cid; ?>)</h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>