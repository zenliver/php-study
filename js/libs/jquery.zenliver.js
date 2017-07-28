// Code by zenliver
// 自己写的一些通用函数或jQuery插件

// ************ jQuery插件 ************

// 手机下类thumbnail图片显示高度自适应
    // 限制 img 的父元素 a 的高度以避免用户上传的图片过高导致页面布局错乱
    // 使用方法：$(imgSelector).thumbImgAutoHeight(imgDesignRatio);

$.fn.thumbImgAutoHeight = function (imgDesignRatio) {
    var screenWidth=$(window).width();
    if (screenWidth<768) { // 只在手机下执行
        this.each(function () {
            // console.log(this);
            var imgWidth=$(this).width();
            console.log(imgWidth);
            $(this).parent().css("height",imgWidth*imgDesignRatio);
        });
    }
    var imgSelector=this; // 用imgSelector指代 $(this)

    $(window).resize(function () {
        var screenWidthNew=$(window).width();
        if (screenWidthNew<768) { // 只在手机下执行
            // console.log(this);
            imgSelector.each(function () {
                // console.log(this);
                var imgWidth=$(this).width();
                console.log(imgWidth);
                $(this).parent().css("height",imgWidth*imgDesignRatio);
            });

            // console.log(imgSelector);
        }
        else { // 窗口拖动到非手机尺寸时清除JS设置的宽高
            imgSelector.css("height","");
            console.log(imgSelector.width());
        }
    });
};

// 手机下视频播放器宽高自适应
    // 使用方法：$(videoSelector).videoAutoResize(videoRatio);

$.fn.videoAutoResize = function (videoRatio) {
    var screenWidth=$(window).width();
    if (screenWidth<768) { // 只在手机下执行
        $(this).css("width",(screenWidth-30)+"px");
        $(this).css("height",(screenWidth-30)*videoRatio+"px");
    }
    var videoSelector=$(this); // 用videoSelector指代 $(this)
    $(window).resize(function () {
        var screenWidthNew=$(window).width();
        if (screenWidthNew<768) { // 只在手机下执行
            // console.log(this);
            console.log(videoSelector);
            videoSelector.css("width",(screenWidthNew-30)+"px");
            videoSelector.css("height",(screenWidthNew-30)*videoRatio+"px");
        }
        else { // 窗口拖动到非手机尺寸时清除JS设置的宽高
            videoSelector.css({"width":"", "height":""});
        }
    });
};

$.fn.extend({
    // animate.css动画执行完之后自动删除，实现动画重复执行
        // 使用方法：$("selector").animateCss("animationName");
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    },
    // animateOnce 自定义动画执行完之后自动删除，实现动画重复执行
        // 使用方法：$("selector").animateOnce("animationName");
    animateOnce: function (animationCssName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass(animationCssName).one(animationEnd, function() {
            $(this).removeClass(animationCssName);
        });
    }

});

// ************ 通用函数 ************

// 鼠标滑过图片后图片变暗

function imgDarken(imgSelector) {
    $(imgSelector).mouseover(function () {
        $(this).addClass("darken");
    });
    $(imgSelector).mouseout(function () {
        $(this).removeClass("darken");
    });
}

// 手动添加动画效果

function addAnimation(selector,animationCssName) {
    $(selector).mouseover(function () {
        $(this).addClass(animationCssName);
    });
    $(selector).mouseout(function () {
        $(this).removeClass(animationCssName);
    });
}

// 手机下视频播放器宽高自适应

function videoAutoResize(videoSelector,videoRatio) {
    function videoPlayerAutoResize(videoSelector,videoRatio) {
        var screenWidthInFunc=$(window).width();
        $(videoSelector).css("width",(screenWidthInFunc-30)+"px");
        $(videoSelector).css("height",(screenWidthInFunc-30)*videoRatio+"px");
    }
    var screenWidth = $(window).width();
    if (screenWidth<768) {
        videoPlayerAutoResize(videoSelector,videoRatio);
    }
    $(window).resize(function () {
        var screenWidthNew=$(window).width();
        if (screenWidthNew<768) {
            videoPlayerAutoResize(videoSelector,videoRatio);
        }
        else {
            $(videoSelector).css({"width":"", "height":""});
        }
    });
}

// 限制图片显示的高度，防止上传的图片高度过大影响美观

