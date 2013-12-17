<?php
/* @var $this OffersController */
/* @var $model Offers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'offers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textArea($model,'slug',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_from'); ?>
		<?php echo $form->textField($model,'city_from'); ?>
		<?php echo $form->error($model,'city_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_to'); ?>
		<?php echo $form->textField($model,'city_to'); ?>
		<?php echo $form->error($model,'city_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from'); ?>
		<?php echo $form->error($model,'date_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to'); ?>
		<?php echo $form->error($model,'date_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_stay'); ?>
		<?php echo $form->textField($model,'min_stay'); ?>
		<?php echo $form->error($model,'min_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_stay'); ?>
		<?php echo $form->textField($model,'max_stay'); ?>
		<?php echo $form->error($model,'max_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'changes'); ?>
		<?php echo $form->textField($model,'changes'); ?>
		<?php echo $form->error($model,'changes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'return'); ?>
		<?php echo $form->textField($model,'return'); ?>
		<?php echo $form->error($model,'return'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->