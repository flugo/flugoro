<?php
/* @var $this AircompanyController */
/* @var $model AircompanyDesc */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aircompany-desc-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('role'=>'form','enctype' => 'multipart/form-data'),
)); ?>
<div class="row">
 <div class="col-lg-12">
    <div class="alert alert-info">
        <i class="glyphicon glyphicon-info-sign"></i> Cimpurile marcate cu <span class="required">*</span> sunt obligatorii.
    </div>
    <?php echo $form->errorSummary($model,'<i class="glyphicon glyphicon-exclamation-sign"></i> Erori de validare',null,array('class'=>'alert alert-warning')); ?>
 </div>
 </div>
<div class="row">
    <div class="col-lg-6">
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
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array (1=>'Activ',0=>'Inactiv'), array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>

    </div>
    <div class="col-lg-6">
            <!-- hidden crop params -->
            <input type="hidden" id="x1" name="x1" />
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="x2" name="x2" />
            <input type="hidden" id="y2" name="y2" />


            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><?php echo $form->labelEx($model,'image'); ?></div>
                <div class="panel-body">
                    <div class="error"><?php echo $form->error($model,'image'); ?></div>
                    <div class="image_preview">
                        <div class="thumbnail">
                            <img id="preview" src="<?php if($model->isNewRecord && $model->image == ''){
                                echo Yii::app()->request->baseUrl.'/uploads/no-image.jpg';
                            } else{
                                echo Yii::app()->request->baseUrl.$model->image;
                            }?>" />
                        </div>
                        <div class="image_info">
                            <table class="table">
                                <tr>
                                    <th>File size</th><th>Type</th><th>Dimension</th><th>W</th><th>H</th>
                                </tr>
                                <tr>
                                    <td><input type="text" id="filesize" name="filesize" /></td>
                                    <td><input type="text" id="filetype" name="filetype" /></td>
                                    <td><input type="text" id="filedim" name="filedim" /></td>
                                    <td><input type="text" id="w" name="w" /></td>
                                    <td><input type="text" id="h" name="h" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer"><?php echo $form->fileField($model,'image',array('class' => 'form-control image_file')); ?></div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <?php echo $form->labelEx($model,'content'); ?>
            <?php echo $form->textArea($model,'content',array('class' => 'form-control tiny-textarea','rows'=>'10')); ?>
            <?php echo $form->error($model,'content'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Adauga' : 'Salveaza modificarile',array('class'=>'btn btn-primary')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
