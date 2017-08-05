<?php

    error_reporting(E_ALL ^ E_DEPRECATED);

    require_once(dirname(__FILE__)."/config.php");
    // 连接数据库
    $mysql_link = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PWD);

    // 选择数据库
    mysql_select_db('php_study');

    // 设定字符集
    mysql_query("set names 'utf8'");
    // mysql_query('set names utf8'); // 错误的写法

?>
