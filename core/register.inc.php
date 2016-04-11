<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 9:14
 */

/**
 *  注册课程
 * @param $cId
 * @param $sId
 */
function register($cId,$sId){
    $arr['cId']=$cId;
    $arr['sId']=$sId;
    $where = "courseId={$cId}";
    $sql="select courseAvai from troy_courses WHERE courseId={$cId}";
    $res=fetchOne($sql);
    $regH="select * from troy_register WHERE cId={$cId} AND sId={$sId}";
    $result=fetchOne($regH);
    if($regH){
        echo "You have registered this course!!!<br/><a href='index.php'>Return to Home page</a>";
        exit;
    }
    foreach ($res as $num)
        $newNum=$num-1;
    if($newNum<0){
        echo "This course can not be register!!<br/><a href='index.php'>Return to Home page</a>";
        exit;
    }
    if($newNum==0){
        $courArr['courseStat']=2;
    }
    $courArr['courseAvai']=$newNum;
    if(insert("troy_register",$arr)){
        if(update("troy_courses",$courArr,$where)){
            echo "Successful!!!<br/><a href='index.php'>Return to Home page</a>";
        }else{
            echo "Fail!!!<br/><a href='index.php'>Return to Home page</a>";
        }
    }else{
        echo "Fail!!!<br/><a href='index.php'>Return to Home page</a>";
    }
    return;
}

/**
 *  找到所有注册信息
 * @return array
 */
function getRegisterByStudentId($id){
    $where = "sId={$id}";
    $sql="select * from troy_register WHERE {$where}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * drop课程
 * @param $cId
 * @param $sId
 */
function drop($cId,$sId){
    $where="cId={$cId} and sId={$sId}";
    $sql="select courseAvai from troy_courses WHERE courseId={$cId}";
    $res=fetchOne($sql);
    $whereCour="courseId={$cId}";
    foreach ($res as $num)
        $newNum=$num+1;
    $courArr['courseAvai']=$newNum;
    if($newNum>=0){
        $courArr['courseStat']=1;
    }
    if(delete("troy_register",$where)) {
        if (update("troy_courses", $courArr, $whereCour)) {
            echo "Successful!!!<br/><a href='dropCour.php?id={$sId}'>Return to Drop Course page</a>";
        } else {
            echo "Fail!!!<br/><a href='index.php'>Return to Search and Register page</a>";
        }
    }else{
        echo "Fail!!!<br/><a href='dropCour.php?id={$sId}''>Return to Drop Course page</a>";
    }
    return;
}