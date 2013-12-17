<?php
/* @var $this CountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Country Descs',
);

$this->menu=array(
	array('label'=>'Create CountryDesc', 'url'=>array('create')),
	array('label'=>'Manage CountryDesc', 'url'=>array('admin')),
);
?>

<h1>Country Descs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
