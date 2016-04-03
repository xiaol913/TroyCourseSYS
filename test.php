<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/4/2
 * Time: 2:53
 */
require_once "include.php";

if(checkStudLogin()==false){
    echo "<br>---<br>";
}else{
    echo "<br>+++<br>";
}
print_r($_SESSION['TroyCourSYSstudentId']);

echo "<br>***<br>";
print_r($_COOKIE['TroyCourSYSstudentId']);


