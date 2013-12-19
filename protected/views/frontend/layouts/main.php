<?php /* @var $this Controller */ ?>
<!doctype html>
<html lang="<?php echo Yii::app()->language;  ?>">
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <title><?php echo CHtml::encode($this->pageTitle); ?></title>
 <?php echo CHtml::metaTag(CHtml::encode($this->pageDescription), 'description'); ?>
</head>
<body>
	<div id="top-bar-wrapper">
		<div id="top-bar">
			<div class="top-bar-text"><?php echo Yii::t("main", "BILETE DE AVION"); ?>  </div>
			<div class="top-bar-buttons">
				<span class="top-bar-button hoteluri"> <?php echo Yii::t("main", "HOTELURI"); ?> </span> 
                                <span class="top-bar-button bilete"> <?php echo Yii::t("main", "BILETE"); ?> </span> 
                                <span class="top-bar-button top-bar-phone"> +022 844 111 </span>
			</div>
		</div>
	</div>

	<div id="section-header">
		<div id="section-header-wrapper">
			<div id="section-header">
				<img class="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/flugo-logo.png">
				<div id="header-menu">
					<div class="user-block"><?php echo Yii::t("main", "Intră în cont"); ?></div>
					<div class="language-block">
						<div class="button-text" tabindex="0">
						 <span><?php echo Yii::t("main", $this->languages[Yii::app()->language]); ?></span>
						</div>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/chat-title.png">
						<ul class="language-select">
                                                  <?php foreach($this->languages as $key=>$langitem){ ?>  
						   <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $key;?>"> <?php echo  Yii::t("main", $langitem);?></a> </li>
                                                  <?php } ?>      
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php echo $content; ?>
	

        <div id="section-footer">
         <div id="section-footer-top-wrapper">
            <div id="section-footer-top">
                <img class="island-left" src="<?php echo Yii::app()->request->baseUrl; ?>/images/island-left.png"> 
                <img class="island-right" src="<?php echo Yii::app()->request->baseUrl; ?>/images/island-right.png">
            </div>
         </div>
         <div id="section-footer-top-waves"></div>
         <div id="section-footer-wrapper">
            <?php echo $this->renderPartial('/block/_bottom-block'); ?>
         </div>
        </div>

        <?php  echo $this->renderPartial('/block/_login-frame'); ?>
    
        <?php  echo $this->renderPartial('/block/_register-now'); ?>
    
	<!--  script -->
    <script>
     var locale = '<?php echo Yii::app()->request->baseUrl ."/". Yii::app()->language ?>';
    </script>    
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles-main.css">
        
        <?php if( isset($this->cssRun) ){
                foreach($this->cssRun as $css){ ?>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/<?php echo $css; ?>.css">
        <?php   } 
              }?>
           
    <link rel="stylesheet" href="css/jqueryui.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wCheck.css">
         
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqueryui.js"></script>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
        
        <!--
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.countdown.min.js"></script>
        -->
	
        <?php if( isset($this->jsRun) ){
                foreach($this->jsRun as $js){ ?>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/<?php echo $js; ?>.js"></script>
        <?php   } 
              }?>
        
        
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
        
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/wCheck.js"></script>
        <!-- -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.placeholder.js"></script>
        
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ve/jquery.validationEngine-<?php echo Yii::app()->language; ?>.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ve/jquery.validationEngine.js"></script>
       
        
	<?php /* *-/?>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
	<?php /-* */ ?>
        <?php /* start font frumos */ ?>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.js"></script>
	<script type="text/javascript">
         WebFontConfig = { google: { families: [ 'Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic:latin,latin-ext' ] } };
         (function() {	 var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);})(); 
        </script>
        <?php /* font frumos */ ?>
	<!-- end script -->
        
        
        
        
</body>
</html>
