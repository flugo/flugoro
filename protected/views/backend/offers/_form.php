<?php
/* @var $this OffersController */
/* @var $model Offers */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-8">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'aoffers-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('role'=>'form','enctype' => 'multipart/form-data'),
    )); ?>
    <div class="alert alert-info">
        <i class="glyphicon glyphicon-info-sign"></i> Cimpurile marcate cu <span class="required">*</span> sunt obligatorii.
    </div>

    <?php echo $form->errorSummary($model,'<i class="glyphicon glyphicon-exclamation-sign"></i> Erori de validare',null,array('class'=>'alert alert-warning')); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'city_from'); ?>
		<?php echo $form->textField($model,'city_from',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'city_from'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'city_to'); ?>
		<?php echo $form->textField($model,'city_to',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'city_to'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'date_from'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'date_to'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>5,'maxlength'=>5, 'class' => 'form-control')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'min_stay'); ?>
		<?php echo $form->textField($model,'min_stay',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'min_stay'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'max_stay'); ?>
		<?php echo $form->textField($model,'max_stay',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'max_stay'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'class' => 'form-control tiny-textarea')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>120, 'class' => 'form-control')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'changes'); ?>
		<?php echo $form->textField($model,'changes',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'changes'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'return'); ?>
		<?php echo $form->textField($model,'return',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'return'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

    <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->