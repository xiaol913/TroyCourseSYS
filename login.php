<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/6
 * Time: 17:47
 */
require_once "include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses System</title>
    <link href="css/studLogin.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="body"></div>
<div class="grad"></div>
<div class="header">
    <div><span>Courses</span>System</div><div>@Troy</div>
</div>
<br>
<div class="login">
    <form cellpadding="0" cellspacing="0" style="margin-top: 20px;margin-left:220px;width:240px" action="doAction.php?act=studLogin" method="post">
        <input type="text" placeholder="username" name="username"><br>
        <input type="password" placeholder="password" name="password"><br><br>
        <input type="text" name="verify" placeholder="verify"><br>
        <img src="getVerify.php" alt="">
        <input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">Keep one week</label>
        <input type="submit" value="Login"><br>
        <a href="admin/login.php">I'm administrator.</a>
    </form>
</div>
</body>
</html>