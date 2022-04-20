jQuery(document).ready(function($) {
    function menufocus(element) {
        $(element).parent().closest('.w3-dropdown-focus').addClass("w3-show");
        $(element).parents('.w3-dropdown-content').addClass("w3-show");
        $(element).next('.w3-dropdown-content').addClass("w3-show");
        $(element).parent().prev('.w3-dropdown-focus').find('.w3-dropdown-content').removeClass("w3-show");
    }

    if ($(window).width() < 600) {
        $("#menu").hide();
        $("#menu").addClass("w3-animate-bottom");
        $("#site-title").after('<button type="button" class="menu-toggle w3-margin-top w3-right" id="burger"><span class="dashicons dashicons-menu"></span>Menu</button>');
        $("#burger").click(function() {
            $("#menu").toggle();
        });
        $(".menu-item").last().children("a").keydown(function(event) {
            event.preventDefault();
            if (event.which == 9 && !event.shiftKey) {
                $("#burger").focus();
            }
        });
    } else {
        $("body").width($("body").width() - $("#primary").outerWidth());
        $("body").width($("body").width() - $("#secondary").outerWidth());
        if ($(".rtl").length) {
            if ($("#primary").length) {
                $("body").css('margin-right', $("#primary").outerWidth() + 'px');
            }
            if ($("#secondary").length) {
                $("body").css('margin-left', $("#secondary").outerWidth() + 'px');
            }
        } else {
            if ($("#primary").length) {

                $("body").css('margin-left', $("#primary").outerWidth() + 'px');
            }
            if ($("#secondary").length) {
                $("body").css('margin-right', $("#secondary").outerWidth() + 'px');
            }
        }
    }

    var excluded = "#wpadminbar, #wpadminbar *, .sidebar";
    var deviceAgent = navigator.userAgent.toLowerCase();
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
    } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
    } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
    } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
    } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
    }
    $("header:not('#header'),footer:not('#footer'),div:not('#branding,#wrapper,#content'),p,form,img,table,article,section,figure,nav,summary").not(excluded).addClass("w3-section");
    $("input:not(input[type='button'],input[type='submit'],input[type='reset'],input[type='checkbox'],input[type='radio'])").not(excluded).addClass("w3-input");
    $("button,reset").not(excluded).addClass("w3-btn w3-theme-action");
    $("input[type='button'],input[type='submit'],input[type='reset']").not(excluded).addClass("w3-btn");
    $("input,textarea").not(excluded).addClass("w3-theme-action");
    $("input[type='checkbox']").addClass("w3-check");
    $("input[type='radio']").addClass("w3-radio");
    $("select").addClass("w3-select");
    $("table").parent().addClass("w3-responsive");
    $("table").addClass("w3-table w3-bordered w3-centered");
    $("img").addClass("w3-image");
    $("code").addClass("w3-code");
    $("ul").not(excluded).addClass("w3-ul");
    $(".custom-logo").addClass("w3-theme-action");
    $(".nav-links").addClass("w3-cell-row");
    $(".nav-previous").addClass("w3-cell");
    $(".nav-next").addClass("w3-cell w3-right-align");
    $(".search-form").addClass("w3-cell-row w3-center");
    $(".search-form > label, .search-form > input").addClass("w3-cell");
    $(".search-form > input").addClass("w3-left w3-margin-left");
    $("article.sticky").addClass("w3-card-4");
    $(".format-aside .entry-content").addClass("w3-topbar w3-bottombar w3-border-theme w3-panel");
    $(".gallery-columns-2,.gallery-columns-3,.gallery-columns-4,.gallery-columns-5,.gallery-columns-6,.gallery-columns-7,.gallery-columns-8,.gallery-columns-9").addClass("w3-row");
    $(".gallery-columns-2 .gallery-item").addClass("w3-half");
    $(".gallery-columns-3 .gallery-item").addClass("w3-third");
    $(".gallery-columns-4 .gallery-item").addClass("w3-quarter");
    $(".gallery-columns-5 .gallery-item").addClass("w3-fifth");
    $(".gallery-columns-6 .gallery-item").addClass("w3-sixth");
    $(".gallery-columns-7 .gallery-item").addClass("w3-seventh");
    $(".gallery-columns-8 .gallery-item").addClass("w3-eighth");
    $(".gallery-columns-9 .gallery-item").addClass("w3-nineth");
    $("blockquote").addClass("w3-leftbar w3-border-theme w3-panel");
    $("cite").addClass("w3-show w3-margin-top");
    $(".format-status .entry-content").addClass("w3-leftbar w3-rightbar w3-border-theme w3-panel");
    $(".format-video .entry-content > iframe").addClass("w3-show");
    $(".format-chat .entry-content").addClass("w3-monospace w3-leftbar w3-rightbar w3-border-theme w3-panel");
    $.each($(".menu-item"), function(index) {
        $(this).children("a").focusin(function(event) {
            menufocus(event.target);
        });
        $(this).mouseenter(function(event) {
            $(event.target).children(".w3-dropdown-content").first().addClass("w3-show");
        });
        $(this).mouseleave(function(event) {
            $(event.target).children(".w3-dropdown-content").first().removeClass("w3-show");
        });
    });
    $.each($(".w3-dropdown-content"), function(index) {
        $(this).mouseleave(function(event) {
            $(this).removeClass("w3-show");
        });
    });
    $.each($(".w3-dropdown-content .menu-item:last-of-type"), function(index) {
        $(this).children("a").keydown(function(event) {
            if (event.which == 9 && !event.shiftKey && $(event.target).next('.w3-dropdown-content').length == 0) {
                $(event.target).parents('.w3-dropdown-focus').removeClass("w3-show");
                $(event.target).parent().closest('.w3-dropdown-content').removeClass("w3-show");
            }
        });
    });
    $.each($(".w3-dropdown-focus"), function(index) {
        $(this).children("a").keydown(function(event) {
            if (event.which == 9 && event.shiftKey) {
                $(event.target).next('.w3-dropdown-content').removeClass("w3-show");
            }
        });
    });
});