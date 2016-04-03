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

if($act==studLogin){
    $mes=studLogin();
}else if($act==studLogout){
    $mes=studLogout();
}