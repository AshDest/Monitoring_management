"use strict";
var KTFormsQuillBasic = {
    init: function () {
        new Quill("#kt_docs_quill_basic", {
            modules: {
                toolbar: [
                    [{ header: [1, 2, !1] }],
                    ["bold", "italic", "underline"],
                    ["image", "code-block"],
                ],
            },
            placeholder: "Type your text here...",
            theme: "snow",
        });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsQuillBasic.init();
});
