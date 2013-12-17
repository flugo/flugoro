<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */

$this->breadcrumbs=array(
	'Descriere companii'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Lista descrierilor', 'url'=>array('index')),
	array('label'=>'Creaza descriere noua', 'url'=>array('create')),
	array('label'=>'Editeaza descriere', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'Sterge descriere', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Sunteti siguri ca doriti sa stergeti?')),
	array('label'=>'Administrare descrieri', 'url'=>array('admin')),
);
?>

<h3><?php echo $model->title; ?></h3>

<div class="row">
    <div class="col-lg-12">
        <img src="<?php echo Yii::app()->request->baseUrl.$model->image;?>" alt="<?php echo $model->title; ?>" width="200px"/>
        <?php echo $model->content;?>
    </div>
</div>

