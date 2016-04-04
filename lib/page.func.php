<?php
/**
 * Created by PhpStorm.
 * User: ShawnG
 * Date: 2016/3/28
 * Time: 4:50
 */

/**
 * 分页代码
 * @param $page
 * @param $totalPage
 * @param null $where
 * @param string $sep
 * @return string
 */
function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
    $where=($where==null)?null:"&".$where;
    $url = $_SERVER ['PHP_SELF'];
    $index = ($page == 1) ? "<img style='margin-bottom: 7px;' src=\"../img/icon/firstPage20x20.png\" align='center'>" : "<a href='{$url}?page=1{$where}'><img style='margin-bottom: 7px;' src=\"../img/icon/firstpage20x20.png\" align='center'></a>";
    $last = ($page == $totalPage) ? "<img style='margin-bottom: 7px;' src=\"../img/icon/lastPage20x20.png\" align='center'>" : "<a href='{$url}?page={$totalPage}{$where}'><img style='margin-bottom: 7px;' src=\"../img/icon/lastPage20x20.png\" align='center'></a>";
    $prevPage=($page>=1)?$page-1:1;
    $nextPage=($Page>=$totalPage)?$totalPage:$page+1;
    $prev = ($page == 1) ? "<img style='margin-bottom: 7px;' src=\"../img/icon/previousPage20x20.png\" align='center'>" : "<a href='{$url}?page={$prevPage}{$where}'><img style='margin-bottom: 7px;' src=\"../img/icon/previousPage20x20.png\" align='center'></a>";
    $next = ($page == $totalPage) ? "<img style='margin-bottom: 7px;' src=\"../img/icon/nextPage20x20.png\" align='center'>" : "<a href='{$url}?page={$nextPage}{$where}'><img style='margin-bottom: 7px;' src=\"../img/icon/nextPage20x20.png\" align='center'></a>";
    for($i = 1; $i <= $totalPage; $i ++) {
        //当前页无连接
        if ($page == $i) {
            $p.= "[{$i}]";
        } else {
            $p.= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr=$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
    return $pageStr;
}