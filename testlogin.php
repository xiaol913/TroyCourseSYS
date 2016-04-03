<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/1
 * Time: 18:39
 */
require_once "include.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>testlogin</title>
</head>
<body>
<div class="loginBox">
    <form class="" cellpadding="0" cellspacing="0" action="doAction.php?act=studLogin" method="post">
        <ul class="login">
            <li class="f_txt">Username:</li>
            <li class="f_inp"><input type="text" name="username" class="login_input"></li>
            <li class="f_txt">Password:</li>
            <li class="f_inp"><input type="password" name="password" class="login_input"></li>
            <li class="f_txt">Verification:</li>
            <li class="f_inp"><input type="text" name="verify" class="login_input"></li>
            <img src="getVerify.php" alt="">
            <li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">Stay signed in one week</label></li>
            <li><input type="submit" value="Login" class="login64x64"></li>
        </ul>
    </form>
</div>
</body>
</html>
