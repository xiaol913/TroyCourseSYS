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
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
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
                    <option value="5am" <?php echo ($courInfo['courseStartTime']=="5am")?"selected=selected":NULL;?>">5am</option>
                    <option value="6am" <?php echo ($courInfo['courseStartTime']=="6am")?"selected=selected":NULL;?>">6am</option>
                    <option value="7am" <?php echo ($courInfo['courseStartTime']=="7am")?"selected=selected":NULL;?>">7am</option>
                    <option value="8am" <?php echo ($courInfo['courseStartTime']=="8am")?"selected=selected":NULL;?>">8am</option>
                    <option value="9am" <?php echo ($courInfo['courseStartTime']=="9am")?"selected=selected":NULL;?>">9am</option>
                    <option value="10am" <?php echo ($courInfo['courseStartTime']=="10am")?"selected=selected":NULL;?>">10am</option>
                    <option value="11am" <?php echo ($courInfo['courseStartTime']=="11am")?"selected=selected":NULL;?>">11am</option>
                    <option value="12pm" <?php echo ($courInfo['courseStartTime']=="12pm")?"selected=selected":NULL;?>">12pm</option>
                    <option value="1pm" <?php echo ($courInfo['courseStartTime']=="1pm")?"selected=selected":NULL;?>">1pm</option>
                    <option value="2pm" <?php echo ($courInfo['courseStartTime']=="2pm")?"selected=selected":NULL;?>">2pm</option>
                    <option value="3pm" <?php echo ($courInfo['courseStartTime']=="3pm")?"selected=selected":NULL;?>">3pm</option>
                    <option value="4pm" <?php echo ($courInfo['courseStartTime']=="4pm")?"selected=selected":NULL;?>">4pm</option>
                    <option value="5pm" <?php echo ($courInfo['courseStartTime']=="5pm")?"selected=selected":NULL;?>">5pm</option>
                    <option value="6pm" <?php echo ($courInfo['courseStartTime']=="6pm")?"selected=selected":NULL;?>">6pm</option>
                    <option value="7pm" <?php echo ($courInfo['courseStartTime']=="7pm")?"selected=selected":NULL;?>">7pm</option>
                    <option value="8pm" <?php echo ($courInfo['courseStartTime']=="8pm")?"selected=selected":NULL;?>">8pm</option>
                    <option value="9pm" <?php echo ($courInfo['courseStartTime']=="9pm")?"selected=selected":NULL;?>">9pm</option>
                    <option value="10pm" <?php echo ($courInfo['courseStartTime']=="10pm")?"selected=selected":NULL;?>">10pm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Sections Ending Before</td>
            <td>
                <select name="courseEndTime">
                    <option value="5am" <?php echo ($courInfo['courseEndTime']=="5am")?"selected=selected":NULL;?>>5am</option>
                    <option value="6am" <?php echo ($courInfo['courseEndTime']=="6am")?"selected=selected":NULL;?>>6am</option>
                    <option value="7am" <?php echo ($courInfo['courseEndTime']=="7am")?"selected=selected":NULL;?>>7am</option>
                    <option value="8am" <?php echo ($courInfo['courseEndTime']=="8am")?"selected=selected":NULL;?>>8am</option>
                    <option value="9am" <?php echo ($courInfo['courseEndTime']=="9am")?"selected=selected":NULL;?>>9am</option>
                    <option value="10am" <?php echo ($courInfo['courseEndTime']=="10am")?"selected=selected":NULL;?>>10am</option>
                    <option value="11am" <?php echo ($courInfo['courseEndTime']=="11am")?"selected=selected":NULL;?>>11am</option>
                    <option value="12pm" <?php echo ($courInfo['courseEndTime']=="12pm")?"selected=selected":NULL;?>>12pm</option>
                    <option value="1pm" <?php echo ($courInfo['courseEndTime']=="1pm")?"selected=selected":NULL;?>>1pm</option>
                    <option value="2pm" <?php echo ($courInfo['courseEndTime']=="2pm")?"selected=selected":NULL;?>>2pm</option>
                    <option value="3pm" <?php echo ($courInfo['courseEndTime']=="3pm")?"selected=selected":NULL;?>>3pm</option>
                    <option value="4pm" <?php echo ($courInfo['courseEndTime']=="4pm")?"selected=selected":NULL;?>>4pm</option>
                    <option value="5pm" <?php echo ($courInfo['courseEndTime']=="5pm")?"selected=selected":NULL;?>>5pm</option>
                    <option value="6pm" <?php echo ($courInfo['courseEndTime']=="6pm")?"selected=selected":NULL;?>>6pm</option>
                    <option value="7pm" <?php echo ($courInfo['courseEndTime']=="7pm")?"selected=selected":NULL;?>>7pm</option>
                    <option value="8pm" <?php echo ($courInfo['courseEndTime']=="8pm")?"selected=selected":NULL;?>>8pm</option>
                    <option value="9pm" <?php echo ($courInfo['courseEndTime']=="9pm")?"selected=selected":NULL;?>>9pm</option>
                    <option value="10pm" <?php echo ($courInfo['courseEndTime']=="10pm")?"selected=selected":NULL;?>>10pm</option>
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
                    <option value="Fall Semester 2016" <?php echo ($courInfo['courseTerm']=="Fall Semester 2016")?"selected=selected":NULL;?>>Fall Semester 2016</option>
                    <option value="Summer Semester 2016" <?php echo ($courInfo['courseTerm']=="Summer Semester 2016")?"selected=selected":NULL;?>>Summer Semester 2016</option>
                    <option value="Spring Semester 2016" <?php echo ($courInfo['courseTerm']=="Spring Semester 2016")?"selected=selected":NULL;?>>Spring Semester 2016</option>
                    <option value="Term V 2016" <?php echo ($courInfo['courseTerm']=="Term V 2016")?"selected=selected":NULL;?>>Term V 2016</option>
                    <option value="Term IV 2016" <?php echo ($courInfo['courseTerm']=="Term IV 2016")?"selected=selected":NULL;?>>Term IV 2016</option>
                    <option value="Term III 2016" <?php echo ($courInfo['courseTerm']=="Term III 2016")?"selected=selected":NULL;?>>Term III 2016</option>
                    <option value="Summer International 2016" <?php echo ($courInfo['courseTerm']=="Summer International 2016")?"selected=selected":NULL;?>>Summer International 2016</option>
                    <option value="Spring International 2016" <?php echo ($courInfo['courseTerm']=="Spring International 2016")?"selected=selected":NULL;?>>Spring International 2016</option>
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
            <td>Academic Level</td>
            <td>
                <select name="courseLevel">
                    <option value="Doctorate" <?php echo ($courInfo['courseLevel']=="Doctorate")?"selected=selected":NULL;?>>Doctorate</option>
                    <option value="Education Specialist" <?php echo ($courInfo['courseLevel']=="Education Specialist")?"selected=selected":NULL;?>>Education Specialist</option>
                    <option value="Graduate" <?php echo ($courInfo['courseLevel']=="Graduate")?"selected=selected":NULL;?>>Graduate</option>
                    <option value="Undergrad" <?php echo ($courInfo['courseLevel']=="Undergrad")?"selected=selected":NULL;?>>Undergrad</option>
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
</form>
</body>
</html>