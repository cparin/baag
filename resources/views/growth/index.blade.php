@extends('app')
@push('scripts')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    {{--    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>--}}
@endpush
@section('content')
    <div class="page-content pt-0">


        <div class="content-wrapper">


            <div class="content">


                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 text-center">ข้อมูลการเติบโต</h3>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive-md">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>ความสูง</th>
                                    <th>น้ำหนัก</th>

{{--                                    <th>อายุกระดูก</th>--}}
                                    @if(session()->get('profile')->gender == 'female')
                                        <th>หน้าอกข้างซ้าย</th>
                                        <th>หน้าอกข้างขวา</th>
                                        <th>ขนหัวหน่าว</th>
                                        <th>ประจำเดือนครั้งแรก</th>
                                    @else
                                        <th>ขนาดองคชาต</th>
                                        <th>ขนาดไข่อัณฑะข้างซ้าย</th>
                                        <th>ขนาดไข่อัณฑะข้างขวา</th>
                                    @endif
                                    <th>บันทึกเพิ่มเติม</th>

                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($growths as $growth)
                                    <tr>
                                        <td>{{ dateThai($growth->adddate) }}</td>
                                        <td>{{ $growth->height }}</td>
                                        <td>{{ $growth->weight }}</td>
{{--                                        <td>{{ $growth->boneage }}</td>--}}
                                        @if(session()->get('profile')->gender == 'female')
                                            <td>{{ $growth->breastleft }}</td>
                                            <td>{{ $growth->breastright }}</td>
                                            <td>{{ $growth->pubic_hair }}</td>
                                            <td>{{ $growth->menarche }}</td>
                                        @else
                                            <td>{{ $growth->genital }}</td>
                                            <td>{{ $growth->ballleft }}</td>
                                            <td>{{ $growth->ballright }}</td>
                                            <td>{{ $growth->ballright }}</td>
                                        @endif
                                        <td>{{ $growth->note }}</td>

                                        <td class="text-center">

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
