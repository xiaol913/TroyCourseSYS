<?php

require_once 'include.php';

$sql="select courseAvai from troy_courses WHERE courseId=1100";
$res=fetchOne($sql);
foreach ($res as $num)
    $newNum=$num-1;
$arr['courseAvai']=$newNum;


