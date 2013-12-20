<?php
/* @var $this CityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descrieri orase',
);

$this->menu=array(
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Descrieri orase</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
