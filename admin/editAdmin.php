<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 4:58
 */
require_once '../include.php';
checkLogined();
checkLevel();

$id=$_REQUEST['id'];
$sql="select id,username,password,email from troy_admins where id='{$id}'";
$row=fetchOne($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Administrators</title>
    <script src="js/formVerify.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/backstage.css" type="text/css" rel="stylesheet">
    <style>
        body{overflow: hidden;}
    </style>
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
        <input type="radio" name="radio-set" id="st-control-3" onclick="window.location.href='index.php'">
        <a href="#st-panel-3">Personal</a>
        <input type="radio" name="radio-set" id="st-control-4" onclick="window.location.href='index.php'">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5" checked="checked" onclick="window.location.href='index.php'">
        <a href="#st-panel-5">Administrators</a>
        <!--    nav end-->
        <div class="details">
            <form class="table" action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" onsubmit="return FormAdminCheck()" method="post" enctype="multipart/form-data">
                <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
                    <caption>Edit Administrators</caption>
                    <tr>
                        <td align="right">Username:</td>
                        <td><input type="text" name="username" id="username" value="<?php echo $row['username'];?>"/><span style="color:#a12638;font-size:8px;"><li>(6-15 characters long, only a-z, A-Z, 0-9)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">Password:</td>
                        <td><input type="password" name="password" id="password" /><span style="color:#a12638;font-size:8px;"><li>(6-20 characters long</li><li>First character must be uppercase letter</li><li>Can't be a same type)</li></span></td>
                    </tr>
                    <tr>
                        <td align="right">E-mail:</td>
                        <td><input type="email" name="email" id="email" value="<?php echo $row['email'];?>"/><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="sub24x24"  value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>