@extends('app')
@section('content')
    <div class="content d-flex justify-content-center align-items-center">



        <form class="login-form" method="POST" action="{{ route('auth.store') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-block">

                                <strong>{{ session()->get('success') }}</strong>
                            </div>
                        @endif

                        <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                                        <img src="{{ asset('images/BAAGrowth.png') }}" class="h-48px" alt="">

                        </div>
                        <h5 class="mb-0">เข้าสู่ระบบ</h5>
                        <span class="d-block text-muted">Login to your account</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">อีเมล (E-Mail)</label>

                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="text" class="form-control" placeholder="อีเมล" name="email" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-user-circle text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รหัสผ่าน (Password)</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="password" class="form-control" placeholder="•••••••••••" name="password" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-lock text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">เข้าสู่ระบบ (Sign in)</button>
                    </div>

                    {{--                    <div class="text-center">--}}
                    {{--                        <a href="/forgot">ลืมรหัสผ่าน (Forgot password)?</a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </form>

    </div>

    @if (session()->has('message'))
        <div class="alert alert-danger alert-block">

            <strong>{{ session()->get('message') }}</strong>
        </div>
    @endif

@endsection
