<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/9
 * Time: 0:14
 */

require_once "../include.php";
$termInfos=getAllTerm();
$subInfos=getAllSub();
$levelInfos=getAllLevel();
$courInfos=getAllCour();
$profInfos=getAllProf();
checkLogined();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Troy Courses System</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <style>
        body{overflow: hidden;}
    </style>
</head>
<body>
<!--head-->
<div class="head">
    <!--建立logo，fl为CSS左浮动-->
    <div class="logo fl"><a href="#"></a></div>
    <!--建立头部右边区域文字，并fr右浮动-->
    <div class="operation_user fr">
        <div class="link">
            <b style="color:#fff">Welcome,
                <?php
                if(isset($_SESSION['TroyCourSYSadminName'])){
                    echo $_SESSION['TroyCourSYSadminName'];
                }elseif(isset($_COOKIE['TroyCourSYSadminName'])){
                    echo $_COOKIE['TroyCourSYSadminName'];
                }
                ?>
            </b>&nbsp;&nbsp;<a href="index.php" style="color:#fff" class="" ><i class="fa fa-home"></i><span>Home</span></a><a href="#" class="" onclick="history.go(-1)" style="color:#fff"><i class="fa fa-reply"></i><span>Back</span></a><a href="doAdminAction.php?act=logout" class="" style="color:#fff"><i class="fa fa-power-off"></i><span>Logout</span></a>
        </div>
    </div>
</div>
<!--main page-->
<div class="container">
    <div class="st-container">
        <!--        nav start-->
        <input type="radio" name="radio-set" id="st-control-1" checked="checked">
        <a href="#st-panel-1">Home</a>
        <input type="radio" name="radio-set" id="st-control-2">
        <a href="#st-panel-2">Academics</a>
        <input type="radio" name="radio-set" id="st-control-3">
        <a href="#st-panel-3">Personnel</a>
        <input type="radio" name="radio-set" id="st-control-4">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5">
        <a href="#st-panel-5">Administrators</a>
        <!--    nav end-->
        <!--    scroll start-->
        <div class="st-scroll">
            <!--            first section-->
            <section class="st-panel-1" id="st-panel-1">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <h2>Troy Courses Backstage System</h2>
                <p>You can manage Academics, Instructor, Student, and so on.</p>
            </section>
            <!--                second section-->
            <section class="st-panel-2 st-color" id="st-panel-2">
                <div class="st-desc-white-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-white-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn1">
                    <div class="st-btn-1"><input type="button" onclick="window.location.href='listSub.php'" id="st-control-2-1" ><a href="#">Subjects List</a><i style="color:#fff" class="fa fa-building-o fa-5x"></i></div>
                    <div class="st-btn-2"><input type="button" id="st-control-2-2" onclick="window.location.href='addSub.php'"><a href="#">Add Subject</a><i style="color:#fff" class="fa fa-sign-in fa-5x"></i></div>
                    <div class="st-btn-3"><input type="button" id="st-control-2-3" onclick="window.location.href='listCour.php'"><a href="#" onclick="">Courses List</a><i style="color:#fff" class="fa fa-book fa-5x"></i></div>
                    <div class="st-btn-4"><input type="button" id="st-control-2-4" onclick="window.location.href='addCour.php'"><a href="#" onclick="">Add Course</a><i style="color:#fff" class="fa fa-share-square fa-5x"></i></div>
                </div>
            </section>
            <!--            third section-->
            <section class="st-panel-3" id="st-panel-3">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-red-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn2">
                    <div class="st-btn-5"><input type="button" onclick="window.location.href='listProf.php'" id="st-control-3-1" ><a href="#">Instructors List</a><i style="color:#a12638" class="fa fa-users fa-5x"></i></div>
                    <div class="st-btn-6"><input type="button" id="st-control-3-2" onclick="window.location.href='addProf.php'"><a href="#">Add Instructor</a><i style="color:#a12638" class="fa fa-thumb-tack fa-5x"></i></div>
                    <div class="st-btn-7"><input type="button" onclick="window.location.href='listStud.php'" id="st-control-3-3" ><a href="#">Students List</a><i style="color:#a12638" class="fa fa-smile-o fa-5x"></i></div>
                    <div class="st-btn-8"><input type="button" id="st-control-3-4" onclick="window.location.href='addStud.php'"><a href="#">Add Student</a><i style="color:#a12638" class="fa fa-hand-o-down fa-5x"></i></div>
                </div>
            </section>
            <!--            fourth section-->
            <section class="st-panel-4  st-color" id="st-panel-4">
                <div class="st-desc-white-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-white-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn3">
                    <div class="st-btn-9"><input type="button" onclick="window.location.href='listTerm.php'" id="st-control-4-1" ><a href="#">Term List</a><i style="color:#fff" class="fa fa-tags fa-5x"></i></div>
                    <div class="st-btn-10"><input type="button" id="st-control-4-2" onclick="window.location.href='addTerm.php'"><a href="#">Add Term</a><i style="color:#fff" class="fa fa-upload fa-5x"></i></div>
                </div>
            </section>
            <!--            fifth section-->
            <section class="st-panel-5" id="st-panel-5">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-red-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn4">
                    <div class="st-btn-11"><input type="button" onclick="window.location.href='listAdmin.php'" id="st-control-5-1" ><a href="#">Admins List</a><i style="color:#a12638" class="fa fa-user-secret fa-5x"></i></div>
                    <div class="st-btn-12"><input type="button" id="st-control-5-2" onclick="window.location.href='addAdmin.php'"><a href="#">Add Admin</a><i style="color:#a12638" class="fa fa-user-plus fa-5x"></i></div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>

