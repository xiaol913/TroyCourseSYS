<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 19:24
 */
require_once "../include.php";
checkLogined();
$id=$_REQUEST['id'];
$row=getTermById($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Term</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
<form class="table" action="doAdminAction.php?act=editTerm&id=<?php echo $id;?>" onsubmit="return FormTermCheck()" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Edit Term</caption>
        <tr>
            <td align="right">Term Name</td>
            <td><input type="text" name="subName" value="<?php echo $row['termName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 40 characters long, only a-z, A-Z, 0-9)</li></span></td>
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