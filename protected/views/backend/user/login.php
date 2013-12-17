<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'login-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions'=>array(
                            'class'=>'form-horizontal',
                            'role'=>'form'
                        )
                    )); ?>
                        <?php
                        if($this->hasError()){
                            echo '<div class="alert alert-warning">'.$this->getErrors().'</div>';
                        }
                        ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'username',array('class'=>'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">

                                <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
                                <?php echo $form->error($model,'username'); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'password',array('class'=>'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
                                <?php echo $form->error($model,'password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                                    <?php echo $form->label($model,'rememberMe'); ?>
                                    <?php echo $form->error($model,'rememberMe'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success btn-sm')); ?>
                                <button type="reset" class="btn btn-default btn-sm">
                                    Reset</button>
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>
                </div>
                <div class="panel-footer">
                    Flugo admin panel
                </div>
            </div>
        </div>
    </div>
</div>
