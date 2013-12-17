<?php
/* @var $this OffersController */
/* @var $model Offers */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'oid'); ?>
		<?php echo $form->textField($model,'oid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'slug'); ?>
		<?php echo $form->textArea($model,'slug',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_from'); ?>
		<?php echo $form->textField($model,'city_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_to'); ?>
		<?php echo $form->textField($model,'city_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_stay'); ?>
		<?php echo $form->textField($model,'min_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_stay'); ?>
		<?php echo $form->textField($model,'max_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'changes'); ?>
		<?php echo $form->textField($model,'changes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'return'); ?>
		<?php echo $form->textField($model,'return'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->