<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */
/* @var $form CActiveForm */
?>

<div class="row">
<div class="col-lg-8">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aircompany-desc-form',
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
        <?php echo $form->labelEx($model,'aircompanyid'); ?>
        <?php echo $form->textField($model,'aircompanyid',array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'aircompanyid'); ?>
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'slug'); ?> &nbsp;<span><i class="glyphicon glyphicon-warning-sign"></i> Baza: <?php echo Yii::app()->request->baseUrl; ?>/ro/companii-aeriene/</span>
        <div class="input-group">
            <?php echo $form->textField($model,'slug',array('class' => 'form-control')); ?>
            <span class="input-group-btn">
                      <button class="btn btn-default" type="button" onclick="alert('Generez');"><i class="glyphicon glyphicon-refresh"></i></button>
            </span>
        </div>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('class' => 'form-control tiny-textarea')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array (1=>'Activ',0=>'Inactiv'), array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adauga' : 'Salveaza modificarile',array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div>
</div>