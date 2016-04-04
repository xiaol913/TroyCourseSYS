<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 17:27
 */
require_once "include.php";
//排序搜索
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by ".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"and courseName like '%{$keywords}%'":null;
//得到所有课程信息，并分页
$sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName,l.levelName,t.termName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_level as l on c.courseLevel=l.id LEFT JOIN troy_term as t on c.courseTerm=t.id WHERE c.courseLevel= 1 {$where}";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profDesc,p.profPhoneNum,s.subShortName,s.subName,l.levelName,t.termName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_level as l on c.courseLevel=l.id LEFT JOIN troy_term as t on c.courseTerm=t.id WHERE c.courseLevel= 1 {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

if(!$rows){
    alertMes("No Data!!!","main.php");
}

//验证是否有数据从数据库里返回
/*echo "??????????????><br>";
print_r($rows);
echo "<br>??????????????><br>";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses List</title>
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
            <th width="15%">Course Id</th>
            <th width="38%">Course Name</th>
            <th width="38%">Subject</th>
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
                <!--详情按钮-->
                <td align="center">
                    <input type="button" value="Detail" class="btn detail20x20" onclick="div<?php echo $row['id']; ?>.style.display=''">
                   <!--                    详情-->
                    <div id="div<?php echo $row['id']; ?>" style="position: absolute;top:0;left:20%;background-color:#e7e9ea;width: 60%;z-index:1; display: none;">
                        <!--用来关闭显示-->
                        <input type="button" value="Close" class="closeBtn24x24" onClick="div<?php echo $row['id']; ?>.style.display='none'" style="font-weight:bolder;">
                        <div id="showDetail<?php echo $row['id'];?>">
                            <table class="table" cellspacing="0" cellpadding="0">
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
                                    <td><?php echo $row['courseStartTime']."-".$row['courseEndTime'];?></td>
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
                                    <td><?php echo $row['termName'];?></td>
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
                                    <td><?php echo $row['levelName'];?></td>
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
        window.location="ungraduateList.php?order="+val;
    }
    //    搜索事件，keycode=13为回车,在本页面返回一个keywords=val值
    function search(){
        var event=arguments.callee.caller.arguments[0]||window.event;//消除浏览器差异
        if(event.keyCode==13){
            var val=document.getElementById("search").value;
            window.location="ungraduateList.php?keywords="+val;
        }
    }
</script>
</body>
</html>