"use strict";
var KTFormsCKEditorBalloonBlock = {
    init: function () {
        BalloonEditor.create(
            document.querySelector("#kt_docs_ckeditor_balloon_block")
        )
            .then((o) => {
                console.log(o);
            })
            .catch((o) => {
                console.error(o);
            });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsCKEditorBalloonBlock.init();
});
