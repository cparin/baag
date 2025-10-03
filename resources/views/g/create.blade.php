@extends('app')
@push('scripts')
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.6.0/dist/echarts.min.js"></script>
@endpush
@section('content')
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">


                <div class="row">

{{--                    <div class="col-lg-4 ">--}}
{{--                        <!-- Basic card -->--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="mb-0 text-center">Growth Chart</h3>--}}
{{--                            </div>--}}

{{--                            <div class="card-body">--}}
{{--                                <form class="needs-validation" novalidate method="POST" action="">--}}
{{--                                    @csrf--}}
{{--                                    <div class="card-body">--}}


{{--                                        <div class="row mb-3">--}}
{{--                                            <label class="col-form-label col-lg-3">Date of visit<span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <div class="col-lg-6">--}}
{{--                                                <input type="date" class="form-control" required name="vdate"--}}
{{--                                                       placeholder="">--}}
{{--                                                <div class="invalid-feedback">กรุณาระบุข้อมูล</div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                        <div class="row mb-3">--}}
{{--                                            <label class="col-form-label col-lg-3">Height (cm)<span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <div class="col-lg-6">--}}
{{--                                                <input type="text" class="form-control" required name="height"--}}
{{--                                                       placeholder="">--}}
{{--                                                <div class="invalid-feedback">กรุณาระบุข้อมูล</div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mb-3">--}}
{{--                                            <label class="col-form-label col-lg-3">Weight (kg)<span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <div class="col-lg-6">--}}
{{--                                                <input type="text" class="form-control" required name="weight"--}}
{{--                                                       placeholder="">--}}
{{--                                                <div class="invalid-feedback">กรุณาระบุข้อมูล</div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                    <div class="card-footer text-end">--}}
{{--                                        <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">--}}
{{--                                    </div>--}}
{{--                                </form>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /basic card -->--}}
{{--                    </div>--}}

                    <div class="col-lg-12">
                        <div id="growth-chart" style="width: 657px; height: 930px;"></div>
                        <script>

                            // Data
                            const ageData = ['2', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8', '2.9', '3', '3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '3.9', '4', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8', '4.9', '5', '5.1', '5.2', '5.3', '5.4', '5.5', '5.6', '5.7', '5.8', '5.9', '6', '6.1', '6.2', '6.3', '6.4', '6.5', '6.6', '6.7', '6.8', '6.9', '7', '7.1', '7.2', '7.3', '7.4', '7.5', '7.6', '7.7', '7.8', '7.9', '8', '8.1', '8.2', '8.3', '8.4', '8.5', '8.6', '8.7', '8.8', '8.9', '9', '9.1', '9.2', '9.3', '9.4', '9.5', '9.6', '9.7', '9.8', '9.9', '10', '10.1', '10.2', '10.3', '10.4', '10.5', '10.6', '10.7', '10.8', '10.9', '11', '11.1', '11.2', '11.3', '11.4', '11.5', '11.6', '11.7', '11.8', '11.9', '12', '12.1', '12.2', '12.3', '12.4', '12.5', '12.6', '12.7', '12.8', '12.9', '13', '13.1', '13.2', '13.3', '13.4', '13.5', '13.6', '13.7', '13.8', '13.9', '14', '14.1', '14.2', '14.3', '14.4', '14.5', '14.6', '14.7', '14.8', '14.9', '15', '15.1', '15.2', '15.3', '15.4', '15.5', '15.6', '15.7', '15.8', '15.9', '16', '16.1', '16.2', '16.3', '16.4', '16.5', '16.6', '16.7', '16.8', '16.9', '17', '17.1', '17.2', '17.3', '17.4', '17.5', '17.6', '17.7', '17.8', '17.9', '18', '18.1', '18.2', '18.3', '18.4', '18.5', '18.6', '18.7', '18.8', '18.9', '19']; // Ages in years
                            const heightData = [{{ $heightData }}]; // Heights in cm

                            const hP3 = [{{ $hP3 }}];

                            const hP10 = [{{ $hP10 }}];
                            const hP25 = [{{ $hP25 }}];
                            const hP50 = [{{ $hP50 }}];
                            const hP75 = [{{ $hP75 }}];
                            const hP90 = [{{ $hP90 }}];
                            const hP97 = [{{ $hP97 }}];

                            const weightData = [{{ $weightData }}]; // Weights in kg

                            const p3 = [{{ $p3 }}]; // Weights in kg
                            const p10 = [{{ $p10 }}];
                            const p25 = [{{ $p25 }}];
                            const p50 = [{{ $p50 }}];
                            const p75 = [{{ $p75 }}];
                            const p90 = [{{ $p90 }}];
                            const p97 = [{{ $p97 }}];

                            const xAxisData = ageData.map(item => {
                                const [years, months] = item.split('.').map(Number);

                                return years + (months || 0) / 12;
                            });

                            // document.addEventListener('DOMContentLoaded', function () {

                            var chart = echarts.init(document.getElementById('growth-chart'));

                            // Define chart options
                            var option = {
                                title: {
                                    text: '{{ $gender_txt }} aged 2-19 years: Height and Weight',
                                    left: 'center',
                                    subtext: "Name________________________________________DOB_____________HN____________\n\nFather's height_________cm,Mother's height_________cm,Mid-parental height_________cm",

                                },
                                backgroundColor: '{{ $bg }}',
                                grid: {
                                    left: '50px',   // Padding from the left
                                    // right: '50px',  // Padding from the right
                                    top: '120px',    // Padding from the top
                                    // bottom: '50px', // Padding from the bottom
                                    show: true,
                                    containLabel: true,
                                    backgroundColor: '#fff0f5',
                                },
                                tooltip: {
                                    trigger: 'axis',
                                    triggerOn: 'click',
                                    // formatter: function (params) {
                                    //     var xValue = params[0].axisValue;
                                    //     // Format the x-axis value to 1 decimal place
                                    //     var formattedXValue = parseFloat(xValue).toFixed(1);
                                    //
                                    //     var tooltipContent = formattedXValue + '<br/>';
                                    //     params.forEach(function (param) {
                                    //         tooltipContent += param.seriesName + ': ' + param.value + '<br/>';
                                    //     });
                                    //     return tooltipContent;
                                    // }
                                },
                                // legend: {
                                //     data: ['Height (cm)', 'Weight (kg)']
                                // },
                                xAxis: {

                                    name: 'Age (years)',
                                    type: 'value',

                                    // data: xAxisData,
                                    boundaryGap: false,
                                    axisLabel: {
                                        formatter: val => val.toFixed(0) // Show as year.month format
                                    },

                                    // axisLabel: {
                                    //     formatter: function (value) {
                                    //         // Only display integers
                                    //         return Number.isInteger(value) ? value : '';
                                    //     }
                                    // },
                                    color: '#fddfe7',

                                    min: 2,
                                    max: 19,
                                    interval: 1, // Define intervals for grid cells
                                    splitLine: {
                                        show: true, // Show vertical grid lines
                                        lineStyle: {
                                            color: '#000', // Grid line color
                                            type: 'solid', // Line type: 'solid', 'dashed', or 'dotted'
                                            width: 1
                                        }
                                    },
                                    minorTick: {
                                        show: true, // Show minor ticks
                                        splitNumber: 4 // Number of sub-divisions between major intervals
                                    },
                                    minorSplitLine: {
                                        show: true, // Show sub-grid lines
                                        lineStyle: {
                                            color: '#ddd', // Sub-grid line color
                                            type: 'solid', // Sub-grid line style
                                            width: 0.5
                                        }
                                    },
                                },
                                yAxis: [
                                    {
                                        name: 'Weight (kg) & Height (cm)',
                                        type: 'value',
                                        min: 0,
                                        max: 180,
                                        interval: 5, // Define intervals for horizontal grid cells
                                        // axisLabel: {
                                        //     formatter: function (value) {
                                        //         var height = 25; // Example formula for mapping weight to height
                                        //         return `${value} kg / ${height} cm`;
                                        //     }
                                        // },
                                        splitLine: {
                                            show: true, // Show horizontal grid lines
                                            lineStyle: {
                                                color: '#000', // Grid line color
                                                type: 'solid', // Line type: 'solid', 'dashed', or 'dotted'
                                                width: 1
                                            }
                                        },
                                        minorTick: {
                                            show: true, // Show minor ticks
                                            splitNumber: 5 // Number of sub-divisions between major intervals
                                        },
                                        minorSplitLine: {
                                            show: true, // Show sub-grid lines
                                            lineStyle: {
                                                color: '#ddd', // Sub-grid line color
                                                type: 'solid', // Sub-grid line style
                                                width: 0.5
                                            }
                                        },
                                    },
                                    {
                                        name: 'Weight (kg) & Height (cm)',
                                        type: 'value',
                                        min: 0,
                                        max: 180,
                                        position: 'right',

                                        splitLine: {
                                            show: false
                                        },
                                        interval: 5, // Define intervals for horizontal grid cells
                                        // splitLine: {
                                        //     show: true, // Show horizontal grid lines
                                        //     lineStyle: {
                                        //         color: '#000', // Grid line color
                                        //         type: 'solid', // Line type: 'solid', 'dashed', or 'dotted'
                                        //         width: 1
                                        //     }
                                        // },
                                        // minorTick: {
                                        //     show: true, // Show minor ticks
                                        //     splitNumber: 4 // Number of sub-divisions between major intervals
                                        // },
                                        // minorSplitLine: {
                                        //     show: true, // Show sub-grid lines
                                        //     lineStyle: {
                                        //         color: '#ddd', // Sub-grid line color
                                        //         type: 'solid', // Sub-grid line style
                                        //         width: 0.5
                                        //     }
                                        // },
                                    }
                                ],
                                series: [
                                    {
                                        name: 'Height (cm)',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, heightData[index]]),
                                        smooth: true,
                                        symbolSize: 10,
                                        itemStyle: {
                                            color: '#1e8808' // Custom color for scatter points
                                        }
                                    },
                                    {
                                        name: 'P3',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP3[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P10',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP10[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P25',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP25[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P50',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP50[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P75',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP75[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P90',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP90[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        },
                                        label: {
                                            show: true,
                                            position: 'inside',  // Position the label at the end of the line
                                            formatter: 'P90'  // Format the label (you can show the value here)
                                        }
                                    },
                                    {
                                        name: 'P97',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, hP97[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'Weight (kg)',
                                        type: 'line',
                                        yAxisIndex: 1,
                                        data: ageData.map((age, index) => [age, weightData[index]]),
                                        smooth: true
                                    },
                                    {
                                        name: 'P3',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p3[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P10',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p10[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P25',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p25[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P50',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p50[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P75',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p75[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },
                                    {
                                        name: 'P90',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p90[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 0.5,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        },
                                        label: {
                                            show: true,
                                            position: 'inside',  // Position the label at the end of the line
                                            formatter: 'P90'  // Format the label (you can show the value here)
                                        }
                                    },
                                    {
                                        name: 'P97',
                                        type: 'line',
                                        data: ageData.map((age, index) => [age, p97[index]]),
                                        yAxisIndex: 0,
                                        smooth: true,
                                        symbol: 'none',
                                        tooltip: null,
                                        lineStyle: {
                                            width: 2,  // Change the thickness of the line
                                            color: '#2b2d30'  // Change the color of the line (red in this case)
                                        }
                                    },

                                ],
                                dataZoom: [
                                    {
                                        type: 'inside',  // Slider style zoom control for x-axis
                                        show: true,
                                        xAxisIndex: 0,
                                        start: 0,  // Initial zoom percentage (0% to 100%)
                                        end: 100,   // Initial zoom percentage (0% to 100%)
                                        filterMode: 'filter'
                                    },
                                    {
                                        type: 'inside',  // Slider style zoom control for y-axis
                                        show: true,
                                        yAxisIndex: 0,
                                        start: 0,
                                        end: 100
                                    }
                                ],

                                graphic: {
                                    type: 'image',
                                    id: 'chart-image',
                                    left: '1%',
                                    top: '1%',
                                    style: {
                                        image: '{{ asset('images/tpd-th-logo.png') }}', // Replace with your image URL
                                        width: 302,
                                        height: 100,
                                        opacity: 1
                                    }
                                }
                            };

                            // Render the chart
                            chart.setOption(option);
                            // });

                        </script>
                    </div>
                </div>


            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>

    <script>
        $(document).ready(function () {

        });

    </script>
@endsection
