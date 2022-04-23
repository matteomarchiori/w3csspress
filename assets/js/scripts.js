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
        if (node.nextSibling !== null) {
            if ((' ' + node.nextSibling.className + ' ').indexOf(cl) === -1)
                node.nextSibling.className += " " + cl;
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
            if ((' ' + closest.className + ' ').indexOf("w3-show") === -1)
                closest.className += " w3-show";
        }
        addClParents(node.parentNode, 'w3-dropdown-content', 'w3-show');
        addClNext(node, 'w3-show');
        removeClPrevInner(node.parentNode, 'w3-dropdown-focus', 'w3-dropdown-content', 'w3-show');
    }

    function addClToSelected(selected, cl) {
        for (i = 0; i < selected.length; i++) {
            if ((' ' + selected[i].className + ' ').indexOf(cl) === -1)
                selected[i].className += " " + cl;
        }
    }

    if (window.outerWidth < 600) {
        var menu = document.getElementById("menu");
        menu.style.display = "none";
        menu.className += " w3-animate-bottom";
    } else {
        var body = document.body;
        var primary = document.getElementById("primary");
        var secondary = document.getElementById("secondary");
        if (primary !== null) body.style.width = body.style.width - primary.outerWidth();
        if (secondary !== null) body.style.width = body.style.width - secondary.outerWidth();

        if (document.getElementsByClassName("rtl").length) {
            if (primary !== null) {
                body.style.marginRight = primary.outerWidth() + 'px';
            }
            if (secondary !== null) {
                body.style.marginLeft = secondary.outerWidth() + 'px';
            }
        } else {
            if (primary !== null) {
                body.style.marginLeft = primary.outerWidth() + 'px';
            }
            if (secondary !== null) {
                body.style.marginRight = secondary.outerWidth() + 'px';
            }
        }
    }
    var excluded = "#wpadminbar, #wpadminbar *, .sidebar";
    var deviceAgent = navigator.userAgent.toLowerCase();
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        document.documentElement.className += " ios";
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
        document.documentElement.className += " ie";
    } else if (navigator.userAgent.search("Chrome") >= 0) {
        document.documentElement.className += " chrome";
    } else if (navigator.userAgent.search("Firefox") >= 0) {
        document.documentElement.className += " firefox";
    } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        document.documentElement.className += " safari";
    } else if (navigator.userAgent.search("Opera") >= 0) {
        document.documentElement.className += " opera";
    }
    selected = document.querySelectorAll("input:not(input[type='button'],input[type='submit'],input[type='reset'],input[type='checkbox'],input[type='radio']," + excluded + ")");
    addClToSelected(selected, "w3-input");
    selected = document.querySelectorAll("button:not(" + excluded + "),reset:not(" + excluded + ")");
    addClToSelected(selected, "w3-btn w3-theme-action");
    selected = document.querySelectorAll("input[type='button']:not(" + excluded + "),input[type='submit']:not(" + excluded + "),input[type='reset']:not(" + excluded + ")");
    addClToSelected(selected, "w3-btn");
    selected = document.querySelectorAll("input:not(" + excluded + "),textarea:not(" + excluded + ")");
    addClToSelected(selected, "w3-theme-action");
    selected = document.querySelectorAll("input[type='checkbox']:not(" + excluded + ")");
    addClToSelected(selected, "w3-check");
    selected = document.querySelectorAll("input[type='radio']");
    addClToSelected(selected, "w3-radio");
    selected = document.getElementsByTagName("select");
    addClToSelected(selected, "w3-select");
    children = document.getElementsByTagName("table");
    selected = [];
    for (i = 0; i < children.length; i++) {
        selected.push(children[i].parentNode);
    }
    addClToSelected(selected, "w3-responsive");
    selected = document.getElementsByTagName("img");
    addClToSelected(selected, "w3-image");
    selected = document.getElementsByTagName("code");
    addClToSelected(selected, "w3-code");
    selected = document.querySelectorAll("ul:not(" + excluded + ")");
    addClToSelected(selected, "w3-ul");
    selected = document.getElementsByClassName("custom-logo");
    addClToSelected(selected, "w3-theme-action");
    selected = document.getElementsByClassName("nav-links");
    addClToSelected(selected, "w3-cell-row");
    selected = document.getElementsByClassName("nav-previous");
    addClToSelected(selected, "w3-cell");
    selected = document.getElementsByClassName("nav-next");
    addClToSelected(selected, "w3-cell w3-right-align");
    selected = document.getElementsByClassName("search-form");
    addClToSelected(selected, "w3-cell-row w3-center");
    selected = document.querySelectorAll(".search-form > label, .search-form > input");
    addClToSelected(selected, "w3-cell");
    selected = document.querySelectorAll(".search-form > input");
    addClToSelected(selected, "w3-left w3-margin-left");
    selected = document.querySelectorAll("article.sticky");
    addClToSelected(selected, "w3-card-4");
    selected = document.querySelectorAll(".format-aside .entry-content");
    addClToSelected(selected, "w3-topbar w3-bottombar w3-border-theme w3-panel");
    selected = document.querySelectorAll(".gallery-columns-2,.gallery-columns-3,.gallery-columns-4,.gallery-columns-5,.gallery-columns-6,.gallery-columns-7,.gallery-columns-8,.gallery-columns-9");
    addClToSelected(selected, "w3-row");
    selected = document.querySelectorAll(".gallery-columns-2 .gallery-item");
    addClToSelected(selected, "w3-half");
    selected = document.querySelectorAll(".gallery-columns-3 .gallery-item");
    addClToSelected(selected, "w3-third");
    selected = document.querySelectorAll(".gallery-columns-4 .gallery-item");
    addClToSelected(selected, "w3-quarter");
    selected = document.querySelectorAll(".gallery-columns-5 .gallery-item");
    addClToSelected(selected, "w3-fifth");
    selected = document.querySelectorAll(".gallery-columns-6 .gallery-item");
    addClToSelected(selected, "w3-sixth");
    selected = document.querySelectorAll(".gallery-columns-7 .gallery-item");
    addClToSelected(selected, "w3-seventh");
    selected = document.querySelectorAll(".gallery-columns-8 .gallery-item");
    addClToSelected(selected, "w3-eighth");
    selected = document.querySelectorAll(".gallery-columns-9 .gallery-item");
    addClToSelected(selected, "w3-nineth");
    selected = document.getElementsByTagName("blockquote");
    addClToSelected(selected, "w3-leftbar w3-border-theme w3-panel");
    selected = document.getElementsByTagName("cite");
    addClToSelected(selected, "w3-show w3-margin-top");
    selected = document.querySelectorAll(".format-status .entry-content");
    addClToSelected(selected, "w3-leftbar w3-rightbar w3-border-theme w3-panel");
    selected = document.querySelectorAll(".format-video .entry-content > iframe");
    addClToSelected(selected, "w3-show");
    selected = document.querySelectorAll(".format-chat .entry-content");
    addClToSelected(selected, "w3-monospace w3-leftbar w3-rightbar w3-border-theme w3-panel");
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
                if ((' ' + dropdown[0].className + ' ').indexOf("w3-show") === -1)
                    dropdown[0].className += " w3-show";
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
            if ((event.target.nextSibling == null || event.target.nextSibling.className.indexOf("w3-dropdown-content") === -1) && event.which == 9 && !event.shiftKey) {
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
                if (event.target.nextSibling != null && (' ' + event.target.nextSibling.className + ' ').indexOf("w3-dropdown-content") !== -1) {
                    removeCl(event.target.nextSibling, "w3-show");
                }
            }
        });
    }
}, false);