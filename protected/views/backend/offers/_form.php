<?php
/* @var $this OffersController */
/* @var $model Offers */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'aoffers-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('role'=>'form','enctype' => 'multipart/form-data'),
)); ?>

    <div class="row">
        <div class=" col-lg-12">
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-info-sign"></i> Cimpurile marcate cu <span class="required">*</span> sunt obligatorii.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $form->errorSummary($model,'<i class="glyphicon glyphicon-exclamation-sign"></i> Erori de validare',null,array('class'=>'alert alert-warning')); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'title'); ?>
                        <?php echo $form->textField($model,'title',array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'title'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'slug'); ?> &nbsp;<span><i class="glyphicon glyphicon-warning-sign"></i> Baza: <?php echo Yii::app()->request->baseUrl; ?>/ro/oferte/</span>
                        <div class="input-group">
                            <?php echo $form->textField($model,'slug',array('class' => 'form-control')); ?>
                            <span class="input-group-btn">
                                  <button class="btn btn-default" type="button" onclick="alert('Generez');"><i class="glyphicon glyphicon-refresh"></i></button>
                        </span>
                        </div>
                        <?php echo $form->error($model,'slug'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'description'); ?>
                        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
                        <?php echo $form->error($model,'description'); ?>
                    </div>
                </div>
            </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'city_from'); ?>
                        <?php echo $form->textField($model,'city_from',array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'city_from'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'city_to'); ?>
                        <?php echo $form->textField($model,'city_to',array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'city_to'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'date_from'); ?>
                        <div class="input-group">
                            <?php echo $form->textField($model,'date_from',array('class' => 'form-control', 'readonly'=>'readonly')); ?>
                            <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" onclick="alert('Generez');"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>
                        </div>
                        <?php echo $form->error($model,'date_from'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'date_to'); ?>
                        <div class="input-group">
                            <?php echo $form->textField($model,'date_to',array('size'=>5,'maxlength'=>5, 'class' => 'form-control', 'readonly'=>'readonly')); ?>
                            <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" onclick="alert('Generez');"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>
                        </div>
                        <?php echo $form->error($model,'date_to'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'price'); ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                            <?php echo $form->textField($model,'price',array('size'=>5,'maxlength'=>5, 'class' => 'form-control')); ?>
                            <span class="input-group-addon">.00</span>
                        </div>
                        <?php echo $form->error($model,'price'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'min_stay'); ?>
                        <?php echo $form->textField($model,'min_stay',array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'min_stay'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'max_stay'); ?>
                        <?php echo $form->textField($model,'max_stay',array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'max_stay'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'content'); ?>
                        <?php echo $form->textArea($model,'content',array('rows'=>16, 'cols'=>50, 'class' => 'form-control tiny-textarea')); ?>
                        <?php echo $form->error($model,'content'); ?>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-lg-4">
                   <div class="form-group">
                        <?php echo $form->labelEx($model,'changes'); ?>
                        <?php echo $form->dropDownList($model, 'changes', array (0=>'Nu', 1=>'Da'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'changes'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'return'); ?>
                        <?php echo $form->dropDownList($model, 'return', array (0=>'Nu', 1=>'Da'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'return'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array (1=>'Activ',0=>'Inactiv'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model,'status'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
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
            <div class="buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Creaza oferta' : 'Saalveaza modificarile',array('class'=>'btn btn-primary')); ?>
            </div>
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


