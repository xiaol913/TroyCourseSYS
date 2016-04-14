<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/6
 * Time: 2:21
 */
require_once "include.php";
$termInfos=getAllTerm();
$subInfos=getAllSub();
$levelInfos=getAllLevel();
$courInfos=getAllCour();
$profInfos=getAllProf();
if(checkStudLogin()==false){
    alertMes("Please Login!!!","login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Troy Courses System</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/normalize.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/animation.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/content.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="head">
    <!--建立logo，fl为CSS左浮动-->
    <div class="logo fl"><a href="#"></a></div>
    <!--建立头部右边区域文字，并fr右浮动-->
    <div class="operation_user fr">
        <div class="link">
                <b style="color:#fff">Welcome,
                    <?php
                    if(isset($_SESSION['TroyCourSYSstudentName'])){
                        echo $_SESSION['TroyCourSYSstudentName'];
                    }elseif(isset($_COOKIE['TroyCourSYSstudentName'])){
                        echo $_COOKIE['TroyCourSYSstudentName'];
                    }
                    ?>
                </b>&nbsp;&nbsp;<a href="index.php" style="color:#fff" class="" ><i class="fa fa-home"></i><span>Home</span></a><a href="#" class="" onclick="history.go(-1)" style="color:#fff"><i class="fa fa-reply"></i><span>Back</span></a><a href="doAction.php?act=studLogout" class="" style="color:#fff"><i class="fa fa-power-off"></i><span>Logout</span></a>
        </div>
    </div>
</div>
<!--main page-->
<div class="container">
    <div class="st-container">
        <!--        nav start-->
        <input type="radio" name="radio-set" id="st-control-1" checked="checked">
        <a href="#st-panel-1">Home</a>
        <input type="radio" name="radio-set" id="st-control-2">
        <a href="#st-panel-2">Academics</a>
        <input type="radio" name="radio-set" id="st-control-3">
        <a href="#st-panel-3">Instructors</a>
        <input type="radio" name="radio-set" id="st-control-4">
        <a href="#st-panel-4">Register</a>
        <input type="radio" name="radio-set" id="st-control-5">
        <a href="#st-panel-5">Yourself</a>
        <!--    nav end-->
        <!--    scroll start-->
        <div class="st-scroll">
            <!--            first section-->
            <section class="st-panel-1" id="st-panel-1">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <h2>Troy University Courses System</h2>
                <p>You can search and register course by yourself now!</p>
            </section>
            <!--                second section-->
            <section class="st-panel-2 st-color" id="st-panel-2">
                <div class="st-desc-white-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-white-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn1">
                    <div class="st-btn-1"><input type="button" onclick="window.location.href='undergradList.php'" id="st-control-2-1" ><a href="#">Undergrad</a><i style="color:#fff" class="fa fa-paper-plane fa-5x"></i></div>
                    <div class="st-btn-2"><input type="button" id="st-control-2-2" onclick="window.location.href='graduateList.php'"><a href="#">Graduate</a><i style="color:#fff" class="fa fa-graduation-cap fa-5x"></i></div>
                    <div class="st-btn-3"><input type="button" id="st-control-2-3" onclick="window.location.href='educationList.php'"><a href="#" onclick="">Education</a><i style="color:#fff" class="fa fa-flask fa-5x"></i></div>
                    <div class="st-btn-4"><input type="button" id="st-control-2-4" onclick="window.location.href='doctorateList.php'"><a href="#" onclick="">Doctorate</a><i style="color:#fff" class="fa fa-university fa-5x"></i></div>
                </div>
            </section>
            <!--            third section-->
            <section class="st-panel-3" id="st-panel-3">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-red-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="details">
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
                        <?php foreach($profInfos as $profInfo):?>
                            <tr>
                                <td><?php echo $profInfo['id']; ?></td>
                                <td><?php echo $profInfo['profFirstName']." ".$profInfo['profLastName']; ?></td>
                                <td><?php echo $profInfo['profEmail']; ?></td>
                                <td><?php echo $profInfo['profPhoneNum']; ?></td>
                                <td>
                                    <?php
                                    $profImgs=getAllImgsByProfId($profInfo['id']);
                                    if($profImgs&&is_array($profImgs)){?>
                                        <?php foreach($profImgs as $img):?>
                                            <img width="60" height="60" src="admin/uploads/<?php echo $img['albumPath'];?>" alt=""/>
                                        <?php endforeach;?>
                                    <?php }else{echo "No image";};?>
                                    <?php echo $profInfo['profDesc']; ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!--            fourth section-->
            <section class="st-panel-4  st-color" id="st-panel-4">
                <div>
                    <div class="st-desc-white-r"></div><i class="fa fa-chevron-circle-right"></i>
                    <div class="st-desc-white-l"></div><i class="fa fa-chevron-circle-left"></i>
                    <div class="searchBox">
                        <form class="searchForm" name="CourseSearchForm" method="get" action="registerPage.php" enctype="multipart/form-data">
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
                                    <abc>Sections Meeting After:</abc>
                                    <select class="select" name="courseStartTime">
                                        <option></option>
                                        <option value="5">5am</option>
                                        <option value="6">6am</option>
                                        <option value="7">7am</option>
                                        <option value="8">8am</option>
                                        <option value="9">9am</option>
                                        <option value="10">10am</option>
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
                                    <abc>Sections Ending Before:</abc>
                                    <select class="select timeT" name="courseEndTime">
                                        <option></option>
                                        <option value="5">5am</option>
                                        <option value="6">6am</option>
                                        <option value="7">7am</option>
                                        <option value="8">8am</option>
                                        <option value="9">9am</option>
                                        <option value="10">10am</option>
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
                                        <span>Course Id:</span>
                                        <input type="text" class="searchName" name="courseId" >
                                    </div>
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
                                    <a href="javascript:document.CourseSearchForm.submit()" onfocus="this.blur();" class="searchSubBtn">
                                        <i class="fa fa-search"></i>Search
                                        <span class="btnLine lineTop"></span>
                                        <span class="btnLine lineRight"></span>
                                        <span class="btnLine lineBottom"></span>
                                        <span class="btnLine lineLeft"></span>
                                    </a>
                                    <a href="javascript:document.CourseSearchForm.reset()" onfocus="this.blur();" class="searchResBtn">
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
                </div>
            </section>
            <!--            fifth section-->
            <section class="st-panel-5" id="st-panel-5">
                <div class="st-desc-red-r"></div><i class="fa fa-chevron-circle-right"></i>
                <div class="st-desc-red-l"></div><i class="fa fa-chevron-circle-left"></i>
                <div class="fontBtn2">
                    <div class="st-btn-5"><input type="button" id="st-control-5-1" onclick="window.location.href='yourProfile.php?id=<?php
                        if(isset($_SESSION['TroyCourSYSstudentId'])){
                            echo $_SESSION['TroyCourSYSstudentId'];
                        }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                            echo $_COOKIE['TroyCourSYSstudentId'];
                        }
                        ?>'"><a href="#" onclick="">Your Info</a><i style="color:#a12638" class="fa fa-child fa-5x"></i></div>
                    <div class="st-btn-6"><input type="button" id="st-control-5-2" onclick="window.location.href='dropCour.php?id=<?php
                        if(isset($_SESSION['TroyCourSYSstudentId'])){
                            echo $_SESSION['TroyCourSYSstudentId'];
                        }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                            echo $_COOKIE['TroyCourSYSstudentId'];
                        }
                        ?>'"><a href="#" onclick="">Your Schedule</a><i style="color:#a12638" class="fa fa-calendar fa-5x"></i></div>
                    <div class="st-btn-7"><input type="button" id="st-control-5-3" onclick="window.location.href='studSetting.php?id=<?php
                        if(isset($_SESSION['TroyCourSYSstudentId'])){
                            echo $_SESSION['TroyCourSYSstudentId'];
                        }elseif(isset($_COOKIE['TroyCourSYSstudentId'])){
                            echo $_COOKIE['TroyCourSYSstudentId'];
                        }
                        ?>'"><a href="#" onclick="">Setting</a><i style="color:#a12638" class="fa fa-cog fa-5x"></i></div>
            </section>
        </div>
    </div>
</div>
</body>
</html>