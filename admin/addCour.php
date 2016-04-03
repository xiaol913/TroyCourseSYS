<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 15:05
 */
require_once "../include.php";
checkLogined();
$rows=getAllSub();
if(!$rows){
    alertMes("No Subjects!!!", "addSub.php");
}
$profRows=getAllProf();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
    <link rel="stylesheet" href="css/backstage.css" type="text/css">
    <script src="js/formVerify.js" type="text/javascript"></script>
</head>
<body>
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
                    <option value="5am">5am</option>
                    <option value="6am">6am</option>
                    <option value="7am">7am</option>
                    <option value="8am">8am</option>
                    <option value="9am">9am</option>
                    <option value="10am">10m</option>
                    <option value="11am">11am</option>
                    <option value="12pm">12pm</option>
                    <option value="1pm">1pm</option>
                    <option value="2pm">2pm</option>
                    <option value="3pm">3pm</option>
                    <option value="4pm">4pm</option>
                    <option value="5pm">5pm</option>
                    <option value="6pm">6pm</option>
                    <option value="7pm">7pm</option>
                    <option value="8pm">8pm</option>
                    <option value="9pm">9pm</option>
                    <option value="10pm">10pm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Sections Ending Before</td>
            <td>
                <select name="courseEndTime">
                    <option value="5am">5am</option>
                    <option value="6am">6am</option>
                    <option value="7am">7am</option>
                    <option value="8am">8am</option>
                    <option value="9am">9am</option>
                    <option value="10am">10m</option>
                    <option value="11am">11am</option>
                    <option value="12pm">12pm</option>
                    <option value="1pm">1pm</option>
                    <option value="2pm">2pm</option>
                    <option value="3pm">3pm</option>
                    <option value="4pm">4pm</option>
                    <option value="5pm">5pm</option>
                    <option value="6pm">6pm</option>
                    <option value="7pm">7pm</option>
                    <option value="8pm">8pm</option>
                    <option value="9pm">9pm</option>
                    <option value="10pm">10pm</option>
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
                    <option value="Fall Semester 2016">Fall Semester 2016</option>
                    <option value="Summer Semester 2016">Summer Semester 2016</option>
                    <option value="Spring Semester 2016">Spring Semester 2016</option>
                    <option value="Term V 2016">Term V 2016</option>
                    <option value="Term IV 2016">Term IV 2016</option>
                    <option value="Term III 2016">Term III 2016</option>
                    <option value="Summer International 2016">Summer International 2016</option>
                    <option value="Spring International 2016">Spring International 2016</option>
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
            <td>Academic Level</td>
            <td>
                <select name="courseLevel">
                    <option value="Doctorate">Doctorate</option>
                    <option value="Education Specialist">Education Specialist</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Undergrad">Undergrad</option>
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