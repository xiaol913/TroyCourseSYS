<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 18:32
 */
/**
 * 连接数据库
 * @return resource
 */
/*function connect(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    return $link;
}*/

/**
 * 数据查找--1条
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}

/**
 * 数据查找--所有
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchAll($sql,$result_type=MYSQLI_ASSOC){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    $result=mysqli_query($link,$sql);
    while(@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**
 * 数据插入
 * @param $table
 * @param $array
 * @return int|string
 */
function insert($table,$array){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert into {$table}($keys) values ({$vals})";
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}

/**
 * 数据更新
 * @param $table
 * @param $array
 * @param null $where
 * @return bool|int
 */
function update($table,$array,$where=null){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysqli_query($link,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

/**
 * 数据删除
 * @param $table
 * @param null $where
 * @return int
 */
function delete($table,$where=null){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}

/**
 * 得到数据总数量
 * @param $sql
 * @return int
 */
function getResultNum($sql){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    $result=mysqli_query($link,$sql);
    return mysqli_num_rows($result);
}

/**
 * 得到最后一条数据id
 * @return int|string
 */
function getInsertId(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("Connect MySQL Fail:".mysqli_errno($link).":".mysqli_errno($link));
    return mysqli_insert_id($link);
}