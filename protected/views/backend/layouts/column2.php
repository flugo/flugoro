<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo isset($this->panel_title)?$this->panel_title:""; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-map-marker"></i> Operatiuni</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items'=>$this->menu,
                        'htmlOptions'=>array('class'=>'operations'),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>