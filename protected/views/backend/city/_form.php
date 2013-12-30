<?php
/* @var $this CityController */
/* @var $model CityDesc */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'city-desc-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
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
                <?php echo $form->labelEx($model,'cityid'); ?>
                <?php echo $form->textField($model,'cityid',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'cityid'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'slug'); ?> &nbsp;<span><i class="glyphicon glyphicon-warning-sign"></i> Baza: <?php echo Yii::app()->request->baseUrl; ?>/ro/orase/</span>
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
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $form->labelEx($model,'image'); ?></div>
                <div class="panel-body">
                    <div id="image-prewiew">
                        <img id="preview" src="<?php echo Yii::app()->request->baseUrl.$model->image; ?>" />
                        <?php echo $form->hiddenField($model,'image',array('class'=>'model_image')); ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" id="change-image" class="btn btn-primary">Schimba</button>
                </div>
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
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-window">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Selectarea si prelucrarea imaginii</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <center>
                                    <div>
                                        <div>
                                            <input id="sizer" type="range" min="400" max="400" />
                                        </div>
                                        <div style="position:relative;">
                                            <img id="outputImage" src="<?php echo Yii::app()->request->baseUrl.$model->image; ?>" />
                                        </div>
                                        <div id="upload" >
                                            <span id="status" ></span>
                                        </div>
                                    </div>
                                    <div class="btn-group image_actions">
                                        <button id="img_action_crop" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-th-large"></i > Crop</button>
                                        <button id="img_action_resize" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-move"></i> Resize</button>
                                        <button id="img_action_flip" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-transfer"></i> Flip</button>
                                        <button id="img_action_upload" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-transfer"></i> Upload</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="image_filename" value="" />
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>
                        <button type="button" id="accept_image" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Acepta imaginea</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->