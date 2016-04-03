<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 20:40
 */

/**
 * 构建上传文件信息
 */
function buildInfo(){
    if(!$_FILES){
        return ;
    }
    $i=0;
    foreach($_FILES as $v){
        //单文件
        if(is_string($v['name'])){
            $files[$i]=$v;
            $i++;
        }else{
            //多文件
            foreach($v['name'] as $key=>$val){
                $files[$i]['name']=$val;
                $files[$i]['size']=$v['size'][$key];
                $files[$i]['tmp_name']=$v['tmp_name'][$key];
                $files[$i]['error']=$v['error'][$key];
                $files[$i]['type']=$v['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}


/**
 * 上传文件设置
 * @param string $path
 * @param array $allowExt
 * @param int $maxSize
 * @param bool $imgFlag
 */
function uploadFile($path="uploads",$allowExt=array("gif","jpeg","png","jpg"),$maxSize=2097152,$imgFlag=true){
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i=0;
    $files=buildInfo();
    if(!($files&&is_array($files))){
        return ;
    }
    foreach($files as $file){
        if($file['error']===UPLOAD_ERR_OK){
            $ext=getExt($file['name']);
            //检测文件的扩展名
            if(!in_array($ext,$allowExt)){
                exit("You can't upload the files!!!");
            }
            //校验是否是一个真正的图片类型
            if($imgFlag){
                if(!getimagesize($file['tmp_name'])){
                    exit("You can't upload the files!!!");
                }
            }
            //上传文件的大小
            if($file['size']>$maxSize){
                exit("File is over size!!");
            }
            if(!is_uploaded_file($file['tmp_name'])){
                exit("Only upload by HTTP POST!!!");
            }
            $filename=getUniName().".".$ext;
            $destination=$path."/".$filename;
            if(move_uploaded_file($file['tmp_name'], $destination)){
                $file['name']=$filename;
                unset($file['tmp_name'],$file['size'],$file['type']);
                $uploadedFiles[$i]=$file;
                $i++;
            }
        }else{
            switch($file['error']){
                case 1:
                    $mes="File is Over Size!!";//UPLOAD_ERR_INI_SIZE
                    break;
                case 2:
                    $mes="Form is Over Size!!";			//UPLOAD_ERR_FORM_SIZE
                    break;
                case 3:
                    $mes="Some fail!!";//UPLOAD_ERR_PARTIAL
                    break;
                case 4:
                    $mes="No file upload!!";//UPLOAD_ERR_NO_FILE
                    break;
                case 6:
                    $mes="Not find the path!!";//UPLOAD_ERR_NO_TMP_DIR
                    break;
                case 7:
                    $mes="File can't be written!!";//UPLOAD_ERR_CANT_WRITE;
                    break;
                case 8:
                    $mes="EXTENSION!!!";//UPLOAD_ERR_EXTENSION
                    break;
            }
            echo $mes;
        }
    }
    return $uploadedFiles;
}