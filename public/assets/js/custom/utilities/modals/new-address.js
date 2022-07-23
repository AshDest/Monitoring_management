"use strict";
var KTModalNewAddress = (function () {
    var t, e, n, o, i, r;
    return {
        init: function () {
            (r = document.querySelector("#kt_modal_new_address")) &&
                ((i = new bootstrap.Modal(r)),
                (o = document.querySelector("#kt_modal_new_address_form")),
                (t = document.getElementById("kt_modal_new_address_submit")),
                (e = document.getElementById("kt_modal_new_address_cancel")),
                $(o.querySelector('[name="province"]'))

                    .on("change", function () {
                        n.revalidateField("province");
                    }),
                    $(o.querySelector('[name="territoire"]'))

                    .on("change", function () {
                        n.revalidateField("territoire");
                    }),
                    $(o.querySelector('[name="commune"]'))
                    .select2()
                    .on("change", function () {
                        n.revalidateField("commune");
                    }),
                    $(o.querySelector('[name="quartier"]'))
                    .select2()
                    .on("change", function () {
                        n.revalidateField("quartier");
                    }),

                (n = FormValidation.formValidation(o, {
                    fields: {
                        "code": {
                            validators: {
                                notEmpty: { message: "Code is required" },
                            },
                        },
                        "designation": {
                            validators: {
                                notEmpty: { message: "nommination name is required" },
                            },
                        },
                        "Avenue": {
                            validators: {
                                notEmpty: { message: "Avenue name is required" },
                            },
                        },
                        "numParcelle": {
                            validators: {
                                notEmpty: { message: "numParcelle is required" },
                            },
                        },
                        "long": {
                            validators: {
                                notEmpty: { message: "long is required" },
                            },
                        },
                        "lat": {
                            validators: {
                                notEmpty: { message: "lat is required" },
                            },
                        },
                        "tel1": {
                            validators: {
                                notEmpty: { message: "Phone number is required" },
                            },
                        },
                        "tel2": {
                            validators: {
                                notEmpty: { message: "Phone number is required" },
                            },
                        },
                        "email": {
                            validators: {
                                notEmpty: { message: "email is required" },
                            },
                        },
                        "website": {
                            validators: {
                                notEmpty: { message: "website is required" },
                            },
                        },
                        "rccm": {
                            validators: {
                                notEmpty: { message: "RCCM is required" },
                            },
                        },
                        "num_impot": {
                            validators: {
                                notEmpty: { message: "Num Impot is required" },
                            },
                        },
                        "id_nat": {
                            validators: {
                                notEmpty: { message: "ID Nationnal is required" },
                            },
                        },
                        "num_cnss": {
                            validators: {
                                notEmpty: { message: "Num CNSS is required" },
                            },
                        },
                        province: {
                            validators: {
                                notEmpty: { message: "province is required" },
                            },
                        },
                        territoire: {
                            validators: {
                                notEmpty: { message: "territoire 1 is required" },
                            },
                        },
                        commune: {
                            validators: {
                                notEmpty: { message: "commune is required" },
                            },
                        },
                        quartier: {
                            validators: {
                                notEmpty: { message: "quartier is required" },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n &&
                            n.validate().then(function (e) {
                                console.log("validated!"),
                                    "Valid" == e
                                        ? (t.setAttribute(
                                              "data-kt-indicator",
                                              "on"
                                          ),
                                          (t.disabled = !0),
                                          setTimeout(function () {
                                              t.removeAttribute(
                                                  "data-kt-indicator"
                                              ),
                                                  (t.disabled = !1),
                                                  Swal.fire({
                                                      text: "Form has been successfully submitted!",
                                                      icon: "success",
                                                      buttonsStyling: !1,
                                                      confirmButtonText:
                                                          "Ok, got it!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  }).then(function (t) {
                                                      t.isConfirmed && i.hide();
                                                  });
                                          }, 2e3))
                                        : Swal.fire({
                                              text: "Sorry, looks like there are some errors detected, please try again.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                            });
                }),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (o.reset(), i.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton: "btn btn-primary",
                                      },
                                  });
                        });
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTModalNewAddress.init();
});
