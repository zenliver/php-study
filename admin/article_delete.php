<?php
    require_once './../config/connect.php';

    // print_r($_GET);
    $id = $_GET['id'];
    $sql_del = "DELETE FROM article WHERE id=$id";
    mysql_query($sql_del);
    if (mysql_query($sql_del)) {
        echo '<script>alert("文章删除成功！");location.href="./index.php";</script>';
    } else {
        echo '<script>alert("文章删除失败！");location.href="./index.php";</script>';
    }


?>
