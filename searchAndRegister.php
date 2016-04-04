<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/4
 * Time: 8:42
 */
require_once "include.php";
$termInfos=getAllTerm();
$subInfos=getAllSub();
$levelInfos=getAllLevel();
$courInfos=getAllCour();
if(checkStudLogin()==false){
    alertMes("Please Login!!!","index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search and Register for Sections</title>
    <link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
<!--整体大框架-->
<div class="searchBox">
    <form class="searchForm" method="get" action="registerPage.php" enctype="multipart/form-data">
        <!--    标题-->
        <div class="title">
            <h3>Search and Register for Sections</h3>
        </div>
        <!--    学期和校区-->
        <div class="text">
            <span>Term:</span>
            <div class="bui_select">
                <select class="select" name="courseTerm">
                    <option></option>
                    <?php foreach ($termInfos as $termInfo):?>
                        <option value="<?php echo $termInfo['id'];?>"><?php echo $termInfo['termName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <span>Location:</span>
            <div class="bui_select">
                <select class="select" name="courseLoca">
                    <option></option>
                    <option value="Troy">Troy</option>
                    <option value="Montgomery">Montgomery</option>
                    <option value="Phenix City">Phenix City</option>
                </select>
            </div>
        </div>
        <!--    学科和课程等级-->
        <div class="text">
            <span>Subject:</span>
            <div class="bui_select">
                <select class="select" name="subjectId">
                    <option></option>
                    <?php foreach ($subInfos as $subInfo):?>
                        <option value="<?php echo $subInfo['id'];?>"><?php echo $subInfo['subShortName']."-".$subInfo['subName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <span>Course Level:</span>
            <div class="bui_select">
                <select class="select" name="courseLevel">
                    <option></option>
                    <?php foreach ($levelInfos as $levelInfo):?>
                        <option value="<?php echo $levelInfo['id'];?>"><?php echo $levelInfo['levelName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <!--    meeting时间范围-->
        <div class="text">
            <span>Sections Meeting After:</span>
            <div class="bui_select">
                <select class="select" name="courseStartTime">
                    <option></option>
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
            </div>
            <span>Sections Ending Before:</span>
            <div class="bui_select">
                <select class="select" name="courseEndTime">
                    <option></option>
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
            </div>
        </div>
        <!--    周一到周日-->
        <div class="text1">
            <label for="text1">Sun</label><input type="checkbox" name="day[sun]" value="sun">
            <label for="text1">Mon</label><input type="checkbox" name="day[mon]" value="mon">
            <label for="text1">Tue</label><input type="checkbox" name="day[tue]" value="tue">
            <label for="text1">Wed</label><input type="checkbox" name="day[wed]" value="wed">
            <label for="text1">Thu</label><input type="checkbox" name="day[thu]" value="thu">
            <label for="text1">Fri</label><input type="checkbox" name="day[fri]" value="fri">
            <label for="text1">Sat</label><input type="checkbox" name="day[sat]" value="sat">
        </div>
        <!--    课程keyword和教师名字-->
        <div class="text">
            <span>Course keywords:</span>
            <input type="text" class="search" name="courseSearch">
            <span>Instructor name keywords:</span>
            <input type="text" class="search" name="instructorSearch">
        </div>
        <div class="btn">
            <input type="submit"  class="sub24x24" value="Submit"/><input type="reset" class="res24x24"  value="Reset"/>
        </div>
    </form>
</div>
</body>
</html>