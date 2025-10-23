@extends('app')
@push('scripts')
    {{--    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>--}}
@endpush
@section('content')
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="text-center">
                            <button onclick="document.location='{{ session()->get('profile')->gender=='female' ? "c/?gender=g":"c/?gender=b" }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-chart-line-up text-primary ph-2x mb-1"></i>
                                ความสูงและน้ำหนัก
                            </button>
                        </div>

                        <div class="text-center">
                            <button onclick="document.location='{{ session()->get('profile')->gender=='female' ? "wfh/?gender=g":"wfh/?gender=b" }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-chart-line-up text-primary ph-2x mb-1"></i>
                                Weight for height
                            </button>
                        </div>

                        <div class="text-center">
                            <button onclick="document.location='{{ session()->get('profile')->gender=='female' ? "bmi/?gender=g":"bmi/?gender=b" }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-chart-line text-primary ph-2x mb-1"></i>
                                BMI
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
