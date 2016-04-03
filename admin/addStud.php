<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/30
 * Time: 15:30
 */

require_once "../include.php";
checkLogined();
$rows=getAllSub();
if(!$rows){
    alertMes("No Subjects!!!", "addSub.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student Info</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
<form class="table" action="doAdminAction.php?act=addStud" onsubmit="return FormStudCheck()" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Add Student Info</caption>
        <tr>
            <td>Student Username</td>
            <td><input type="text" name="username" placeholder="Enter Username"><span style="color:#a12638;font-size:8px;"><li>(6-15 characters long, only a-z, A-Z, 0-9)</li></span></td>
        </tr>
        <tr>
            <td>Student Password</td>
            <td><input type="password" name="password" placeholder="Enter Password"><span style="color:#a12638;font-size:8px;"><li>(6-20 characters long</li><li>First character must be uppercase letter</li><li>Can't be a same type)</li></span></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="sFirstName" placeholder="Enter First Name"><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="sLastName" placeholder="Enter Last Name"><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td>Birthday</td>
            <td><input type="date" name="sBTD"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="sAddress" placeholder="Enter Address"><span style="color:#a12638;font-size:8px;"><li>(Max 50 characters long)</li></span></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="email" name="sEmail" placeholder="Enter E-mail Address"><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
        </tr>
        <tr>
            <td>Phone #</td>
            <td><input type="number" name="phoneNum" placeholder="Enter Phone Number"><span style="color:#a12638;font-size:8px;"><li>(10 characters long)</li></span></td>
        </tr>
        <tr>
            <td>Major</td>
            <td>
                <select name="sMajorId">
                    <?php foreach($rows as $row):?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['subShortName']."--".$row['subName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <select name="level">
                    <option value="Doctorate">Doctorate</option>
                    <option value="Education Specialist">Education Specialist</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Undergrad">Undergrad</option>
                </select>
            </td>
        </tr>
        <tfoot>
        <tr>
            <td colspan="2"><input type="submit" class="sub24x24" value="Submit"><input type="reset" class="res24x24"  value="Reset"/></td>
        </tr>
        </tfoot>
    </table>
</form>
</body>
</html>