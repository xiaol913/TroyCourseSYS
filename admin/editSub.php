<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 15:05
 */
require_once "../include.php";
checkLogined();
$id=$_REQUEST['id'];
$row=getSubById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Subject</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
<form action="doAdminAction.php?act=editSub&id=<?php echo $id;?>" method="post" onsubmit="return FormSubCheck()" enctype="multipart/form-data">
    <table class="table" width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Edit Subject</caption>
        <tr>
            <td align="right">Subject Name</td>
            <td><input type="text" name="subName" value="<?php echo $row['subName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 40 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td align="right">Abbreviation</td>
            <td><input type="text" name="subShortName" value="<?php echo $row['subShortName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 5 characters long, only A-Z)</li></span></td>
        </tr>
        <tfoot>
        <tr>
            <td colspan="2"><input type="submit" class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
        </tr>
        </tfoot>
    </table>
</form>
</body>
</html>