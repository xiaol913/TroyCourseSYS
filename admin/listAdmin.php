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
        <a href="#st-panel-3">Personnel</a>
        <input type="radio" name="radio-set" id="st-control-4" onclick="window.location.href='index.php'">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5" checked="checked" onclick="window.location.href='index.php'">
        <a href="#st-panel-5">Administrators</a>
        <!--    nav end-->
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

                        <td align="center"><a href="javascript:editAdmin(<?php echo $row['id']; ?>)"><i class="fa fa-pencil-square-o"></i>Edit</a>&nbsp;&nbsp;<a href="javascript:delAdmin(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o"></i>Delete</a></td>
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
    </div>
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