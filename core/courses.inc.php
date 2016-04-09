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
    }else{
        echo "Fail!!!<br/><a href='listCour.php'>Return to Courses List</a>";
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

/**
 * 得到所有课程信息
 * @return array
 */
function getAllCour(){
    $sql="select c.id,c.courseName,c.courseId,c.subjectId,c.courseStartTime,c.courseEndTime,c.courseAvai,c.courseCapa,c.courseTerm,c.courseStat,c.courseLoca,c.courseDesc,c.courseProfId,c.courseCred,c.courseLevel,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName,l.levelName,t.termName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_level as l on c.courseLevel=l.id LEFT JOIN troy_term as t on c.courseTerm=t.id";
    return fetchAll($sql);
}

/**
 * 得到所有时间表信息
 * @return array
 */
function getAllSche(){
    $sql="select * from troy_schedule";
    return fetchAll($sql);
}

/**
 *  搜索课程
 * @return array
 */
function search(){
    //为搜索增加条件
    //先从POST里提取day的信息，然后根据信息从数据库里提出courseID，把where后的条件加在condition里
    $day=$_GET['day'];
    //判断$day长度，>=1则有day的信息post过来，否则则未选择
    if(count($day)>1){
        //$day是一个二维数组，所以先拆分
        for($j=0;$j<(count($day)-1);$j++){
            $dayKey=key($day);
            $dayCondition .= $dayKey.'='.$day[$dayKey].' and ';
            next($day);
        }
        $lastDayKey=key($day);
        $value=$lastDayKey;
        reset($day);
        $dayCondition=$dayCondition.$lastDayKey.'='.$day[$lastDayKey];
        $sql="select mon,tue,wed,thu,fri,sat,sun from troy_schedule where {$dayCondition}";
        $res=fetchAll($sql);
        //数据库返回的时间表的数据也是一个二维数组，也需拆分，>=则有数据，否则没数据
        if(count($res)>1){
            for($k=0;$k<(count($res)-1);$k++){
                $result=key($res);
                $condition.="courseId={$res[$result][$value]} or ";
                next($res);
            }
            $lastResult=key($res);
            reset($res);//重置指针
            $condition=$condition."courseId={$res[$lastResult][$value]}";//最后结果
        }elseif (count($res)==1) {
            $lastResult = key($res);
            $condition = $condition . "courseId={$res[$lastResult][$value]}";//最后结果
        }
    }elseif (count($day)==1){
        $oneKey=key($day);
        $dayCondition=$oneKey.'='.$day[$oneKey];
        print_r($dayCondition);
        $sql="select mon,tue,wed,thu,fri,sat,sun from troy_schedule where {$dayCondition}";
        $res=fetchAll($sql);
        //同样是二维数组
        if(count($res)>1){
            for($k=0;$k<(count($res)-1);$k++){
                $result=key($res);
                $condition.="courseId={$res[$result][$oneKey]} or ";
                next($res);
            }
            $lastResult=key($res);
            reset($res);
            $condition=$condition."courseId={$res[$lastResult][$oneKey]}";//最后结果
        }elseif (count($res)==1){
            $lastResult=key($res);
            $condition=$condition."courseId={$res[$lastResult][$oneKey]}";//最后结果
        }
    }
    //将POST的数组移到arr里，并移出day信息
    $arr=$_GET;
    if($_GET['day']){
        unset($arr['day']);
    }
    //先根据是否为空值，留下有值的数据
    foreach ($arr as $key => $value) {
        if ($arr[$key]) {
            $notNull[$key] = $arr[$key];
        }
    }
    //判断从day分析出来的courseID是有值时
    if($condition){
        //判断传来的值的个数
        if (count($notNull) >= 1) {
            //先取除最后一个元素以前的数据
            for ($i = 0; $i < count($notNull); $i++) {
                $key = key($notNull);
                if ($key == 'courseStartTime') {
                    $condition .= ' and '.$key . '>' . $notNull[$key];//最后结果
                    next($notNull);
                } elseif ($key == 'courseEndTime') {
                    $condition .= ' and '.$key . '<' . $notNull[$key];//最后结果
                    next($notNull);
                } elseif ($key=='courseSearch'){
                    $condition.=" and courseName like '%{$notNull[$key]}%'";
                    next($notNull);
                } elseif ($key=='instructorSearch'){
                    $condition.=" and profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%'";
                    next($notNull);
                } elseif ($key=='courseLoca'){
                    $condition.=" and courseLoca like '{$notNull[$key]}'";
                    next($notNull);
                } else {
                    $condition .= ' and '.$key . '=' . $notNull[$key];//最后结果
                    next($notNull);
                }
            }
        }
        //判断从day分析出来的courseID是没有值时
    }else{
        //判断传来的值的个数
        if (count($notNull) > 1) {
            //先取除最后一个元素以前的数据
            for ($i = 0; $i < (count($notNull) - 1); $i++) {
                $key = key($notNull);
                if ($key == 'courseStartTime') {
                    $condition .= $key . '>' . $notNull[$key] . ' and ';
                    next($notNull);
                } elseif ($key == 'courseEndTime') {
                    $condition .= $key . '<' . $notNull[$key] . ' and ';
                    next($notNull);
                } elseif ($key=='courseSearch'){
                    $condition.="courseName like '%{$notNull[$key]}%' and  ";
                    next($notNull);
                } elseif ($key=='instructorSearch'){
                    $condition.="profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%' and ";
                    next($notNull);
                } elseif ($key=='courseLoca'){
                    $condition.="courseLoca like '{$notNull[$key]}' and  ";
                    next($notNull);
                } else {
                    $condition .= $key . '=' . $notNull[$key] . ' and ';
                    next($notNull);
                }
            }
            $lastKey = key($notNull);
            if ($lastKey == 'courseStartTime') {
                $condition .= $lastKey . '>' . $notNull[$lastKey];//最后结果
                reset($notNull);
            } elseif ($lastKey == 'courseEndTime') {
                $condition .= $lastKey . '<' . $notNull[$lastKey];//最后结果
                reset($notNull);
            } elseif ($lastKey=='courseSearch'){
                $condition.="courseName like '%{$notNull[$lastKey]}%'";
                next($notNull);
            } elseif ($lastKey=='instructorSearch'){
                $condition.="profFirstName like '%{$notNull[$lastKey]}%' or profFirstName like '%{$notNull[$lastKey]}%'";
                next($notNull);
            } elseif ($lastKey=='courseLoca'){
                $condition.="courseLoca like '{$notNull[$lastKey]}'";
                next($notNull);
            } else {
                $condition .= $lastKey . '=' . $notNull[$lastKey];//最后结果
                reset($notNull);
            }
        } elseif (count($notNull) == 1) {
            $key = key($notNull);
            if ($key == 'courseStartTime') {
                $condition .= $key . '>' . $notNull[$key];//最后结果
            } elseif ($key == 'courseEndTime') {
                $condition .= $key . '<' . $notNull[$key];//最后结果
            } elseif ($key=='courseSearch'){
                $condition.="courseName like '%{$notNull[$key]}%'";
                next($notNull);
            } elseif ($key=='instructorSearch'){
                $condition.="profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%'";
                next($notNull);
            } elseif ($key=='courseLoca'){
                $condition.="courseLoca like '{$notNull[$key]}'";
                next($notNull);
            } else {
                $condition .= $key . '=' . $notNull[$key];//最后结果
            }
            //一个数据也没有的情况
        }else{
            echo "At least one condition!!!<br/><a href='search.php'>Return to Search Page</a>";
            exit;
        }
    }
    $sql = "select c.*,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName,t.termName,l.levelName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_term as t on c.courseTerm=t.id LEFT JOIN troy_level as l on c.courseLevel=l.id WHERE {$condition}";
    $rows = fetchAll($sql);
    if ($rows){
        return $rows;
    }else{
        echo "No result!!!<br/><a href='search.php'>Return to Search Page</a>";
    }
}

/**
 * 返回到注册课程页面
 * @return array
 */
function search1(){
    //为搜索增加条件
    //先从POST里提取day的信息，然后根据信息从数据库里提出courseID，把where后的条件加在condition里
    $day=$_GET['day'];
    //判断$day长度，>=1则有day的信息post过来，否则则未选择
    if(count($day)>1){
        //$day是一个二维数组，所以先拆分
        for($j=0;$j<(count($day)-1);$j++){
            $dayKey=key($day);
            $dayCondition .= $dayKey.'='.$day[$dayKey].' and ';
            next($day);
        }
        $lastDayKey=key($day);
        $value=$lastDayKey;
        reset($day);
        $dayCondition=$dayCondition.$lastDayKey.'='.$day[$lastDayKey];
        $sql="select mon,tue,wed,thu,fri,sat,sun from troy_schedule where {$dayCondition}";
        $res=fetchAll($sql);
        //数据库返回的时间表的数据也是一个二维数组，也需拆分，>=则有数据，否则没数据
        if(count($res)>1){
            for($k=0;$k<(count($res)-1);$k++){
                $result=key($res);
                $condition.="courseId={$res[$result][$value]} or ";
                next($res);
            }
            $lastResult=key($res);
            reset($res);//重置指针
            $condition=$condition."courseId={$res[$lastResult][$value]}";//最后结果
        }elseif (count($res)==1) {
            $lastResult = key($res);
            $condition = $condition . "courseId={$res[$lastResult][$value]}";//最后结果
        }
    }elseif (count($day)==1){
        $oneKey=key($day);
        $dayCondition=$oneKey.'='.$day[$oneKey];
        print_r($dayCondition);
        $sql="select mon,tue,wed,thu,fri,sat,sun from troy_schedule where {$dayCondition}";
        $res=fetchAll($sql);
        //同样是二维数组
        if(count($res)>1){
            for($k=0;$k<(count($res)-1);$k++){
                $result=key($res);
                $condition.="courseId={$res[$result][$oneKey]} or ";
                next($res);
            }
            $lastResult=key($res);
            reset($res);
            $condition=$condition."courseId={$res[$lastResult][$oneKey]}";//最后结果
        }elseif (count($res)==1){
            $lastResult=key($res);
            $condition=$condition."courseId={$res[$lastResult][$oneKey]}";//最后结果
        }
    }
    //将POST的数组移到arr里，并移出day信息
    $arr=$_GET;
    if($_GET['day']){
        unset($arr['day']);
    }
    //先根据是否为空值，留下有值的数据
    foreach ($arr as $key => $value) {
        if ($arr[$key]) {
            $notNull[$key] = $arr[$key];
        }
    }
    //判断从day分析出来的courseID是有值时
    if($condition){
        //判断传来的值的个数
        if (count($notNull) >= 1) {
            //先取除最后一个元素以前的数据
            for ($i = 0; $i < count($notNull); $i++) {
                $key = key($notNull);
                if ($key == 'courseStartTime') {
                    $condition .= ' and '.$key . '>' . $notNull[$key];//最后结果
                    next($notNull);
                } elseif ($key == 'courseEndTime') {
                    $condition .= ' and '.$key . '<' . $notNull[$key];//最后结果
                    next($notNull);
                } elseif ($key=='courseSearch'){
                    $condition.=" and courseName like '%{$notNull[$key]}%'";
                    next($notNull);
                } elseif ($key=='instructorSearch'){
                    $condition.=" and profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%'";
                    next($notNull);
                } elseif ($key=='courseLoca'){
                    $condition.=" and courseLoca like '{$notNull[$key]}'";
                    next($notNull);
                } else {
                    $condition .= ' and '.$key . '=' . $notNull[$key];//最后结果
                    next($notNull);
                }
            }
        }
        //判断从day分析出来的courseID是没有值时
    }else{
        //判断传来的值的个数
        if (count($notNull) > 1) {
            //先取除最后一个元素以前的数据
            for ($i = 0; $i < (count($notNull) - 1); $i++) {
                $key = key($notNull);
                if ($key == 'courseStartTime') {
                    $condition .= $key . '>' . $notNull[$key] . ' and ';
                    next($notNull);
                } elseif ($key == 'courseEndTime') {
                    $condition .= $key . '<' . $notNull[$key] . ' and ';
                    next($notNull);
                } elseif ($key=='courseSearch'){
                    $condition.="courseName like '%{$notNull[$key]}%' and  ";
                    next($notNull);
                } elseif ($key=='instructorSearch'){
                    $condition.="profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%' and ";
                    next($notNull);
                } elseif ($key=='courseLoca'){
                    $condition.="courseLoca like '{$notNull[$key]}' and  ";
                    next($notNull);
                } else {
                    $condition .= $key . '=' . $notNull[$key] . ' and ';
                    next($notNull);
                }
            }
            $lastKey = key($notNull);
            if ($lastKey == 'courseStartTime') {
                $condition .= $lastKey . '>' . $notNull[$lastKey];//最后结果
                reset($notNull);
            } elseif ($lastKey == 'courseEndTime') {
                $condition .= $lastKey . '<' . $notNull[$lastKey];//最后结果
                reset($notNull);
            } elseif ($lastKey=='courseSearch'){
                $condition.="courseName like '%{$notNull[$lastKey]}%'";
                next($notNull);
            } elseif ($lastKey=='instructorSearch'){
                $condition.="profFirstName like '%{$notNull[$lastKey]}%' or profFirstName like '%{$notNull[$lastKey]}%'";
                next($notNull);
            } elseif ($lastKey=='courseLoca'){
                $condition.="courseLoca like '{$notNull[$lastKey]}'";
                next($notNull);
            } else {
                $condition .= $lastKey . '=' . $notNull[$lastKey];//最后结果
                reset($notNull);
            }
        } elseif (count($notNull) == 1) {
            $key = key($notNull);
            if ($key == 'courseStartTime') {
                $condition .= $key . '>' . $notNull[$key];//最后结果
            } elseif ($key == 'courseEndTime') {
                $condition .= $key . '<' . $notNull[$key];//最后结果
            } elseif ($key=='courseSearch'){
                $condition.="courseName like '%{$notNull[$key]}%'";
                next($notNull);
            } elseif ($key=='instructorSearch'){
                $condition.="profFirstName like '%{$notNull[$key]}%' or profFirstName like '%{$notNull[$key]}%'";
                next($notNull);
            } elseif ($key=='courseLoca'){
                $condition.="courseLoca like '{$notNull[$key]}'";
                next($notNull);
            } else {
                $condition .= $key . '=' . $notNull[$key];//最后结果
            }
            //一个数据也没有的情况
        }else{
            echo "At least one condition!!!<br/><a href='index.php'>Return to Home Page</a>";
            exit;
        }
    }
    $sql = "select c.*,p.profFirstName,p.profLastName,p.profEmail,p.profPhoneNum,p.profDesc,s.subShortName,s.subName,t.termName,l.levelName from troy_courses as c left join troy_subjects s on c.subjectId=s.id left join troy_professors as p on c.courseProfId=p.id LEFT JOIN troy_term as t on c.courseTerm=t.id LEFT JOIN troy_level as l on c.courseLevel=l.id WHERE {$condition}";
    $rows = fetchAll($sql);
    if ($rows){
        return $rows;
    }else{
        echo "No result!!!<br/><a href='index.php'>Return to Home Page</a>";
        exit;
    }
}
