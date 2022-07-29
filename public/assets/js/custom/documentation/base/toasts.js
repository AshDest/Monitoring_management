"use strict";
const KTBaseToastDemos = {
    init: function () {
        (() => {
            const t = document.getElementById("kt_docs_toast_toggle_button"),
                e = document.getElementById("kt_docs_toast_toggle"),
                o = bootstrap.Toast.getOrCreateInstance(e);
            t.addEventListener("click", (t) => {
                t.preventDefault(), o.show();
            });
        })(),
            (() => {
                const t = document.getElementById("kt_docs_toast_stack_button"),
                    e = document.getElementById(
                        "kt_docs_toast_stack_container"
                    ),
                    o = document.querySelector('[data-kt-docs-toast="stack"]');
                o.parentNode.removeChild(o),
                    t.addEventListener("click", (t) => {
                        t.preventDefault();
                        const n = o.cloneNode(!0);
                        e.append(n),
                            bootstrap.Toast.getOrCreateInstance(n).show();
                    });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTBaseToastDemos.init();
});
