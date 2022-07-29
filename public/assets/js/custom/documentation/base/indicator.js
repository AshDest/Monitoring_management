"use strict";
var KTBaseIndicatorDemos = {
    init: function (t) {
        var e;
        (e = document.querySelector("#kt_button_1")).addEventListener(
            "click",
            function () {
                e.setAttribute("data-kt-indicator", "on"),
                    setTimeout(function () {
                        e.removeAttribute("data-kt-indicator");
                    }, 3e3);
            }
        ),
            (function (t) {
                var e = document.querySelector("#kt_button_2");
                e.addEventListener("click", function () {
                    e.setAttribute("data-kt-indicator", "on"),
                        setTimeout(function () {
                            e.removeAttribute("data-kt-indicator");
                        }, 3e3);
                });
            })(),
            (function (t) {
                var e = document.querySelector("#kt_button_3");
                e.addEventListener("click", function () {
                    e.setAttribute("data-kt-indicator", "on"),
                        setTimeout(function () {
                            e.removeAttribute("data-kt-indicator");
                        }, 3e3);
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTBaseIndicatorDemos.init();
});
