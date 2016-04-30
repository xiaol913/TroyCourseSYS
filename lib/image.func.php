<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 22:08
 */
require_once "string.func.php";

/**
 * 通过GD生成验证码图片
 * @param int $type
 * @param int $length
 * @param int $pixel
 * @param int $line
 * @param string $sess_name
 */
function verifyImage($type=3,$length=4,$pixel=10,$line=1,$sess_name="verify"){
//    type：种类  length：位数  pixel：干扰点  line：干扰线
//    创建画布
    $width=80;
    $height=28;
    $image=imagecreatetruecolor($width,$height);
    $white=imagecolorallocate($image,255,255,255);
    $black=imagecolorallocate($image,0,0,0);
//    用矩形填充画布
    imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
    $chars=buildRandomString($type,$length);
    $_SESSION[$sess_name]=$chars;
    $fontfiles = array ("MSYHL.TTC","SIMLI.TTF","SIMYOU.TTF");
//    生成位数为$length的验证码组，随机的大小、角度、xy坐标、颜色、字体
    for($i=0;$i<$length;$i++){
        $size=mt_rand(14,18);
        $angle=mt_rand(-15,15);
        $x=5+$i*$size;
        $y=mt_rand(20,26);
        $fontfile="./fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
        $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
        $text=substr($chars,$i,1);
        imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
    }

    //生成干扰点
    if($pixel){
        for($i=0;$i<$pixel;$i++){
            imagesetpixel($image,mt_rand(0,$width-1),mt_rand(0,$height-1),$black);
        }
    }
//    生成干扰线
    if($line){
        for($i=0;$i<$line;$i++) {
            $color=imagecolorallocate($image,mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
            imageline($image,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$color);
        }
    }

//    格式为gif的图片
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}

/**
 * 根据ID查找所有图片地址
 * @param $id
 * @return array
 */
function getAllImgsByProfId($id){
    $sql="select id,albumPath from troy_album where pId={$id}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 根据ID查找图片地址
 * @param $id
 * @return array
 */
function getAllImgByProfId($id){
    $sql="select albumPath from troy_album where pId={$id}";
    $row=fetchOne($sql);
    return $row;
}