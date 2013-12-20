<?php
/* @var $this AirportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descriere aeroporturi',
);

$this->menu=array(
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3>Descrieri aeroporturi</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
