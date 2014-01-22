<?php

class ImageController extends BackEndController{

    public function actionUpload(){
        $image = new Image();
        $image->upload();
    }

    public function actionResize(){
        $image = new Image();
        $image->resize();
    }

    public function actionCrop(){
        $image = new Image();
        $image->crop();
    }

    public function actionFlip(){
        $image = new Image();
        $image->flip();
    }

}