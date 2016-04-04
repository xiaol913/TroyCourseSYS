<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 18:26
 */

/**
 *  得到所有学期信息
 * @return array
 */
function getAllTerm(){
    $sql="select * from troy_term";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 添加学期
 */
function addTerm(){
    $arr=$_POST;
    if(insert("troy_term",$arr)){
        echo "Successful!!!<br/><a href='listTerm.php'>Return to Term List</a>";
    }else{
        echo "Fail!!!<br/><a href='listTerm.php'>Return to Terms List</a>";
    }
    return;
}

/**
 * 修改学期
 * @param $id
 */
function editTerm($id){
    $arr=$_POST;
    if(update("troy_term",$arr,"id={$id}")){
        echo "Successful!!!<br/><a href='listTerm.php'>Return to Term List</a>";
    }else{
        echo "Fail!!!<br/><a href='listTerm.php'>Return to Term List</a>";
    }
    return;
}

/**
 *  删除学期
 * @param $id
 */
function delTerm($id){
    if (delete("troy_term", "id={$id}")) {
        echo "Successful!!!<br/><a href='listTerm.php'>Return to Term List</a>";
    } else {
        echo "Fail!!!<br/><a href='listTerm.php'>Return to Term List</a>";
    }
    return;
}

/**
 *  通过ID找学期信息
 * @param $id
 * @return array|null
 */
function getTermById($id){
    $sql="select * from troy_term where id={$id}";
    return fetchOne($sql);
}