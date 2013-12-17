<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */

class BaseController extends CController
{

    // флеш-нотис пользователю
    public function setNotice($message)
    {
        return Yii::app()->user->setFlash('notice', $message);
    }

    // флеш-ошибка пользователю
    public function setError($message)
    {
        return Yii::app()->user->setFlash('error', $message);
    }

    public function hasError(){
        if(Yii::app()->user->hasFlash('error')) return True;
        else return False;
    }

    public function getErrors()
    {
            return Yii::app()->user->getFlash('error');
    }

}