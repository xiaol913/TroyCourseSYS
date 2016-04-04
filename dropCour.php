<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 9:40
 */
require_once "include.php";
$id=$_REQUEST['id'];
if(checkStudLogin()==false){
    alertMes("Please Login!!!","index.php");
}
$sql="select stud.sId,cour.*,prof.profFirstName,prof.profLastName,prof.profEmail,prof.profPhoneNum,prof.profDesc,album.albumPath,sub.subName,sub.subShortName,term.termName,level.levelName from troy_students as stud LEFT JOIN troy_register as reg on stud.sId=reg.sId LEFT JOIN troy_courses as cour on reg.cId=cour.courseId LEFT JOIN troy_professors as prof on cour.courseProfId=prof.id LEFT JOIN troy_album as album ON prof.id=album.pId LEFT join troy_subjects as sub on cour.subjectId=sub.id LEFT JOIN troy_term as term ON cour.courseTerm=term.id LEFT JOIN troy_level as level on cour.courseLevel=level.id WHERE stud.sId={$id}";
$rows=fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses List</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
<!--首先将整个页面编辑为一个大框体-->
<div class="details">
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
                    <input type="button" value="Detail" class="btn detail20x20" onclick="div<?php echo $row['id']; ?>.style.display=''"><input type="button" value="Drop" class="btn detail20x20" onclick="drop(<?php echo $row['courseId']; ?>,<?php if(isset($_SESSION['TroyCourSYSstudentId'])){
                        echo $_SESSION['TroyCourSYSstudentId'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                        echo $_COOKIE['TroyCourSYSstudentId'];
                    }?>)">
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
                                    <td><?php echo $row['courseStartTime'].":00-".$row['courseEndTime'].":00";?></td>
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
    </table>
</div>
<script>
    function drop(cId,sId) {
        window.location="doAction.php?act=drop&cId="+cId+"&sId="+sId;
    }
</script>
</body>
</html>