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

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ session()->get('success') }}</strong>
                            </div>
                        @endif

                        <img src="{{ asset('images/baag-topbar.png' ) }}" width="100%" class="img-fluid">

                        @if(!session()->has('auth'))
                            <div class="text-center">
                                <button type="button "
                                        onclick="document.location='{{ route('user.create') }}'"
                                        class="mt-3 btn btn-primary btn-labeled btn-labeled-start">
                                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                                            <i class="ph-user-plus"></i>
                                        </span>
                                    ลงทะเบียน
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
