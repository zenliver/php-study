<?php
    require_once './config/connect.php';

    $id = $_GET['id'];
    $sql_sel = "SELECT * FROM article WHERE id=$id";
    $article_res = mysql_query($sql_sel);
    $article_data = mysql_fetch_assoc($article_res);

    $sql_prev = "SELECT * FROM article WHERE id<$id ORDER BY id DESC LIMIT 1";
    $article_prev_res = mysql_query($sql_prev);
    $article_prev_data = mysql_fetch_assoc($article_prev_res);

    $sql_next = "SELECT * FROM article WHERE id>$id ORDER BY id ASC LIMIT 1";
    $article_next_res = mysql_query($sql_next);
    $article_next_data = mysql_fetch_assoc($article_next_res);
    if ($article_next_data['article_title']) {
        $article_next_id = $article_next_data['id'];
        $article_next_title = $article_next_data['article_title'];
        $article_next_html = '<a href="./article_detail.php?id='.$article_next_id.'">'.$article_next_title.'</a>';
    } else {
        $article_next_html = '已经是最新一篇了';
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./css/libs/font-awesome.min.css">
    <title><?php echo $article_data['article_title']; ?> - PHP Study</title>
</head>
<body>

<?php require_once './include/header.php'; ?>

    <div id="article_detail">
        <div class="container">
            <div class="article_detail">
                <h3 class="article_detail_title text-center"><?php echo $article_data['article_title'] ?></h3>
                <div class="article_detail_info text-center">
                    <span style="margin-right: 20px;">作者： <?php echo $article_data['article_author'] ?></span>
                    <span>发布日期： <?php echo date('Y-m-d',$article_data['article_date']); ?></span>
                </div>
                <div class="article_detail_content">
                    <p><?php echo $article_data['article_content']; ?></p>
                </div>
                <div class="article_detail_nav">
                    <div class="article_detail_nav_prev">
                        上一篇：<?php
                            if ($article_prev_data['article_title']) {
                        ?>
                                <a href="./article_detail.php?id=<?php echo $article_prev_data['id'] ?>"><?php echo $article_prev_data['article_title'] ?></a>
                        <?php
                            } else {
                                echo "已经是最后一篇了";
                            }
                        ?>
                    </div>
                    <div class="article_detail_nav_next">下一篇：<?php echo $article_next_html ?></div>
                </div>
            </div>
        </div>
    </div>

<?php require_once './include/footer.php'; ?>

</body>
</html>
