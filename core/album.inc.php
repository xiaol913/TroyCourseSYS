<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 21:23
 */

/**
 * 把文件名+路径传入数据库
 * @param $arr
 */
function addAlbum($arr){
    insert("troy_album", $arr);
}

/**
 * 删除图片
 * @param $id
 * @param $imgId
 */
function delImg($id,$imgId){
    $where="id={$imgId}";
    $sql="select * from troy_album WHERE id={$imgId}";
    $img=fetchOne($sql);
    $result1=unlink("uploads/".$img['albumPath']);
    $result2=delete("troy_album",$where);
    if($result1&&$result2){
        echo "Successful!!!!<br/><a href='editProf.php?id=$id'>Return Back</a>";
    }else{
        echo "Fail!!!<br/><a href='editProf.php?id=$id' >Return Back</a>";
    }
    return;
}

