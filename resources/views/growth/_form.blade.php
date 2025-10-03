<form class="needs-validation" novalidate method="POST" action="{{ $action }}">

    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="card-body">

        <div class="row mb-3">
            <label class="col-form-label col-lg-4">วันที่ตรวจ<span
                    class="text-danger">*</span></label>
            <div class="col-lg-6">
                <input type="date" class="form-control" required id="adddate" name="adddate"
                       placeholder="" value="">
                <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

            </div>
        </div>

        @if($aid == 1 || $aid == 3)

            <div id="opt1">
                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">ส่วนสูง<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="height" required
                               placeholder="ซม.">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>
                @if($aid == 1)
                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">น้ำหนัก</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="weight"
                                   placeholder="กก.">
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>
                @endif
            </div>

            <div id="opt3">
                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">อายุกระดูก (ปี.เดือน)</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="boneage"
                               placeholder="ตัวอย่าง 2.3 (2 ปี 3 เดือน)">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">วันที่ฟิล์ม</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="dof" id="dof"
                               placeholder="">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>
            </div>
        @endif

        @if($aid == 2)
            <div id="opt2">

                @if(session()->get('profile')->gender == 'female')
                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">หน้าอกข้างซ้าย <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="imageDropdown" class="form-control " name="breastleft"
                                    style="width: 300px;">
                                <option value="1"
                                        data-image="{{ asset('images/growth/gb1.png') }}">
                                    {{--                                                                แบบที่ 1--}}
                                </option>
                                <option value="2"
                                        data-image="{{ asset('images/growth/gb2.png') }}">
                                    {{--                                                                แบบที่ 2--}}
                                </option>
                                <option value="3"
                                        data-image="{{ asset('images/growth/gb3.png') }}">
                                    {{--                                                                แบบที่ 3--}}
                                </option>
                                <option value="4"
                                        data-image="{{ asset('images/growth/gb4.png') }}">
                                    {{--                                                                แบบที่ 4--}}
                                </option>
                                <option value="5"
                                        data-image="{{ asset('images/growth/gb5.png') }}">
                                    {{--                                                                แบบที่ 5--}}
                                </option>
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">หน้าอกข้างขวา <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="imageDropdown4" class="form-control " name="breastright"
                                    style="width: 300px;">
                                <option value="1"
                                        data-image="{{ asset('images/growth/gb1.png') }}">
                                    {{--                                                                แบบที่ 1--}}
                                </option>
                                <option value="2"
                                        data-image="{{ asset('images/growth/gb2.png') }}">
                                    {{--                                                                แบบที่ 2--}}
                                </option>
                                <option value="3"
                                        data-image="{{ asset('images/growth/gb3.png') }}">
                                    {{--                                                                แบบที่ 3--}}
                                </option>
                                <option value="4"
                                        data-image="{{ asset('images/growth/gb4.png') }}">
                                    {{--                                                                แบบที่ 4--}}
                                </option>
                                <option value="5"
                                        data-image="{{ asset('images/growth/gb5.png') }}">
                                    {{--                                                                แบบที่ 5--}}
                                </option>
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">ขนหัวหน่าว <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="imageDropdown9" class="form-control " name="pubic_hair"
                                    style="width: 300px;">
                                <option value="1"
                                        data-image="{{ asset('images/growth/gg1.png') }}">
                                    แบบที่ 1
                                </option>
                                <option value="2"
                                        data-image="{{ asset('images/growth/gg2.png') }}">
                                    แบบที่ 2
                                </option>
                                <option value="3"
                                        data-image="{{ asset('images/growth/gg3.png') }}">
                                    แบบที่ 3
                                </option>
                                <option value="4"
                                        data-image="{{ asset('images/growth/gg4.png') }}">
                                    แบบที่ 4
                                </option>
                                <option value="5"
                                        data-image="{{ asset('images/growth/gg5.png') }}">
                                    แบบที่ 5
                                </option>
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>

                @else


                @endif


            </div>

        @endif

        @if($aid == 6)

            <div id="opt6">

                @if(session()->get('profile')->gender == 'female')
                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">ขนหัวหน่าว <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="imageDropdown9" class="form-control " name="pubic_hair"
                                    style="width: 300px;">
                                <option value="1"
                                        data-image="{{ asset('images/growth/gg1.png') }}">
                                    แบบที่ 1
                                </option>
                                <option value="2"
                                        data-image="{{ asset('images/growth/gg2.png') }}">
                                    แบบที่ 2
                                </option>
                                <option value="3"
                                        data-image="{{ asset('images/growth/gg3.png') }}">
                                    แบบที่ 3
                                </option>
                                <option value="4"
                                        data-image="{{ asset('images/growth/gg4.png') }}">
                                    แบบที่ 4
                                </option>
                                <option value="5"
                                        data-image="{{ asset('images/growth/gg5.png') }}">
                                    แบบที่ 5
                                </option>
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>

                @else
                    <div class="row mb-3 ">
                        <label class="col-form-label col-lg-4">ขนหัวหน่าว <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="imageDropdown9" class="form-control " name="pubic_hair"
                                    style="width: 300px;">
                                <option value="1"
                                        data-image="{{ asset('images/growth/bg1.png') }}">
                                    แบบที่ 1
                                </option>
                                <option value="2"
                                        data-image="{{ asset('images/growth/bg2.png') }}">
                                    แบบที่ 2
                                </option>
                                <option value="3"
                                        data-image="{{ asset('images/growth/bg3.png') }}">
                                    แบบที่ 3
                                </option>
                                <option value="4"
                                        data-image="{{ asset('images/growth/bg4.png') }}">
                                    แบบที่ 4
                                </option>
                                <option value="5"
                                        data-image="{{ asset('images/growth/bg5.png') }}">
                                    แบบที่ 5
                                </option>
                            </select>

                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>

                    </div>

                @endif

            </div>

        @endif

        @if($aid == 9)

            <div class="row mb-3 ">
                <label class="col-form-label col-lg-4">องคชาติ <span
                        class="text-danger">*</span></label>
                <div class="col-lg-4">
                    <select id="imageDropdown9" class="form-control " name="genital"
                            style="width: 300px;">
                        <option value="1"
                                data-image="{{ asset('images/growth/bg1.png') }}">
                            แบบที่ 1
                        </option>
                        <option value="2"
                                data-image="{{ asset('images/growth/bg2.png') }}">
                            แบบที่ 2
                        </option>
                        <option value="3"
                                data-image="{{ asset('images/growth/bg3.png') }}">
                            แบบที่ 3
                        </option>
                        <option value="4"
                                data-image="{{ asset('images/growth/bg4.png') }}">
                            แบบที่ 4
                        </option>
                        <option value="5"
                                data-image="{{ asset('images/growth/bg5.png') }}">
                            แบบที่ 5
                        </option>
                    </select>

                    <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                </div>

                <div id="opt7">
                    <div class="row mb-3 mt-3">
                        <label class="col-form-label col-lg-4">ขนาดไข่อัณฑะข้างซ้าย (มม.)</label>
                        <div class="col-lg-6">
                            {{--                                    <input type="text" class="form-control" name="ballleft"--}}
                            {{--                                           placeholder="">--}}
                            <select class="form-select" required="" name="ballleft">
                                <option selected disabled value="">กรุณาเลือก...</option>
                                @foreach(range(1, 25) as $number)
                                    <option value="{{ $number }}">{{ $number }} มม.</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-4">ขนาดไข่อัณฑะข้างขวา (มม.)</label>
                        <div class="col-lg-6">
                            {{--                                    <input type="text" class="form-control" name="ballright"--}}
                            {{--                                           placeholder="">--}}

                            <select class="form-select" required="" name="ballright">
                                <option selected disabled value="">กรุณาเลือก...</option>
                                @foreach(range(1, 25) as $number)
                                    <option value="{{ $number }}">{{ $number }} มม.</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3 ">
                <label class="col-form-label col-lg-4">ขนหัวหน่าว <span
                        class="text-danger">*</span></label>
                <div class="col-lg-4">
                    <select id="imageDropdown5" class="form-control " name="pubic_hair"
                            style="width: 300px;">
                        <option value="1"
                                data-image="{{ asset('images/growth/bg1.png') }}">
                            แบบที่ 1
                        </option>
                        <option value="2"
                                data-image="{{ asset('images/growth/bg2.png') }}">
                            แบบที่ 2
                        </option>
                        <option value="3"
                                data-image="{{ asset('images/growth/bg3.png') }}">
                            แบบที่ 3
                        </option>
                        <option value="4"
                                data-image="{{ asset('images/growth/bg4.png') }}">
                            แบบที่ 4
                        </option>
                        <option value="5"
                                data-image="{{ asset('images/growth/bg5.png') }}">
                            แบบที่ 5
                        </option>
                    </select>

                    <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                </div>

            </div>

        @endif


        @if($aid == 3 )
            <div id="opt3">
                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">อายุกระดูก (ปี.เดือน)</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="boneage"
                               placeholder="ตัวอย่าง 2.3 (2 ปี 3 เดือน)">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">วันที่ฟิล์ม</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="dof" id="dof"
                               placeholder="">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>
            </div>
        @endif

        @if($aid == 7)
            <div id="opt7">
                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">ขนาดไข่อัณฑะข้างซ้าย (มม.)</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="ballleft"
                               placeholder="">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">ขนาดไข่อัณฑะข้างขวา (มม.)</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="ballright"
                               placeholder="">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>
            </div>

        @endif

        @if($aid == 8)

            <div id="opt8">
                <div class="row mb-3">
                    <label class="col-form-label col-lg-4">ประจำเดือนครั้งแรก</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" required name="menarche"
                               placeholder="">
                        <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

                    </div>
                </div>
            </div>
        @endif

        <div class="row mb-3">
            <label class="col-form-label col-lg-4">บันทึกเพิ่มเติม</label>
            <div class="col-lg-8">
                <textarea class="form-control" name="note"></textarea>
                <div class="invalid-feedback">กรุณาระบุข้อมูล</div>

            </div>
        </div>

    </div>

    <div class="card-footer text-end">
        <input type="hidden" name="aid" value="{{ $aid }}">
        <input type="hidden" name="profile_id" value="{{ session()->get('pid') }}">
        <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
    </div>
</form>


<script>
    $(document).ready(function () {
        function formatOption(state) {
            if (!state.id) {
                return state.text;
            }
            var baseUrl = $(state.element).data('image');
            var $state = $(
                '<span><img src="' + baseUrl + '" class=" img-preview" /> ' + state.text + '</span>'
            );
            return $state;
        };

        $('#imageDropdown').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
            // dropdownCssClass: "custom-select2-dropdown"
        });

        $('#imageDropdown9').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
            // dropdownCssClass: "custom-select2-dropdown"
        });

        $('#imageDropdown4').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
            // dropdownCssClass: "custom-select2-dropdown"
        });

        $('#imageDropdown5').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
            // dropdownCssClass: "custom-select2-dropdown"
        });

    });
</script>

<script>

    document.getElementById('adddate').valueAsDate = new Date();

</script>
