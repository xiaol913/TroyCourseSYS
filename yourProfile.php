<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 11:35
 */
require_once "include.php";
$id=$_REQUEST['id'];
$sql="select * from troy_students where sId='{$id}'";
$row=fetchOne($sql);
$major=getSubById($row['sMajorId']);
$level=getLevelById($row['level']);
if(checkStudLogin()==false){
    alertMes("Please Login!!!","login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Profile</title>
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <style>
        .table th:first-child {-moz-border-radius:0;-webkit-border-radius: 0;border-radius:  0;}
        .table th:last-child {-moz-border-radius:0;-webkit-border-radius: 0;border-radius:  0;}
    </style>
</head>
<body>
<!--头部框架嵌套-->
<div>
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="129px" scrolling="no"></iframe>
</div>
<form class="table" action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" onsubmit="return FormAdminCheck()" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Your Profile</caption>
        <tr>
            <th align="right">Your Student ID:</th>
            <td><?php echo $row['sId'];?></td>
        </tr>
        <tr>
            <th align="right">Your Username:</th>
            <td><?php echo $row['username'];?></td>
        </tr>
        <tr>
            <th align="right">Your First Name:</th>
            <td><?php echo $row['sFirstName'];?></td>
        </tr>
        <tr>
            <th align="right">Your Last Name:</th>
            <td><?php echo $row['sLastName'];?></td>
        </tr>
        <tr>
            <th align="right">Your Birthday:</th>
            <td><?php echo $row['sBTD'];?></td>
        </tr>
        <tr>
            <th align="right">Your Address:</th>
            <td><?php echo $row['sAddress'];?></td>
        </tr>
        <tr>
            <th align="right">Your Email:</th>
            <td><?php echo $row['sEmail'];?></td>
        </tr>
        <tr>
            <th align="right">Your Phone #:</th>
            <td><?php echo $row['phoneNum'];?></td>
        </tr>
        <tr>
            <th align="right">Your Major:</th>
            <td><?php echo $major['subShortName']."--".$major['subName'];?></td>
        </tr>
        <tr>
            <th align="right">Academic Level:</th>
            <td><?php echo $level['levelName'];?></td>
        </tr>
    </table>
</form>
<div class="st-container" style="height: 30px">
    <!--        nav start-->
    <input type="radio" name="radio-set" id="st-control-1" onclick="window.location.href='index.php'">
    <a href="#st-panel-1">Home</a>
    <input type="radio" name="radio-set" id="st-control-2" onclick="window.location.href='index.php'">
    <a href="#st-panel-2">Academics</a>
    <input type="radio" name="radio-set" id="st-control-3" onclick="window.location.href='index.php'">
    <a href="#st-panel-3">Instructors</a>
    <input type="radio" name="radio-set" id="st-control-4" onclick="window.location.href='index.php'">
    <a href="#st-panel-4">Register</a>
    <input type="radio" name="radio-set" id="st-control-5" checked="checked" onclick="window.location.href='index.php'">
    <a href="#st-panel-5">Yourself</a>
    <!--    nav end-->
</div>
</body>
</html>