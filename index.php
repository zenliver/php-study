<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./css/libs/font-awesome.min.css">
    <title>首页 - PHP Study</title>
</head>
<body>

<?php require_once './include/header.php'; ?>

    <div id="index_main">
        <div class="container">
            <div class="index_main">
                <div class="index_main_search">
                    <form class="form-horizontal" role="form" action="#" method="post">
                        <div class="form-group">
                            <label for="index_main_search_keyword" class="col-sm-2 control-label">文章搜索：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="index_main_search_keyword" placeholder="">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default">搜索</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="index_main_article">
                    <h3 class="text-left">最新文章</h3>
                    <div class="index_main_article_list">
                        <div class="index_main_article_item" style="margin-top:20px;margin-bottom:0;">
                            <div class="index_main_article_item_title">
                                <a href="./article_detail.php">文章标题</a>
                            </div>
                            <div class="index_main_article_item_author">作者：</div>
                            <div class="index_main_article_item_desc">摘要</div>
                            <div class="index_main_article_item_date">时间：</div>
                        </div>
                    </div>
                    <div class="index_main_article_pagination text-center">
                        <ul class="pagination">
                            <li><a href="#">首页</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><span>...</span></li>
                            <li class="disabled"><a href="#">尾页</a></li>
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
