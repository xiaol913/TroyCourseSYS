<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 15:14
 */

/**
 * 添加学科
 */
function addSub(){
    $arr=$_POST;
    if(insert("troy_subjects",$arr)){
        echo "Successful!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
    }else{
        echo "Fail!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
    }
    return;
}

/**
 * 根据ID找到指定学科信息
 * @param $id
 * @return array|null
 */
function getSubById($id){
    $sql="select id,subShortName,subName from troy_subjects where id={$id}";
    return fetchOne($sql);
}

/**
 *  修改学科信息
 * @param $id
 */
function editSub($id){
    $arr=$_POST;
    if(update("troy_subjects",$arr,"id={$id}")){
        echo "Successful!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
    }else{
        echo "Fail!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
    }
    return;
}

/**
 * 根据ID删除该学科信息
 * @param $id
 */
function delSub($id){
//    检查是否还有课程存在
    $res=checkCoursesExist($id);
    if(!$res) {
        if (delete("troy_subjects", "id={$id}")) {
            echo "Successful!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
        } else {
            echo "Fail!!!<br/><a href='listSub.php'>Return to Subjects List</a>";
        }
        return;
    }else{
        alertMes("Please delete all courses in this Academic Program first!!", "listSub.php");
    }
}

/**
 * 得到所有学科
 * @return array
 */
function getAllSub(){
    $sql="select id,subShortName,subName from troy_subjects";
    $rows=fetchAll($sql);
    return $rows;
}