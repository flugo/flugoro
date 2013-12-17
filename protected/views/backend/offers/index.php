<?php
/* @var $this OffersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Oferte',
);

$this->menu=array(
	array('label'=>'Creaza oferta noua', 'url'=>array('create')),
	array('label'=>'Aministrare oferta', 'url'=>array('admin')),
);
?>

<h3>Oferte</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
