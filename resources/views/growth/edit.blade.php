@extends('app')
@push('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    <style>
        /* Custom style for the images within the Select2 dropdown */
        .select2-results__option img {
            width: 150px;
            height: 50px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 80px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            /* top:1px; */
            right: 1px;
            width: 20px
        }
    </style>
@endpush
@section('content')
    <div class="page-content pt-0">

        <div class="content-wrapper">

            <div class="content">

                <div class="col-lg-6 offset-lg-3">
                    <!-- Basic card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">แก้ไขข้อมูล</h3>
                        </div>

                        <div class="card-body">



                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
