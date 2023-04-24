/******/
(function () { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!***********************************************!*\
      !*** ./resources/js/pages/datatables.init.js ***!
      \***********************************************/
    $(document).ready(function () {
        $("#datatable").DataTable(), $("#datatable-buttons").DataTable({
            language: {
                emptyTable: "Không có dữ liệu",
                search: "Tìm kiếm"
            },
            lengthChange: !1,
            buttons: ["copy", {
                extend: "excel",
                text: "Xuất file Excel",
                messageTop: null,
                title: "Thông tin khóa học"
            }, {
                extend: "pdf",
                text: "Xuất file PDF",
                messageTop: null,
                title: "Thông tin khóa học",
            }, {
                extend: "colvis",
                text: "Ẩn cột",
            }],
            title: ''
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm");
    });
})()
;
