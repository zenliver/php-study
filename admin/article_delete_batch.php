<?php
    require_once './../config/connect.php';

    $batch_del_id_str = $_GET['id'];
    // print_r($batch_del_id_str.'<br>');
    $sql_batch_del = "DELETE FROM article WHERE id IN ($batch_del_id_str)";
    // print_r($sql_batch_del);

    if (mysql_query($sql_batch_del)) {
        echo '<script>alert("批量删除成功！");</script>';
    } else {
        echo '<script>alert("批量删除失败！");</script>';
    }


?>
