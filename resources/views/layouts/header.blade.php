<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo-container">
            <a class="navbar-brand" href="/">
                <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="HapoLearn Logo">
            </a>
            <div class="navbar-icons">
                <div class="navbar-icon">

                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100">
                <li class="nav-item {{ (Request::route()->getName() == 'home') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (Request::route()->getName() == 'courses.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('courses.index') }}">Khóa học</a>
                </li>
                <li class="nav-item {{ (Request::route()->getName() == 'profiles') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profiles.index') }}">Thông tin</a>
                </li>
                <li class="nav-item {{ ((Request::route()->getName() == 'login') || (Request::route()->getName() == 'register')) ? 'active' : '' }}">
                    @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link logout-btn">
                                ĐĂNG XUẤT
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false">
                            ĐĂNG NHẬP / ĐĂNG KÍ
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>
