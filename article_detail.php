<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./css/libs/font-awesome.min.css">
    <title>文章详情 - PHP Study</title>
</head>
<body>

<?php require_once './include/header.php'; ?>

    <div id="article_detail">
        <div class="container">
            <div class="article_detail">
                <h3 class="article_detail_title text-center">文章标题</h3>
                <div class="article_detail_info text-center">
                    <span style="margin-right: 20px;">作者：</span>
                    <span>发布日期：</span>
                </div>
                <div class="article_detail_content">
                    <p>文章内容</p>
                </div>
                <div class="article_detail_nav">
                    <div class="article_detail_nav_prev">
                        上一篇：<a href="">上一篇标题</a>
                    </div>
                    <div class="article_detail_nav_next">
                        下一篇：<a href="">下一篇标题</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once './include/footer.php'; ?>

</body>
</html>
