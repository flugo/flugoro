<?php
/* @var $this OffersController */
/* @var $model Offers */

$this->breadcrumbs=array(
	'Oferte'=>array('index'),
	'Administrare',
);

$this->menu=array(
	array('label'=>'Lista ofertelor', 'url'=>array('index')),
	array('label'=>'Creaza oferta noua', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#offers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administrare oferte</h3>

<div class="alert alert-info">
    <i class="glyphicon glyphicon-info-sign"></i> Optional puteti utiliza un operator de comparare (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> sau <b>=</b>) la inceputul fiecarii valori cautate pentru a specifica care comparare trebuie facuta.
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'offers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'oid',
		'title',
		'slug',
		'description',
		'city_from',
		'city_to',
		/*
		'date_from',
		'date_to',
		'price',
		'min_stay',
		'max_stay',
		'content',
		'image',
		'changes',
		'return',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
