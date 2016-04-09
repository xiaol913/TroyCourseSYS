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
$id=$_REQUEST['id'];
//得到所有教授信息
$profRows=getAllProf();
//得到所有学期信息
$termInfos=getAllTerm();
//得到所有等级信息
$levelInfos=getAllLevel();
//通过ID找到该课程信息
$courInfo=getCourById($id);
//通过课程ID找到该课程时间表
$scheInfo=getScheByCourId($courInfo['courseId']);

/*print_r($_POST);
echo "<br>---<br>";
print_r($scheInfo);*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
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
            <form action="doAdminAction.php?act=editCour&id=<?php echo $id;?>" method="post" onsubmit="return FormCourCheck()" enctype="multipart/form-data">
                <table class="table" width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
                    <caption>Edit Course</caption>
                    <tr>
                        <td>Course Id</td>
                        <td><input type="number" name="courseId" id="courseId" value="<?php echo $courInfo['courseId'];?>"><span style="color:#a12638;font-size:8px;"><li>(4 characters long)</li></span></td>
                    </tr>
                    <tr>
                        <td>Course Name</td>
                        <td><input type="text" name="courseName" id="courseName" value="<?php echo $courInfo['courseName'];?>"><span style="color:#a12638;font-size:8px;"><li>(Max 40 characters long, only a-z, A-Z)</li></span></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>
                            <select name="subjectId">
                                <?php foreach($rows as $row):?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $courInfo['subShortName']."--".$courInfo['subName'];?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Day</td>
                        <td>
                            Mon<input type="checkbox" <?php echo ($scheInfo['mon']==$courInfo['courseId'])?"checked":NULL;?> name="day[mon]" value="mon">
                            Tue<input type="checkbox" <?php echo ($scheInfo['tue']==$courInfo['courseId'])?"checked":NULL;?> name="day[tue]" value="tue">
                            Wed<input type="checkbox" <?php echo ($scheInfo['wed']==$courInfo['courseId'])?"checked":NULL;?> name="day[wed]" value="wed">
                            Thu<input type="checkbox" <?php echo ($scheInfo['thu']==$courInfo['courseId'])?"checked":NULL;?> name="day[thu]" value="thu">
                            Fri<input type="checkbox" <?php echo ($scheInfo['fri']==$courInfo['courseId'])?"checked":NULL;?> name="day[fri]" value="fri">
                            Sat<input type="checkbox" <?php echo ($scheInfo['sat']==$courInfo['courseId'])?"checked":NULL;?> name="day[sat]" value="sat">
                            Sun<input type="checkbox" <?php echo ($scheInfo['sun']==$courInfo['courseId'])?"checked":NULL;?> name="day[sun]" value="sun">
                        </td>
                    </tr>
                    <tr>
                        <td>Sections Meeting After</td>
                        <td>
                            <select name="courseStartTime">
                                <option value="5am" <?php echo ($courInfo['courseStartTime']=="5")?"selected=selected":NULL;?>">5am</option>
                                <option value="6am" <?php echo ($courInfo['courseStartTime']=="6")?"selected=selected":NULL;?>">6am</option>
                                <option value="7am" <?php echo ($courInfo['courseStartTime']=="7")?"selected=selected":NULL;?>">7am</option>
                                <option value="8am" <?php echo ($courInfo['courseStartTime']=="8")?"selected=selected":NULL;?>">8am</option>
                                <option value="9am" <?php echo ($courInfo['courseStartTime']=="9")?"selected=selected":NULL;?>">9am</option>
                                <option value="10am" <?php echo ($courInfo['courseStartTime']=="10")?"selected=selected":NULL;?>">10am</option>
                                <option value="11am" <?php echo ($courInfo['courseStartTime']=="11")?"selected=selected":NULL;?>">11am</option>
                                <option value="12pm" <?php echo ($courInfo['courseStartTime']=="12")?"selected=selected":NULL;?>">12pm</option>
                                <option value="1pm" <?php echo ($courInfo['courseStartTime']=="13")?"selected=selected":NULL;?>">1pm</option>
                                <option value="2pm" <?php echo ($courInfo['courseStartTime']=="14")?"selected=selected":NULL;?>">2pm</option>
                                <option value="3pm" <?php echo ($courInfo['courseStartTime']=="15")?"selected=selected":NULL;?>">3pm</option>
                                <option value="4pm" <?php echo ($courInfo['courseStartTime']=="16")?"selected=selected":NULL;?>">4pm</option>
                                <option value="5pm" <?php echo ($courInfo['courseStartTime']=="17")?"selected=selected":NULL;?>">5pm</option>
                                <option value="6pm" <?php echo ($courInfo['courseStartTime']=="18")?"selected=selected":NULL;?>">6pm</option>
                                <option value="7pm" <?php echo ($courInfo['courseStartTime']=="19")?"selected=selected":NULL;?>">7pm</option>
                                <option value="8pm" <?php echo ($courInfo['courseStartTime']=="20")?"selected=selected":NULL;?>">8pm</option>
                                <option value="9pm" <?php echo ($courInfo['courseStartTime']=="21")?"selected=selected":NULL;?>">9pm</option>
                                <option value="10pm" <?php echo ($courInfo['courseStartTime']=="22")?"selected=selected":NULL;?>">10pm</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sections Ending Before</td>
                        <td>
                            <select name="courseEndTime">
                                <option value="5am" <?php echo ($courInfo['courseEndTime']=="5")?"selected=selected":NULL;?>>5am</option>
                                <option value="6am" <?php echo ($courInfo['courseEndTime']=="6")?"selected=selected":NULL;?>>6am</option>
                                <option value="7am" <?php echo ($courInfo['courseEndTime']=="7")?"selected=selected":NULL;?>>7am</option>
                                <option value="8am" <?php echo ($courInfo['courseEndTime']=="8")?"selected=selected":NULL;?>>8am</option>
                                <option value="9am" <?php echo ($courInfo['courseEndTime']=="9")?"selected=selected":NULL;?>>9am</option>
                                <option value="10am" <?php echo ($courInfo['courseEndTime']=="10")?"selected=selected":NULL;?>>10am</option>
                                <option value="11am" <?php echo ($courInfo['courseEndTime']=="11")?"selected=selected":NULL;?>>11am</option>
                                <option value="12pm" <?php echo ($courInfo['courseEndTime']=="12")?"selected=selected":NULL;?>>12pm</option>
                                <option value="1pm" <?php echo ($courInfo['courseEndTime']=="13")?"selected=selected":NULL;?>>1pm</option>
                                <option value="2pm" <?php echo ($courInfo['courseEndTime']=="14")?"selected=selected":NULL;?>>2pm</option>
                                <option value="3pm" <?php echo ($courInfo['courseEndTime']=="15")?"selected=selected":NULL;?>>3pm</option>
                                <option value="4pm" <?php echo ($courInfo['courseEndTime']=="16")?"selected=selected":NULL;?>>4pm</option>
                                <option value="5pm" <?php echo ($courInfo['courseEndTime']=="17")?"selected=selected":NULL;?>>5pm</option>
                                <option value="6pm" <?php echo ($courInfo['courseEndTime']=="18")?"selected=selected":NULL;?>>6pm</option>
                                <option value="7pm" <?php echo ($courInfo['courseEndTime']=="19")?"selected=selected":NULL;?>>7pm</option>
                                <option value="8pm" <?php echo ($courInfo['courseEndTime']=="20")?"selected=selected":NULL;?>>8pm</option>
                                <option value="9pm" <?php echo ($courInfo['courseEndTime']=="21")?"selected=selected":NULL;?>>9pm</option>
                                <option value="10pm" <?php echo ($courInfo['courseEndTime']=="22")?"selected=selected":NULL;?>>10pm</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Capacity</td>
                        <td>
                            <input type="number" name="courseCapa" id="courseCapa" value="<?php echo $courInfo['courseCapa'];?>">
                            <span style="color:#a12638;font-size:8px;"><li>(max 3 characters long)</li></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Term</td>
                        <td>
                            <select name="courseTerm">
                                <?php foreach ($termInfos as $termInfo):?>
                                <option value="Fall Semester 2016" <?php echo ($courInfo['courseTerm']==$termInfo['id'])?"selected=selected":NULL;?>><?php echo $termInfo['termName'];?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="courseStat">
                                <option value="open" <?php echo ($courInfo['courseStat']=="open")?"selected=selected":NULL;?>>open</option>
                                <option value="close" <?php echo ($courInfo['courseStat']=="open")?"selected=selected":NULL;?>>close</option>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <select name="courseLoca">
                                <option value="Troy" <?php echo ($courInfo['courseLoca']=="Troy")?"selected=selected":NULL;?>>Troy</option>
                                <option value="Montgomery" <?php echo ($courInfo['courseLoca']=="Montgomery")?"selected=selected":NULL;?>>Montgomery</option>
                                <option value="Phenix City" <?php echo ($courInfo['courseLoca']=="Phenix City")?"selected=selected":NULL;?>>Phenix City</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Professor</td>
                        <td>
                            <select name="courseProfId">
                                <?php foreach($profRows as $profRow):?>
                                    <option value="<?php echo $profRow['id'];?>" <?php echo ($courInfo['courseProfId']==$profRow['id'])?"selected=selected":NULL;?>><?php echo $profRow['profFirstName']." ".$profRow['profLastName'];?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Credits</td>
                        <td>
                            <input type="number" name="courseCred" id="courseCred" value="<?php echo $courInfo['courseCred'];?>">
                            <span style="color:#a12638;font-size:8px;"><li>(1 characters long)</li></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Level</td>
                        <td>
                            <select name="courseLevel">
                                <?php foreach ($levelInfos as $levelInfo):?>
                                    <option value="Fall Semester 2016" <?php echo ($courInfo['courseLevel']==$levelInfo['id'])?"selected=selected":NULL;?>><?php echo $levelInfo['levelName'];?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Description</td>
                        <td>
                            <textarea name="courseDesc" id="editor_id" style="width:100%;height:150px;"><?php echo $courInfo['courseDesc'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="sub24x24" value="Submit"><input type="reset" class="res24x24"  value="Reset"/></td>
                    </tr>
                </table>
                <!--底部框架嵌套-->
                <div class="footer" style="bottom: -200px;">
                    <p><span>Troy University, Troy, Alabama 36082 | </span><a href="tel:+18004145756">1-800-414-5756</a><span> | </span>
                        <a href="http://sos.troy.edu/" target="_blank">Emergency Information</a><span> | </span><a href="http://splash.troy.edu/feedback/" target="_blank">Send us your comments</a>
                        <span> | </span><a href="http://trojan.troy.edu/students/documents/TROY-Student-Complaint-Policy-and-Form.pdf" target="_blank">Student Complaints</a>
                        <span> | </span><a href="http://trojan.troy.edu/privacy-statement.html" target="_blank">Privacy Statement</a><span> | </span><a href="http://trojan.troy.edu/disclaimer.html" target="_blank">Read Our Disclaimer</a>
                        <span> | </span><a href="http://trojan.troy.edu/accreditation.html" target="_blank">Accreditation Statement</a><span> | </span><a href="http://splash.troy.edu/go-to/jobs/" target="_blank">Employment</a>
                        <i> © 1996-2016 Troy University </i>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>