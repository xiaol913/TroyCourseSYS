<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 19:02
 */
require_once "../include.php";
checkLogined();
//排序搜索

$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by ".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where termName like '%{$keywords}%'":null;
//得到所有学科信息，并分页
$sql="select * from troy_term {$where}";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from troy_term {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

//验证是否有数据从数据库里返回
/*echo "??????????????><br>";
print_r($rows);
echo "<br>??????????????><br>";*/

if(!$rows){
    alertMes("No Data!!!","addTerm.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Term List</title>
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
        <input type="radio" name="radio-set" id="st-control-4" checked="checked" onclick="window.location.href='index.php'">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5" onclick="window.location.href='index.php'">
        <a href="#st-panel-5">Administrators</a>
                <!--    nav end-->
        <div class="details">
            <!--建立头部-->
            <div class="details_operation clearfix">
                <!--        添加按钮-->
                <div class="additionBtn fl">
                    <input type="button" value="Addition" class="add add48x48" onclick="addTerm()">
                </div>
                <!--            右部排序以及搜索-->
                <div class="fr">
                    <!--                排序-->
                    <div class="text">
                        <span>Sort by</span>
                        <div class="bui_select">
                            <!--                        改变事件，传给一个脚本函数-->
                            <select id="" class="select" onchange="change(this.value)">
                                <!--                            默认给一个值为NULL的选择-->
                                <option>-select-</option>
                                <!--                            根据ID排序,数据库里为id-->
                                <option value="id asc">Id: Low to High</option>
                                <option value="id desc">Id: High to Low</option>
                                <!--                            根据名称排序，数据库里为subName-->
                                <option value="subName asc">Name: A to Z</option>
                                <option value="subName desc">Name: Z to A</option>
                            </select>
                        </div>
                    </div>
                    <!--                搜索-->
                    <div class="text">
                        <span>Search By Name:</span>
                        <!--                    给搜索text条添加一个按回车的事件-->
                        <input type="text" value="" class="search" id="search" onkeypress="search()">
                    </div>
                </div>
            </div>
            <!--        建立表格-->
            <table class="table" cellpadding="0" cellspacing="0">
                <caption>Term List</caption>
                <!--            表头-->
                <thead>
                <tr>
                    <th width="15%">Id</th>
                    <th width="50%">Term Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <!--            表格主体-->
                <tbody>
                <!--            内容部分-->
                <?php foreach($rows as $row):?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['termName']; ?></td>
                        <!--                    修改按钮添加editSub()函数,删除添加delSub()-->
                        <td align="center"><a href="javascript:editTerm(<?php echo $row['id']; ?>)"><i class="fa fa-pencil-square-o"></i>Edit</a>&nbsp;&nbsp;<a href="javascript:delTerm(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o"></i>Delete</a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <!--            页码部分-->
                <tfoot>
                <?php if($totalRows>$pageSize):?>
                    <tr>
                        <td colspan="4"><?php echo showPage($page,$totalPage,"keywords={$keywords}&order={$order}");?></td>
                    </tr>
                <?php endif;?>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    //    排序框发生改变时运行的函数,在本页面返回一个order=val值
    function change(val){
        window.location="listTerm.php?order="+val;
    }
    //    搜索事件，keycode=13为回车,在本页面返回一个keywords=val值
    function search(){
        var event=arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异
        if(event.keyCode==13){
            var val=document.getElementById("search").value;
            window.location="listTerm.php?keywords="+val;
        }
    }
    //    修改函数,跳转到editSub.php并带一个值id
    function editTerm(id){
        window.location="editTerm.php?id="+id;
    }
    //    删除函数 带着值id引用doAdminAction.php里的delSub方法
    function delTerm(id){
        if(window.confirm("Are you sure?")){
            window.location="doAdminAction.php?act=delTerm&id="+id;
        }
    }
    //    添加函数 跳转到addSub.php
    function addTerm(){
        window.location="addTerm.php";
    }
</script>
</body>
</html>