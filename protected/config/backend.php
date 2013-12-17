<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */


return CMap::mergeArray(

    require_once(dirname(__FILE__).'/main.php'),

    array(


        // стандартный контроллер
        'defaultController' => 'dashboard',
        'language' => 'ro',
        // компоненты
        'components'=>array(

            // пользователь
            'user'=>array(
                'loginUrl'=>array('/user/login'),
            ),

            // mailer
            'mailer'=>array(
                'pathViews' => 'application.views.backend.email',
                'pathLayouts' => 'application.views.email.backend.layouts'
            ),
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'dashboard/error',
            ),
        ),
    )
);