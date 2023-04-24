@extends('layouts.app')

@section('content')
<section class="container-fluid course-detail-container">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Khóa học</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.show', $lesson->course_id) }}">Chi tiết khóa
                        học</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết bài học</li>
            </ol>
        </nav>

        <div class="course-detail-main">
            <div class="row pb-5">
                <div class="col-md-8">
                    <div class="course-detail-img mb-5">
                        <img src="{{ $lesson->image }}" alt="">
                    </div>
                    <h3>Tiến độ: {{ $programUsers != 0 && $lesson->totalPrograms != 0 ? ($programUsers /
                        $lesson->totalPrograms) * 100 : 0 }}%</h3>
                    <div class="lesson-progress mb-4">
                        <div class="user-progress"
                             style="width: {{ $programUsers != 0 && $lesson->totalPrograms != 0 ? ($programUsers / $lesson->totalPrograms) * 100 : 0 }}%"></div>
                    </div>
                    <div class="bg-white p-3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if(!session('status')) active @endif" id="pills-home-tab"
                                        data-toggle="pill" data-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="@if(!session('status')) true @else false @endif">Descriptions
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        data-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Documents
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade @if(!session('status')) show active @endif" id="pills-home"
                                 role="tabpanel" aria-labelledby="pills-home-tab">
                                <h3 class="reviews-heading border-0">Tổng quan bài học</h3>
                                <p>{{ $lesson->description }}</p>
                                <h3 class="reviews-heading border-0">Yêu cầu bài học</h3>
                                <p>{{ $lesson->requirements }}</p>
                                <div class="lessons-tag">
                                    <span>Tag:</span>
                                    @foreach ($courseTags as $courseTag)
                                    <a href="{{ route('courses.index', ['tags' => [$courseTag->id]]) }}">#{{
                                        $courseTag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade course-detail-teachers" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <h3 class="reviews-heading border-0">Bài học</h3>
                                <div class="course-detail-lessons">
                                    @foreach ($programs as $index => $program)
                                    <!--                                            <form action="{{ route('programs.store') }}" method="post" id="form">-->
                                    @csrf
                                    <div class="course-detail-lesson lesson-file-type">
                                        <div>
                                            <i class="fa-solid fa-file-pdf"></i>
                                            <span>{{ $program->type }}</span>
                                            <p class="course-detail-lesson-title">{{ $program->name }}
                                            <div
                                                class="program-status @if(!$program->userJoinedProgram($programs[$index]->id)) program-status-not-join @endif">
                                                @if($program->userJoinedProgram($programs[$index]->id))
                                                Đã học
                                                @else
                                                Chưa học
                                                @endif
                                            </div>
                                            </p>
                                        </div>
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                                        <input type="hidden" name="source_code" value="{{ $program->source_code }}">
                                        @if($index == 0 || $program->userJoinedProgram($programs[$index]->id))
                                        <a class="btn btn-info Learn" id="{{ $program->id }}"
                                           href="{{ $program->source_code }}" target="_blank" {{ $program->type ==
                                            'video' ? 'data-lity' : ''}} >Học</a>
                                        @elseif(!$program->userJoinedProgram($programs[$index]->id) &&
                                        $program->userJoinedProgram($programs[$index-1]->id))
                                        <a class="btn btn-info Learn" id="{{ $program->id }}" href="{{ $program->source_code }}"
                                           target="_blank" {{ $program->type ==
                                            'video' ? 'data-lity' : ''}}>Học</a>
                                        @else
                                        <a class="btn-not-submit">Học</a>
                                        @endif
                                    </div>
                                    <!--                                            </form>-->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="course-detail-bg">
                        <div class="course-detail-info">
                            <i class="fa-solid fa-desktop"></i>
                            <span class="course-detail-w">Khóa học</span>
                            <span class="course-detail-f">:</span>
                            <span>{{ $lesson->course->name }}</span>
                        </div>
                        <div class="course-detail-info">
                            <i class="fa-solid fa-users"></i>
                            <span class="course-detail-w">Số học viên</span>
                            <span class="course-detail-f">:</span>
                            <span>{{ $lesson->course->totallearners }}</span>
                        </div>
                        <div class="course-detail-info">
                            <i class="fa-solid fa-clock"></i>
                            <span class="course-detail-w">Thời gian học</span>
                            <span class="course-detail-f">:</span>
                            <span>{{ $lesson->time }} giờ</span>
                        </div>
                        <div class="course-detail-info">
                            <i class="fa-solid fa-key"></i>
                            <span class="course-detail-w">Danh mục</span>
                            <span class="course-detail-f">:</span>
                            <span>
                                    @foreach ($courseTags as $courseTag)
                                        <a href="{{ route('courses.index', ['tags' => [$courseTag->id]]) }}">#{{ $courseTag->name }}</a>
                                    @endforeach
                                </span>
                        </div>
                        <div class="course-detail-info">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <span class="course-detail-w">Price</span>
                            <span class="course-detail-f">:</span>
                            <span>{{ $lesson->course->coursePrice }}$</span>
                        </div>
                        <div class="course-detail-info text-center">
                            <form action="{{ route('course-users.destroy', $lesson->course_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="end-course-btn">Kết thuc khóa học</button>
                            </form>
                        </div>
                    </div>
                    @include('components.other-course')
                </div>
            </div>
        </div>
    </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.Learn').click(function (e) {
            $.post("{{ route('programs.store') }}",

                {
                    program_id: e.target.id
                }
                ,

                function (response) {
                }
            )
            ;
        })
    })
</script>
@endsection


