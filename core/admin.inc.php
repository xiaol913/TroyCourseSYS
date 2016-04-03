<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 21:55
 */

/**
 * 检查管理员是否存在
 * @param $sql
 * @return array|null
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 检查是否为高级管理员
 */
function checkLevel(){
    if(isset($_SESSION['TroyCourSYSadminId'])){
        $userId=$_SESSION['TroyCourSYSadminId'];
    }elseif(isset($_COOKIE['TroyCourSYSadminId'])){
        $userId=$_COOKIE['TroyCourSYSadminId'];
    }
    //通过该ID查找管理员的level
    $sql="select level from troy_admins where id=".$userId;
    $serLvl=fetchOne($sql);
    $lvl=$serLvl['level'];
    if(!($lvl==1)){
        alertMes("No Permission!!","index.php");
    }
}

/**
 * 检查管理员是否登录
 */
function checkLogined(){
    if($_SESSION['TroyCourSYSadminId']==""&&$_COOKIE['TroyCourSYSadminId']==""){
        alertMes("Please Log in!!","login.php");
    }
}

/**
 * 管理员注销
 */
function logout(){
    $_SESSION=array();
/*    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }*/
    if(isset($_COOKIE['TroyCourSYSadminId'])){
        setcookie("TroyCourSYSadminId","",time()-1);
    }
    if(isset($_COOKIE['TroyCourSYSadminName'])){
        setcookie("TroyCourSYSadminName","",time()-1);
    }
    session_destroy();
    alertMes("Bye Bye!!","login.php");
}

/**
 * 得到所有管理员信息，并分页
 * 默认1页显示2条数据
 * @param $page
 * @param int $pageSize
 * @return array
 */
function getAdminByPage($page,$pageSize=2){
    $sql="select * from troy_admins";
    global $totalRows;
    $totalRows=getResultNum($sql);
    global $totalPage;
    $totalPage=ceil($totalRows/$pageSize);
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }
    if($page>=$totalPage)$page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql="select id,username,email from troy_admins limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 删除管理员
 * @param $id
 * @return string
 */
function delAdmin($id){
    if(delete("troy_admins","id={$id}")){
        echo "Delete Successful!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }else{
        echo "Delete Fail!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }
    return;
}

/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(insert("troy_admins",$arr)){
        echo "Successful!!!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }else{
        echo "Fail!!!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }
    return;
}

/**
 * 修改管理员
 * @param $id
 */
function editAdmin($id){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(update("troy_admins", $arr,"id={$id}")){
        echo "Successful!!!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }else{
        echo "Fail!!!<br/><a href='listAdmin.php'>Return to Administrators List</a>";
    }
    return;
}

/**
 * 管理员登录
 */
function login(){
    $username = $_POST['username'];
//使用反斜线重新定义$username
    $username = addslashes($username);
    $password = md5($_POST['password']);
    $verify = $_POST['verify'];
    $verify1 = $_SESSION['verify'];
    $autoFlag = $_POST['autoFlag'];

//验证验证码是否输入正确
    if($verify==$verify1){
        $sql="select * from troy_admins where username='{$username}' and password='{$password}'";
        $row=checkAdmin($sql);
        if($row){
            $id=$row['id'];
            $username=$row['username'];
            //检查是否选择了一周自动登录
            if($autoFlag){
                setcookie("TroyCourSYSadminId",$id,time()+7*24*3600);
                setcookie("TroyCourSYSadminName",$username,time()+7*24*3600);
            }
            $_SESSION['TroyCourSYSadminName']=$row['username'];
            $_SESSION['TroyCourSYSadminId']=$row['id'];
            alertMes("Successful!!","index.php");
        }else{
            alertMes("ID or Password is wrong!!","login.php");
        }
    }else{
        alertMes("Verification Wrong!!","login.php");
    }
}