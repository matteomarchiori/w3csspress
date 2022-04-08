jQuery(document).ready(function($) {
    function menufocus(element){
		$(element).parent().closest('.w3-dropdown-focus').addClass("w3-show");
		$(element).parents('.w3-dropdown-content').addClass("w3-show");
		$(element).next('.w3-dropdown-content').addClass("w3-show");
		$(element).parent().prev('.w3-dropdown-focus').find('.w3-dropdown-content').removeClass("w3-show");
	}
	
	var excluded = "#wpadminbar, #wpadminbar *";
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
    if ($(window).width() < 600) {
        $("#menu").hide();
        $("#menu").addClass("w3-animate-bottom");
        $("#site-title").after('<button type="button" class="menu-toggle w3-margin-top w3-right" id="burger"><span class="dashicons dashicons-menu"></span>Menu</button>');
        $("#burger").click(function() {
            $("#menu").toggle();
        });
    } $("header:not('#header'),footer:not('#footer'),div:not('#branding,#wrapper,#content'),p,form,img,table,article,section,figure,nav,summary").not(excluded).addClass("w3-section");
	$("input:not(input[type='button'],input[type='submit'],input[type='reset'],input[type='checkbox'],input[type='radio'])").not(excluded).addClass("w3-input");
    $("button,reset").not(excluded).addClass("w3-btn w3-theme-action");
    $("input[type='button'],input[type='submit'],input[type='reset']").not(excluded).addClass("w3-btn");
    $("input,textarea").not(excluded).addClass("w3-theme-action");
	$("input[type='checkbox']").addClass("w3-check");
	$("input[type='radio']").addClass("w3-radio");
	$("select").addClass("w3-select");
    $("table").parent().addClass("w3-responsive");
    $("table").addClass("w3-table-all w3-hoverable");
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
	$.each($(".w3-dropdown-content"), function(index){
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