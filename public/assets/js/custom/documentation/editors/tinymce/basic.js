"use strict";
var KTFormsTinyMCEBasic = {
    init: function () {
        var i;
        (i = { selector: "#kt_docs_tinymce_basic" }),
            KTApp.isDarkMode() &&
                ((i.skin = "oxide-dark"), (i.content_css = "dark")),
            tinymce.init(i);
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsTinyMCEBasic.init();
});
