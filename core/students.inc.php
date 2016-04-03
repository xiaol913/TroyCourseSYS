<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/30
 * Time: 16:14
 */

/**
 * 添加学生信息
 */
function addStud(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(insert("troy_students",$arr)){
        echo "Successful!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }else{
        echo "Fail!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }
    return;
}

/**
 * 修改学生信息
 * @param $id
 */
function editStud($id){
    $where="sId={$id}";
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(update("troy_students",$arr,$where)){
        echo "Successful!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }else{
        echo "Fail!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }
    return;
}

/**
 * 删除学生信息
 * @param $id
 */
function delStud($id){
    $where="sId={$id}";
    if(delete("troy_students",$where)){
        echo "Successful!!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }else{
        echo "Fail!!!<br/><a href='listStud.php'>Return to Students List</a>";
    }
    return;
}

/**
 * 检查学生账号是否存在
 * @param $sql
 * @return array|null
 */
function checkStudent($sql){
    return fetchOne($sql);
}

/**
 * 学生登录
 */
function studLogin(){
    $username = $_POST['username'];
//使用反斜线重新定义$username
    $username = addslashes($username);
    $password = md5($_POST['password']);
    $verify = $_POST['verify'];
    $verify1 = $_SESSION['verify'];
    $autoFlag = $_POST['autoFlag'];

//验证验证码是否输入正确
    if($verify==$verify1){
        $sql="select * from troy_students where username='{$username}' and password='{$password}'";
        $row=checkStudent($sql);
        /*验证代码
        print_r($row);
        echo "<br>--1-<br>";*/
        if($row){
            $id=$row['sId'];
            $username=$row['username'];
            /*证代码
            print_r($id);
            echo "<br>-2--<br>";
            print_r($username);
            echo "<br>--3-<br>";*/
            //检查是否选择了一周自动登录
            if($autoFlag){
                setcookie("TroyCourSYSstudentId",$id,time()+7*24*3600);
                setcookie("TroyCourSYSstudentName",$username,time()+7*24*3600);
            }
            $_SESSION['TroyCourSYSstudentName']=$row['username'];
            $_SESSION['TroyCourSYSstudentId']=$row['sId'];
            /*验证代码
            print_r($_SESSION['TroyCourSYSstudentId']);
            echo "<br>--4-<br>";
            print_r($_COOKIE['TroyCourSYSstudentId']);*/
            alertMes("Successful!!","index.php");
        }else{
            alertMes("ID or Password is wrong!!","index.php");
        }
    }else{
        alertMes("Verification Wrong!!","index.php");
    }
}

/**
 * 检查学生是否登录
 * @return bool
 */
function checkStudLogin(){
    if($_SESSION['TroyCourSYSstudentId']==""&&$_COOKIE['TroyCourSYSstudentId']==""){
        return false;
    }else{
        return true;
    }
}

/**
 * 学生注销
 */
function studLogout(){
    $_SESSION=array();
    /*    if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),"",time()-1);
        }*/
    if(isset($_COOKIE['TroyCourSYSstudentId'])){
        setcookie("TroyCourSYSstudentId","",time()-1);
    }
    if(isset($_COOKIE['TroyCourSYSstudentName'])){
        setcookie("TroyCourSYSstudentName","",time()-1);
    }
    session_destroy();
    alertMes("Bye Bye!!","index.php");
}