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
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
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
</body>
</html>