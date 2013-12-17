<?php
/* @var $this OffersController */
/* @var $model Offers */

$this->breadcrumbs=array(
	'Oferte'=>array('index'),
	$model->title=>array('view','id'=>$model->oid),
	'Editare',
);

$this->menu=array(
	array('label'=>'Lista ofertelor', 'url'=>array('index')),
	array('label'=>'creaza o oferta', 'url'=>array('create')),
	array('label'=>'Vezi oferta', 'url'=>array('view', 'id'=>$model->oid)),
	array('label'=>'Administrare oferte', 'url'=>array('admin')),
);
?>

<h4>Editare oferta <?php echo $model->title; ?></h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>