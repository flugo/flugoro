<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * modified : Gurduza Oleg
 * Date: 12.12.13
 */

return CMap::mergeArray(

    require_once(dirname(__FILE__).'/main.php'),

    array(
 

        // стандартный контроллер
        'defaultController' => 'site',
        'sourceLanguage' => 'ro',
        'language'=>'en',

        // application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=> require_once(dirname(__FILE__).'/main-router-frontend.php')
                        /*array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			 ),*/
		),
        		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=flugotest',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'tablePrefix'=>'f_'
		),
		*/
        'curl' => array(
                    'class' => 'application.extensions.curl.Curl',
                    'options'=>array(
                     'setOptions'=>array(
                        CURLOPT_HEADER => false,
                        CURLOPT_USERAGENT => Yii::app()->params['agent']
                     )
                   ),
                ),
            
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	'params'=>require_once(dirname(__FILE__).'/settings-api.php'),
    )
);