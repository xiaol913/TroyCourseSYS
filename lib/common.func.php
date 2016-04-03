<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 21:44
 */

/**
 * 弹出信息窗口，并跳转页面
 * @param $mes
 * @param $url
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}
