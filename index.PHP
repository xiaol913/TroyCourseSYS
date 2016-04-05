<?php
/**
 * Created by PhpStorm.
 * User: ElliotGa0
 * Date: 16/4/1
 * Time: 11:12
 */
require_once "include.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <title>Troy Courses System</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<!--先构建头部嵌套-->
<div class="">
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="129px" scrolling="no"></iframe>
</div>
<!--登录区-->
<div class="operation_user clearfix">
    <!--建立一个内部框架，并右浮动-->
    <div class="link fr">
        <?php if(checkStudLogin()==true){?>
        <b>Welcome,
            <?php
            if(isset($_SESSION['TroyCourSYSstudentName'])){
                echo $_SESSION['TroyCourSYSstudentName'];
            }elseif(isset($_COOKIE['TroyCourSYSstudentName'])){
                echo $_COOKIE['TroyCourSYSstudentName'];
            }
            ?>
        </b>&nbsp;&nbsp;<a href="index.php" class="homeBtn20x20"><span>Home</span></a><input type="button" class="backBtn20x20" onclick="history.go(-1)" value="Back"/><a href="doAction.php?act=studLogout" class="logoutBtn16x16"><span>Logout</span></a>
        <?php }else{?>
        <input type="button" class="loginBtn16x16" value="Login" onclick="loginBox.style.display=''">
            <div id="loginBox" class="loginBox" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;display: none; background-color: #e0e0e0;opacity:0.9;z-index:2;">
            <div style="position: fixed;top: 25%;left:35%;width: 500px;z-index:2;padding: 10px 25px 10px 10px;background: url(img/TROY-login.png) no-repeat top left white ;opacity: 1.0;">
                <div style="padding-left: 230px;width: 100%;color:#a12638">Troy Courses System</div>
                <form cellpadding="0" cellspacing="0" style="margin-top: 20px;margin-left:220px;width:240px" action="doAction.php?act=studLogin" method="post">
                    <ul class="login">
                        <li class="f_txt">Username:</li>
                        <li class="f_inp"><input type="text"  name="username" class="login_input"></li>
                        <li class="f_txt">Password:</li>
                        <li class="f_inp"><input type="password" name="password" class="login_input"></li>
                        <li class="f_txt">Verification:</li>
                        <li class="f_inp"><input type="text" name="verify" class="login_input"></li>
                        <img src="getVerify.php" alt="">
                        <li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">Stay signed in one week</label></li>
                        <li>
                            <input type="submit" value="Login" class="loginBtn64x64">
                            <input type="button" value="Close" class="closeBtn24x24" onclick="loginBox.style.display='none'">
                        </li>
                    </ul>
                </form>
            </div>
            </div>
            <?php };?>
    </div>
</div>
<!--菜单区-->
<div class="menu">
    <ul class="nav">
        <li><a href="#" onclick="showFirstMenu()">Menu</a>
        </li>
        <li id="n1" style="display: none;width: 25px;;" onclick="closeFirstMenu()"><input type="button" class="closeMenu16x16" value="">
        </li>
        <li id="n2" style="display: none"><a href="http://troy.edu">troy.edu</a>
        </li>
        <li id="n3" style="display: none"><a href="#">Academics</a>
            <ul class="nav2">
                <li><a href="undergradList.php" target="indexFrame">Undergrad</a></li>
                <li><a href="graduateList.php" target="indexFrame">Graduate</a></li>
                <li><a href="educationList.php" target="indexFrame">Education</a></li>
                <li><a href="doctorateList.php" target="indexFrame">Doctorate</a></li>
            </ul>
        </li>
        <li id="n4" style="display: none"><a href="profList.php" target="indexFrame">Instructors</a>
        </li>
        <li id="n5" style="display: none"><a href="#">Registration</a>
            <ul class="nav2">
                <li><a href="search.php" target="indexFrame">Search</a></li>
                <?php if(checkStudLogin()==true):?>
                <li><a href="searchAndRegister.php" target="indexFrame">Register</a></li>
                <li><a href="dropCour.php?id=<?php
                    if(isset($_SESSION['TroyCourSYSstudentId'])){
                        echo $_SESSION['TroyCourSYSstudentId'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                        echo $_COOKIE['TroyCourSYSstudentId'];
                    }
                    ?>" target="indexFrame">Drop</a></li>
                <?php endif;?>
            </ul>
        </li>
        <?php if(checkStudLogin()==true):?>
        <li id="n6" style="display: none"><a href="#">About You</a>
            <ul class="nav2">
                <li><a href="yourProfile.php?id=<?php
                    if(isset($_SESSION['TroyCourSYSstudentId'])){
                        echo $_SESSION['TroyCourSYSstudentId'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                        echo $_COOKIE['TroyCourSYSstudentId'];
                    }
                    ?>" target="indexFrame">Your Profile</a></li>
                <li><a href="studSetting.php?id=<?php
                    if(isset($_SESSION['TroyCourSYSstudentId'])){
                        echo $_SESSION['TroyCourSYSstudentId'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                        echo $_COOKIE['TroyCourSYSstudentId'];
                    }
                    ?>" target="indexFrame">Setting</a></li>
            </ul>
        </li>
        <?php endif;?>
    </ul>
</div>
<!--主要内容嵌套区-->
<div>
    <iframe name="indexFrame" src="main.php" frameborder="0" id="indexFrame" width="100%" ></iframe>
</div>
<!--底部嵌套-->
<div class="">
    <iframe src="footer.php" frameborder="0" name="footerFrame" width="100%" height="103px" scrolling="no"></iframe>
</div>

<script type="text/javascript">
//    页面加载时加载的函数
    window.onload = function () {
        showSecondMenu();
        window.setInterval("setIframeHeight()",200);
    }
//嵌套页面自适应内容页面高度
    function setIframeHeight() {
        var iframe=document.getElementById("indexFrame");
        var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
        iframe.height = Math.max(iframeWin.document.body.scrollHeight, iframeWin.document.documentElement.scrollHeight);
    }
//menu菜单显示和隐藏
    function showFirstMenu() {
        n1.style.display='';
        n2.style.display='';
        n3.style.display='';
        n4.style.display='';
        n5.style.display='';
        n6.style.display='';
    }
    function closeFirstMenu() {
        n1.style.display='none';
        n2.style.display='none';
        n3.style.display='none';
        n4.style.display='none';
        n5.style.display='none';
        n6.style.display='none';
    }
//显示二级菜单
    function showSecondMenu() {
    var allLi=document.getElementsByTagName('li');
    for(var i=0;i<allLi.length;i++){
//                鼠标移上时
        allLi[i].onmouseover=function () {
            var allUl=this.getElementsByTagName('ul')[0];
            if(allUl){
                clearInterval(allUl.time);
                allUl.time=setInterval(function () {
                    allUl.style.height=allUl.offsetHeight+6+"px";
                    if(allUl.offsetHeight>=100)
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
}
</script>
</body>
</html>