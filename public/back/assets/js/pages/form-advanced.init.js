!(function (o) {
    "use strict";
    var t = function () {};
    (t.prototype.initSwitchery = function () {
        o('[data-plugin="switchery"]').each(function (t, e) {
            new Switchery(o(this)[0], o(this).data());
        });
    }),
        (t.prototype.initSelect2 = function () {
            o('[data-toggle="select2"]').select2();
        }),
        (t.prototype.initInputmask = function () {
            o('[data-toggle="input-mask"]').each(function (t, e) {
                var i = o(e).data("maskFormat"),
                    n = o(e).data("reverse");
                null != n ? o(e).mask(i, { reverse: n }) : o(e).mask(i);
            });
        }),
        (t.prototype.initTimepicker = function () {
            o("#timepicker").timepicker({ defaultTIme: !1, icons: { up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down" } }),
                o("#timepicker2").timepicker({ showMeridian: !1, icons: { up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down" } }),
                o("#timepicker3").timepicker({ minuteStep: 15, icons: { up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down" } });
        }),
        (t.prototype.initColorpicker = function () {
            o("#default-colorpicker").colorpicker({ format: "hex" }), o("#rgba-colorpicker").colorpicker(), o("#component-colorpicker").colorpicker({ format: null });
        }),
        (t.prototype.initDaterangepicker = function () {
            o(".input-daterange-datepicker").daterangepicker({ buttonClasses: ["btn", "btn-sm"], applyClass: "btn-success", cancelClass: "btn-secondary" }),
                o(".input-daterange-timepicker").daterangepicker({
                    timePicker: !0,
                    timePickerIncrement: 30,
                    locale: { format: "MM/DD/YYYY h:mm A" },
                    buttonClasses: ["btn", "btn-sm"],
                    applyClass: "btn-success",
                    cancelClass: "btn-secondary",
                }),
                o(".input-limit-datepicker").daterangepicker({
                    format: "MM/DD/YYYY",
                    minDate: "06/01/2019",
                    maxDate: "06/30/2019",
                    buttonClasses: ["btn", "btn-sm"],
                    applyClass: "btn-success",
                    cancelClass: "btn-secondary",
                    dateLimit: { days: 6 },
                }),
                o("#reportrange span").html(moment().subtract(29, "days").format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")),
                o("#reportrange").daterangepicker(
                    {
                        format: "MM/DD/YYYY",
                        startDate: moment().subtract(29, "days"),
                        endDate: moment(),
                        minDate: "01/01/2012",
                        maxDate: "12/31/2015",
                        dateLimit: { days: 60 },
                        showDropdowns: !0,
                        showWeekNumbers: !0,
                        timePicker: !1,
                        timePickerIncrement: 1,
                        timePicker12Hour: !0,
                        ranges: {
                            Today: [moment(), moment()],
                            Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                            "Last 7 Days": [moment().subtract(6, "days"), moment()],
                            "Last 30 Days": [moment().subtract(29, "days"), moment()],
                            "This Month": [moment().startOf("month"), moment().endOf("month")],
                            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                        },
                        opens: "left",
                        drops: "down",
                        buttonClasses: ["btn", "btn-sm"],
                        applyClass: "btn-success",
                        cancelClass: "btn-secondary",
                        separator: " to ",
                        locale: {
                            applyLabel: "Submit",
                            cancelLabel: "Cancel",
                            fromLabel: "From",
                            toLabel: "To",
                            customRangeLabel: "Custom",
                            daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                            monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            firstDay: 1,
                        },
                    },
                    function (t, e, i) {
                        console.log(t.toISOString(), e.toISOString(), i), o("#reportrange span").html(t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY"));
                    }
                );
        }),
        (t.prototype.initclockpicker = function () {
            o(".clockpicker").clockpicker({ donetext: "Done" }),
                o("#single-input").clockpicker({ placement: "bottom", align: "left", autoclose: !0, default: "now" }),
                o("#check-minutes").click(function (t) {
                    t.stopPropagation(), o("#single-input").clockpicker("show").clockpicker("toggleView", "minutes");
                });
        }),
        (t.prototype.initparsley = function () {
            o("form-validation").parsley();
        }),
        (t.prototype.initDatePicker = function () {
            o("#datepicker").datepicker(),
                o("#datepicker-autoclose").datepicker({ autoclose: !0, todayHighlight: !0 }),
                o("#datepicker-inline").datepicker(),
                o("#datepicker-multiple-date").datepicker({ format: "mm/dd/yyyy", clearBtn: !0, multidate: !0, multidateSeparator: "," }),
                o("#date-range").datepicker({ toggleActive: !0 });
        }),
        (t.prototype.initsummernote = function () {
            o(".summernote").summernote({ height: 350, minHeight: null, maxHeight: null, focus: !1 });
        }),
        (t.prototype.initparsley = function () {
            o(".form-validation").parsley();
        }),
        (t.prototype.init = function () {
            // this.initSwitchery(),
                this.initSelect2();
                // this.initInputmask(),
                // this.initTimepicker(),
                // this.initColorpicker(),
                // this.initDaterangepicker(),
                // this.initclockpicker(),
                // this.initparsley(),
                // this.initDatePicker(),
                // this.initsummernote(),
                // this.initparsley();
        }),
        (o.Components = new t()),
        (o.Components.Constructor = t);
})(window.jQuery),
    (function (t) {
        "use strict";
        window.jQuery.Components.init();
    })();
