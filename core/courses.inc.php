<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 17:09
 */

/**
 * 通过学科id检查是否有课程
 * @param $id
 * @return array
 */
function checkCoursesExist($id){
    $sql="select * from troy_courses where subjectId={$id}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 通过id查找课程内容
 * @param $id
 * @return array|null
 */
function getCourById($id){
    $sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id where c.id={$id}";
    return fetchOne($sql);
}

/**
 * 添加课程
 */
function addCour(){
    $arr=$_POST;
    $toCour=$arr;
    $toCour['courseAvai']=$arr['courseCapa'];
    unset($toCour['day']);
    if($arr['day']['mon']){
        $toSche['mon']=$arr['courseId'];
    }else{
        $toSche['mon']=NULL;
    }
    if($arr['day']['tue']){
        $toSche['tue']=$arr['courseId'];
    }else{
        $toSche['tue']=NULL;
    }
    if($arr['day']['wed']){
        $toSche['wed']=$arr['courseId'];
    }else{
        $toSche['wed']=NULL;
    }
    if($arr['day']['thu']){
        $toSche['thu']=$arr['courseId'];
    }else{
        $toSche['thu']=NULL;
    }
    if($arr['day']['fri']){
        $toSche['fri']=$arr['courseId'];
    }else{
        $toSche['fri']=NULL;
    }
    if($arr['day']['sat']){
        $toSche['sat']=$arr['courseId'];
    }else{
        $toSche['sat']=NULL;
    }
    if($arr['day']['sun']){
        $toSche['sun']=$arr['courseId'];
    }else{
        $toSche['sun']=NULL;
    }
    if(insert("troy_courses",$toCour)){
        if(insert("troy_schedule",$toSche)){
            echo "Successful!!!<br/><a href='listCour.php'>Return to Courses List</a>";
        }else{
            echo "Fail!!!<br/><a href='listCour.php'>Return to Courses List</a>";
        }
    }
    return;
}

/**
 * 修改课程
 * @param $id
 */
function editCour($id){
    $where="id={$id}";
    $arr=$_POST;
    $toCour=$arr;
    $scheInfo=getScheByCourId($toCour['courseId']);
    $toCour['courseAvai']=$arr['courseCapa'];
    unset($toCour['day']);
    if($arr['day']['mon']){
        $toSche['mon']=$arr['courseId'];
    }else{
        $toSche['mon']=NULL;
    }
    if($arr['day']['tue']){
        $toSche['tue']=$arr['courseId'];
    }else{
        $toSche['tue']=NULL;
    }
    if($arr['day']['wed']){
        $toSche['wed']=$arr['courseId'];
    }else{
        $toSche['wed']=NULL;
    }
    if($arr['day']['thu']){
        $toSche['thu']=$arr['courseId'];
    }else{
        $toSche['thu']=NULL;
    }
    if($arr['day']['fri']){
        $toSche['fri']=$arr['courseId'];
    }else{
        $toSche['fri']=NULL;
    }
    if($arr['day']['sat']){
        $toSche['sat']=$arr['courseId'];
    }else{
        $toSche['sat']=NULL;
    }
    if($arr['day']['sun']){
        $toSche['sun']=$arr['courseId'];
    }else{
        $toSche['sun']=NULL;
    }
    if(update("troy_courses",$toCour,$where)){
        if(update("troy_schedule",$toSche,"id={$scheInfo['id']}")){
            echo "Successful!!!<br/><a href='listCour.php'>Return to Courses List</a>";
        }else{
            echo "Fail!!!<br/><a href='listCour.php'>Return to Courses List</a>";
        }
    }
    return;
}

/**
 * 通过ID删除课程以及该课程的时间表
 * @param $id
 */
function delCour($id){
    $where="id={$id}";
//通过ID找到该课程信息
    $courInfo=getCourById($id);
//通过课程ID找到该课程时间表
    $scheInfo=getScheByCourId($courInfo['courseId']);
    if($scheInfo['mon']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['tue']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['wed']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['thu']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['fri']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['sat']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }elseif($scheInfo['sun']==$courInfo['courseId']){
        delete("troy_schedule","id={$scheInfo['id']}");
    }
    $res=delete("troy_courses",$where);
    if($res){
        echo "Successful!!!!<br/><a href='listCour.php'>Return to Courses List</a>";
    }else{
        echo "Fail!!!<br/><a href='listCour.php'>Return to Courses List</a>";
    }
    return;
}