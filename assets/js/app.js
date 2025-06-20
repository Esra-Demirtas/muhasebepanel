! function() {
    var a, t, o, n, s, e, d, l, i = document.querySelector(".navbar-menu").innerHTML,
        r = 7,
        c = "en",
        m = localStorage.getItem("language");

    function u(e) {
        document.getElementById("header-lang-img") && ("en" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/us.svg" : "sp" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/spain.svg" : "gr" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/germany.svg" : "it" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/italy.svg" : "ru" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/russia.svg" : "ch" == e ? document.getElementById("header-lang-img").src = "assets/images/flags/china.svg" : "fr" == e && (document.getElementById("header-lang-img").src = "assets/images/flags/french.svg"), localStorage.setItem("language", e), m = localStorage.getItem("language"), function() {
            null == m && u(c);
            var e = new XMLHttpRequest;
            e.open("GET", "assets/lang/" + m + ".json"), e.onreadystatechange = function() {
                var a;
                4 === this.readyState && 200 === this.status && (a = JSON.parse(this.responseText), Object.keys(a).forEach(function(t) {
                    document.querySelectorAll("[data-key='" + t + "']").forEach(function(e) {
                        e.textContent = a[t]
                    })
                }))
            }, e.send()
        }())
    }

    function g() {
        document.querySelectorAll(".navbar-nav .collapse") && document.querySelectorAll(".navbar-nav .collapse").forEach(function(t) {
            var a = new bootstrap.Collapse(t, {
                toggle: !1
            });
            t.addEventListener("show.bs.collapse", function(e) {
                e.stopPropagation();
                e = t.parentElement.closest(".collapse");
                e ? e.querySelectorAll(".collapse").forEach(function(e) {
                    e = bootstrap.Collapse.getInstance(e);
                    e !== a && e.hide()
                }) : function(e) {
                    for (var t = [], a = e.parentNode.firstChild; a;) 1 === a.nodeType && a !== e && t.push(a), a = a.nextSibling;
                    return t
                }(t.parentElement).forEach(function(e) {
                    2 < e.childNodes.length && e.firstElementChild.setAttribute("aria-expanded", "false"), e.querySelectorAll("*[id]").forEach(function(e) {
                        e.classList.remove("show"), 2 < e.childNodes.length && e.querySelectorAll("ul li a").forEach(function(e) {
                            e.hasAttribute("aria-expanded") && e.setAttribute("aria-expanded", "false")
                        })
                    })
                })
            }), t.addEventListener("hide.bs.collapse", function(e) {
                e.stopPropagation(), t.querySelectorAll(".collapse").forEach(function(e) {
                    childCollapseInstance = bootstrap.Collapse.getInstance(e), childCollapseInstance.hide()
                })
            })
        })
    }

    function b() {
        var o, e, t = document.documentElement.getAttribute("data-layout"),
            a = sessionStorage.getItem("defaultAttribute"),
            a = JSON.parse(a);
        !a || "twocolumn" != t && "twocolumn" != a["data-layout"] || (document.querySelector(".navbar-menu").innerHTML = i, (o = document.createElement("ul")).innerHTML = '<a href="#" class="logo"><img src="assets/images/logo-sm.png" alt="" height="22"></a>', document.getElementById("navbar-nav").querySelectorAll(".menu-link").forEach(function(e) {
            o.className = "twocolumn-iconview";
            var t = document.createElement("li"),
                a = e;
            a.querySelectorAll("span").forEach(function(e) {
                e.classList.add("d-none")
            }), e.parentElement.classList.contains("twocolumn-item-show") && e.classList.add("active"), t.appendChild(a), o.appendChild(t), a.classList.contains("nav-link") && a.classList.replace("nav-link", "nav-icon"), a.classList.remove("collapsed", "menu-link")
        }), (a = (a = "/" == location.pathname ? "index.html" : location.pathname.substring(1)).substring(a.lastIndexOf("/") + 1)) && (!(a = document.getElementById("navbar-nav").querySelector('[href="' + a + '"]')) || (e = a.closest(".collapse.menu-dropdown")) && (e.classList.add("show"), e.parentElement.children[0].classList.add("active"), e.parentElement.children[0].setAttribute("aria-expanded", "true"), e.parentElement.closest(".collapse.menu-dropdown") && (e.parentElement.closest(".collapse").classList.add("show"), e.parentElement.closest(".collapse").previousElementSibling && e.parentElement.closest(".collapse").previousElementSibling.classList.add("active")))), document.getElementById("two-column-menu").innerHTML = o.outerHTML, document.querySelector("#two-column-menu ul").querySelectorAll("li a").forEach(function(a) {
            var o = (o = "/" == location.pathname ? "index.html" : location.pathname.substring(1)).substring(o.lastIndexOf("/") + 1);
            a.addEventListener("click", function(e) {
                var t;
                (o != "/" + a.getAttribute("href") || a.getAttribute("data-bs-toggle")) && document.body.classList.contains("twocolumn-panel") && document.body.classList.remove("twocolumn-panel"), document.getElementById("navbar-nav").classList.remove("twocolumn-nav-hide"), document.querySelector(".hamburger-icon").classList.remove("open"), (e.target && e.target.matches("a.nav-icon") || e.target && e.target.matches("i")) && (null !== document.querySelector("#two-column-menu ul .nav-icon.active") && document.querySelector("#two-column-menu ul .nav-icon.active").classList.remove("active"), (e.target.matches("i") ? e.target.closest("a") : e.target).classList.add("active"), 0 < (t = document.getElementsByClassName("twocolumn-item-show")).length && t[0].classList.remove("twocolumn-item-show"), e = (e.target.matches("i") ? e.target.closest("a") : e.target).getAttribute("href").slice(1), document.getElementById(e) && document.getElementById(e).parentElement.classList.add("twocolumn-item-show"))
            }), o != "/" + a.getAttribute("href") || a.getAttribute("data-bs-toggle") || (a.classList.add("active"), document.getElementById("navbar-nav").classList.add("twocolumn-nav-hide"), document.querySelector(".hamburger-icon").classList.add("open"))
        }), "horizontal" !== document.documentElement.getAttribute("data-layout") && ((e = new SimpleBar(document.getElementById("navbar-nav"))) && e.getContentElement(), (e = new SimpleBar(document.getElementsByClassName("twocolumn-iconview")[0])) && e.getContentElement()))
    }

    function y(e) {
        if (e) {
            var t = e.offsetTop,
                a = e.offsetLeft,
                o = e.offsetWidth,
                n = e.offsetHeight;
            if (e.offsetParent)
                for (; e.offsetParent;) t += (e = e.offsetParent).offsetTop, a += e.offsetLeft;
            return t >= window.pageYOffset && a >= window.pageXOffset && t + n <= window.pageYOffset + window.innerHeight && a + o <= window.pageXOffset + window.innerWidth
        }
    }

    function f() {
        "vertical" == document.documentElement.getAttribute("data-layout") && (document.getElementById("two-column-menu").innerHTML = "", document.querySelector(".navbar-menu").innerHTML = i, document.getElementById("scrollbar").setAttribute("data-simplebar", ""), document.getElementById("navbar-nav").setAttribute("data-simplebar", ""), document.getElementById("scrollbar").classList.add("h-100")), "twocolumn" == document.documentElement.getAttribute("data-layout") && (document.getElementById("scrollbar").removeAttribute("data-simplebar"), document.getElementById("scrollbar").classList.remove("h-100")), "horizontal" == document.documentElement.getAttribute("data-layout") && L()
    }

    function h() {
        feather.replace();
        var e = document.documentElement.clientWidth;
        e < 1025 && 767 < e ? (document.body.classList.remove("twocolumn-panel"), "twocolumn" == sessionStorage.getItem("data-layout") && (document.documentElement.setAttribute("data-layout", "twocolumn"), document.getElementById("customizer-layout03") && document.getElementById("customizer-layout03").click(), b(), w(), g()), "vertical" == sessionStorage.getItem("data-layout") && document.documentElement.setAttribute("data-sidebar-size", "sm"), document.querySelector(".hamburger-icon").classList.add("open")) : 1025 <= e ? (document.body.classList.remove("twocolumn-panel"), "twocolumn" == sessionStorage.getItem("data-layout") && (document.documentElement.setAttribute("data-layout", "twocolumn"), document.getElementById("customizer-layout03") && document.getElementById("customizer-layout03").click(), b(), w(), g()), "vertical" == sessionStorage.getItem("data-layout") && document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size")), document.querySelector(".hamburger-icon").classList.remove("open")) : e <= 767 && (document.body.classList.remove("vertical-sidebar-enable"), document.body.classList.add("twocolumn-panel"), "twocolumn" == sessionStorage.getItem("data-layout") && (document.documentElement.setAttribute("data-layout", "vertical"), A("vertical"), g()), "horizontal" != sessionStorage.getItem("data-layout") && document.documentElement.setAttribute("data-sidebar-size", "lg"), document.querySelector(".hamburger-icon").classList.add("open")), document.querySelectorAll("#navbar-nav > li.nav-item").forEach(function(e) {
            e.addEventListener("click", p.bind(this), !1), e.addEventListener("mouseover", p.bind(this), !1)
        })
    }

    function p(e) {
        if (e.target && e.target.matches("a.nav-link span"))
            if (0 == y(e.target.parentElement.nextElementSibling)) e.target.parentElement.nextElementSibling.classList.add("dropdown-custom-right"), e.target.parentElement.parentElement.parentElement.parentElement.classList.add("dropdown-custom-right"), e.target.parentElement.nextElementSibling.querySelectorAll(".menu-dropdown").forEach(function(e) {
                e.classList.add("dropdown-custom-right")
            });
            else if (1 == y(e.target.parentElement.nextElementSibling) && 1848 <= window.innerWidth)
                for (var t = document.getElementsByClassName("dropdown-custom-right"); 0 < t.length;) t[0].classList.remove("dropdown-custom-right");
        if (e.target && e.target.matches("a.nav-link"))
            if (0 == y(e.target.nextElementSibling)) e.target.nextElementSibling.classList.add("dropdown-custom-right"), e.target.parentElement.parentElement.parentElement.classList.add("dropdown-custom-right"), e.target.nextElementSibling.querySelectorAll(".menu-dropdown").forEach(function(e) {
                e.classList.add("dropdown-custom-right")
            });
            else if (1 == y(e.target.nextElementSibling) && 1848 <= window.innerWidth)
                for (t = document.getElementsByClassName("dropdown-custom-right"); 0 < t.length;) t[0].classList.remove("dropdown-custom-right")
    }

    function E() {
        var e = document.documentElement.clientWidth;
        767 < e && document.querySelector(".hamburger-icon").classList.toggle("open"), "horizontal" === document.documentElement.getAttribute("data-layout") && (document.body.classList.contains("menu") ? document.body.classList.remove("menu") : document.body.classList.add("menu")), "vertical" === document.documentElement.getAttribute("data-layout") && (e < 1025 && 767 < e ? (document.body.classList.remove("vertical-sidebar-enable"), "sm" == document.documentElement.getAttribute("data-sidebar-size") ? document.documentElement.setAttribute("data-sidebar-size", "") : document.documentElement.setAttribute("data-sidebar-size", "sm")) : 1025 < e ? (document.body.classList.remove("vertical-sidebar-enable"), "lg" == document.documentElement.getAttribute("data-sidebar-size") ? document.documentElement.setAttribute("data-sidebar-size", "sm") : document.documentElement.setAttribute("data-sidebar-size", "lg")) : e <= 767 && (document.body.classList.add("vertical-sidebar-enable"), document.documentElement.setAttribute("data-sidebar-size", "lg"))), "twocolumn" == document.documentElement.getAttribute("data-layout") && (document.body.classList.contains("twocolumn-panel") ? document.body.classList.remove("twocolumn-panel") : document.body.classList.add("twocolumn-panel"))
    }

    function v() {
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementsByClassName("code-switcher").forEach(function(a, e) {
                a.addEventListener("change", function() {
                    var e = a.closest(".card"),
                        t = e.querySelector(".live-preview"),
                        e = e.querySelector(".code-views");
                    a.checked ? (t.classList.add("d-none"), e.classList.remove("d-none")) : (t.classList.remove("d-none"), e.classList.add("d-none"))
                })
            }), feather.replace()
        }), window.addEventListener("resize", h), h(), Waves.init(), document.addEventListener("scroll", function() {
            var e;
            e = document.getElementById("page-topbar"), 50 <= document.body.scrollTop || 50 <= document.documentElement.scrollTop ? e.classList.add("topbar-shadow") : e.classList.remove("topbar-shadow")
        }), window.addEventListener("load", function() {
            var e;
            ("twocolumn" == document.documentElement.getAttribute("data-layout") ? w : S)(), (e = document.getElementsByClassName("vertical-overlay")) && e.forEach(function(e) {
                e.addEventListener("click", function() {
                    document.body.classList.remove("vertical-sidebar-enable"), "twocolumn" == sessionStorage.getItem("data-layout") ? document.body.classList.add("twocolumn-panel") : document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size"))
                })
            }), k()
        }), document.getElementById("topnav-hamburger-icon").addEventListener("click", E);
        var e = sessionStorage.getItem("defaultAttribute"),
            t = JSON.parse(e),
            e = document.documentElement.clientWidth;
        "twocolumn" == t["data-layout"] && e < 767 && document.getElementById("two-column-menu").querySelectorAll("li").forEach(function(e) {
            e.addEventListener("click", function(e) {
                document.body.classList.remove("twocolumn-panel")
            })
        })
    }

    function w() {
        feather.replace();
        var e, t = "/" == location.pathname ? "index.html" : location.pathname.substring(1);
        (t = t.substring(t.lastIndexOf("/") + 1)) && ((e = document.getElementById("navbar-nav").querySelector('[href="' + t + '"]')) ? (e.classList.add("active"), t = (t = e.closest(".collapse.menu-dropdown")) && t.parentElement.closest(".collapse.menu-dropdown") ? (t.classList.add("show"), t.parentElement.children[0].classList.add("active"), t.parentElement.closest(".collapse.menu-dropdown").parentElement.classList.add("twocolumn-item-show"), t.parentElement.closest(".collapse.menu-dropdown").getAttribute("id")) : (e.closest(".collapse.menu-dropdown").parentElement.classList.add("twocolumn-item-show"), t.getAttribute("id")), document.getElementById("two-column-menu").querySelector('[href="#' + t + '"]') && document.getElementById("two-column-menu").querySelector('[href="#' + t + '"]').classList.add("active")) : document.body.classList.add("twocolumn-panel"))
    }

    function S() {
        var e = "/" == location.pathname ? "index.html" : location.pathname.substring(1);
        !(e = e.substring(e.lastIndexOf("/") + 1)) || (e = document.getElementById("navbar-nav").querySelector('[href="' + e + '"]')) && (e.classList.add("active"), (e = e.closest(".collapse.menu-dropdown")) && (e.classList.add("show"), e.parentElement.children[0].classList.add("active"), e.parentElement.children[0].setAttribute("aria-expanded", "true"), e.parentElement.closest(".collapse.menu-dropdown") && (e.parentElement.closest(".collapse").classList.add("show"), e.parentElement.closest(".collapse").previousElementSibling && e.parentElement.closest(".collapse").previousElementSibling.classList.add("active"))))
    }

    function y(e) {
        if (e) {
            var t = e.offsetTop,
                a = e.offsetLeft,
                o = e.offsetWidth,
                n = e.offsetHeight;
            if (e.offsetParent)
                for (; e.offsetParent;) t += (e = e.offsetParent).offsetTop, a += e.offsetLeft;
            return t >= window.pageYOffset && a >= window.pageXOffset && t + n <= window.pageYOffset + window.innerHeight && a + o <= window.pageXOffset + window.innerWidth
        }
    }

    function I() {
        var e = document.querySelectorAll(".counter-value");

        function s(e) {
            return e.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
        e && e.forEach(function(n) {
            ! function e() {
                var t = +n.getAttribute("data-target"),
                    a = +n.innerText,
                    o = t / 250;
                o < 1 && (o = 1), a < t ? (n.innerText = (a + o).toFixed(0), setTimeout(e, 1)) : n.innerText = s(t), s(n.innerText)
            }()
        })
    }

    function L() {
        document.getElementById("two-column-menu").innerHTML = "", document.querySelector(".navbar-menu").innerHTML = i, document.getElementById("scrollbar").removeAttribute("data-simplebar"), document.getElementById("navbar-nav").removeAttribute("data-simplebar"), document.getElementById("scrollbar").classList.remove("h-100");
        var a = r,
            o = document.querySelectorAll("ul.navbar-nav > li.nav-item"),
            n = "",
            s = "";
        o.forEach(function(e, t) {
            t + 1 === a && (s = e), a < t + 1 && (n += e.outerHTML, e.remove()), t + 1 === o.length && s.insertAdjacentHTML && s.insertAdjacentHTML("afterend", '<li class="nav-item">                <a class="nav-link" href="#sidebarMore" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMore">                    <i class="ri-briefcase-2-line"></i> More                </a>                <div class="collapse menu-dropdown" id="sidebarMore">             <ul class="nav nav-sm flex-column">' + n + "</ul></div></li>")
        })
    }

    function A(e) {
        "vertical" == e ? (document.getElementById("two-column-menu").innerHTML = "", document.querySelector(".navbar-menu").innerHTML = i, document.getElementById("theme-settings-offcanvas") && (document.getElementById("sidebar-size").style.display = "block", document.getElementById("sidebar-views").style.display = "block", document.getElementById("sidebar-color").style.display = "block", document.getElementById("layout-position").style.display = "block", document.getElementById("layout-width").style.display = "block"), f(), S(), k()) : "horizontal" == e ? (L(), document.getElementById("theme-settings-offcanvas") && (document.getElementById("sidebar-size").style.display = "none", document.getElementById("sidebar-views").style.display = "none", document.getElementById("sidebar-color").style.display = "none", document.getElementById("layout-position").style.display = "block", document.getElementById("layout-width").style.display = "block"), S()) : "twocolumn" == e && (document.getElementById("scrollbar").removeAttribute("data-simplebar"), document.getElementById("scrollbar").classList.remove("h-100"), document.getElementById("theme-settings-offcanvas") && (document.getElementById("sidebar-size").style.display = "none", document.getElementById("sidebar-views").style.display = "none", document.getElementById("sidebar-color").style.display = "block", document.getElementById("layout-position").style.display = "none", document.getElementById("layout-width").style.display = "none"))
    }

    function k() {
        document.getElementById("vertical-hover").addEventListener("click", function() {
            "sm-hover" === document.documentElement.getAttribute("data-sidebar-size") ? document.documentElement.setAttribute("data-sidebar-size", "sm-hover-active") : (document.documentElement.getAttribute("data-sidebar-size"), document.documentElement.setAttribute("data-sidebar-size", "sm-hover"))
        })
    }

    function B(e) {
        if (e == e) {
            switch (e["data-layout"]) {
                case "vertical":
                    z("data-layout", "vertical"), sessionStorage.setItem("data-layout", "vertical"), document.documentElement.setAttribute("data-layout", "vertical"), A("vertical"), g();
                    break;
                case "horizontal":
                    z("data-layout", "horizontal"), sessionStorage.setItem("data-layout", "horizontal"), document.documentElement.setAttribute("data-layout", "horizontal"), A("horizontal");
                    break;
                case "twocolumn":
                    z("data-layout", "twocolumn"), sessionStorage.setItem("data-layout", "twocolumn"), document.documentElement.setAttribute("data-layout", "twocolumn"), A("twocolumn");
                    break;
                default:
                    "vertical" == sessionStorage.getItem("data-layout") && sessionStorage.getItem("data-layout") ? (z("data-layout", "vertical"), sessionStorage.setItem("data-layout", "vertical"), document.documentElement.setAttribute("data-layout", "vertical"), A("vertical"), g()) : "horizontal" == sessionStorage.getItem("data-layout") ? (z("data-layout", "horizontal"), sessionStorage.setItem("data-layout", "horizontal"), document.documentElement.setAttribute("data-layout", "horizontal"), A("horizontal")) : "twocolumn" == sessionStorage.getItem("data-layout") && (z("data-layout", "twocolumn"), sessionStorage.setItem("data-layout", "twocolumn"), document.documentElement.setAttribute("data-layout", "twocolumn"), A("twocolumn"))
            }
            switch (e["data-topbar"]) {
                case "light":
                    z("data-topbar", "light"), sessionStorage.setItem("data-topbar", "light"), document.documentElement.setAttribute("data-topbar", "light");
                    break;
                case "dark":
                    z("data-topbar", "dark"), sessionStorage.setItem("data-topbar", "dark"), document.documentElement.setAttribute("data-topbar", "dark");
                    break;
                default:
                    "dark" == sessionStorage.getItem("data-topbar") ? (z("data-topbar", "dark"), sessionStorage.setItem("data-topbar", "dark"), document.documentElement.setAttribute("data-topbar", "dark")) : (z("data-topbar", "light"), sessionStorage.setItem("data-topbar", "light"), document.documentElement.setAttribute("data-topbar", "light"))
            }
            switch (e["data-layout-style"]) {
                case "default":
                    z("data-layout-style", "default"), sessionStorage.setItem("data-layout-style", "default"), document.documentElement.setAttribute("data-layout-style", "default");
                    break;
                case "detached":
                    z("data-layout-style", "detached"), sessionStorage.setItem("data-layout-style", "detached"), document.documentElement.setAttribute("data-layout-style", "detached");
                    break;
                default:
                    "detached" == sessionStorage.getItem("data-layout-style") ? (z("data-layout-style", "detached"), sessionStorage.setItem("data-layout-style", "detached"), document.documentElement.setAttribute("data-layout-style", "detached")) : (z("data-layout-style", "default"), sessionStorage.setItem("data-layout-style", "default"), document.documentElement.setAttribute("data-layout-style", "default"))
            }
            switch (e["data-sidebar-size"]) {
                case "lg":
                    z("data-sidebar-size", "lg"), document.documentElement.setAttribute("data-sidebar-size", "lg"), sessionStorage.setItem("data-sidebar-size", "lg");
                    break;
                case "sm":
                    z("data-sidebar-size", "sm"), document.documentElement.setAttribute("data-sidebar-size", "sm"), sessionStorage.setItem("data-sidebar-size", "sm");
                    break;
                case "md":
                    z("data-sidebar-size", "md"), document.documentElement.setAttribute("data-sidebar-size", "md"), sessionStorage.setItem("data-sidebar-size", "md");
                    break;
                case "sm-hover":
                    z("data-sidebar-size", "sm-hover"), document.documentElement.setAttribute("data-sidebar-size", "sm-hover"), sessionStorage.setItem("data-sidebar-size", "sm-hover");
                    break;
                default:
                    "sm" == sessionStorage.getItem("data-sidebar-size") ? (document.documentElement.setAttribute("data-sidebar-size", "sm"), z("data-sidebar-size", "sm"), sessionStorage.setItem("data-sidebar-size", "sm")) : "md" == sessionStorage.getItem("data-sidebar-size") ? (document.documentElement.setAttribute("data-sidebar-size", "md"), z("data-sidebar-size", "md"), sessionStorage.setItem("data-sidebar-size", "md")) : "sm-hover" == sessionStorage.getItem("data-sidebar-size") ? (document.documentElement.setAttribute("data-sidebar-size", "sm-hover"), z("data-sidebar-size", "sm-hover"), sessionStorage.setItem("data-sidebar-size", "sm-hover")) : (document.documentElement.setAttribute("data-sidebar-size", "lg"), z("data-sidebar-size", "lg"), sessionStorage.setItem("data-sidebar-size", "lg"))
            }
            switch (e["data-layout-mode"]) {
                case "light":
                    z("data-layout-mode", "light"), document.documentElement.setAttribute("data-layout-mode", "light"), sessionStorage.setItem("data-layout-mode", "light");
                    break;
                case "dark":
                    z("data-layout-mode", "dark"), document.documentElement.setAttribute("data-layout-mode", "dark"), sessionStorage.setItem("data-layout-mode", "dark");
                    break;
                default:
                    sessionStorage.getItem("data-layout-mode") && "dark" == sessionStorage.getItem("data-layout-mode") ? (sessionStorage.setItem("data-layout-mode", "dark"), document.documentElement.setAttribute("data-layout-mode", "dark"), z("data-layout-mode", "dark")) : (sessionStorage.setItem("data-layout-mode", "light"), document.documentElement.setAttribute("data-layout-mode", "light"), z("data-layout-mode", "light"))
            }
            switch (e["data-layout-width"]) {
                case "fluid":
                    z("data-layout-width", "fluid"), document.documentElement.setAttribute("data-layout-width", "fluid"), sessionStorage.setItem("data-layout-width", "fluid");
                    break;
                case "boxed":
                    z("data-layout-width", "boxed"), document.documentElement.setAttribute("data-layout-width", "boxed"), sessionStorage.setItem("data-layout-width", "boxed");
                    break;
                default:
                    "boxed" == sessionStorage.getItem("data-layout-width") ? (sessionStorage.setItem("data-layout-width", "boxed"), document.documentElement.setAttribute("data-layout-width", "boxed"), z("data-layout-width", "boxed")) : (sessionStorage.setItem("data-layout-width", "fluid"), document.documentElement.setAttribute("data-layout-width", "fluid"), z("data-layout-width", "fluid"))
            }
            switch (e["data-sidebar"]) {
                case "light":
                    z("data-sidebar", "light"), sessionStorage.setItem("data-sidebar", "light"), document.documentElement.setAttribute("data-sidebar", "light");
                    break;
                case "dark":
                    z("data-sidebar", "dark"), sessionStorage.setItem("data-sidebar", "dark"), document.documentElement.setAttribute("data-sidebar", "dark");
                    break;
                default:
                    sessionStorage.getItem("data-sidebar") && "light" == sessionStorage.getItem("data-sidebar") ? (sessionStorage.setItem("data-sidebar", "light"), z("data-sidebar", "light"), document.documentElement.setAttribute("data-sidebar", "light")) : (sessionStorage.setItem("data-sidebar", "dark"), z("data-sidebar", "dark"), document.documentElement.setAttribute("data-sidebar", "dark"))
            }
            switch (e["data-layout-position"]) {
                case "fixed":
                    z("data-layout-position", "fixed"), sessionStorage.setItem("data-layout-position", "fixed"), document.documentElement.setAttribute("data-layout-position", "fixed");
                    break;
                case "scrollable":
                    z("data-layout-position", "scrollable"), sessionStorage.setItem("data-layout-position", "scrollable"), document.documentElement.setAttribute("data-layout-position", "scrollable");
                    break;
                default:
                    sessionStorage.getItem("data-layout-position") && "scrollable" == sessionStorage.getItem("data-layout-position") ? (z("data-layout-position", "scrollable"), sessionStorage.setItem("data-layout-position", "scrollable"), document.documentElement.setAttribute("data-layout-position", "scrollable")) : (z("data-layout-position", "fixed"), sessionStorage.setItem("data-layout-position", "fixed"), document.documentElement.setAttribute("data-layout-position", "fixed"))
            }
        }
    }

    function z(t, a) {
        document.querySelectorAll("input[name=" + t + "]").forEach(function(e) {
            a == e.value ? e.checked = !0 : e.checked = !1, e.addEventListener("change", function() {
                document.documentElement.setAttribute(t, e.value), sessionStorage.setItem(t, e.value), "data-layout-width" == t && "boxed" == e.value ? (document.documentElement.setAttribute("data-sidebar-size", "sm-hover"), sessionStorage.setItem("data-sidebar-size", "sm-hover"), document.getElementById("sidebar-size-small-hover").checked = !0) : "data-layout-width" == t && "fluid" == e.value && (document.documentElement.setAttribute("data-sidebar-size", "lg"), sessionStorage.setItem("data-sidebar-size", "lg"), document.getElementById("sidebar-size-default").checked = !0), "data-layout" == t && ("vertical" == e.value ? (A("vertical"), g(), feather.replace()) : "horizontal" == e.value ? (A("horizontal"), feather.replace()) : "twocolumn" == e.value && (A("twocolumn"), document.documentElement.setAttribute("data-layout-width", "fluid"), document.getElementById("layout-width-fluid").click(), b(), w(), g(), feather.replace()))
            })
        })
    }

    function x(e, t, a, o) {
        var n = document.getElementById(a);
        o.setAttribute(e, t), n && document.getElementById(a).click()
    }

    function T() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.body.classList.remove("fullscreen-enable")
    }

    function q() {
        var t = 0;
        document.getElementsByClassName("cart-item-price").forEach(function(e) {
            t += parseFloat(e.innerHTML)
        }), document.getElementById("cart-item-total").innerHTML = "$" + t.toFixed(2)
    }

    function C() {
        var e;
        "horizontal" !== document.documentElement.getAttribute("data-layout") && (!document.getElementById("navbar-nav") || (e = new SimpleBar(document.getElementById("navbar-nav"))) && e.getContentElement(), !document.getElementsByClassName("twocolumn-iconview")[0] || (e = new SimpleBar(document.getElementsByClassName("twocolumn-iconview")[0])) && e.getContentElement(), clearTimeout(l))
    }
    sessionStorage.getItem("defaultAttribute") ? ((a = {})["data-layout"] = sessionStorage.getItem("data-layout"), a["data-sidebar-size"] = sessionStorage.getItem("data-sidebar-size"), a["data-layout-mode"] = sessionStorage.getItem("data-layout-mode"), a["data-layout-width"] = sessionStorage.getItem("data-layout-width"), a["data-sidebar"] = sessionStorage.getItem("data-sidebar"), a["data-layout-position"] = sessionStorage.getItem("data-layout-position"), a["data-layout-style"] = sessionStorage.getItem("data-layout-style"), a["data-topbar"] = sessionStorage.getItem("data-topbar"), B(a)) : (e = document.documentElement.attributes, a = {}, e.forEach(function(e) {
        var t;
        e && e.nodeName && "undefined" != e.nodeName && (t = e.nodeName, a[t] = e.nodeValue, sessionStorage.setItem(t, e.nodeValue))
    }), sessionStorage.setItem("defaultAttribute", JSON.stringify(a)), B(a), (e = document.querySelector('.btn[data-bs-target="#theme-settings-offcanvas"]')) && e.click()), b(), t = document.getElementById("search-close-options"), o = document.getElementById("search-dropdown"), (n = document.getElementById("search-options")).addEventListener("focus", function() {
        0 < n.value.length ? (o.classList.add("show"), t.classList.remove("d-none")) : (o.classList.remove("show"), t.classList.add("d-none"))
    }), n.addEventListener("keyup", function(e) {
        var a;
        0 < n.value.length ? (o.classList.add("show"), t.classList.remove("d-none"), a = n.value.toLowerCase(), document.getElementsByClassName("notify-item").forEach(function(e) {
            var t = e.getElementsByTagName("span")[0].innerText.toLowerCase();
            e.style.display = t.includes(a) ? "block" : "none"
        })) : (o.classList.remove("show"), t.classList.add("d-none"))
    }), t.addEventListener("click", function() {
        n.value = "", o.classList.remove("show"), t.classList.add("d-none")
    }), document.body.addEventListener("click", function(e) {
        "search-options" !== e.target.getAttribute("id") && (o.classList.remove("show"), t.classList.add("d-none"))
    }), (e = document.querySelector('[data-toggle="fullscreen"]')) && e.addEventListener("click", function(e) {
        e.preventDefault(), document.body.classList.toggle("fullscreen-enable"), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
    }), document.addEventListener("fullscreenchange", T), document.addEventListener("webkitfullscreenchange", T), document.addEventListener("mozfullscreenchange", T), s = document.getElementsByTagName("HTML")[0], (e = document.querySelectorAll(".light-dark-mode")) && e.length && e[0].addEventListener("click", function(e) {
        s.hasAttribute("data-layout-mode") && "dark" == s.getAttribute("data-layout-mode") ? x("data-layout-mode", "light", "layout-mode-light", s) : x("data-layout-mode", "dark", "layout-mode-dark", s)
    }), v(), I(), f(), document.getElementsByClassName("dropdown-item-cart") && (d = document.querySelectorAll(".dropdown-item-cart").length, document.querySelectorAll("#page-topbar .dropdown-menu-cart .remove-item-btn").forEach(function(e) {
        e.addEventListener("click", function(e) {
            d--, this.closest(".dropdown-item-cart").remove(), document.getElementsByClassName("cartitem-badge").forEach(function(e) {
                e.innerHTML = d
            }), q(), document.getElementById("empty-cart").style.display = 0 == d ? "block" : "none", document.getElementById("checkout-elem").style.display = 0 == d ? "none" : "block"
        })
    }), document.getElementsByClassName("cartitem-badge").forEach(function(e) {
        e.innerHTML = d
    }), document.getElementById("empty-cart").style.display = "none", document.getElementById("checkout-elem").style.display = "block", q()), document.getElementsByClassName("notification-check") && document.querySelectorAll(".notification-check input").forEach(function(e) {
        e.addEventListener("click", function(e) {
            e.target.closest(".notification-item").classList.toggle("active")
        })
    }), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
        return new bootstrap.Tooltip(e)
    }), [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e) {
        return new bootstrap.Popover(e)
    }), setTimeout(function() {
        var e, t, a = document.getElementById("navbar-nav");
        a && (a = a.querySelector(".nav-item .active"), 300 < (e = a ? a.offsetTop : 0) && ((t = document.getElementsByClassName("app-menu") ? document.getElementsByClassName("app-menu")[0] : "") && t.querySelector(".simplebar-content-wrapper") && setTimeout(function() {
            t.querySelector(".simplebar-content-wrapper").scrollTop = 330 == e ? e + 85 : e
        }, 0)))
    }, 0), document.getElementById("reset-layout") && document.getElementById("reset-layout").addEventListener("click", function() {
        sessionStorage.clear(), window.location.reload()
    }), document.querySelectorAll("[data-toast]").forEach(function(a) {
        a.addEventListener("click", function() {
            var e = {},
                t = a.attributes;
            t["data-toast-text"] && (e.text = t["data-toast-text"].value.toString()), t["data-toast-gravity"] && (e.gravity = t["data-toast-gravity"].value.toString()), t["data-toast-position"] && (e.position = t["data-toast-position"].value.toString()), t["data-toast-className"] && (e.className = t["data-toast-className"].value.toString()), t["data-toast-duration"] && (e.duration = t["data-toast-duration"].value.toString()), t["data-toast-close"] && (e.close = t["data-toast-close"].value.toString()), t["data-toast-style"] && (e.style = t["data-toast-style"].value.toString()), t["data-toast-offset"] && (e.offset = t["data-toast-offset"]), Toastify({
                newWindow: !0,
                text: e.text,
                gravity: e.gravity,
                position: e.position,
                className: "bg-" + e.className,
                stopOnFocus: !0,
                offset: {
                    x: e.offset ? 50 : 0,
                    y: e.offset ? 10 : 0
                },
                duration: e.duration,
                close: "close" == e.close,
                style: "style" == e.style ? {
                    background: "linear-gradient(to right, #0AB39C, #405189)"
                } : ""
            }).showToast()
        })
    }), document.querySelectorAll("[data-choices]").forEach(function(e) {
        var t = {},
            a = e.attributes;
        a["data-choices-groups"] && (t.placeholderValue = "This is a placeholder set in the config"), a["data-choices-search-false"] && (t.searchEnabled = !1), a["data-choices-search-true"] && (t.searchEnabled = !0), a["data-choices-removeItem"] && (t.removeItemButton = !0), a["data-choices-sorting-false"] && (t.shouldSort = !1), a["data-choices-sorting-true"] && (t.shouldSort = !0), a["data-choices-multiple-default"], a["data-choices-multiple-groups"], a["data-choices-multiple-remove"] && (t.removeItemButton = !0), a["data-choices-limit"] && (t.maxItemCount = a["data-choices-limit"].value.toString()), a["data-choices-limit"] && (t.maxItemCount = a["data-choices-limit"].value.toString()), a["data-choices-editItem-true"] && (t.maxItemCount = !0), a["data-choices-editItem-false"] && (t.maxItemCount = !1), a["data-choices-text-unique-true"] && (t.duplicateItemsAllowed = !1), a["data-choices-text-disabled-true"] && (t.addItems = !1), a["data-choices-text-disabled-true"] ? new Choices(e, t).disable() : new Choices(e, t)
    }), document.querySelectorAll("[data-provider]").forEach(function(e) {
        var t, a, o;
        "flatpickr" == e.getAttribute("data-provider") ? (o = {}, (t = e.attributes)["data-date-format"] && (o.dateFormat = t["data-date-format"].value.toString()), t["data-enable-time"] && (o.enableTime = !0, o.dateFormat = t["data-date-format"].value.toString() + " H:i"), t["data-altFormat"] && (o.altInput = !0, o.altFormat = t["data-altFormat"].value.toString()), t["data-minDate"] && (o.minDate = t["data-minDate"].value.toString(), o.dateFormat = t["data-date-format"].value.toString()), t["data-maxDate"] && (o.maxDate = t["data-maxDate"].value.toString(), o.dateFormat = t["data-date-format"].value.toString()), t["data-deafult-date"] && (o.defaultDate = t["data-deafult-date"].value.toString(), o.dateFormat = t["data-date-format"].value.toString()), t["data-multiple-date"] && (o.mode = "multiple", o.dateFormat = t["data-date-format"].value.toString()), t["data-range-date"] && (o.mode = "range", o.dateFormat = t["data-date-format"].value.toString()), t["data-inline-date"] && (o.inline = !0, o.defaultDate = t["data-deafult-date"].value.toString(), o.dateFormat = t["data-date-format"].value.toString()), t["data-disable-date"] && ((a = []).push(t["data-disable-date"].value), o.disable = a.toString().split(",")), flatpickr(e, o)) : "timepickr" == e.getAttribute("data-provider") && (a = {}, (o = e.attributes)["data-time-basic"] && (a.enableTime = !0, a.noCalendar = !0, a.dateFormat = "H:i"), o["data-time-hrs"] && (a.enableTime = !0, a.noCalendar = !0, a.dateFormat = "H:i", a.time_24hr = !0), o["data-min-time"] && (a.enableTime = !0, a.noCalendar = !0, a.dateFormat = "H:i", a.minTime = o["data-min-time"].value.toString()), o["data-max-time"] && (a.enableTime = !0, a.noCalendar = !0, a.dateFormat = "H:i", a.minTime = o["data-max-time"].value.toString()), o["data-default-time"] && (a.enableTime = !0, a.noCalendar = !0, a.dateFormat = "H:i", a.defaultDate = o["data-default-time"].value.toString()), o["data-time-inline"] && (a.enableTime = !0, a.noCalendar = !0, a.defaultDate = o["data-time-inline"].value.toString(), a.inline = !0), flatpickr(e, a))
    }), document.querySelectorAll('.dropdown-menu a[data-bs-toggle="tab"]').forEach(function(e) {
        e.addEventListener("click", function(e) {
            e.stopPropagation(), bootstrap.Tab.getInstance(e.target).show()
        })
    }),
        function() {
            "null" != m && m !== c && u(m);
            var e = document.getElementsByClassName("language");
            e && e.forEach(function(t) {
                t.addEventListener("click", function(e) {
                    u(t.getAttribute("data-lang"))
                })
            })
        }(), g(), window.addEventListener("resize", function() {
        l && clearTimeout(l), l = setTimeout(C, 2e3)
    })
}();
var mybutton = document.getElementById("back-to-top");

function scrollFunction() {
    100 < document.body.scrollTop || 100 < document.documentElement.scrollTop ? mybutton.style.display = "block" : mybutton.style.display = "none"
}

function topFunction() {
    document.body.scrollTop = 0, document.documentElement.scrollTop = 0
}
window.onscroll = function() {
    scrollFunction()
};