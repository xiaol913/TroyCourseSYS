<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 19:13
 */
require_once '../include.php';
checkLogined();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Professor</title>
    <script src="js/uploadFiles.js" type="text/javascript"></script>
    <script src="js/formVerify.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/backstage.css" type="text/css" rel="stylesheet">
</head>
<body>
<!--head-->
<div class="head">
    <!--建立logo，fl为CSS左浮动-->
    <div class="logo fl"><a href="#"></a></div>
    <!--建立头部右边区域文字，并fr右浮动-->
    <div class="operation_user fr">
        <div class="link">
            <b style="color:#fff">Welcome,
                <?php
                if(isset($_SESSION['TroyCourSYSadminName'])){
                    echo $_SESSION['TroyCourSYSadminName'];
                }elseif(isset($_COOKIE['TroyCourSYSadminName'])){
                    echo $_COOKIE['TroyCourSYSadminName'];
                }
                ?>
            </b>&nbsp;&nbsp;<a href="index.php" style="color:#fff" class="" ><i class="fa fa-home"></i><span>Home</span></a><a href="#" class="" onclick="history.go(-1)" style="color:#fff"><i class="fa fa-reply"></i><span>Back</span></a><a href="doAdminAction.php?act=logout" class="" style="color:#fff"><i class="fa fa-power-off"></i><span>Logout</span></a>
        </div>
    </div>
</div>
<!--main page-->
<div class="container">
    <div class="st-container">
        <!--        nav start-->
        <input type="radio" name="radio-set" id="st-control-1" onclick="window.location.href='index.php'">
        <a href="#st-panel-1">Home</a>
        <input type="radio" name="radio-set" id="st-control-2" onclick="window.location.href='index.php'">
        <a href="#st-panel-2">Academics</a>
        <input type="radio" name="radio-set" id="st-control-3" checked="checked" onclick="window.location.href='index.php'">
        <a href="#st-panel-3">Personnel</a>
        <input type="radio" name="radio-set" id="st-control-4" onclick="window.location.href='index.php'">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5" onclick="window.location.href='index.php'">
        <a href="#st-panel-5">Administrators</a>
        <!--    nav end-->
        <div class="details">
            <form class="table" action="doAdminAction.php?act=addProf" method="post" onsubmit="return FormProfCheck()" enctype="multipart/form-data">
                <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
                    <caption>Add Professor</caption>
                    <tr>
                        <td align="right">First Name</td>
                        <td><input type="text" name="profFirstName" placeholder="Enter first name"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">Last Name</td>
                        <td><input type="text" name="profLastName" placeholder="Enter last name"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">E-mail</td>
                        <td><input type="email" name="profEmail" placeholder="Enter email"/><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">Phone #</td>
                        <td><input type="number" name="profPhoneNum" placeholder="Enter phone #"/><span style="color:#a12638;font-size:8px;"><li>(10 characters long)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">Description</td>
                        <td>
                            <textarea name="profDesc" id="editor_id" style="width:100%;height:150px;">Enter Description here</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Picture<span style="color:#a12638;font-size:8px;"><li>(Only gif, jpeg, png, jpg)</li></span></td>
                        <td id="files">
                            <input type="button" value="Add More" onclick="AddMorePic()">
                        </td>
                    </tr>
                    <tfoot>
                    <tr>
                        <td colspan="2"><input type="submit"  class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>