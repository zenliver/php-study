<?php
    require_once './config/connect.php';

    // 用户搜索的关键词
    $search_keyword = $_GET['keyword'];
    // print_r($search_keyword);
    $search_keyword_new = trim($search_keyword);
    // print_r($search_keyword_new);

    $sql_sel_search = "SELECT * FROM article WHERE article_title LIKE '%$search_keyword_new%'";
    $article_res_search = mysql_query($sql_sel_search);
    $article_num_search = mysql_num_rows($article_res_search);
    $num_per_page = 3;
    $page_num_search_max = ceil($article_num_search/$num_per_page);


    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // print_r($url);
    if (strpos($url,'page=')) {
        $page_num = $_GET['page'];
        if (is_numeric($page_num)) {
            if ($page_num > $page_num_search_max) {
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

    $sql_sel_offset = ($page_num-1)*$num_per_page;


    if ($search_keyword_new == '') {
        echo '<script>alert("关键词不能为空！");location.href="javascript:history.back();"</script>';
        return;
    } else {
        $sql_sel = "SELECT * FROM article WHERE article_title LIKE '%$search_keyword_new%' ORDER BY id DESC LIMIT $sql_sel_offset,$num_per_page";
        // print_r($sql_sel);
        $article_res = mysql_query($sql_sel);
        // $article_rows = mysql_num_rows($article_res);


        if ($article_num_search > 0) {
            while ($data_row = mysql_fetch_assoc($article_res)) {
                $article_data[] = $data_row;
            }
        } else {
            $message_noarticle = '<div>抱歉，暂未找到“'.$search_keyword_new.'”的相关文章</div>';
        }
    }


    if ($page_num > 1) {
        $page_num_prev = $page_num-1;
    } else {
        $page_num_prev = 1;
    }

    if ($page_num < $page_num_search_max) {
        $page_num_next = $page_num+1;
    } else {
        $page_num_next = $page_num_search_max;
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
    <title>“<?php echo $search_keyword_new ?>”的搜索结果 - PHP Study</title>
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
                                <button type="submit" class="btn btn-default">搜索</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="index_main_article">
                    <h3 class="text-left">“<?php echo $search_keyword_new ?>”的搜索结果：</h3>
                    <div class="index_main_article_list">
                        <?php
                            if ($article_num_search > 0) {
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
                            } else {
                                echo $message_noarticle;
                            }


                        ?>

                    </div>

                    <?php
                        if ($article_num_search > 0) {
echo <<<HTML
<div class="index_main_article_pagination text-center">
    <ul class="pagination">
        <li><a href="./article_search.php?keyword=$search_keyword_new&page=1">首页</a></li>
        <li><a href="./article_search.php?keyword=$search_keyword_new&page=$page_num_prev">上一页</a></li>
        <li class="active"><a href="./article_search.php?keyword=$search_keyword_new&page=$page_num">$page_num</a></li>
        <li><a href="./article_search.php?keyword=$search_keyword_new&page=$page_num_next">下一页</a></li>
        <li><a href="./article_search.php?keyword=$search_keyword_new&page=$page_num_search_max">尾页</a></li>
    </ul>
</div>
HTML;
                        }

                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- index_main end -->

<?php require_once './include/footer.php'; ?>

</body>
</html>
