@extends('app')
@push('scripts')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>
@endpush
@section('content')
    <div class="page-content pt-0">

        <div class="content-wrapper">

            <div class="content">

                <div class="col-lg-6 offset-lg-3">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">เพิ่ม บุตร/หลาน ใหม่</h3>
                        </div>

                        <div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="{{ route('profile.store') }}">
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
                                        <label class="col-form-label col-lg-3">เพศ <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <select class="form-select" required="" name="gender">
                                                <option selected disabled value="">กรุณาเลือก...</option>
                                                <option value="male">ชาย</option>
                                                <option value="female">หญิง</option>

                                            </select>

                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">วันเกิด</label>
                                        <div class="col-lg-4">
                                            <input type="date" class="form-control"  name="birthdate"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ส่วนสูงพ่อ (ซม.)</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="father_height"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ส่วนสูงแม่ (ซม.)</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="mother_height"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">อายุครรภ์ตอนคลอด (สัปดาห์)</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="birthweek"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">น้ำหนักแรกเกิด (กก.)</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="birth_weight"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ส่วนสูงแรกเกิด (ซม.)</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="birth_height"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="user_id" value="{{ session()->get('auth')->id }}">

                                <div class="card-footer text-end">
                                    <input type="submit" class="btn btn-primary" value="เพิ่มข้อมูล">
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>


        </div>

    </div>

@endsection
