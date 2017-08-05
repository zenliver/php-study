<?php
    require_once './../config/connect.php';
    $id = $_GET['id'];
    $article_res = mysql_query("select * from article where id='$id'");
    $article_data = mysql_fetch_assoc($article_res);
    // print_r($article_data);

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

    <title>编辑文章 - 后台管理</title>
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
                        <h3>编辑文章</h3>
                        <div class="admin_article_add" style="margin-top:30px;">
                            <form role="form" action="./article_edit_handle.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $article_data['id'] ?>">
                                <div class="form-group">
                                    <label for="admin_article_add_title">标题</label>
                                    <input type="text" class="form-control" id="admin_article_add_title" placeholder="" value="<?php echo $article_data['article_title'] ?>" name="article_title">
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_aurthor">作者</label>
                                    <input type="text" class="form-control" id="admin_article_add_aurthor" placeholder="" value="<?php echo $article_data['article_author'] ?>" name="article_author">
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_desc">摘要</label>
                                    <textarea rows="6" cols="80" class="form-control" id="admin_article_add_content" name="article_desc"><?php echo $article_data['article_desc'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="admin_article_add_content">内容</label>
                                    <textarea rows="20" cols="80" class="form-control" id="admin_article_add_content" name="article_content"><?php echo $article_data['article_content'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">编辑</button>
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
