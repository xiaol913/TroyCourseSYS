<?php
/**
 * Created by PhpStorm.
 * User: ElliotGa0
 * Date: 16/4/1
 * Time: 12:04
 */
require_once "include.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
</head>
<body>
<!--先建立头部文件-->
<div class="head">
    <!--建立logo，fl为CSS左浮动-->
    <div class="logo fl"><a href="#"></a></div>
    <!--建立头部右边区域文字，并fr右浮动-->
    <div class="operation_user fr">
        <div class="link">
            <?php if(checkStudLogin()==true){?>
                <b style="color:#fff">Welcome,
                    <?php
                    if(isset($_SESSION['TroyCourSYSstudentName'])){
                        echo $_SESSION['TroyCourSYSstudentName'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentName'])){
                        echo $_COOKIE['TroyCourSYSstudentName'];
                    }
                    ?>
                </b>&nbsp;&nbsp;<a href="index.php" target="_parent" style="color:#fff" class="" ><i class="fa fa-home" ></i><span>Home</span></a><a href="#" class="" onclick="history.go(-1)" style="color:#fff"><i class="fa fa-reply"></i><span>Back</span></a><a href="doAction.php?act=studLogout" class="" style="color:#fff"><i class="fa fa-power-off"></i><span>Logout</span></a>
            <?php }?>
        </div>
    </div>
</div>
</body>
</html>