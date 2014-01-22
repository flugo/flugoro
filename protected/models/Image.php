<?php
/**
 * Project: flugo
 * File: Image.php
 * Author: Catirau Mihail
 * Date: 26.12.13


*/

class Image {

	private $ext;
	private $image;
    private $filename;
	private $newImage;
	private $origWidth;
	private $origHeight;
	private $resizeWidth;
	private $resizeHeight;

    private $cropX1;
    private $cropY1;
    private $cropWidth;
    private $cropHeight;

	private function setImage( $filename ){
        $this->filename = $filename;
        $filename = ROOT_PATH . $filename;
		$size = getimagesize($filename);
		$this->ext = $size['mime'];
		switch($this->ext)
	    {
	    	// Image is a JPG
	        case 'image/jpg':
	        case 'image/jpeg':
	        	// create a jpeg extension
	            $this->image = imagecreatefromjpeg($filename);
	            break;
	        // Image is a GIF
	        case 'image/gif':
	            $this->image = @imagecreatefromgif($filename);
	            break;
	        // Image is a PNG
	        case 'image/png':
	            $this->image = @imagecreatefrompng($filename);
	            break;
	        // Mime type not found
	        default:
	            throw new Exception("File is not an image, please use another file type.", 1);
	    }
	    $this->origWidth = imagesx($this->image);
	    $this->origHeight = imagesy($this->image);
	}

	public function saveImage($savePath, $imageQuality="100", $download = false){
        $savePath = ROOT_PATH . $savePath;
	    switch($this->ext){
	        case 'image/jpg':
	        case 'image/jpeg':
	        	// Check PHP supports this file type
	            if (imagetypes() & IMG_JPG) {
	                imagejpeg($this->newImage, $savePath, $imageQuality);
	            }
	            break;
	        case 'image/gif':
	        	// Check PHP supports this file type
	            if (imagetypes() & IMG_GIF) {
	                imagegif($this->newImage, $savePath);
	            }
	            break;
	        case 'image/png':
	            $invertScaleQuality = 9 - round(($imageQuality/100) * 9);
	            // Check PHP supports this file type
	            if (imagetypes() & IMG_PNG) {
	                imagepng($this->newImage, $savePath, $invertScaleQuality);
	            }
	            break;
	    }
	    if($download){
	    	header('Content-Description: File Transfer');
			header("Content-type: application/octet-stream");
			header("Content-disposition: attachment; filename= ".$savePath."");
			readfile($savePath);
	    }
	    imagedestroy($this->newImage);
	}

