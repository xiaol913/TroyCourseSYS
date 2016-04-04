<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 17:04
 */
require_once "include.php";
//排序搜索
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by ".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where profFirstName like '%{$keywords}%' or profLastName like '%{$keywords}%'":null;
//得到所有教授信息，并分页
$sql="select * from troy_professors {$where}";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from troy_professors {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("No Result!!!","profList.php");
}

//验证是否有数据从数据库里返回
/*echo "<br>-------------<br>";
print_r($rows);
echo "<br>-------------<br>";
print_r($totalRows);
echo "<br>-------------<br>";
print_r($totalPage);*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructors List</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<!--首先将整个页面编辑为一个大框体-->
<div class="details">
    <!--建立头部-->
    <div class="details_operation clearfix">
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
                        <option value="profFirstName asc">Name: A to Z</option>
                        <option value="profFirstName desc">Name: Z to A</option>
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
        <caption>Instructors List</caption>
        <!--            表头-->
        <thead>
        <tr>
            <th width="5%">Id</th>
            <th width="20%">Name</th>
            <th width="20%">E-mail</th>
            <th width="15%">Phone #</th>
            <th width="40%">Description</th>
        </tr>
        </thead>
        <!--            表格主体-->
        <tbody>
        <!--            内容部分-->
        <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['profFirstName']." ".$row['profLastName']; ?></td>
                <td><?php echo $row['profEmail']; ?></td>
                <td><?php echo $row['profPhoneNum']; ?></td>
                <td>
                    <?php
                    $profImgs=getAllImgsByProfId($row['id']);
                    if($profImgs&&is_array($profImgs)){?>
                        <?php foreach($profImgs as $img):?>
                            <img width="60" height="60" src="uploads/<?php echo $img['albumPath'];?>" alt=""/>
                        <?php endforeach;?>
                    <?php }else{echo "No image";};?>
                    <?php echo $row['profDesc']; ?>
                </td>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <!--            页码部分-->
        <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="6"><?php echo showPage($page,$totalPage,"keywords={$keywords}&order={$order}");?></td>
            </tr>
        <?php endif;?>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    //    排序框发生改变时运行的函数,在本页面返回一个order=val值
    function change(val){
        window.location="profList.php?order="+val;
    }
    //    搜索事件，keyCode=13为回车,在本页面返回一个keywords=val值
    function search(){
        var event=arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异
        if(event.keyCode==13){
            var val=document.getElementById("search").value;
            window.location="profList.php?keywords="+val;
        }
    }
</script>
</body>
</html>