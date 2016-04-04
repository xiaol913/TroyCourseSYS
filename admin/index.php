<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Troy Courses Management System</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
</head>
<body>
<!--头部框架嵌套-->
<div>
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="106px" scrolling="no"></iframe>
</div>
<!--建立欢迎管理员信息栏，clearfix作用查看css-->
<div class="operation_user clearfix">
    <!--建立一个内部框架，并右浮动-->
    <div class="link fr">
        <b>Welcome,
            <?php
            if(isset($_SESSION['TroyCourSYSadminName'])){
                echo $_SESSION['TroyCourSYSadminName'];
            }elseif(isset($_COOKIE['TroyCourSYSadminName'])){
                echo $_COOKIE['TroyCourSYSadminName'];
            }
            ?>
        </b>&nbsp;&nbsp;<a href="index.php" class="homeBtn20x20"><span>Home</span></a><input type="button" class="backBtn20x20" onclick="history.go(-1)" value="Back"/><a href="doAdminAction.php?act=logout" class="logoutBtn16x16"><span>Logout</span></a>
    </div>
</div>
<!--开始建立主要框架-->
<div class="content clearfix">
    <!--右侧内容，主要内容，含嵌套网页-->
    <div class="main">
        <div class="cont">
            <div class="title">Management System</div>
            <div class="ifrPage">
                <!--嵌套网页-->
                <iframe src="main.php" frameborder="0" name="mainPage" id="mainPage"width="100%" onload="setIframeHeight(this)"></iframe>
            </div>
        </div>
    </div>
    <!--左侧内容，主要为菜单-->
    <div class="menu">
        <div class="cont">
            <div class="title">Menu</div>
            <ul class="mList">
                <!--学科管理菜单-->
                <li>
                    <!--为管理菜单添加一个点击展开事件-->
                    <a href="#" onclick="show('menu1','change1')"><span id="change1">+</span>Subjects Info</a>
                    <dl id="menu1" style="display:none">
                        <!--target是把url传给嵌套程序代码里-->
                        <dd><a href="listSub.php" target="mainPage">Subjects List</a></dd>
                        <dd><a href="addSub.php" target="mainPage">Add Subjects</a></dd>
                    </dl>
                </li>
                <!--课程管理菜单-->
                <li>
                    <a href="#" onclick="show('menu2','change2')"><span id="change2">+</span>Courses Info</a>
                    <dl id="menu2" style="display:none">
                        <dd><a href="listCour.php" target="mainPage">Courses List</a></dd>
                        <dd><a href="addCour.php" target="mainPage">Add Courses</a></dd>
                    </dl>
                </li>
                <!--学生管理菜单-->
                <li>
                    <a href="#" onclick="show('menu3','change3')"><span id="change3">+</span>Students Info</a>
                    <dl id="menu3" style="display:none">
                        <dd><a href="listStud.php" target="mainPage">Students List</a></dd>
                        <dd><a href="addStud.php" target="mainPage">Add Student</a></dd>
                    </dl>
                </li>
                <!--导师管理菜单-->
                <li>
                    <a href="#" onclick="show('menu4','change4')"><span id="change4">+</span>Professor Info</a>
                    <dl id="menu4" style="display:none">
                        <dd><a href="listProf.php" target="mainPage">Professors List</a></dd>
                        <dd><a href="addProf.php" target="mainPage">Add Professor</a></dd>
                    </dl>
                </li>
<!--                学期管理菜单-->
                <li>
                    <a href="#" onclick="show('menu5','change5')"><span id="change5">+</span>Term Info</a>
                    <dl id="menu5" style="display:none">
                        <dd><a href="listTerm.php" target="mainPage">Term List</a></dd>
                        <dd><a href="addTerm.php" target="mainPage">Term Professor</a></dd>
                    </dl>
                </li>
                <!--管理员管理菜单，通过level判断是否显示-->
                <li>
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
                    <a href="#" onclick="show('menu6','change6')"><span id="change6">+</span>Administrators</a>
                    <dl id="menu6" style="display:none">
                        <dd><a href="listAdmin.php" target="mainPage">Admin List</a></dd>
                        <dd><a href="addAdmin.php" target="mainPage">Add Admin</a></dd>
                        <?php endif;?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--底部框架嵌套-->
<div>
    <iframe src="footer.php" frameborder="0" name="footerFrame" width="100%" height="103px" scrolling="no"></iframe>
</div>
<script type="text/javascript">
    //        菜单展开脚本
    function show(fst,snd){
        var menu = document.getElementById(fst);
        var change = document.getElementById(snd);
        //            菜单名+号变化
        if(change.innerHTML=="+"){
            change.innerHTML="-";
        }else{
            change.innerHTML="+";
        }
        //            展开菜单
        if(menu.style.display=='none'){
            menu.style.display='';
        }else{
            menu.style.display='none';
        }
    }

    window.onload = function () {
        setIframeHeight(document.getElementById('indexFrame'));
    }
    //嵌套页面自适应内容页面高度
    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            }
        }
    }
</script>
</body>
</html>