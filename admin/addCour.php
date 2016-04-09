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
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <script src="js/formVerify.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
    <link href="../css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/backstage.css" type="text/css" rel="stylesheet">
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
        <input type="radio" name="radio-set" id="st-control-2" checked="checked" onclick="window.location.href='index.php'">
        <a href="#st-panel-2">Academics</a>
        <input type="radio" name="radio-set" id="st-control-3" onclick="window.location.href='index.php'">
        <a href="#st-panel-3">Personnel</a>
        <input type="radio" name="radio-set" id="st-control-4" onclick="window.location.href='index.php'">
        <a href="#st-panel-4">Term</a>
        <input type="radio" name="radio-set" id="st-control-5" onclick="window.location.href='index.php'">
        <a href="#st-panel-5">Administrators</a>
        <!--    nav end-->
        <div class="details">
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
            </div>
    </div>
</div>
</body>
</html>