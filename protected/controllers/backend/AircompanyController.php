<?php

class AircompanyController extends BackEndController
{
    /**
     * @var string the default layout for the views.
     */
    public $layout='//layouts/column2';
    /**
     * @var string the panel title.
     */
    public $panel_title = "Companii aeriene";

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AircompanyDesc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AircompanyDesc']))
		{
            // file handling
            $imageUploadFile = CUploadedFile::getInstance($model, 'image');
            if($imageUploadFile !== null){ // only do if file is really uploaded
                $imageFileName = '/uploads/'.date('YmdHis').'_'.$imageUploadFile->name;
                $model->image = $imageFileName;
            } else {
                $model->image = '/uploads/no_image.png';
            }

			$model->attributes=$_POST['AircompanyDesc'];
			if($model->save()){
                if($imageUploadFile !== null) // validate to save file
                    $imageUploadFile->saveAs(ROOT_PATH . $imageFileName);
				$this->redirect(array('view','id'=>$model->cid));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AircompanyDesc']))
		{
            // file handling
            $imageUploadFile = CUploadedFile::getInstance($model, 'image');
            if($imageUploadFile !== null){ // only do if file is really uploaded
                $imageFileName = '/uploads/'.date('YmdHis').'_'.$imageUploadFile->name;
                $model->image = $imageFileName;
            }

            $model->attributes=$_POST['AircompanyDesc'];
            if($model->save()){
                if($imageUploadFile !== null) // validate to save file
                    $imageUploadFile->saveAs(ROOT_PATH . $imageFileName);
                $this->redirect(array('view','id'=>$model->cid));
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AircompanyDesc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AircompanyDesc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AircompanyDesc']))
			$model->attributes=$_GET['AircompanyDesc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AircompanyDesc the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AircompanyDesc::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AircompanyDesc $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aircompany-desc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
