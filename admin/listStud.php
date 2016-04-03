<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 2:20
 */
require_once "../include.php";
checkLogined();
//排序搜索
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by ".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where sFirstName like '%{$keywords}%' or sLastName like '%{$keywords}%'":null;
//得到所有学科信息，并分页
$sql="select * from troy_students as stud LEFT JOIN troy_subjects as sub ON stud.sMajorId=sub.id {$where}";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from troy_students as stud LEFT JOIN troy_subjects as sub ON stud.sMajorId=sub.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

//验证是否有数据从数据库里返回
/*echo "??????????????><br>";
print_r($rows);
echo "<br>??????????????><br>";*/

if(!$rows){
    alertMes("NO DATA!!!Please Add!!!","addStud.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <link rel="stylesheet" href="css/backstage.css">
</head>
<body>
<!--首先将整个页面编辑为一个大框体-->
<div class="details">
    <!--建立头部-->
    <div class="details_operation clearfix">
        <!--        添加按钮-->
        <div class="additionBtn fl">
            <input type="button" value="Addition" class="add add48x48" onclick="addStud()">
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
                        <option value="sId asc">Id: Low to High</option>
                        <option value="sId desc">Id: High to Low</option>
                        <!--                            根据名称排序，数据库里为subName-->
                        <option value="sFirstName asc">Name: A to Z</option>
                        <option value="sFirstName desc">Name: Z to A</option>
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
        <!--靠左显示页面名字-->
        <caption>Students List</caption>
        <!--            表头-->
        <thead>
        <tr>
            <th width="5%">Id</th>
            <th width="5%">username</th>
            <th width="20%">Name</th>
            <th width="10%">BTD</th>
            <th width="25%">Address</th>
            <th width="15%">E-mail</th>
            <th width="5%">Phone #</th>
            <th width="15%">Major</th>
            <th width="10%">Level</th>
            <th>Action</th>
        </tr>
        </thead>
        <!--            表格主体-->
        <tbody>
        <!--            内容部分-->
        <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $row['sId']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['sFirstName']." ".$row['sLastName']; ?></td>
                <td><?php echo $row['sBTD']; ?></td>
                <td><?php echo $row['sAddress']; ?></td>
                <td><?php echo $row['sEmail']; ?></td>
                <td><?php echo $row['phoneNum']; ?></td>
                <td><?php echo $row['subShortName']."--".$row['subName']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <!--                    修改按钮添加editSub()函数,删除添加delSub()-->
                <td align="center"><input type="button" value="Edit" class="btn edit20x20" onclick="editStud(<?php echo $row['sId']; ?>)"><input type="button" value="Delete" class="btn del20x20" onclick="delStud(<?php echo $row['sId']; ?>)"></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <!--            页码部分-->
        <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="10"><?php echo showPage($page,$totalPage,"keywords={$keywords}&order={$order}");?></td>
            </tr>
        <?php endif;?>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    //    排序框发生改变时运行的函数,在本页面返回一个order=val值
    function change(val){
        window.location="listStud.php?order="+val;
    }
    //    搜索事件，keycode=13为回车,在本页面返回一个keywords=val值
    function search(){
        if(event.keyCode==13){
            var val=document.getElementById("search").value;
            window.location="listStud.php?keywords="+val;
        }
    }
    //    修改函数,跳转到editStud.php并带一个值id
    function editStud(id){
        window.location="editStud.php?id="+id;
    }
    //    删除函数 带着值id引用doAdminAction.php里的delStud方法
    function delStud(id){
        if(window.confirm("Are you sure?")){
            window.location="doAdminAction.php?act=delStud&id="+id;
        }
    }
    //    添加函数 跳转到addStud.php
    function addStud(){
        window.location="addStud.php";
    }
</script>
</body>
</html>