<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */
?>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/login.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/backend/css/bootstrap-theme.min.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/backend/js/bootstrap.min.js"></script>
</head>

<body>

<?php echo $content; ?>

</body>
</html>