<?php
/* @var $this CityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'City Descs',
);

$this->menu=array(
	array('label'=>'Create CityDesc', 'url'=>array('create')),
	array('label'=>'Manage CityDesc', 'url'=>array('admin')),
);
?>

<h1>City Descs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
