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
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script type="text/javascript" src="js/uploadFiles.js"></script>
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
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
</body>
</html>