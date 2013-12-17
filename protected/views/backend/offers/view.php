<?php
/* @var $this OffersController */
/* @var $model Offers */

$this->breadcrumbs=array(
	'Oferte'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Lista ofertelor', 'url'=>array('index')),
	array('label'=>'Creaza oferta noua', 'url'=>array('create')),
	array('label'=>'Editeaza oferta', 'url'=>array('update', 'id'=>$model->oid)),
	array('label'=>'Sterge oferta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->oid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrare oferte', 'url'=>array('admin')),
);
?>

<h1>View Offers #<?php echo $model->oid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'oid',
		'title',
		'slug',
		'description',
		'city_from',
		'city_to',
		'date_from',
		'date_to',
		'price',
		'min_stay',
		'max_stay',
		'content',
		'image',
		'changes',
		'return',
		'status',
	),
)); ?>
