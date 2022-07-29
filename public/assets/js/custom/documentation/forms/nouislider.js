"use strict";
var KTFormsNouisliderDemos = {
    init: function (e) {
        var t, r, i, n, o, c;
        (t = document.querySelector("#kt_slider_basic")),
            (r = document.querySelector("#kt_slider_basic_min")),
            (i = document.querySelector("#kt_slider_basic_max")),
            noUiSlider.create(t, {
                start: [20, 80],
                connect: !0,
                range: { min: 0, max: 100 },
            }),
            t.noUiSlider.on("update", function (e, t) {
                t ? (i.innerHTML = e[t]) : (r.innerHTML = e[t]);
            }),
            (n = document.querySelector("#kt_slider_sizes_sm")),
            (o = document.querySelector("#kt_slider_sizes_default")),
            (c = document.querySelector("#kt_slider_sizes_lg")),
            noUiSlider.create(n, {
                start: [20, 80],
                connect: !0,
                range: { min: 0, max: 100 },
            }),
            noUiSlider.create(o, {
                start: [20, 80],
                connect: !0,
                range: { min: 0, max: 100 },
            }),
            noUiSlider.create(c, {
                start: [20, 80],
                connect: !0,
                range: { min: 0, max: 100 },
            }),
            (function () {
                var e = document.querySelector("#kt_slider_vertical");
                noUiSlider.create(e, {
                    start: [60, 160],
                    connect: !0,
                    orientation: "vertical",
                    range: { min: 0, max: 200 },
                });
            })(),
            (function () {
                var e = document.querySelector("#kt_slider_tooltip");
                noUiSlider.create(e, {
                    start: [20, 80, 120],
                    tooltips: [!1, wNumb({ decimals: 1 }), !0],
                    range: { min: 0, max: 200 },
                });
            })(),
            (function () {
                var e = document.querySelector("#kt_slider_soft_limits");
                noUiSlider.create(e, {
                    start: 50,
                    range: { min: 0, max: 100 },
                    pips: { mode: "values", values: [20, 80], density: 4 },
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsNouisliderDemos.init();
});
