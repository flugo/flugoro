<?php
/* @var $this OffersController */
/* @var $model Offers */

$this->breadcrumbs=array(
	'Oferte'=>array('index'),
	'Creare',
);

$this->menu=array(
	array('label'=>'Lista ofertelor', 'url'=>array('index')),
	array('label'=>'Aministrare oferte', 'url'=>array('admin')),
);
?>

<h3>Creare oferta noua</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>