<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 20:27
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="css/backstage.css">
</head>
<body>
    <!--头部框架嵌套-->
    <div>
        <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="106px" scrolling="no"></iframe>
    </div>
<!--    登录表单-->
    <div class="loginBox">
        <form class="login_cont" cellpadding="0" cellspacing="0" action="doAdminAction.php?act=login" method="post">
            <ul class="login">
                <li class="f_txt">Admin ID:</li>
                <li class="f_inp"><input type="text" name="username" class="login_input"></li>
                <li class="f_txt">Password:</li>
                <li class="f_inp"><input type="password" name="password" class="login_input"></li>
                <li class="f_txt">Verification:</li>
                <li class="f_inp"><input type="text" name="verify" class="login_input"></li>
                <img src="../getVerify.php" alt="">
                <li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">Stay signed in one week</label></li>
                <li><input type="submit" value="Login" class="login64x64"></li>
            </ul>
        </form>
    </div>
    <!--底部框架嵌套-->
    <div>
        <iframe src="footer.php" frameborder="0" name="footerFrame" width="100%" height="103px" scrolling="no"></iframe>
    </div>
</body>
</html>