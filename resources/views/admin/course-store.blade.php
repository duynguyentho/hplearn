@extends('layouts.master')

@section('title') @lang('translation.Form_File_Upload') @endsection

@section('css')
<!-- Plugins css -->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                    @csrf
                <h4 class="card-title">Dropzone</h4>
                <p class="card-title-desc">DropzoneJS is an open source library
                    that provides drag’n’drop file uploads with image previews.
                </p>

                <div>
                    <form action="{{ route('admin.course-save') }}" method="post" multiple="multiple" class="dropzone" id="formDile">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                            </div>

                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form>
<!--                    <div class="text-center mt-4">-->
<!--                        <button type="submit" id="btnupload" class="btn btn-primary waves-effect waves-light">Upload</button>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section('script')
<!-- Plugins js -->
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#btnupload').click(function () {
            $('#formDile').submit()
        })
    })
</script>
@endsection
