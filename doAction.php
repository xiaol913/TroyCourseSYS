<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/1
 * Time: 18:43
 */

require_once 'include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
$cId=$_REQUEST['cId'];
$sId=$_REQUEST['sId'];
if(checkStudLogin()==false){
    alertMes("Please Login!!!","login.php");
}

if($act==studLogin){
    $mes=studLogin();
}else if($act==studLogout){
    $mes=studLogout();
}elseif($act==search){
    $mes=search();
}elseif($act==register){
    $mes=register($cId,$sId);
}elseif($act==drop){
    $mes=drop($cId,$sId);
}elseif($act==editStudProfile){
    $mes=editStudProfile($id);
}