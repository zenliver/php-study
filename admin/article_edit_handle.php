<?php
    require_once './../config/connect.php';

    // print_r($_POST);

    $id = $_POST['id'];
    $article_title = $_POST['article_title'];
    $article_author = $_POST['article_author'];
    $article_desc = $_POST['article_desc'];
    $article_content = $_POST['article_content'];
    $article_date = time();
    // print_r($article_date);

    $sql_update = "UPDATE article SET article_title='$article_title',article_author='$article_author',article_desc='$article_desc',article_content='$article_content',article_date='$article_date' WHERE id='$id'";
    if (mysql_query($sql_update)) {
        echo '<script>alert("文章编辑成功！");location.href="./index.php";</script>';
    } else {
        echo '<script>alert("文章编辑失败！");location.href="./index.php";</script>';
    }


?>
