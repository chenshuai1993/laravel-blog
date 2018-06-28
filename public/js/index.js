//index.js
"use strict";

$(document).on("click", ".js-get-mod-more-list", function() {
    var a = $(this)
        , t = {
        page: parseInt(a.attr("data-cur_page")) + 1,
        cate_id: a.attr("data-catid"),
    };
    $.ajax({
        type: "get",
        url: "/blog/more",
        data: t,
        dataType: "json",
        async: !0,
        beforeSend: function(t) {
            a.html("正在加载..."),
            a.removeClass("js-get-mod-more-list")
        },
        success: function(t) {
            if(1 == t.status){
                $(".mod-info-flow").append(t.data);
                $("#loading").remove();
                a.attr("data-cur_page", parseInt(a.attr("data-cur_page")) + 1);
                a.html("点击加载更多");
                a.addClass("js-get-mod-more-list");

            }else{
                a.html("我是有底线的 :)").removeClass('js-get-mod-more-list');
            }

        },
        error: function(a) {}
    })

})


$(document).on("click", ".js-get-tag-more-list", function() {
    var a = $(this)
        , t = {
        page: parseInt(a.attr("data-cur_page")) + 1,
        tag_id: a.attr("data-tagid"),
    };
    console.log(t);
    $.ajax({
        type: "get",
        url: "/tag/more",
        data: t,
        dataType: "json",
        async: !0,
        beforeSend: function(t) {
            a.html("正在加载..."),
            a.removeClass("js-get-tag-more-list")
        },
        success: function(t) {
            console.log(t);
            if(1 == t.status){
                $(".mod-info-flow").append(t.data);
                $("#loading").remove();
                a.attr("data-cur_page", parseInt(a.attr("data-cur_page")) + 1);
                a.html("点击加载更多");
                a.addClass("js-get-tag-more-list");

            }else{
                a.html("我是有底线的 :)").removeClass('js-get-tag-more-list');
            }

        },
        error: function(a) {}
    })

})

