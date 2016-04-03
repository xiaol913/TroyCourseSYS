<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/29
 * Time: 19:13
 */
require_once '../include.php';
checkLogined();
$rows=getAllProf();
if(!$rows){
    alertMes("No professor!!", "addProf.php");
}
$id=$_REQUEST['id'];
$profInfo=getProfById($id);
$profImgs=getAllImgsByProfId($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Professor</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/uploadFiles.js"></script>
</head>
<body>
<form action="doAdminAction.php?act=editProf&id=<?php echo $id;?>" onsubmit="return FormProfCheck()" method="post" enctype="multipart/form-data">
    <table class="table" width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Edit Professor</caption>
        <tr>
            <td align="right">First Name</td>
            <td><input type="text" name="profFirstName" value="<?php echo $profInfo['profFirstName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td align="right">Last Name</td>
            <td><input type="text" name="profLastName" value="<?php echo $profInfo['profLastName'];?>"/><span style="color:#a12638;font-size:8px;"><li>(Max 15 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td align="right">E-mail</td>
            <td><input type="email" name="profEmail" value="<?php echo $profInfo['profEmail'];?>"/><span style="color:#a12638;font-size:8px;"><li>(email@email.com)</li></span></td>
        </tr>
        <tr>
            <td align="right">Phone #</td>
            <td><input type="number" name="profPhoneNum" value="<?php echo $profInfo['profPhoneNum'];?>"/><span style="color:#a12638;font-size:8px;"><li>(10 characters long)</li></span></td>
        </tr>
        <tr>
            <td align="right">Description</td>
            <td>
                <textarea name="profDesc" id="editor_id" style="width:100%;height:150px;"><?php echo $profInfo['profDesc'];?></textarea>
            </td>
        </tr>
        <tr>
            <td align="right">Pictures<span style="color:#a12638;font-size:8px;"><li>(Only gif, jpeg, png, jpg)</li></span></td>
            <td>
                <?php
                if($profImgs&&is_array($profImgs)){?>
                    <?php foreach($profImgs as $img):?>
                        <img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/><input type="button" value="Delete" class="btn" onclick="delImg(<?php echo $id;?>,<?php echo $img['id']; ?>)">
                    <?php endforeach;?>
                <?php }else{echo "No image";};?>
            </td>
        </tr>
        <tr>
            <td align="right">Add Picture</td>
            <td id="files">
                <input type="button" value="Add More" onclick="AddMorePic()">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="sub24x24"  value="Submit"/><input type="reset" class="res24x24"  value="Reset"/></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    //    删除函数 带着值id引用doAdminAction.php里的delImg方法
    function delImg(id,imgId){
        if(window.confirm("Are you sure?")){
            window.location="doAdminAction.php?act=delImg&id="+id+"&imgId="+imgId;
        }
    }
</script>
</body>
</html>