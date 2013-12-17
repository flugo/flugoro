<?php
/* @var $this AirportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Airport Descs',
);

$this->menu=array(
	array('label'=>'Create AirportDesc', 'url'=>array('create')),
	array('label'=>'Manage AirportDesc', 'url'=>array('admin')),
);
?>

<h1>Airport Descs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
