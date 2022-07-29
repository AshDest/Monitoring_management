"use strict";
var KTGoogleChartPieDemo = {
    init: function () {
        google.load("visualization", "1", {
            packages: ["corechart", "bar", "line"],
        }),
            google.setOnLoadCallback(function () {
                var e = google.visualization.arrayToDataTable([
                    ["Task", "Hours per Day"],
                    ["Work", 11],
                    ["Eat", 2],
                    ["Commute", 2],
                    ["Watch TV", 2],
                    ["Sleep", 7],
                ]);
                new google.visualization.PieChart(
                    document.getElementById("kt_docs_google_chart_pie")
                ).draw(e, {
                    title: "My Daily Activities",
                    colors: [
                        "#fe3995",
                        "#f6aa33",
                        "#6e4ff5",
                        "#2abe81",
                        "#c7d2e7",
                        "#593ae1",
                    ],
                });
            });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTGoogleChartPieDemo.init();
});
