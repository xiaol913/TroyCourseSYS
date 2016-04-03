<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/30
 * Time: 1:57
 */

/**
 * 通过课程ID查找时间表
 * @param $id
 * @return array
 */
function getScheByCourId($id){
    $sql="select * from troy_schedule WHERE mon={$id} OR tue={$id} OR wed={$id} OR thu={$id} OR fri={$id} OR sat={$id} OR sun={$id}";
    $result=fetchOne($sql);
    return $result;
}
