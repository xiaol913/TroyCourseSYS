<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 8:44
 */
require_once "include.php";
$rows=search1();
if(checkStudLogin()==false){
    alertMes("Please Login!!!","index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index test</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/navCSS.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <link href="css/tableCSS.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="head">
    <!--建立logo，fl为CSS左浮动-->
    <div class="logo fl"><a href="#"></a></div>
    <!--建立头部右边区域文字，并fr右浮动-->
    <h3 class="head_text fr">Welcome to Troy Courses System</h3>
</div>
<!--main page-->
<div class="container">
    <div class="st-container">
        <!--        nav start-->
        <input type="radio" name="radio-set" id="st-control-1" checked="checked">
        <a href="index.php#st-panel-1">Home</a>
        <input type="radio" name="radio-set" id="st-control-2">
        <a href="index.php#st-panel-2">Academics</a>
        <input type="radio" name="radio-set" id="st-control-3">
        <a href="index.php#st-panel-3">Instructors</a>
        <input type="radio" name="radio-set" checked="checked" id="st-control-4">
        <a href="index.php#st-panel-4">Search</a>
        <input type="radio" name="radio-set" id="st-control-5">
        <a href="index.php#st-panel-5">Yourself</a>
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
                <!--                    按钮-->
                <td align="center">
                    <input type="button" value="Detail" class="btn detail20x20" onclick="div<?php echo $row['id']; ?>.style.display=''"><input type="button" value="Register" class="btn detail20x20" onclick="register(<?php echo $row['courseId']; ?>,<?php if(isset($_SESSION['TroyCourSYSstudentId'])){
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
    </table>
</div>
<script>
    function register(cId,sId) {
        if(window.confirm("Are you sure?")){
            window.location="doAction.php?act=register&cId="+cId+"&sId="+sId;
        }
    }
</script>
</body>
</html>