<?php
    require_once './../config/connect.php';

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
    $sql_sel = "SELECT id,article_title FROM article ORDER BY id DESC LIMIT $sql_sel_offset,$num_per_page";
    $article_res = mysql_query($sql_sel);
    while ($data_row = mysql_fetch_assoc($article_res)) {
        $article_data[] = $data_row;
    }
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
    <style media="screen">
        .admin_article_list_tr_checked {
            background-color: #eee;
        }
    </style>

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
                                            <th class="" style="width:16%;text-align:center;">
                                                <span class="admin_article_checkbox_all" style="cursor:pointer;">全选</span><span style="margin-left:5px;margin-right:5px;">/</span><span class="admin_article_checkbox_inverse" style="cursor:pointer;">反选</span><span style="margin-left:5px;margin-right:5px;">/</span><span class="admin_article_checkbox_none" style="cursor:pointer;">全不选</span>
                                            </th>
                                            <th>文章标题</th>
                                            <th>编辑</th>
                                            <th>删除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($article_data as $key => $value) {
                                        ?>
                                                <tr>
                                                    <td class="admin_article_checkbox" style="text-align:center;">
                                                        <input type="checkbox" name="" value="<?php echo $value['id'] ?>">
                                                    </td>
                                                    <td class="admin_article_title">
                                                        <a href="./../article_detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['article_title'] ?></a>
                                                    </td>
                                                    <td>
                                                        <a href="./article_edit.php?id=<?php echo $value['id'] ?>">编辑</a>
                                                    </td>
                                                    <td class="admin_article_del">
                                                        <a href="./article_delete.php?id=<?php echo $value['id'] ?>">删除</a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="admin_article_list_batchdel">
                                <button type="button" class="btn btn-success">批量删除</button>
                            </div>
                            <div class="admin_article_list_pagination text-center">
                                <ul class="pagination">
                                    <li><a href="./index.php">第一页</a></li>
                                    <li><a href="./index.php?page=<?php echo $page_num_prev; ?>">上一页</a></li>
                                    <li class="active"><a href="./index.php?page=<?php echo $page_num ?>"><?php echo $page_num ?></a></li>
                                    <li><a href="./index.php?page=<?php echo $page_num_next; ?>">下一页</a></li>
                                    <li><a href="./index.php?page=<?php echo $page_num_max ?>">最后一页</a></li>
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
