<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">@lang('translation.course')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('admin.course-view') }}"
                                key="t-vertical">Danh sách khóa học</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.course-create') }}"
                                key="t-horizontal">Thêm khóa học</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">@lang('translation.lesson')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('lessons.index') }}"
                               key="t-vertical">Danh sách bài học</a>
                        </li>

                        <li>
                            <a href="{{ route('lessons.create') }}"
                               key="t-horizontal">Thêm bài học</a>
                        </li>

                        <li>
                            <a href="{{ route('lessons.importView') }}"
                               key="t-horizontal">Import</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Quản lí học viên</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('students.index') }}"
                               key="t-vertical">Danh sách học viên</a>
                        </li>

                        <li>
                            <a href="{{ route('students.create') }}"
                               key="t-horizontal">Thêm học viên</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
