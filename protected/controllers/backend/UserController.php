<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */
Class UserController extends BackEndController{
    /**
     * Displays the login page
     */
    public function actionIndex(){
        $this->redirect(array('/user/login'));
    }
    public function actionLogin()
    {
        $model=new LoginForm;
        if($model->checkIP($_SERVER['REMOTE_ADDR'])){
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate()){
                if($model->isAdmin()){
                    if($model->login()){
                        $this->redirect(array('/dashboard/index'));
                    }
                } else {
                    $this->setError('Only administrators can acces this area');
                }
            }
        }

        // display the login form
        $this->layout = "login";
        $this->render('login',array('model'=>$model));
        } else {
            die('Access is denied');
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('/user/login'));
    }
}