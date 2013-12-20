<?php /* @var $this BackEndController */ ?>
<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.mint.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.jcrop.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/script.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap-theme.min.css" />

    <!-- Add custom CSS here -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/sb-admin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/jquery.jcrop.min.css" />
    <!-- Page Specific CSS -->

</head>

<body>

<div id="wrapper">

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php
            echo CHtml::link('FLUGO',array('/dashboard'), array('class'=>'navbar-brand'));
        ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php $this->widget('zii.widgets.CMenu',array(
            'htmlOptions' => array( 'class' => 'nav navbar-nav side-nav'),
            'items'=>array(
                array('label' => '<i class="glyphicon glyphicon-dashboard"></i> Acasa', 'url'=>array('/dashboard')),
                array('label' => '<i class="glyphicon glyphicon-briefcase"></i> Oferte', 'url'=>array('/offers')),
                array('label' => '<i class="glyphicon glyphicon-book"></i> Descrieri Tari', 'url'=>array('/country')),
                array('label' => '<i class="glyphicon glyphicon-book"></i> Descrieri Orase', 'url'=>array('/city')),
                array('label' => '<i class="glyphicon glyphicon-book"></i> Descrieri Aeroporturi', 'url'=>array('/airport')),
                array('label' => '<i class="glyphicon glyphicon-book"></i> Descrieri Companii Aeriene', 'url'=>array('/aircompany')),
                array('label' => '<i class="glyphicon glyphicon-book"></i> Descrieri Avioane', 'url'=>array('/airplane')),
            ),
            'encodeLabel'=>false,
        )); ?>



        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo Yii::app()->user->name; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <?php
                            echo CHtml::link('<i class="fa fa-power-off"></i> Log Out',array('/user/logout'));
                        ?>
                    </li>
                </ul>
            </li>
            <li>&nbsp;</li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

<?php echo $content; ?>

</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script type="text/javascript">
    tinymce.init({
        selector: ".tiny-textarea"
    });
</script>

</body>
</html>

