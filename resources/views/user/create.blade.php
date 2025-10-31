@extends('app')
@push('scripts')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userTypeRadios = document.querySelectorAll('input[name="user_type"]');
            const doctorFields = document.getElementById('doctor_fields');
            const requiredDoctorFields = ['medical_license', 'expertise', 'hospital', 'hospital_type'];

            userTypeRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (this.value === 'doctor') {
                        doctorFields.style.display = 'block';
                        requiredDoctorFields.forEach(fieldId => {
                            const field = document.getElementById(fieldId);
                            if (field) field.setAttribute('required', 'required');
                        });
                    } else {
                        doctorFields.style.display = 'none';
                        requiredDoctorFields.forEach(fieldId => {
                            const field = document.getElementById(fieldId);
                            if (field) field.removeAttribute('required');
                        });
                    }
                });
            });
        });
    </script>

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
                        <form class="needs-validation" novalidate method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="card-body">


                                <div class="row mb-3">
                                    <label class="col-form-label col-lg-3">ประเภทผู้ใช้ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="radio" class="btn-check" name="user_type"
                                                       id="user_type_user" value="user" required>
                                                <label class="btn btn-outline-primary w-100 py-3"
                                                       for="user_type_user">
                                                    <i class="ph-user-circle ph-2x d-block mb-2 me-1"></i>
                                                    <span class="fw-semibold">ผู้ใช้งานทั่วไป</span>
                                                </label>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <input type="radio" class="btn-check" name="user_type"
                                                       id="user_type_doctor" value="doctor" required>
                                                <label class="btn btn-outline-success w-100 py-3"
                                                       for="user_type_doctor">
                                                    <i class="ph-user-gear ph-2x d-block mb-2 me-1"></i>
                                                    <span class="fw-semibold">แพทย์</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">กรุณาเลือกประเภทผู้ใช้</div>
                                    </div>
                                </div>


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
                                    <label class="col-form-label col-lg-3">อีเมล <span
                                            class="text-danger">*</span></label>
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
                                    <label class="col-form-label col-lg-3">ยืนยันรหัสผ่าน <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" name="confirm" required
                                               placeholder="">
                                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                    </div>
                                </div>


                                <div class="row mb-3" id="doctor_fields" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="card border-success">
                                            <div class="card-header bg-success bg-opacity-10">
                                                <h6 class="mb-0 text-success">ข้อมูลเฉพาะแพทย์</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Medical License No. <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control"
                                                               name="medical_license" id="medical_license"
                                                               placeholder="">
                                                        <div class="invalid-feedback">
                                                            กรุณาระบุเลขใบอนุญาตประกอบวิชาชีพ
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Expertise <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" name="expertise"
                                                               id="expertise" placeholder="">
                                                        <div class="invalid-feedback">กรุณาระบุความเชี่ยวชาญ</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Country</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" name="country"
                                                               placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Province</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" name="province"
                                                               placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Hospital <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" name="hospital"
                                                               id="hospital" placeholder="">
                                                        <div class="invalid-feedback">กรุณาระบุโรงพยาบาล</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label col-lg-4">Hospital Type <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select" name="hospital_type"
                                                                id="hospital_type">
                                                            <option value="">เลือกประเภทโรงพยาบาล</option>
                                                            <option value="government">โรงพยาบาลรัฐ</option>
                                                            <option value="private">โรงพยาบาลเอกชน</option>
                                                            <option value="university">โรงพยาบาลมหาวิทยาลัย</option>
                                                        </select>
                                                        <div class="invalid-feedback">กรุณาเลือกประเภทโรงพยาบาล
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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

                    <!-- /basic card -->
                </div>

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>

@endsection
