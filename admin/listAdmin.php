<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 3:39
 */
require_once '../include.php';
checkLogined();
checkLevel();
//建立分页
$pageSize=2;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getAdminByPage($page,$pageSize);
if(!$rows){
    alertMes("sorry,没有管理员,请添加!","addAdmin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrators List</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
</head>
<body>
    <!--首先将整个页面编辑为一个大框体-->
    <div class="details">
        <!--建立头部-->
        <div class="details_operation clearfix">
            <!--        添加按钮-->
            <div class="additionBtn fl">
                <input type="button" value="Addition" class="add add48x48" onclick="addAdmin()">
            </div>
        </div>
        <!--        建立表格-->
        <table class="table" cellpadding="0" cellspacing="0" >
            <!--靠左显示页面名字-->
            <caption>Administrators List</caption>
            <!--            表头-->
            <thead>
                <tr>
                    <th width="15%">Id</th>
                    <th width="20%">Username</th>
                    <th width="40%">E-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!--            表格主体-->
            <tbody>
            <!--            内容部分-->
                <?php  foreach($rows as $row):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <!--                    修改 删除按钮-->
                    <td align="center"><input type="button" value="Edit" class="btn edit20x20" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="Delete" class="btn del20x20" onclick="delAdmin(<?php echo $row['id'];?>)"></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
            <!--            页码部分-->
            <?php if($totalRows>$pageSize):?>
                <tr>
                    <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                </tr>
            <?php endif;?>
            </tfoot>
        </table>
    </div>

    <script type="text/javascript">
        /**
         * 添加管理员
         */
        function addAdmin(){
            window.location="addAdmin.php";
        }
        /**
         * 修改管理员
         * @param id
         */
        function editAdmin(id){
            window.location="editAdmin.php?id="+id;
        }
        /**
         * 删除管理员
         * @param id
         */
        function delAdmin(id){
            if(window.confirm("Are you sure?")){
                window.location="doAdminAction.php?act=delAdmin&id="+id;
            }
        }
    </script>
</body>
</html>