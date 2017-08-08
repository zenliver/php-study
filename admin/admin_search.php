<?php
    require_once './../config/connect.php';

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
                echo '<script>alert("没有更多文章！");location.href="./";</script>';
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
            $message_noarticle = '<tr><td colspan="4">抱歉，暂未找到“'.$search_keyword_new.'”的相关文章</td></tr>';
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

    <!-- ajax搜索结果 -->
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
                    if ($article_num_search > 0) {
                        foreach ($article_data as $key => $value) {
                ?>
                            <!-- html代码的开始之处就是php代码的结束之处，加一个php结束符 -->
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
                            <!-- html代码的结束之处就是php代码的开始之处，加一个php开始符 -->
                <?php
                        }
                    } else {
                        echo $message_noarticle;
                    }
                ?>

            </tbody>
        </table>
    </div>
    <?php
        if ($article_num_search > 0) {
echo <<<HTML
    <div class="admin_article_list_batchdel">
        <button type="button" class="btn btn-success">批量删除</button>
    </div>
HTML;
        }
    ?>

    <?php
        if ($article_num_search > 0) {
echo <<<HTML
    <div class="admin_article_search_pagination text-center">
        <ul class="pagination">
            <li><a href="javascript:" rel="/php-study/admin/admin_search.php?keyword=$search_keyword_new&amp;page=1">首页</a></li>
            <li><a href="javascript:" rel="/php-study/admin/admin_search.php?keyword=$search_keyword_new&amp;page=$page_num_prev">上一页</a></li>
            <li class="active"><a href="javascript:" rel="/php-study/admin/admin_search.php?keyword=$search_keyword_new&amp;page=$page_num">$page_num</a></li>
            <li><a href="javascript:" rel="/php-study/admin/admin_search.php?keyword=$search_keyword_new&amp;page=$page_num_next">下一页</a></li>
            <li><a href="javascript:" rel="/php-study/admin/admin_search.php?keyword=$search_keyword_new&amp;page=$page_num_search_max">尾页</a></li>
        </ul>
    </div>
HTML;
        }

    ?>