	public function resizeTo( $width, $height, $resizeOption = 'default' ){
		switch(strtolower($resizeOption)){
			case 'exact':
				$this->resizeWidth = $width;
				$this->resizeHeight = $height;
			break;
			case 'maxwidth':
				$this->resizeWidth  = $width;
				$this->resizeHeight = $this->resizeHeightByWidth($width);
			break;
			case 'maxheight':
				$this->resizeWidth  = $this->resizeWidthByHeight($height);
				$this->resizeHeight = $height;
			break;
			default:
				if($this->origWidth > $width || $this->origHeight > $height){
					if ( $this->origWidth > $this->origHeight ) {
				    	 $this->resizeHeight = $this->resizeHeightByWidth($width);
			  			 $this->resizeWidth  = $width;
					} else if( $this->origWidth < $this->origHeight ) {
						$this->resizeWidth  = $this->resizeWidthByHeight($height);
						$this->resizeHeight = $height;
					}
				} else {
		            $this->resizeWidth = $width;
		            $this->resizeHeight = $height;
		        }
			break;
		}
		$this->newImage = imagecreatetruecolor($this->resizeWidth, $this->resizeHeight);
    	imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $this->resizeWidth, $this->resizeHeight, $this->origWidth, $this->origHeight);
	}

	private function resizeHeightByWidth($width){
		return floor(($this->origHeight/$this->origWidth)*$width);
	}

	private function resizeWidthByHeight($height){
		return floor(($this->origWidth/$this->origHeight)*$height);
	}

    private function cropImage($cropX1,$cropY1, $cropWidth, $cropHeight){
        $this->cropX1 = $cropX1;
        $this->cropY1 = $cropY1;
        $this->cropWidth = $cropWidth;
        $this->cropHeight = $cropHeight;
        $this->newImage = imagecreatetruecolor($this->cropWidth, $this->cropHeight);
        imagecopyresampled($this->newImage, $this->image, 0, 0, $this->cropX1, $this->cropY1, $this->cropWidth, $this->cropHeight, $this->cropWidth, $this->cropHeight);

    }

    function flipImage ( $mode ){
        $src_x                        =    0;
        $src_y                        =    0;
        $src_width                    =    $this->origWidth;
        $src_height                   =    $this->origHeight;

        switch ( $mode ){
            case 'vertical': //vertical
                $src_y                =    $this->origHeight -1;
                $src_height           =    -$this->origHeight;
                break;

            case 'horizontal': //horizontal
                $src_x                =    $this->origWidth -1;
                $src_width            =    -$this->origWidth;
                break;

            case 'both': //both
                $src_x                =    $this->origWidth -1;
                $src_y                =    $this->origHeight -1;
                $src_width            =    -$this->origWidth;
                $src_height           =    -$this->origHeight;
                break;

            default: // horizontal
                $src_x                =    $this->origWidth - 1;
                $src_width            =    -$this->origWidth;

        }
        $this->newImage               =    imagecreatetruecolor ( $this->origWidth, $this->origHeight );
        imagecopyresampled ( $this->newImage, $this->image, 0, 0, $src_x, $src_y , $this->origWidth, $this->origHeight, $src_width, $src_height );
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
    public function upload(){
        $targetFolder = '/uploads';
        $fileTypes = array('jpg','jpeg','gif','png');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetFile = $targetFolder . '/' . date('YmdHis') .'_' . strtolower($_FILES['Filedata']['name']);
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, ROOT_PATH . $targetFile);
                $this->setImage($targetFile);
                $response = array('status' => 'success','filename' => $targetFile,'message' => 'Fisierul a fost incarcat cu succes!', 'imgWidth' => $this->origWidth);
            } else {
                $response = array('status' => 'error','filename' => '', 'message'=>'Extensie nepermisa!');
            }
        } else $response = array('status' => 'error','filename' => '','message'=>'Eroare upload!');
        echo json_encode($response);
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
    public function resize(){
        if(!empty($_POST['filename']) && !empty($_POST['width'])){
            if(file_exists(ROOT_PATH . $_POST['filename'])){
                $this->_resize();
                $response = array('status' => 'success', 'filename'=> $this->filename, 'message' => 'Imaginea a fost cu succes redimensionata!', 'imgWidth' => $this->resizeWidth);
            } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Imaginea "' . $_POST['filename'] . '" nu a fost gasita!');
        } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Error! Nu a fost trimisa imaginea sau marimea ei de dimensionare!');
        echo json_encode($response);
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
    public function crop(){
        if(!empty($_POST['filename'])){
            if(file_exists(ROOT_PATH . $_POST['filename'])){
                $this->_resize();
                $this->_crop();
                $response = array('status' => 'success', 'filename'=> $this->filename, 'message' => 'Imaginea a fost cu succes taiata!', 'imgWidth' => $this->cropWidth,
                    'res'=>array($this->origWidth,$this->origHeight,$this->cropWidth,$this->cropHeight,$this->cropX1,$this->cropY1));

            } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Imaginea "' . $_POST['filename'] . '" nu a fost gasita!');

        } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Error! Nu a fost trimisa imaginea!');
        echo json_encode($response);
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
    public function flip(){
        if(!empty($_POST['filename'])){
            if(file_exists(ROOT_PATH . $_POST['filename'])){
                $this->_resize();
                $mode = $this->_flip();
                $response = array('status' => 'success', 'filename'=> $this->filename, 'message' => 'Imaginea a fost cu succes inversata!', 'imgWidth' => $this->origWidth);

            } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Imaginea "' . $_POST['filename'] . '" nu a fost gasita!');

        } else $response = array('status' => 'error', 'filename'=> '', 'message' => 'Error! Nu a fost trimisa imaginea!');
        echo json_encode($response);
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
     private function _resize(){
        $this->setImage($_POST['filename']);
        $this->resizeTo($_POST['width'],null,'maxwidth');
        $this->saveImage($this->filename);
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------
    private function _crop(){
        $this->setImage($_POST['filename']);
        $this->cropImage($_POST['x1'],$_POST['y1'],$_POST['sw'], $_POST['sh']);
        $this->saveImage($this->filename);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------
    private function _flip(){
        $this->setImage($_POST['filename']);
        $this->flipImage($_POST['mode']);
        $this->saveImage($this->filename);
    }
}
?>