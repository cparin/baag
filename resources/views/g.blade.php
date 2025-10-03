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
                            <form class="needs-validation" novalidate method="POST" action="">
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
                                        <label class="col-form-label col-lg-3">ชื่อ - นามสกุล<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" required name="fname"
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

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">เลขที่ใบประกอบวิชาชีพเวชกรรม<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" required name="medical_license"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ชื่อโรงพยาบาล<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" required name="hospital_name"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ประเภทสถานพยาบาล <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-select" required="" name="hospital_id">
                                                <option selected disabled value="">กรุณาเลือก...</option>
                                                <option value="1">Private hospital</option>
                                                <option value="2">University hospital</option>
                                                <option value="3">Public Hospital</option>
                                                <option value="4">Clinical</option>
                                                <option value="99">Other please specify</option>
                                            </select>

                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ความเชี่ยวชาญ <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-select" required="" name="s_id">
                                                <option selected disabled value="">กรุณาเลือก...</option>
                                                <option value="1">General practitioner (GP)</option>
                                                <option value="2">Pediatrician</option>
                                                <option value="3">Endocrinologist</option>
                                                <option value="4">Radiologist</option>
                                                <option value="5">Pediatric radiologist</option>
                                                <option value="6">Other please specify</option>
                                            </select>

                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">ประเทศ </label>
                                        <div class="col-lg-6">
                                            <select class="form-select" required="" name="c_id">
                                                <option selected disabled value="">กรุณาเลือก...</option>
                                                <option value="66">ไทย</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-3">จังหวัด </label>
                                        <div class="col-lg-6">
                                            <select class="form-select" required="" name="c_id">
                                                <option selected disabled value="">กรุณาเลือก...</option>
                                                <option value="43">ขอนแก่น</option>

                                            </select>

                                        </div>
                                    </div>

                                    {{--                                    <div class="row mb-3">--}}
                                    {{--                                        <label class="col-form-label col-lg-3">ประเภทผู้ขอใช้บริการ <span--}}
                                    {{--                                                class="text-danger">*</span></label>--}}
                                    {{--                                        <div class="col-lg-8">--}}
                                    {{--                                            <select id="UserType" name="type_id" class="form-select" required="">--}}
                                    {{--                                                <option selected disabled value="">กรุณาเลือก...</option>--}}
                                    {{--                                                <option value="1">บุคลากร คณะวิทยาศาสตร์</option>--}}
                                    {{--                                                <option value="2">บุคลากร/นักศึกษา ภายในมหาวิทยาลัยขอนแก่น</option>--}}
                                    {{--                                                <option value="7">นักเรียน วมว.มข.</option>--}}
                                    {{--                                                <option value="4">นักศึกษาปริญญาตรี คณะวิทยาศาสตร์</option>--}}
                                    {{--                                                <option value="5">นักศึกษาปริญญาโท คณะวิทยาศาสตร์</option>--}}
                                    {{--                                                <option value="6">นักศึกษาปริญญาเอก คณะวิทยาศาสตร์</option>--}}
                                    {{--                                                <option value="3">บุคคลทั่วไป</option>--}}
                                    {{--                                            </select>--}}

                                    {{--                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="row mb-3">--}}
                                    {{--                                        <label class="col-form-label col-lg-3"> </label>--}}
                                    {{--                                        <div class="col-lg-8">--}}
                                    {{--                                            <select id="institus_id" name="institus_id" class="form-select" >--}}
                                    {{--                                                <option selected disabled value="">กรุณาเลือก...</option>--}}

                                    {{--                                            </select>--}}

                                    {{--                                            <div class="valid-feedback">กรุณาระบุข้อมูล</div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div id="other_general" class="row mb-3">--}}
                                    {{--                                        <label class="col-form-label col-lg-3">หน่วยงาน </label>--}}
                                    {{--                                        <div class="col-lg-9">--}}
                                    {{--                                            <input id="otherdetail" name="otherdetail" type="text" class="form-control"--}}

                                    {{--                                                   placeholder="">--}}
                                    {{--                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>--}}

                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div id="other_scius" class="row mb-3">--}}
                                    {{--                                        <label class="col-form-label col-lg-3">อาจารย์ที่ปรึกษา </label>--}}
                                    {{--                                        <div class="col-lg-9">--}}
                                    {{--                                            <input id="otherdetail" name="otherdetail" type="text" class="form-control"--}}

                                    {{--                                                   placeholder="">--}}
                                    {{--                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>--}}

                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}


                                </div>

                                <div class="row mb-3">


                                    <label class="col-form-label col-lg-3"> <span
                                            class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input type="checkbox" name="remember" class="form-check-input">
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

    <script>
        $(document).ready(function () {
            $('#institus_id').hide();
            $('#other_general').hide();
            $('#other_scius').hide();
            // Fetch data for the parent select
            // $.ajax({
            //     url: '/sic/api/getInstitus',
            //     method: 'GET',
            //     success: function(data) {
            //         // Populate parent select
            //         populateSelect('#UserType', data);
            //     },
            //     error: function(error) {
            //         console.error('Error fetching data:', error);
            //     }
            // });

            // Handle change event for the parent select
            $('#UserType').change(function () {
                var usertype = $(this).val();


                if (usertype == 7) {
                    $('#institus_id').hide();
                    $('#other_general').hide();
                    $('#other_scius').show();
                } else if (usertype == 3) {
                    $('#institus_id').hide();
                    $('#other_general').show();
                    $('#other_scius').hide();
                } else {
                    $('#institus_id').show();
                    $('#other_general').hide();
                    $('#other_scius').hide();
                }

                // Fetch data for the child select based on the selected parent
                $.ajax({
                    url: '/api/getInstitus?UserType=' + usertype,
                    method: 'GET',
                    success: function (data) {
                        // Populate child select
                        populateSelect('#institus_id', data);
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });

            // Function to populate a select element with options
            function populateSelect(selectId, data) {
                var select = $(selectId);
                select.empty();
                select.append('<option disabled value="">กรุณาเลือก ...</option>');

                console.log(data);

                $.each(data, function (index, item) {
                    select.append('<option value="' + item.institus_id + '">' + item.institus + '</option>');
                });
            }
        });
    </script>
@endsection
