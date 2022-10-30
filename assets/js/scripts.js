window.addEventListener('load', function() {
    function removeCl(node, cl) {
        if ((' ' + node.className + ' ').indexOf(cl) !== -1) {
            splitted = node.className.split(cl);
            if (splitted.length)
                node.className = splitted[0] + " " + splitted[1];
        }
    }

    function closestCl(node, cl) {
        if (node === document.body) return null;
        if ((' ' + node.className + ' ').indexOf(cl) !== -1) return node;
        return closestCl(node.parentNode, cl);
    }

    function addClParents(node, cl, addCl) {
        if (node === document.body) return null;
        if ((' ' + node.className + ' ').indexOf(cl) !== -1) {
            if ((' ' + node.className + ' ').indexOf(addCl) === -1)
                node.className += " " + addCl;
        }
        addClParents(node.parentNode, cl, addCl);
    }

    function removeClParents(node, cl, rmCl) {
        if (node === document.body) return null;
        if ((' ' + node.className + ' ').indexOf(cl) !== -1) {
            removeCl(node, rmCl);
        }
        removeClParents(node.parentNode, cl, rmCl);
    }

    function addClNext(node, cl) {
        if (node.nextElementSibling !== null) {
            var spacer = node.nextElementSibling.className == '' ? '' : ' ';
            if ((' ' + node.nextElementSibling.className + ' ').indexOf(cl) === -1)
                node.nextElementSibling.className += spacer + cl;
        }
    }

    function removeClPrevInner(node, selector, inner, cl) {
        var nodes = node.querySelectorAll(selector);
        for (i = 0; i < nodes.length; i++) {
            found = nodes[i].prevSibling.querySelectorAll(inner);
            for (j = 0; j < found.length; j++) {
                removeCl(found[j], cl);
            }
        }
    }

    function menufocus(node) {
        var closest = closestCl(node.parentNode, 'w3-dropdown-focus');
        if (closest !== null) {
            var spacer = closest.className == '' ? '' : ' ';
            if ((' ' + closest.className + ' ').indexOf("w3-show") === -1)
                closest.className += spacer + "w3-show";
        }
        addClParents(node.parentNode, 'w3-dropdown-content', 'w3-show');
        addClNext(node, 'w3-show');
        removeClPrevInner(node.parentNode, 'w3-dropdown-focus', 'w3-dropdown-content', 'w3-show');
    }

    var deviceAgent = navigator.userAgent.toLowerCase();
    var spacer = document.documentElement.className == '' ? '' : ' ';
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        document.documentElement.className += spacer + "ios";
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
        document.documentElement.className += spacer + "ie";
    } else if (navigator.userAgent.search("Chrome") >= 0) {
        document.documentElement.className += spacer + "chrome";
    } else if (navigator.userAgent.search("Firefox") >= 0) {
        document.documentElement.className += spacer + "firefox";
    } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        document.documentElement.className += spacer + "safari";
    } else if (navigator.userAgent.search("Opera") >= 0) {
        document.documentElement.className += spacer + "opera";
    }
    var menuItems = document.getElementsByClassName("menu-item");
    for (i = 0; i < menuItems.length; i++) {
        var item = menuItems[i];
        var links = item.getElementsByTagName("a");
        for (j = 0; j < links.length; j++) {
            links[j].addEventListener("focusin", function(event) {
                menufocus(event.currentTarget);
            });
        }
        item.addEventListener("mouseenter", function(event) {
            var dropdown = event.target.getElementsByClassName("w3-dropdown-content");
            if (dropdown.length) {
                var spacer = dropdown[0].className == '' ? '' : ' ';
                if ((' ' + dropdown[0].className + ' ').indexOf("w3-show") === -1)
                    dropdown[0].className += spacer + "w3-show";
            }
        });
        item.addEventListener("mouseleave", function(event) {
            var dropdown = event.target.getElementsByClassName("w3-dropdown-content");
            if (dropdown.length) {
                removeCl(dropdown[0], "w3-show");
            }
        });
    }

    var dropdowns = document.getElementsByClassName("w3-dropdown-content");
    for (i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener('mouseleave', function(event) {
            removeCl(event.target, "w3-show");
        });
    }

    var lastMenuItems = document.querySelectorAll(".w3-dropdown-content .menu-item:last-of-type a");
    for (i = 0; i < lastMenuItems.length; i++) {
        lastMenuItems[i].addEventListener("keydown", function(event) {
            if ((event.target.nextElementSibling == null || event.target.nextElementSibling.className.indexOf("w3-dropdown-content") === -1) && event.which == 9 && !event.shiftKey) {
                removeClParents(event.target, "w3-dropdown-focus", "w3-show");
                var closest = closestCl(event.target.parentNode, 'w3-dropdown-content');
                if (closest !== null) {
                    removeCl(closest, "w3-show");
                }
            }
        });
    }

    var dropdowns = document.querySelectorAll(".w3-dropdown-focus a");
    for (i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("keydown", function(event) {
            if (event.which == 9 && event.shiftKey) {
                if (event.target.nextElementSibling != null && (' ' + event.target.nextElementSibling.className + ' ').indexOf("w3-dropdown-content") !== -1) {
                    removeCl(event.target.nextElementSibling, "w3-show");
                }
            }
        });
    }
    var primary = document.getElementById("primary");
    var secondary = document.getElementById("secondary");
    var rtl = document.getElementsByClassName("rtl").length;
    var woocommerce = document.getElementsByClassName("woocommerce-page").length;
    if (window.outerWidth > 600) {
        if (primary !== null) {
            if(woocommerce) primary.nextElementSibling.style.width = primary.nextElementSibling.style.width - primary.offsetWidth;
            else document.body.style.width = document.body.style.width - primary.offsetWidth;  
            if (rtl) {
                if(woocommerce)primary.previousElementSibling.style.marginRight = primary.offsetWidth + 'px';
                else document.body.style.marginRight = primary.offsetWidth + 'px';
            }
            else {
                if(woocommerce)primary.nextElementSibling.style.marginLeft = primary.offsetWidth + 'px';
                else document.body.style.marginLeft = primary.offsetWidth + 'px';
            }
        }
        if (secondary !== null) {
            if(woocommerce) secondary.previousElementSibling.style.width = secondary.previousElementSibling.style.width - secondary.offsetWidth;
            else document.body.style.width = document.body.style.width - secondary.offsetWidth;
            if (rtl) {
                if(woocommerce) secondary.nextElementSibling.style.marginLeft = secondary.offsetWidth + 'px';
                else document.body.style.marginLeft = secondary.offsetWidth + 'px';
            }
            else {
                if(woocommerce) secondary.previousElementSibling.style.marginRight = secondary.offsetWidth + 'px';
                else document.body.style.marginRight = secondary.offsetWidth + 'px';
            }
        }
    }
    var gototop = document.getElementById("gototop");
    document.addEventListener('scroll', function() {
        if (document.documentElement.scrollTop > 100) gototop.style.display = "block";
        else gototop.style.display = "none";
    });
    gototop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}, false);
