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
$where=$keywords?"where courseName like '%{$keywords}%'":null;
//得到所有课程信息，并分页
$sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName,t.termName,l.levelName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_term as t on c.courseTerm=t.id LEFT JOIN troy_level as l on c.courseLevel=l.id {$where}";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profDesc,p.profPhoneNum,s.subShortName,s.subName,t.termName,l.levelName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_term as t on c.courseTerm=t.id LEFT JOIN troy_level as l on c.courseLevel=l.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

//验证是否有数据从数据库里返回
/*echo "??????????????><br>";
print_r($rows);
echo "<br>??????????????><br>";*/

if(!$rows){
    alertMes("NO DATA!!!Please Add!!!","addCour.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses List</title>
    <link rel="stylesheet" href="css/details.css" type="text/css">
    <link rel="stylesheet" href="css/nav.css" type="text/css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
</head>
<body>
<!--首先将整个页面编辑为一个大框体-->
<div class="details">
    <!--建立头部-->
    <div class="details_operation clearfix">
        <!--        添加按钮-->
        <div class="additionBtn fl">
            <input type="button" value="Addition" class="add add48x48" onclick="addCour()">
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
                        <option value="courseId asc">Id: Low to High</option>
                        <option value="courseId desc">Id: High to Low</option>
                        <!--                            根据名称排序，数据库里为courseName-->
                        <option value="courseName asc">Name: A to Z</option>
                        <option value="courseName desc">Name: Z to A</option>
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
        <!--显示页面名字-->
        <caption>Courses List</caption>
        <!--            表头-->
        <thead>
        <tr>
            <th width="10%">Course Id</th>
            <th width="30%">Course Name</th>
            <th width="30%">Subject</th>
            <th>Action</th>
        </tr>
        </thead>
        <!--            表格主体-->
        <tbody>
        <!--            内容部分-->
        <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $row['courseId']; ?></td>
                <td><?php echo $row['courseName']; ?></td>
                <td><?php echo $row['subName']; ?></td>
                <!--                    修改按钮添加editCour()函数,删除添加delCour()-->
                <td align="center">
                    <input type="button" value="Detail" class="btn detail20x20" onclick="div<?php echo $row['id']; ?>.style.display=''">
                    <input type="button" value="Edit" class="btn edit20x20" onclick="editCour(<?php echo $row['id']; ?>)">
                    <input type="button" value="Delete" class="btn del20x20" onclick="delCour(<?php echo $row['id']; ?>)">
<!--                    详情-->
                    <div id="div<?php echo $row['id']; ?>" style="position: absolute;top:0;left:0;background-color:#e7e9ea;width: 60%;z-index:1; display: none;">
                        <!--用来关闭显示-->
                        <input type="button-close" value="Close" class="closeBtn24x24" onClick="div<?php echo $row['id']; ?>.style.display='none'" style="font-weight:bolder;">
                        <div id="showDetail<?php echo $row['id'];?>">
                        <table class="detailTable" cellspacing="0" cellpadding="0">
                            <caption>Course: <?php echo $row['courseName'];?></caption>
                            <tr>
                                <td width="20%" align="right">ID</td>
                                <td><?php echo $row['courseId'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Name</td>
                                <td><?php echo $row['courseName'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Subject</td>
                                <td><?php echo $row['subName'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Time</td>
<!--                                得到星期的函数-->
                                <td><?php
                                    $scheInfos=getScheByCourId($row['courseId']);
                                    foreach ($scheInfos as $key=> $scheInfo){
                                        if($scheInfos[$key]){
                                            $notNulls[$key]=$key;
                                        }
                                    }
                                    foreach ($notNulls as $notNull){
                                        echo $notNull." ";
                                    }
                                    $notNulls="";
                                    echo "<br>".$row['courseStartTime'].":00-".$row['courseEndTime'].":00";?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Status</td>
                                <td><?php echo $row['courseStat'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Available/Capacity</td>
                                <td><?php echo $row['courseAvai']."/".$row['courseCapa'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Term</td>
                                <td>
                                    <?php echo $row['termName'];?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Location</td>
                                <td><?php echo $row['courseLoca'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Professor</td>
                                <td><?php echo $row['profFirstName']." ".$row['profLastName'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Professor Info</td>
                                <td>
                                    <?php echo "Email:".$row['profEmail'];
                                    echo "<br>Phone #:".$row['profPhoneNum'];
                                    echo "<br>Description:".$row['profDesc'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Professor Pic</td>
                                <td>
                                 <?php
                                  $profImgs=getAllImgsByProfId($row['courseProfId']);
                                  if($profImgs&&is_array($profImgs)){?>
                                        <?php foreach($profImgs as $img):?>
                                            <img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/>&nbsp;&nbsp;
                                        <?php endforeach;?>
                                    <?php }else{echo "No image";};?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Credit</td>
                                <td><?php echo $row['courseCred'];?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Level</td>
                                <td>
                                    <?php echo $row['levelName'];?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" align="right">Description</td>
                                <td><?php echo $row['courseDesc'];?></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <!--            页码部分-->
        <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="4"><?php echo showPage($page,$totalPage,"keywords={$keywords}&order={$order}");?></td>
            </tr>
        <?php endif;?>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    //    排序框发生改变时运行的函数,在本页面返回一个order=val值
    function change(val){
        window.location="listCour.php?order="+val;
    }
    //    搜索事件，keycode=13为回车,在本页面返回一个keywords=val值
    function search(){
        var event=arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异
        if(event.keyCode==13){
            var val=document.getElementById("search").value;
            window.location="listCour.php?keywords="+val;
        }
    }
    //    修改函数,跳转到editCour.php并带一个值id
    function editCour(id){
        window.location="editCour.php?id="+id;
    }
    //    删除函数 带着值id引用doAdminAction.php里的delCour方法
    function delCour(id){
        if(window.confirm("Are you sure?")){
            window.location="doAdminAction.php?act=delCour&id="+id;
        }
    }
    //    添加函数 跳转到addCour.php
    function addCour(){
        window.location="addCour.php";
    }
</script>
</body>
</html>