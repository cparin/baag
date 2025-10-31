<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BAAG</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt:100,300,400,500,700,900" rel="stylesheet"
          type="text/css">
    <!-- Global stylesheets -->
    <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ltr/all.min.css?v=0.01') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @stack('styles')
    <!-- Core JS files -->
    {{--    <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>--}}

    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/media/glightbox.min.js') }}"></script>
    <!-- /core JS files -->
    @stack('scripts')
    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /theme JS files -->
    {{--    <script src="{{ asset('assets/js/vendor/uploaders/fileinput/fileinput.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/demo/pages/uploader_bootstrap.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>--}}
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            font-size: 16px;
        }
    </style>
</head>

<body class="navbar-top">

<!-- Main navbar -->
<div class="navbar navbar-light navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="/" class="d-inline-flex align-items-center">
                {{--                <h1 class="text-white d-sm-inline-block">BAAG</h1>--}}
                <img src="{{ asset('images/BAAGrowth.png') }}" class="d-sm-inline-block h-40px" alt="">
                {{--                <img src="{{ asset('assets/medias/sci-instrument-dark.png') }}" class="d-none d-sm-inline-block h-16px ms-3" alt="">--}}
            </a>
        </div>

        <div class="d-lg-none ms-2">

        </div>

        <div class="navbar-collapse order-2 order-lg-1 collapse" id="navbar-mobile" style="">
            <ul class="navbar-nav gap-lg-2 mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="/" class="navbar-nav-link rounded"> <i class="ph-house"></i></a>
                </li>
                @if(!session()->has('auth'))

                    <li class="nav-item">
                        <a href="/user/create" class="navbar-nav-link rounded"> ลงทะเบียน</a>
                    </li>

                @endif
                @if(session()->has('auth'))
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="/booking" class="navbar-nav-link rounded"> รายการจอง</a>--}}
                    {{--                    </li>--}}

                @endif


                <li class="nav-item">
                    <a href="#" class="navbar-nav-link rounded"> ติดต่อเรา</a>
                </li>


                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a href="#" class="navbar-nav-link rounded dropdown-toggle" data-bs-toggle="dropdown">รายการจอง</a>--}}
                {{--                    <div class="dropdown-menu">--}}
                {{--                        <a href="#" class="dropdown-item">Action</a>--}}
                {{--                        <a href="#" class="dropdown-item">Another action</a>--}}
                {{--                        <a href="#" class="dropdown-item">Something else here</a>--}}
                {{--                        <a href="#" class="dropdown-item">One more line</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
            </ul>
        </div>

        <ul class="nav gap-sm-2 order-1 order-lg-2 ms-auto">

            @if(session()->get('pid'))
                <li class="nav-item nav-item-dropdown-lg dropdown">
                    <a href="#" class="navbar-nav-link align-items-center rounded p-1" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        @if(session()->get('profile')->gender =='female')
                            <div class="status-indicator-container">
                                <img src="{{ asset('images/avatar/g-avatar.png') }}"
                                     class="w-32px h-32px rounded"
                                     alt="">
                                <span class="status-indicator bg-success"></span>
                            </div>
                        @else
                            <div class="status-indicator-container">
                                <img src="{{ asset('images/avatar/b-avatar.png') }}"
                                     class="w-32px h-32px rounded"
                                     alt="">
                                <span class="status-indicator bg-success"></span>
                            </div>
                        @endif
                        <span class="d-none d-lg-inline-block mx-lg-2"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        @if(session()->has('profiles'))

                            @foreach(session()->get('profiles') as $profile)
                                <a href="/selectprofile/{{ $profile->id }}"
                                   class="dropdown-item">{{ $profile->name }}</a>
                            @endforeach
                            {{--                            <a href="/selectprofile/1" class="dropdown-item">เด็กหญิงเติบโต เติบโต</a>--}}
                            {{--                            <a href="/selectprofile/2" class="dropdown-item">เด็กชายโตเติบ เติบโต</a>--}}

                        @endif
                    </div>
                </li>

            @endif

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-mobile" aria-expanded="false">
                <i class="ph-squares-four"></i>
            </button>


            @if(session()->has('auth'))
                <li class="nav-item nav-item-dropdown-lg dropdown">
                    <a href="#" class="navbar-nav-link align-items-center rounded p-1" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="status-indicator-container">
                            <img src="{{ asset('assets/images/demo/users/avartar.png') }}"
                                 class="w-32px h-32px rounded"
                                 alt="">
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <span class="d-none d-lg-inline-block mx-lg-2">{{ session()->get('auth')->name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        {{--                        <a href="#" class="dropdown-item">ข้อมูลส่วนตัว</a>--}}
                        <a href="/logout" class="dropdown-item">ออกจากระบบ</a>
                    </div>
                </li>

            @else

                <div class="d-inline-flex">
                    <a href="{{ route('auth.index') }}" class="btn btn-indigo">
                        <i class="ph-book me-1"></i> เข้าสู่ระบบ
                    </a>

                </div>

            @endif


        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                <span class="fw-normal"></span>
            </h4>

        </div>

    </div>
</div>
<!-- /page header -->


<!-- Page content -->
@yield('content')
<!-- /page content -->


<!-- Footer -->
<div class="navbar navbar-sm navbar-footer border-top">
    <div class="container-fluid">
        <span>&copy; 2025 <a href="https://kku.ac.th">KKU</a></span>

        {{--        <ul class="nav">--}}
        {{--            <li class="nav-item">--}}
        {{--                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">--}}
        {{--                    <div class="d-flex align-items-center mx-md-1">--}}
        {{--                        <i class="ph-lifebuoy"></i>--}}
        {{--                        <span class="d-none d-md-inline-block ms-2">Support</span>--}}
        {{--                    </div>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--            <li class="nav-item ms-md-1">--}}
        {{--                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">--}}
        {{--                    <div class="d-flex align-items-center mx-md-1">--}}
        {{--                        <i class="ph-file-text"></i>--}}
        {{--                        <span class="d-none d-md-inline-block ms-2">Docs</span>--}}
        {{--                    </div>--}}
        {{--                </a>--}}
        {{--            </li>--}}

        {{--        </ul>--}}
    </div>
</div>
<!-- /footer -->


</body>
</html>
