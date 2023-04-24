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

                <h4 class="card-title">Danh sách khóa học</h4>
                <div class="row mb-5"></div>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khóa học</th>
                        <th>Danh mục</th>
                        <th>Số bài học</th>
                        <th>Ngày tạo</th>
                        <th>Số học viên</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                            @foreach($course->tags as $tag)
                                <mark class="text">#{{ $tag->name }}</mark>
                            @endforeach
                        </td>
                        <td>{{ $course->lessons->count() }}</td>
                        <td>{{ $course->created_at->format('Y/m/d') }}</td>
                        <td>{{ $course->users->count() }}</td>
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
