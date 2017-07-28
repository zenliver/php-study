<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="./../css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/libs/font-awesome.min.css">

    <title>文章列表 - 后台管理</title>
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
                        <h3 style="margin-bottom: 30px;">文章列表</h3>
                        <div class="admin_article_list">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="" value="">
                                            </th>
                                            <th>文章标题</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" value="">
                                            </td>
                                            <td>
                                                <a href="./../article_detail.php">文章标题</a>
                                            </td>
                                            <td>
                                                <a href="./article_edit.php">编辑</a>
                                            </td>
                                            <td>
                                                <a href="./article_delete.php">删除</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="admin_article_list_batchdel">
                                <a href="#">批量删除</a>
                            </div>
                            <div class="admin_article_list_pagination text-center">
                                <ul class="pagination">
                                    <li><a href="#">第一页</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><span>...</span></li>
                                    <li><a href="#">最后一页</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- admin end -->

<?php require_once './admin_footer.php'; ?>

</body>
</html>
