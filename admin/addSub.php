<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 15:05
 */
require_once "../include.php";
checkLogined();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
    <link rel="stylesheet" href="css/details.css" type="text/css">
    <link rel="stylesheet" href="css/nav.css" type="text/css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
    <form class="table" action="doAdminAction.php?act=addSub" onsubmit="return FormSubCheck()" method="post" enctype="multipart/form-data">
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <caption>Add Subject</caption>
            <tr>
                <td align="right">Subject Name</td>
                <td><input type="text" name="subName" placeholder="Enter Subject's name"/><span style="color:#a12638;font-size:8px;"><li>(Max 40 characters long, only a-z, A-Z)</li></span></td>
            </tr>
            <tr>
                <td align="right">Abbreviation</td>
                <td><input type="text" name="subShortName" placeholder="Enter Abbreviation"/><span style="color:#a12638;font-size:8px;"><li>(Max 5 characters long, only A-Z)</li></span></td>
            </tr>
            <tfoot>
            <tr>
                <td colspan="2"><input type="submit"  class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
            </tr>
            </tfoot>
        </table>
    </form>
</body>
</html>