<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 15:05
 */
require_once "../include.php";
checkLogined();
//得到所有学科
$rows=getAllSub();
if(!$rows){
    alertMes("No Subjects!!!", "addSub.php");
}
//得到所有教授信息
$profRows=getAllProf();
if(!$profRows){
    alertMes("No Professor!!!", "addSub.php");
}
//得到所有学期信息
$termInfos=getAllTerm();
//得到所有等级信息
$levelInfos=getAllLevel();
if(!$levelInfos){
    alertMes("No Level Data!!!", "index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <style>
        body{overflow: hidden;}
    </style>
</head>
<body>

<!--头部框架嵌套-->
<div>
    <iframe src="header.php" frameborder="0" name="headerFrame" width="100%" height="129px" scrolling="no"></iframe>
</div>
<!--侧边导航-->
<nav class="main-menu">
    <div class="scrollBar" id="style-1">
        <ul style="padding-left: 0px">
            <li>
                <a href="#">
                    <i class="fa fa-sitemap fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Subjects Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listSub.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addSub.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-book fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Courses Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listCour.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addCour.php">
                    <i class="fa"></i>
                    <span class="nav-text"> Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-users fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Students Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listStud.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addStud.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-reddit-alien fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Professor Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listProf.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addProf.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text">Add </span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-tasks fa-2x" style="padding-top:5px"></i>
                    <span class="nav-text">Term Info</span>
                </a>
            </li>
            <li class="darkerlishadow">
                <a href="listTerm.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> List</span>
                </a>
            </li>
            <li class="darkerlishadowdown">
                <a href="addTerm.php" target="mainPage">
                    <i class="fa"></i>
                    <span class="nav-text"> Add</span>
                </a>
            </li>
            <?php
            if(isset($_SESSION['TroyCourSYSadminId'])){
                $userId=$_SESSION['TroyCourSYSadminId'];
            }elseif(isset($_COOKIE['TroyCourSYSadminId'])){
                $userId=$_COOKIE['TroyCourSYSadminId'];
            }
            //通过该ID查找管理员的level
            $sql="select level from troy_admins where id=".$userId;
            $serLvl=fetchOne($sql);
            $lvl=$serLvl['level'];
            if($lvl==1):
                ?>
                <li class="">
                    <a href="#">
                        <i class="fa fa-user-secret fa-2x" style="padding-top:5px"></i>
                        <span class="nav-text">Administrators</span>
                    </a>
                </li>
                <li class="darkerlishadow">
                    <a href="listAdmin.php" target="mainPage">
                        <i class="fa"></i>
                        <span class="nav-text">Admin List</span>
                    </a>
                </li>
                <li class="darkerlishadowdown">
                    <a href="addAdmin.php" target="mainPage">
                        <i class="fa"></i>
                        <span class="nav-text">Add Admin</span>
                    </a>
                </li>
            <?php endif;?>
        </ul>
    </div>
</nav>
<form action="doAdminAction.php?act=addCour" method="post" onsubmit="return FormCourCheck()" enctype="multipart/form-data">
    <table  class="table" width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <caption>Add Course</caption>
        <tr>
            <td>Course Id</td>
            <td><input type="number" name="courseId" id="courseId" placeholder="Enter Course Id"><span style="color:#a12638;font-size:8px;"><li>(4 characters long)</li></span></td>
        </tr>
        <tr>
            <td>Course Name</td>
            <td><input type="text" name="courseName" id="courseName" placeholder="Enter Course Name"><span style="color:#a12638;font-size:8px;"><li>(Max 40 characters long, only a-z, A-Z)</li></span></td>
        </tr>
        <tr>
            <td>Subject</td>
            <td>
                <select name="subjectId">
                    <?php foreach($rows as $row):?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['subShortName']."--".$row['subName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Day</td>
            <td>
                Sun<input type="checkbox" name="day[sun]" checked value="sun">
                Mon<input type="checkbox" name="day[mon]" value="mon">
                Tue<input type="checkbox" name="day[tue]" value="tue">
                Wed<input type="checkbox" name="day[wed]" value="wed">
                Thu<input type="checkbox" name="day[thu]" value="thu">
                Fri<input type="checkbox" name="day[fri]" value="fri">
                Sat<input type="checkbox" name="day[sat]" value="sat">
            </td>
        </tr>
        <tr>
            <td>Sections Meeting After</td>
            <td>
                <select name="courseStartTime">
                    <option value="5">5am</option>
                    <option value="6">6am</option>
                    <option value="7">7am</option>
                    <option value="8">8am</option>
                    <option value="9">9am</option>
                    <option value="10">10m</option>
                    <option value="11">11am</option>
                    <option value="12">12pm</option>
                    <option value="13">1pm</option>
                    <option value="14">2pm</option>
                    <option value="15">3pm</option>
                    <option value="16">4pm</option>
                    <option value="17">5pm</option>
                    <option value="18">6pm</option>
                    <option value="19">7pm</option>
                    <option value="20">8pm</option>
                    <option value="21">9pm</option>
                    <option value="22">10pm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Sections Ending Before</td>
            <td>
                <select name="courseEndTime">
                    <option value="5">5am</option>
                    <option value="6">6am</option>
                    <option value="7">7am</option>
                    <option value="8">8am</option>
                    <option value="9">9am</option>
                    <option value="10">10m</option>
                    <option value="11">11am</option>
                    <option value="12">12pm</option>
                    <option value="13">1pm</option>
                    <option value="14">2pm</option>
                    <option value="15">3pm</option>
                    <option value="16">4pm</option>
                    <option value="17">5pm</option>
                    <option value="18">6pm</option>
                    <option value="19">7pm</option>
                    <option value="20">8pm</option>
                    <option value="21">9pm</option>
                    <option value="22">10pm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Capacity</td>
            <td>
                <input type="number" name="courseCapa" id="courseCapa" placeholder="Enter Capacity">
                <span style="color:#a12638;font-size:8px;"><li>(max 3 characters long)</li></span>
            </td>
        </tr>
        <tr>
            <td>Term</td>
            <td>
                <select name="courseTerm">
                    <?php foreach($termInfos as $termInfo):?>
                        <option value="<?php echo $termInfo['id'];?>"><?php echo $termInfo['termName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="courseStat">
                    <option value="open">open</option>
                    <option value="close">close</option>
            </td>
        </tr>
        <tr>
            <td>Location</td>
            <td>
                <select name="courseLoca">
                    <option value="Troy">Troy</option>
                    <option value="Montgomery">Montgomery</option>
                    <option value="Phenix City">Phenix City</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Professor</td>
            <td>
                <select name="courseProfId">
                    <?php foreach($profRows as $profRow):?>
                        <option value="<?php echo $profRow['id'];?>"><?php echo $profRow['profFirstName']." ".$profRow['profLastName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Credits</td>
            <td>
                <input type="number" name="courseCred" id="courseCred" placeholder="Enter the Course Credit">
                <span style="color:#a12638;font-size:8px;"><li>(1 characters long)</li></span>
            </td>
        </tr>
        <tr>
            <td>Course Level</td>
            <td>
                <select name="courseLevel">
                    <?php foreach($levelInfos as $levelInfo):?>
                        <option value="<?php echo $levelInfo['id'];?>"><?php echo $levelInfo['levelName'];?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Course Description</td>
            <td>
                <textarea name="courseDesc" id="editor_id" style="width:100%;height:150px;" >Enter Description here</textarea>
            </td>
        </tr>
        <tfoot>
        <tr>
            <td colspan="2"><input type="submit"  class="sub24x24" value="Submit"><input type="reset" class="res24x24"  value="Reset"/></td>
        </tr>
        </tfoot>
    </table>
</form>
</body>
</html>