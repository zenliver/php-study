// Code by zenliver
// 项目名称

$(function () {

    // 全局变量
    var screenWidth = $(window).width();
    var screenHeight = $(window).height();

    // 给当前页的顶部导航项添加active样式
    var currentPagePath=location.pathname.slice(1);
    console.log(currentPagePath);
    var navbarHrefs=new Array();
    var navbarLinks=$(".nav.navbar-nav li a");
    for (var i = 0; i < navbarLinks.length; i++) {
        navbarHrefs[i]=navbarLinks.eq(i).attr("href");
        console.log(navbarHrefs);
    }
    for (var n = 0; n < navbarLinks.length; n++) {
        if (navbarHrefs[n].indexOf(currentPagePath)>=0) {
            // navbarHrefs[n].slice(0,-5)
            if (currentPagePath != "") {
                $(".nav.navbar-nav li").removeClass("active");
                $(".nav.navbar-nav li a").eq(n).parent().addClass("active");
                break;
            }
        }
        else {
            $(".nav.navbar-nav li").removeClass("active");
        }
    }

    // 手机下折叠菜单添加动画效果
    var navbarLis=$(".navbar-nav>li");
    var animationDelay=0;
    for (var i = 0; i < navbarLis.length; i++) {
        navbarLis.eq(i).css("animation-delay",animationDelay+"s");
        animationDelay=animationDelay+0.05;
    }
    $(".navbar-toggle").click(function () {
        $(".navbar-nav>li").toggleClass("animated fadeInRight");
    });

    // modal垂直居中
    $(window).load(function () {
        $(".modal-dialog").each(function () {
            var modalHeight = $(this).actual("height");
            console.log(modalHeight);
            $(this).css({
                "margin-bottom": "0",
                "margin-top": (screenHeight-modalHeight)/2+"px"
            });
        });
    });

    // 返回顶部
    // $(window).load(function () {
    //     var elevator = new Elevator({
    //         element: document.querySelector(".footer-backtotop img"),
    //         duration: 600, // milliseconds
    //         endCallback: function () {
    //             // $("body").animateCss("bounce");
    //         }
    //     });
    // });

    // 文章删除确认
    $(".admin_article_del a").click(function () {
        var articleTitle = $(this).parent().siblings(".admin_article_title").children().html();
        var userSelect = confirm('您确定要删除'+'\n'+'" '+articleTitle+' "'+'\n'+'这篇文章吗？');
        if (userSelect == false) {
            event.preventDefault();
        }
    });

    // 批量删除文章

        // 选中标记
        $(".admin_article_checkbox input").click(function () {
            event.stopPropagation();
            $(this).toggleClass("admin_article_checkbox_checked");
            $(this).parentsUntil($(".admin_article_list"),"tr").toggleClass("admin_article_list_tr_checked");
        });

        // 批量选中功能

            // 全选
            $(".admin_article_checkbox_all").click(function () {
                $(".admin_article_checkbox input").each(function () {
                    if ($(this).is(":checked") == false) {
                        $(this).trigger("click");
                    }
                });
            });
            // 反选
            $(".admin_article_checkbox_inverse").click(function () {
                $(".admin_article_checkbox input").trigger("click");
            });
            // 全不选
            $(".admin_article_checkbox_none").click(function () {
                $(".admin_article_checkbox input").each(function () {
                    if ($(this).is(":checked")) {
                        $(this).trigger("click");
                    }
                });
            });


        // 批量删除功能
        $(".admin_article_list_batchdel button").click(function () {
            // event.preventDefault();
            var idStr = "";
            $(".admin_article_checkbox_checked").each(function () {
                idStr += $(this).attr("value")+",";
            });
            console.log(idStr);
            var idStrNew = idStr.slice(0,-1);
            console.log(idStrNew);

            if (idStrNew == "") {
                alert("没有选中任何文章！");
            } else {
                var userSelect = confirm("您确定要删除选中的文章吗？");
                if (userSelect) {
                    $.ajax({
                        url: '/php-study/admin/article_delete_batch.php',
                        type: 'GET',
                        dataType: 'html',
                        data: {id: idStrNew}
                    })
                    .done(function(data) {
                        console.log("success");
                        // alert("批量删除成功！");
                        $("body").append('<div id="article_delete_message"></div>');
                        $("#article_delete_message").append(data);
                        $("#article_delete_message").remove();
                        // window.location.reload();
                        $(".admin_article_checkbox_checked").each(function () {
                            $(this).parentsUntil($(".admin_article_list"),"tr").remove();
                        });
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                }

            }

        });


    // 前台搜索当关键词为空时提示

    // 删除字符串中的空格
    function trim(str){ //删除左右两端的空格
　　     return str.replace(/(^\s*)|(\s*$)/g, "");
　　 }
　　 function ltrim(str){ //删除左边的空格
　　     return str.replace(/(^\s*)/g,"");
　　 }
　　 function rtrim(str){ //删除右边的空格
　　     return str.replace(/(\s*$)/g,"");
　　 }

    // $(".index_main_search_btn").click(function (e) { // 使用提交按钮的点击事件来判断在搜索结果页面效果不好
    //     var serchKeyword = $("#index_main_search_keyword").val();
    //     console.log(serchKeyword);
    //     if (serchKeyword == "") {
    //         e.preventDefault();
    //         // alert("关键词不能为空啊啊啊啊啊！");
    //         $("#index_main_search_keyword").attr("placeholder","关键词不能为空哦！").focus();
    //     }
    // });

    $(".index_main_search form").submit(function (e) { // 使用表单的提交事件来判断效果更好，在所有页面都有效
        var serchKeyword = $("#index_main_search_keyword").val();
        var serchKeywordProcessed = trim(serchKeyword);
        console.log(serchKeywordProcessed);
        if (serchKeywordProcessed == "") {
            e.preventDefault();
            // alert("关键词不能为空啊啊啊啊啊！");
            $(".index_main_search_message").html('关键词不能为空哦！');
        }
    });

    $("#index_main_search_keyword").focus(function () {
        $(".index_main_search_message").empty();
    });


    // sr动画

        // 启动sr
        // window.sr = ScrollReveal({
        //     reset: true,
        //     mobile: true,
        //     easing: 'ease',
        //     distance: '30px',
        //     scale: 1
        // });



});
