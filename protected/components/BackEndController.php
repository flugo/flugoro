<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */

class BackEndController extends BaseController
{
    public $layout = 'main';

    public $menu = array();

    public $breadcrumbs = array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            // даем доступ только админам
            array(
                'allow',
                'users'=>array('admin'),
            ),
            // всем остальным разрешаем посмотреть только на страницу авторизации
            array(
                'allow',
                'actions'=>array('login','error'),
                'users'=>array('?'),
            ),
            // запрещаем все остальное
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }
}