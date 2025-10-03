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
                            <button onclick="document.location='{{ route('menu.add') }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-plus-circle text-primary ph-2x mb-1"></i>
                                เพิ่มข้อมูล
                            </button>
                        </div>

                        <div class="text-center">
                            <button onclick="document.location='{{ route('g.menu') }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-chart-line text-primary ph-2x mb-1"></i>
                                Growth Chart
                            </button>
                        </div>

                        <div class="text-center">
                            <button onclick="document.location='{{ route('growth.index') }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-list text-primary ph-2x mb-1"></i>
                                ข้อมูลย้อนหลัง
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
