<?php

    // require_once './../config/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="./../css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/libs/font-awesome.min.css">

    <title>添加文章 - 后台管理</title>
</head>
<body>

<?php require_once './admin_header.php'; ?>

    <div id="admin">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="admin_sidebar">
<?php require_once './admin_sidebar.php'; ?>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="admin_content">
                        <h3>添加文章</h3>
                        <div class="admin_article_add" style="margin-top:30px;">
                            <form role="form" action="./article_add_handle.php" method="post">
                                <div class="form-group">
                                    <label for="admin_article_add_title">标题</label>
                                    <input type="text" class="form-control" id="admin_article_add_title" placeholder="" name="article_title">
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_aurthor">作者</label>
                                    <input type="text" class="form-control" id="admin_article_add_aurthor" placeholder="" name="article_author">
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_desc">摘要</label>
                                    <textarea name="article_desc" rows="6" cols="80" class="form-control" id="admin_article_add_content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_content">内容</label>
                                    <textarea name="article_content" rows="20" cols="80" class="form-control" id="admin_article_add_content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">添加</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once './admin_footer.php'; ?>

</body>
</html>
