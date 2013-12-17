<?php
/* @var $this AircompanyController */
/* @var $data AircompanyDesc */
?>



    <div class="col-sm-6 col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $data->title; ?></h3>
            </div>
            <div class="panel-body" style="height:200px;">
                    <img src="<?php echo Yii::app()->request->baseUrl.$data->image;?>" alt="<?php echo $data->title; ?>" width="100px">
                    <p><?php echo $data->description; ?></p>
            </div>
            <div class="actions" style="padding: 10px;"><?php echo CHtml::link('Detalii', array('view', 'id'=>$data->cid),array('class'=>'btn btn-default', 'role'=>'button')); ?> <?php echo CHtml::link('Editeaza', array('update', 'id'=>$data->cid),array('class'=>'btn btn-success', 'role'=>'button')); ?> <?php echo CHtml::link('Sterge', array('delete', 'id'=>$data->cid),array('class'=>'btn btn-danger', 'role'=>'button')); ?></div>
        </div>
    </div>

