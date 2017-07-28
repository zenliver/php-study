<?php
    require_once(dirname(__FILE__)."/../config/connect.php");

    // print_r($_POST);

    // 把表单提交的信息插入数据库
    $article_title = $_POST['article_title'];
    $article_author = $_POST['article_author'];
    $article_desc = $_POST['article_desc'];
    $article_content = $_POST['article_content'];
    $article_date = time();
    // print_r($article_date);

    if (empty($article_title)) {
        echo '<script>alert("标题不能为空！");location.href = "./article_add.php";</script>';
    }
    if (empty($article_desc)) {
        echo '<script>alert("摘要不能为空！");location.href = "./article_add.php";</script>';
    }

    $sql_insert = "insert into article(article_title,article_author,article_desc,article_content,article_date) values('$article_title','$article_author','$article_desc','$article_content','$article_date')";

    if (mysql_query($sql_insert)) {
        echo '<script>alert("文章发布成功！");location.href="./"</script>';
    } else {
        echo '<script>alert("文章发布失败！");location.href="./article_add.php"</script>';
    }


?>
