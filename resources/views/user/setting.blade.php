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
                            <h3 class="mb-0 text-center">กำหนดค่า</h3>
                        </div>

                        <div class="card-body">
                            <form class="needs-validation" novalidate method="POST" action="">
                                @csrf
                                <div class="card-body">


                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-4">วันเกิด (Date of birth)<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" required name="dob"
                                                   placeholder="">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-4">ส่วนสูงพ่อ (Father's height)<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" required name="fh"
                                                   placeholder="cm">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-form-label col-lg-4">ส่วนสูงแม่ (Mother's height)<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" required name="mh"
                                                   placeholder="cm">
                                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                                        </div>
                                    </div>


                                </div>



                                <div class="card-footer text-end">
                                    <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
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
