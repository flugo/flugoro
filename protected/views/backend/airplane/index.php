<?php
/* @var $this AirplaneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descrieri avioane',
);

$this->menu=array(
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Descriere avioane</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
