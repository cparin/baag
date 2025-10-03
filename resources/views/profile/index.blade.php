@extends('app')
@push('scripts')
    {{--    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>--}}
@endpush
@section('content')
    <div class="page-content pt-0">


        <div class="content-wrapper">


            <div class="content">
                {{--                @if(!session()->has('auth'))--}}

                <h2 class="text-center">ยินดีต้อนรับ</h2>
                {{--                <p class="text-center">กรุณาเพิ่ม บุตร/หลาน ของท่านก่อนใช้งาน</p>--}}


                @foreach($profiles as $profile)

                    @if($profile->gender == 'female')
                        <div class="card card-body text-center">
                            <div class="mb-3">
                                <h6 class="mb-0 mt-1">{{ $profile->name }}</h6>

                            </div>

                            <a href="selectprofile/{{ $profile->id }}" class="d-inline-block mb-3">
                                <img src="{{ asset('images/avatar/g-avatar.png') }}" class="rounded-pill" width="150"
                                     height="150" alt="">
                            </a>

                        </div>
                    @endif

                    @if($profile->gender == 'male')
                        <div class="card card-body text-center">
                            <div class="mb-3">
                                <h6 class="mb-0 mt-1">{{ $profile->name }}</h6>

                            </div>

                            <a href="selectprofile/{{ $profile->id }}" class="d-inline-block mb-3">
                                <img src="{{ asset('images/avatar/b-avatar.png') }}" class="rounded-pill" width="150"
                                     height="150" alt="">
                            </a>

                        </div>
                    @endif
                @endforeach


                <div class="text-center">
                    <button type="button "
                            onclick="document.location='{{ route('profile.create') }}'"
                            class="mt-3 btn btn-primary btn-labeled btn-labeled-start">
                                        <span class="btn-labeled-icon bg-black bg-opacity-20">
                                            <i class="ph-user-plus"></i>
                                        </span>
                        เพิ่ม บุตร/หลาน ใหม่
                    </button>
                </div>
                {{--                @endif--}}
            </div>

        </div>

    </div>

@endsection
