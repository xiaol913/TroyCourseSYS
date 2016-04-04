<?php

require_once 'include.php';


//通过课程ID找到该课程时间表
$scheInfos=getScheByCourId(1100);
foreach ($scheInfos as $key=> $scheInfo){
    if($scheInfos[$key]){
        $notNulls[$key]=$key;
    }
}
foreach ($notNulls as $notNull){
    echo $notNull." ";
}
