<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 0:30
 */

require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
$imgId=$_REQUEST['imgId'];
if($act=="logout") {
    logout();
}elseif($act=="login") {
    $mes=login();
}elseif($act=="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addAdmin"){
    $mes=addAdmin();
}elseif($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif($act=="addSub"){
    $mes=addSub();
}elseif($act=="editSub"){
    $mes=editSub($id);
}elseif($act=="delSub"){
    $mes=delSub($id);
}elseif($act=="addCour"){
    $mes=addCour();
}elseif($act=="editCour"){
    $mes=editCour($id);
}elseif($act=="delCour"){
    $mes=delCour($id);
}elseif($act=="delProf"){
    $mes=delProf($id);
}elseif($act=="addProf") {
    $mes = addProf();
}elseif($act=="editProf"){
    $mes=editProf($id);
}elseif($act=="delImg"){
    $mes=delImg($id,$imgId);
}elseif($act=="addStud"){
    $mes=addStud();
}elseif($act=="editStud"){
    $mes=editStud($id);
}elseif($act=="delStud"){
    $mes=delStud($id);
}elseif ($act=="addTerm"){
    $mes=addTerm();
}elseif ($act=="editTerm"){
    $mes=editTerm($id);
}elseif ($act=="delTerm"){
    $mes=delTerm($id);
}