function setImgParentHeight(imgSelector,imgDesignRatio) {
    $(window).load(function () {
        $(imgSelector).each(function () {
            var imgWidth=$(this).width();
            console.log(imgWidth);
            $(this).parent().css({
                "display": "block",
                "overflow": "hidden",
                "height": imgWidth*imgDesignRatio+"px"
            });
        });
    });
}

// 鼠标滑过图片后图片放大

function imgScale(imgSelector) {
    $(imgSelector).each(function () {
        $(this).parent().css("display","block"); // 必须先设为display:block，否则如果img的父元素是a的话无法获取正确的宽高
    });
    $(window).load(function () {
        $(imgSelector).each(function () {
            var imgParentElWidth = $(this).parent().width();
            var imgParentElHeight = $(this).parent().height();
            $(this).mouseover(function () {
                $(this).parent().css({
                    "overflow": "hidden",
                    "max-width": (imgParentElWidth+1)+"px",
                    "max-height": (imgParentElHeight+1)+"px"
                });
                $(this).addClass("scaleLarger");
            });
            $(this).mouseout(function () {
                $(this).removeClass("scaleLarger");
                $(this).animateOnce("scaleDefault");
            });
        });

    });
}

// 返回顶部

function backToTop(backToTopSelector) {
    // 默认不显示，滚动一段距离后才显示
    $(window).scroll(function () {
        var scrollHeight = $(window).scrollTop();
        if (scrollHeight >= 100) {
            $(backToTopSelector).fadeIn();
            $(backToTopSelector).prev().css("border-bottom","1px solid #fff");
        }
        else {
            $(backToTopSelector).hide();
            $(backToTopSelector).prev().css("border-bottom","none");
        }
    });
    // 返回顶部动态效果实现
    $(backToTopSelector).click(function () {
        var backToTopOffsetTop = $(backToTopSelector).offset().top;
        console.log(backToTopOffsetTop);
        var backToTopTimer = setInterval(function () {
            backToTopOffsetTop -= 30;
            if (backToTopOffsetTop <= 0) {
                backToTopOffsetTop = 0;
            }
            console.log(backToTopOffsetTop);
            $(window).scrollTop(backToTopOffsetTop);
            if (backToTopOffsetTop == 0) {
                clearInterval(backToTopTimer);
            }
        },1);
        console.log(backToTopOffsetTop); // 在setInterval或setTimeout时程序在等待的过程中并不会停下来而是会继续执行计时器下面的代码

    });
}

// 顶部导航置顶

function headerFixedTop() {
    $(window).scroll(function () {
        var scrollHeight = $(window).scrollTop();
        // console.log(scrollHeight);
        if (scrollHeight >= 1) {
            $("#header").addClass("fixed_top");
            $("body").addClass("padding_top");
        }
        else {
            $("#header").removeClass("fixed_top");
            $("body").removeClass("padding_top");
        }
    });
}

// 通用active效果

function addActiveClass(sitePath,pageUrlKeyword,noActiveUrlKeyword,linksSelector,linksInItemSelector,method) {
    var pageUrl = window.location.href;
    var hostname = window.location.host;
    // console.log(hostname);
    // var pagePathName = window.location.pathname;
    var sitePathLength = sitePath.length;
    // console.log(sitePathLength);
    var pagePathName = pageUrl.slice(hostname.length+7+sitePathLength);
    console.log(pagePathName);

    if (pageUrl.indexOf(pageUrlKeyword) >= 0) {
        var toBeActiveLinks = $(linksSelector);
        var toBeActiveLinksUrls = new Array();
        for (var i = 0; i < toBeActiveLinks.length; i++) {
            toBeActiveLinksUrls[i] = toBeActiveLinks.eq(i).attr("href");
            // console.log(toBeActiveLinksUrls);
        }
        for (var n = 0; n < toBeActiveLinks.length; n++) {
            if (toBeActiveLinksUrls[n].indexOf(pagePathName) >= 0) {
                if (pagePathName != noActiveUrlKeyword) {
                    // $(linksInItemSelector).removeClass("active");
                    switch (method) {
                        case "parents":
                            $(linksSelector).eq(n).parents(linksInItemSelector).addClass("active");
                            break;
                        case "find":
                            $(linksSelector).eq(n).find(linksInItemSelector).addClass("active");
                            break;
                        default:
                            $(linksSelector).eq(n).parents(linksInItemSelector).addClass("active");
                    }
                    break;
                }
                else {
                    // $(linksInItemSelector).removeClass("active");
                }
            }
            else {
                // $(linksInItemSelector).removeClass("active");
            }
        }
    }

}
