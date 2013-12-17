<?php
/* @var $this AirplaneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Airplane Descs',
);

$this->menu=array(
	array('label'=>'Create AirplaneDesc', 'url'=>array('create')),
	array('label'=>'Manage AirplaneDesc', 'url'=>array('admin')),
);
?>

<h1>Airplane Descs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
