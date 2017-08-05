<?php
    require_once './config/connect.php';

    $num_per_page = 3;
    $sql_sel_all = "SELECT * FROM article";
    $article_res_all = mysql_query($sql_sel_all);
    $article_num_all = mysql_num_rows($article_res_all);
    $page_num_max = ceil($article_num_all/$num_per_page);

    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // print_r($url);
    if (strpos($url,'?page=')) {
        $page_num = $_GET['page'];
        if (is_numeric($page_num)) {
            if ($page_num > $page_num_max) {
                echo '<script>alert("没有更多文章！");location.href="./index.php";</script>';
                return;
            } else if ($page_num == 0) {
                $page_num = 1;
            }
        } else {
            echo '<script>alert("参数非法！");location.href="./index.php";</script>';
            return;
        }
    } else {
        $page_num = 1;
    }

    if ($page_num > 1) {
        $page_num_prev = $page_num-1;
    } else {
        $page_num_prev = 1;
    }

    if ($page_num < $page_num_max) {
        $page_num_next = $page_num+1;
    } else {
        $page_num_next = $page_num_max;
    }



    $sql_sel_offset = ($page_num-1)*$num_per_page;

    $sql_sel = "SELECT * FROM article ORDER BY id DESC LIMIT $sql_sel_offset,$num_per_page";
    $article_res = mysql_query($sql_sel);
    while ($data_row = mysql_fetch_assoc($article_res)) {
        $article_data[] = $data_row;
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
    <style media="screen">
        #index_main_search_keyword:focus {
            background-color: #eee;
        }
    </style>
    <title>首页 - PHP Study</title>
</head>
<body>

<?php require_once './include/header.php'; ?>

    <div id="index_main">
        <div class="container">
            <div class="index_main">
                <div class="index_main_search">
                    <form class="form-horizontal" role="form" action="./article_search.php" method="get">
                        <div class="form-group">
                            <label for="index_main_search_keyword" class="col-sm-2 control-label">文章搜索：</label>
                            <div class="col-sm-8">
                                <input type="text" name="keyword" class="form-control" id="index_main_search_keyword" placeholder="">
                                <div class="index_main_search_message"></div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default index_main_search_btn">搜索</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="index_main_article">
                    <h3 class="text-left">最新文章</h3>
                    <div class="index_main_article_list">
                        <?php
                            foreach ($article_data as $key => $value) {
                        ?>
                            <div class="index_main_article_item" style="margin-top:20px;margin-bottom:0;">
                                <div class="index_main_article_item_title">
                                    <a href="./article_detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['article_title'] ?></a>
                                </div>
                                <div class="index_main_article_item_author">作者： <?php echo $value['article_author'] ?></div>
                                <div class="index_main_article_item_desc"><?php echo $value['article_desc'] ?></div>
                                <div class="index_main_article_item_date">时间： <?php echo date('Y-m-d',$value['article_date']); ?></div>
                            </div>
                        <?php
                            }
                        ?>

                    </div>
                    <div class="index_main_article_pagination text-center">
                        <ul class="pagination">
                            <li><a href="./index.php">首页</a></li>
                            <li><a href="./index.php?page=<?php echo $page_num_prev ?>">上一页</a></li>
                            <li class="active"><a href="./index.php?page=<?php echo $page_num ?>"><?php echo $page_num ?></a></li>
                            <li><a href="./index.php?page=<?php echo $page_num_next ?>">下一页</a></li>
                            <li><a href="./index.php?page=<?php echo $page_num_max ?>">尾页</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- index_main end -->

<?php require_once './include/footer.php'; ?>

</body>
</html>
