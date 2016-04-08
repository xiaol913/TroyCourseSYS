<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Side Menu</title>
    <link rel="stylesheet" href="css/nav.css" type="text/css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <style>
        body{overflow: hidden;}
    </style>
</head>
<body>
<!--头部框架嵌套-->
<div>
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="129px" scrolling="no"></iframe>
</div>
<!--中间嵌套区-->
<div class="ifrPage">
    <!--嵌套网页-->
    <iframe src="main.php" frameborder="0" name="mainPage" id="mainPage"width="100%" height="50%" ></iframe>
</div>
<!--侧边导航-->
<nav class="main-menu">
    <div class="scrollBar" id="style-1">
        <ul style="padding-left: 0px">
            <li>
                <a href="#">
                    <i class="fa fa-sitemap fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Subjects Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listSub.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addSub.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-book fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Courses Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listCour.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addCour.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-users fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Students Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listStud.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addStud.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-reddit-alien fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Professor Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listProf.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addProf.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-tasks fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Term Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listTerm.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addTerm.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> Add</span>
                </a>
            </li>
            <?php
            if(isset($_SESSION['TroyCourSYSadminId'])){
                $userId=$_SESSION['TroyCourSYSadminId'];
            }elseif(isset($_COOKIE['TroyCourSYSadminId'])){
                $userId=$_COOKIE['TroyCourSYSadminId'];
            }
            //通过该ID查找管理员的level
            $sql="select level from troy_admins where id=".$userId;
            $serLvl=fetchOne($sql);
            $lvl=$serLvl['level'];
            if($lvl==1):
                ?>
            <li class="">
                <a href="#">
                    <i class="fa fa-user-secret fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Administrators</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listAdmin.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Admin List</span>
                </a>
            </li>
                <li class="darkerlishadowdown">
                    <a href="addAdmin.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add Admin</span>
                </a>
            </li>
            <?php endif;?>
        </ul>
    </div>
</nav>
<!--底部框架嵌套-->
<div class="footer cilearfix">
    <p><span>Troy University, Troy, Alabama 36082 | </span><a href="tel:+18004145756">1-800-414-5756</a><span> | </span>
        <a href="http://sos.troy.edu/" target="_blank">Emergency Information</a><span> | </span><a href="http://splash.troy.edu/feedback/" target="_blank">Send us your comments</a>
        <span> | </span><a href="http://trojan.troy.edu/students/documents/TROY-Student-Complaint-Policy-and-Form.pdf" target="_blank">Student Complaints</a>
        <span> | </span><a href="http://trojan.troy.edu/privacy-statement.html" target="_blank">Privacy Statement</a><span> | </span><a href="http://trojan.troy.edu/disclaimer.html" target="_blank">Read Our Disclaimer</a>
        <span> | </span><a href="http://trojan.troy.edu/accreditation.html" target="_blank">Accreditation Statement</a><span> | </span><a href="http://splash.troy.edu/go-to/jobs/" target="_blank">Employment</a>
        <i> © 1996-2016 Troy University </i>
    </p>
</div>
<script>
    window.onload = function () {
        window.setInterval("setIframeHeight()",200);
    }
    //嵌套页面自适应内容页面高度
    function setIframeHeight() {
        var iframe=document.getElementById("mainPage");
        var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
        iframe.height = Math.max(iframeWin.document.body.scrollHeight, iframeWin.document.documentElement.scrollHeight);
    }
</script>
</body>
</html>