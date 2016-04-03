<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 17:18
 */

/**
 * 得到所有教授信息
 * @return array
 */
function getAllProf(){
    $sql="select * from troy_professors";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 添加教授信息
 */
function addProf(){
    $arr=$_POST;
    $path="./uploads";
    $uploadFiles=uploadFile($path);
    $res=insert("troy_professors",$arr);
    if($res){
        if(is_array($uploadFiles)&&$uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['pId'] = $res;
                $arr1['albumPath'] = $uploadFile['name'];
                addAlbum($arr1);
            }
        }
        echo "<p>Successful!!!</p><a href='listProf.php'>Return to Professors List</a>";
    }else{
        echo "<p>Fail!!</p><a href='listProf.php'>Return to Professors List</a>";
    }
    return;
}

/**
 * 删除教授信息以及相关图片
 * @param $id
 */
function delProf($id){
    $where="id=$id";
    $res=delete("troy_professors",$where);
    $profImgs=getAllImgsByProfId($id);
    if($profImgs&&is_array($profImgs)){
        foreach($profImgs as $profImg){
            if(file_exists("uploads/".$profImg['albumPath'])){
                unlink("uploads/".$profImg['albumPath']);
            }
        }
        $where1="pid={$id}";
        delete("troy_album",$where1);
    }
    if($res){
        echo "Successful!!!!<br/><a href='listProf.php'>Return to Professors List</a>";
    }else{
        echo "Fail!!!<br/><a href='listProf.php'>Return to Professors List</a>";
    }
    return;
}

/**
 * 通过ID找到该教授信息
 * @param $id
 * @return array|null
 */
function getProfById($id){
    $sql="select p.id,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,a.id,a.albumPath from troy_professors as p LEFT JOIN troy_album a ON p.id=a.pId WHERE p.id={$id}";
    $row=fetchOne($sql);
    return $row;
}

/**
 * 通过ID修改教授信息
 * @param $id
 */
function editProf($id){
    $arr=$_POST;
    $where="id={$id}";
    $path="./uploads";
    $uploadFiles=uploadFile($path);
    $res=update("troy_professors",$arr,$where);
    if($res){
        if(is_array($uploadFiles)&&$uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['pId'] = $id;
                $arr1['albumPath'] = $uploadFile['name'];
                addAlbum($arr1);
            }
        }
        echo "<p>Successful!!!</p><a href='listProf.php' >Return to Professors List</a>";
    }else{
        echo "<p>Fail!!</p><a href='listProf.php'>Return to Professors List</a>";
    }
    return;
}
