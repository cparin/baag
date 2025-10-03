@extends('app')
@push('scripts')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>
@endpush
@section('content')
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">


                <div class="col-lg-6 offset-lg-3">
                    <!-- Basic card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">ลงทะเบียน</h3>
                        </div>

                        <div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="card-body">


                                    {{--                                    <div class="row mb-3">--}}
                                    {{--                                        <label class="col-form-label col-lg-3">คำนำหน้า <span--}}
                                    {{--                                                class="text-danger">*</span></label>--}}
                                    {{--                                        <div class="col-lg-4">--}}
                                    {{--                                            <select class="form-select" required="" name="title_id">--}}
                                    {{--                                                <option selected disabled value="">กรุณาเลือก...</option>--}}
                                    {{--                                                <option value="1">นาย</option>--}}
                                    {{--                                                <option value="2">นาง</option>--}}
                                    {{--                                                <option value="3">นางสาว</option>--}}
                                    {{--                                            </select>--}}

                                    {{--                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ชื่อ - นามสกุล <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" required name="name"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">อีเมล <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" required name="email"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">รหัสผ่าน <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="password" required
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ยืนยันรหัสผ่าน <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="confirm" required
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>



{{--                                    <div class="row mb-3">--}}
{{--                                        <label class="col-form-label col-lg-3">จังหวัด </label>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <select class="form-select" required="" name="c_id">--}}
{{--                                                <option selected disabled value="">กรุณาเลือก...</option>--}}
{{--                                                <option value="43">ขอนแก่น</option>--}}

{{--                                            </select>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>

                                <div class="row mb-3">


                                    <label class="col-form-label col-lg-3"> <span
                                            class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input type="checkbox" name="accept" class="form-check-input" required>
                                        <span class="form-check-label">Accept <a
                                                href="#">&nbsp;Terms of Service and Privacy Policy</a></span>

                                    </div>

                                </div>

                                <div class="card-footer text-end">
                                    <input type="submit" class="btn btn-primary" value="ลงทะเบียน">
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /basic card -->
                </div>

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>


@endsection
