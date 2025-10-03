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
                            <button onclick="document.location='{{ route('growth.add',1) }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-ruler text-primary ph-2x mb-1"></i>
                                การเจริญเติบโต
                            </button>
                        </div>

                        <div class="text-center">
                            <button data-bs-toggle="modal" data-bs-target="#modal_default"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-arrow-bend-right-up text-primary ph-2x mb-1"></i>
                                การเจริญเติบโตทางเพศ
                            </button>
                        </div>

                        {{--                        <div class="text-center">--}}
                        {{--                            <button onclick="document.location='{{ route('growth.add',1) }}'"--}}
                        {{--                                    type="button"--}}
                        {{--                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                        {{--                                <i class="ph-ruler text-primary ph-2x mb-1"></i>--}}
                        {{--                                น้ำหนัก ส่วนสูง--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="text-center">--}}
                        {{--                            <button onclick="document.location='{{ route('growth.add' , 3) }}'"--}}
                        {{--                                    type="button"--}}
                        {{--                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                        {{--                                <i class="ph-chart-line text-primary ph-2x mb-1"></i>--}}
                        {{--                                อายุกระดูก--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        @if(session()->get('profile')->gender == 'female')

                            <div class="text-center">
                                <button onclick="document.location='{{ route('growth.add' , 8) }}'"
                                        type="button"
                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                    <i class="ph-list text-primary ph-2x mb-1"></i>
                                    ประจำเดือนครั้งแรก
                                </button>
                            </div>

                            {{--                            <div class="text-center">--}}
                            {{--                                <button onclick="document.location='{{ route('growth.add' , 2) }}'"--}}
                            {{--                                        type="button"--}}
                            {{--                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                            {{--                                    <i class="ph-scales text-primary ph-2x mb-1"></i>--}}
                            {{--                                    ขนาดหน้าอก--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="text-center">--}}
                            {{--                                <button onclick="document.location='{{ route('growth.add' , 6) }}'"--}}
                            {{--                                        type="button"--}}
                            {{--                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                            {{--                                    <i class="ph-waves text-primary ph-2x mb-1"></i>--}}
                            {{--                                    ขนหัวหน่าว--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                        @else
                            <div class="text-center">
                                {{--                                <button data-bs-toggle="modal" data-bs-target="#modal_default"--}}
                                {{--                                        type="button"--}}
                                {{--                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                                {{--                                    <i class="ph-rocket text-primary ph-2x mb-1"></i>--}}
                                {{--                                    การเจริญเติบโตทางเพศ--}}
                                {{--                                </button>--}}

                                {{--                                <button onclick="document.location='{{ route('growth.add' , 6) }}'"--}}
                                {{--                                        type="button"--}}
                                {{--                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                                {{--                                    <i class="ph-rocket text-primary ph-2x mb-1"></i>--}}
                                {{--                                    การเจริญเติบโตทางเพศ--}}
                                {{--                                </button>--}}
                            </div>

                            {{--                            <div class="text-center">--}}
                            {{--                                <button onclick="document.location='{{ route('growth.add' , 7) }}'"--}}
                            {{--                                        type="button"--}}
                            {{--                                        class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">--}}
                            {{--                                    <i class="ph-egg text-primary ph-2x mb-1"></i>--}}
                            {{--                                    ขนาดไข่อัณฑะ--}}
                            {{--                                </button>--}}
                            {{--                            </div>--}}
                        @endif


                    </div>
                </div>

            </div>

        </div>

    </div>

    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">การเจริญเติบโตทางเพศ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    @if(session()->get('profile')->gender == 'female')
                        <div class="text-center">
                            <button onclick="document.location='{{ route('growth.add' , 2) }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-scales text-primary ph-2x mb-1"></i>
                                ขนาดหน้าอก
                            </button>
                        </div>

                        <div class="text-center">
                            <button onclick="document.location='{{ route('growth.add' , 6) }}'"
                                    type="button"
                                    class="btn btn-white w-75 flex-column rounded-0 rounded-top-start py-2 m-2">
                                <i class="ph-waves text-primary ph-2x mb-1"></i>
                                ขนหัวหน่าว
                            </button>
                        </div>
                    @else

                        <button onclick="document.location='{{ route('growth.add' , 9) }}'"
                                type="button"
                                class="btn btn-white w-100 flex-column rounded-0 rounded-top-start py-2 m-0">
                            <i class="ph-rocket text-primary ph-2x mb-1"></i>
                            องคชาติ
                        </button>

                        <button onclick="document.location='{{ route('growth.add' , 6) }}'"
                                type="button"
                                class="btn btn-white w-100 flex-column rounded-0 rounded-top-start py-2 m-0">
                            <i class="ph-waves text-primary ph-2x mb-1"></i>
                            ขนหัวหน่าว
                        </button>
                    @endif


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">ปิด</button>
                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
