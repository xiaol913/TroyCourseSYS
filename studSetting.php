<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 11:51
 */
require_once "include.php";
$id=$_REQUEST['id'];
$sql="select * from troy_students where sId='{$id}'";
//得到该学生信息
$studInfo=getStudById($id);
//得到所有等级信息
$levelInfos=getAllLevel();
$row=fetchOne($sql);
$major=getSubById($row['sMajorId']);
$level=getLevelById($row['level']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Setting</title>
    <script src="admin/js/formVerify.js" type="text/javascript"></script>
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
</head>
<body>
<!--头部框架嵌套-->
<div>
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="129px" scrolling="no"></iframe>
</div>
<form class="table" action="doAction.php?act=editStudProfile&id=<?php echo $id;?>" onsubmit="return FormProfileCheck()" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Setting</caption>
        <tr>
            <th align="right">Your Student ID:</th>
            <td><?php echo $row['sId'];?></td>
        </tr>
        <tr>
            <th align="right">Password</th>
            <td><input type="password" name="password" value=""/><span style="color:#a12638;font-size:8px;"><li>(6-20 characters long</li><li>First character must be uppercase letter</li><li>Can't be a same type)</li></span></td>
        </tr>
        <tr>
            <th align="right">Your First Name:</th>
            <td><?php echo $studInfo['sFirstName'];?></td>
        </tr>
        <tr>
            <th align="right">Your Last Name:</th>
            <td><?php echo $studInfo['sLastName'];?></td>
        </tr>
        <tr>
            <th align="right">Your Birthday:</th>
            <td><?php echo $studInfo['sBTD'];?></td>
        </tr>
        <tr>
            <th align="right">Your Address:</th>
            <td><input type="text" name="sAddress" value="<?php echo $studInfo['sAddress'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 50 characters long)</li></span></td>
        </tr>
        <tr>
            <th align="right">Your Email:</th>
            <td><input type="email" name="sEmail" value="<?php echo $studInfo['sEmail'];?>"/><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
        </tr>
        <tr>
            <th align="right">Your Phone #:</th>
            <td><input type="number" name="phoneNum" value="<?php echo $studInfo['phoneNum'];?>"/><span style="color:#a12638;font-size:8px;"><li>(10 characters long)</li></span></td>
        </tr>
        <tr>
            <th align="right">Your Major:</th>
            <td><?php echo $major['subShortName']."--".$major['subName'];?></td>
        </tr>
        <tr>
            <th align="right">Academic Level:</th>
            <td><?php echo $level['levelName'];?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
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
    <input type="radio" name="radio-set" id="st-control-5" onclick="window.location.href='index.php'">
    <a href="#st-panel-5">Yourself</a>
    <!--    nav end-->
</div>
</body>
</html>