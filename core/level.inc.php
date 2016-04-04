<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/3
 * Time: 18:26
 */

/**
 * 得到所有等级信息
 * @return array
 */
function getAllLevel(){
    $sql="select * from troy_level";
    $rows=fetchAll($sql);
    return $rows;
}