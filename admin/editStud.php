<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 19:13
 */
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$rows=getAllSub();
if(!$rows){
    alertMes("No Subjects!!!", "addSub.php");
}
$sql="select * from troy_students as stud LEFT JOIN troy_subjects as sub ON stud.sMajorId=sub.id WHERE stud.sId={$id}";
$studInfo=fetchOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
<form action="doAdminAction.php?act=editStud&id=<?php echo $id;?>" onsubmit="return FormStudCheck()" method="post" enctype="multipart/form-data">
    <table class="table" width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Edit Student</caption>
        <tr>
            <td align="right">Username</td>
            <td><input type="text" name="username" value="<?php echo $studInfo['username'];?>"/><span style="color:#a12638;font-size:8px;"><li>(6-15 characters long, only a-z, A-Z, 0-9)</li></span></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td><input type="password" name="password" value=""/><span style="color:#a12638;font-size:8px;"><li>(6-20 characters long</li><li>First character must be uppercase letter</li><li>Can't be a same type)</li></span></td>
        </tr>
        <tr>
            <td align="right">First Name</td>
            <td><input type="text" name="sFirstName" value="<?php echo $studInfo['sFirstName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td align="right">Last Name</td>
            <td><input type="text" name="sLastName" value="<?php echo $studInfo['sLastName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td align="right">Birthday</td>
            <td><input type="date" name="sBTD" value="<?php echo $studInfo['sBTD'];?>"/></td>
        </tr>
        <tr>
            <td align="right">Address</td>
            <td><input type="text" name="sAddress" value="<?php echo $studInfo['sAddress'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 50 characters long)</li></span></td>
        </tr>
        <tr>
            <td align="right">E-mail</td>
            <td><input type="email" name="sEmail" value="<?php echo $studInfo['sEmail'];?>"/><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
        </tr>
        <tr>
            <td align="right">Phone #</td>
            <td><input type="number" name="phoneNum" value="<?php echo $studInfo['phoneNum'];?>"/><span style="color:#a12638;font-size:8px;"><li>(10 characters long)</li></span></td>
        </tr>
        <tr>
            <td>Major</td>
            <td>
                <select name="sMajorId">
                    <?php foreach($rows as $row):?>
                        <option value="<?php echo $row['id'];?>" <?php echo ($row['subShortName']==$studInfo['subShortName'])?"selected=selected":NULL;?>><?php echo $row['subShortName']."--".$row['subName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <select name="level">
                    <option value="Doctorate" <?php echo ($studInfo['level']=="Doctorate")?"selected=selected":NULL;?>>Doctorate</option>
                    <option value="Education Specialist" <?php echo ($studInfo['level']=="Education Specialist")?"selected=selected":NULL;?>>Education</option>
                    <option value="Graduate" <?php echo ($studInfo['level']=="Graduate")?"selected=selected":NULL;?>>Graduate</option>
                    <option value="Undergrad" <?php echo ($studInfo['level']=="Undergrad")?"selected=selected":NULL;?>>Undergrad</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
        </tr>
    </table>
</form>
</body>
</html>