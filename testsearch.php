<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/7
 * Time: 15:08
 */
require_once "include.php";
$termInfos=getAllTerm();
$subInfos=getAllSub();
$levelInfos=getAllLevel();
$courInfos=getAllCour();
$profInfos=getAllProf();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" type="text/css" href="css/testsearch.css">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
</head>
<body>

<div>-------------------------------------------------</div>
<div class="searchBox">
    <form name="searchForm" class="searchForm" method="get" action="registerPage.php" enctype="multipart/form-data">
        <!--    标题-->
        <div class="title">
            <h3>Search and Register for Sections</h3>
        </div>
<!--        搜索内容-->
        <div class="text">
            <!--    学期和校区-->
            <div class="selectArea">
                <span>Term:</span>
                <select class="select" name="courseTerm">
                    <option></option>
                    <?php foreach ($termInfos as $termInfo):?>
                        <option value="<?php echo $termInfo['id'];?>"><?php echo $termInfo['termName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="selectArea">
                <span>Location:</span>
                <select class="select" name="courseLoca">
                    <option></option>
                    <option value="Troy">Troy</option>
                    <option value="Montgomery">Montgomery</option>
                    <option value="Phenix City">Phenix City</option>
                </select>
            </div>
        <!--    学科和课程等级-->
            <div class="selectArea">
                <span>Subject:</span>
                <select class="select" name="subjectId">
                    <option></option>
                    <?php foreach ($subInfos as $subInfo):?>
                        <option value="<?php echo $subInfo['id'];?>"><?php echo $subInfo['subShortName']."-".$subInfo['subName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="selectArea">
                <span>Course Level:</span>
                <select class="select" name="courseLevel">
                    <option></option>
                    <?php foreach ($levelInfos as $levelInfo):?>
                        <option value="<?php echo $levelInfo['id'];?>"><?php echo $levelInfo['levelName'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="selectArea">
                <span>Sections Meeting After:</span>
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
            <div class="selectArea">
                <span>Sections Ending Before:</span>
                <select class="select timeT" name="courseEndTime">
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
        <!--    周一到周日-->

            <div class="selectArea">
                <div class="checkArea">
                    <span>Sun</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[sun]" id="sun" value="sun"><label for="sun"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Mon</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[mon]" id="mon" value="mon"><label for="mon"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Tue</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[tue]" id="tue" value="tue"><label for="tue"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Wed</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[wed]" id="wed" value="wed"><label for="wed"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Thu</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[thu]" id="thu" value="thu"><label for="thu"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Fri</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[fri]" id="fri" value="fri"><label for="fri"></label>
                    </div>
                </div>
                <div class="checkArea">
                    <span>Sat</span>
                    <div class="checkbox">
                    <input type="checkbox" name="day[sat]" id="sat" value="sat"><label for="sat"></label>
                    </div>
                </div>
            </div>
            <div class="textArea">
                <div class="textSearch">
                    <span>Course keywords:</span>
                    <input type="text" class="searchName" name="courseSearch">
                </div>
                <div class="textSearch">
                    <span>Instructor name keywords:</span>
                    <input type="text" class="searchName" name="instructorSearch">
                </div>
            </div>
        <div class="searchBtn">
            <a href="javascript:document.searchForm.submit()" class="searchSubBtn">
                <i class="fa fa-search"></i>Search
                <span class="btnLine lineTop"></span>
                <span class="btnLine lineRight"></span>
                <span class="btnLine lineBottom"></span>
                <span class="btnLine lineLeft"></span>
            </a>
            <a href="javascript:void(document.getElementById('searchForm'))" class="searchResBtn">
                <i class="fa fa-times"></i>Reset
                <span class="btnLine lineTop"></span>
                <span class="btnLine lineRight"></span>
                <span class="btnLine lineBottom"></span>
                <span class="btnLine lineLeft"></span>
            </a>
        </div>
        </div>
    </form>
</div>
<script>
    function submit() {
        var cerror = validate();
        if (cerror != 0) {
            $('#error-message').html('Validation failed'+cerror);
            return;
        } else {
            $('#error-message').html('Validation passed').removeClass("alert alert-danger");
        }
</script>
</body>
</html>