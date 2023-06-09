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
                        <th>Tên khoá học</th>
                        <th>Tên bài học</th>
                        <th>Mô tả</th>
                        <th>Thời lượng</th>
                        <th>Số tài liệu</th>
                        <th>Ngày tạo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->course->name }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>
                            {{ $lesson->description }}
                        </td>
                        <td>{{ $lesson->time }} phút</td>
                        <td>{{ $lesson->programs()->count() }}</td>
                        <td>{{ $lesson->created_at->format('Y/m/d') }}</td>
                        <td>
                            <a href="{{ route('lessons.programs', $lesson->id) }}" class="btn-primary btn">Thông tin tài liệu</a>
                            <a href="{{ route('lessons.programs.create', $lesson->id) }}" class="btn-primary btn">Đăng kí tài liệu</a>

                        </td>
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
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
