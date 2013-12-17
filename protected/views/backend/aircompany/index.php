<?php
/* @var $this AircompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descrieri companii',
);

$this->menu=array(
    array('label'=>'Creaza descriere noua', 'url'=>array('create')),
    array('label'=>'Administrare descrieri', 'url'=>array('admin'))
);
?>

<h4>Descrieri companii aeriene</h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
