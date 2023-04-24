@extends('layouts.master')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title') @lang('translation.Dashboards') @endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Danh sách bài học</h4>
                <div class="row mb-5"></div>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->username }}</td>
                        <td>
                            {{ $student->name }}
                        </td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->created_at->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- end modal -->

@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<!-- Datatable init js -->
<script>
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
                title: "Thông tin học viên"
            }, {
                extend: "pdf",
                text: "Xuất file PDF",
                messageTop: null,
                title: "Thông tin học viên",
            }, {
                extend: "colvis",
                text: "Ẩn cột",
            }],
            title: ''
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm");
    });
})()
;

</script>
@endsection
