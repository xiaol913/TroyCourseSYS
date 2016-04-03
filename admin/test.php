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
            <ul class="nav">
                <li><a href="#">Subjects</a>
                    <ul class="nav2">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Addition</a></li>
                    </ul>
                </li>
                <li><a href="#">Courses</a>
                    <ul class="nav2">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Addition</a></li>
                    </ul>
                </li>
                <li><a href="#">Students</a>
                    <ul class="nav2">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Addition</a></li>
                    </ul>
                </li>
                <li><a href="#">Professors</a>
                    <ul class="nav2">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Addition</a></li>
                    </ul>
                </li>
                <li><a href="#">Administrators</a>
                    <ul class="nav2">
                        <li><a href="#">List</a></li>
                        <li><a href="#">Addition</a></li>
                    </ul>
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
        showSecondMenu();
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
    //menu菜单显示和隐藏
    function showFirstMenu() {
        n1.style.display='';
        n2.style.display='';
        n3.style.display='';
        n4.style.display='';
        n5.style.display='';
    }
    function closeFirstMenu() {
        n1.style.display='none';
        n2.style.display='none';
        n3.style.display='none';
        n4.style.display='none';
        n5.style.display='none';
    }
    //显示二级菜单
   /* function showSecondMenu() {
        var allLi=document.getElementsByTagName('li');
        for(var i=0;i<allLi.length;i++){
//                鼠标移上时
            allLi[i].onmouseover=function () {
                var allUl=this.getElementsByTagName('ul')[0];
                if(allUl){
                    clearInterval(allUl.time);
                    allUl.time=setInterval(function () {
                        allUl.style.height=allUl.offsetHeight+6+"px";
                        if(allUl.offsetHeight>=50)
                            clearInterval(allUl.time);
                    },50);
                }
            }
//                鼠标移出时
            allLi[i].onmouseout=function () {
                var allUl=this.getElementsByTagName('ul')[0];
                if(allUl) {
                    clearInterval(allUl.time);
                    allUl.time = setInterval(function () {
                        allUl.style.height = allUl.offsetHeight - 6 + "px";
                        if (allUl.offsetHeight <= 0)
                            clearInterval(allUl.time);
                    }, 50);
                }
            }
        }
    }*/
</script>
</body>
</html>