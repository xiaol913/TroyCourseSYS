<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/27
 * Time: 18:34
 */
header("content-type:text/html;charset=utf-8");
session_start();
//定义路径
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
//包含文件
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'page.func.php';
require_once 'subjects.inc.php';
require_once 'courses.inc.php';
require_once 'professor.inc.php';
require_once 'upload.func.php';
require_once 'album.inc.php';
require_once 'schedule.inc.php';
require_once 'students.inc.php';
require_once 'level.inc.php';
require_once 'term.inc.php';