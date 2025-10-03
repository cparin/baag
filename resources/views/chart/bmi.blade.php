<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <script src="https://cdn.jsdelivr.net/npm/echarts@5.6.0/dist/echarts.min.js"></script>

</head>

<body>

<div id="growth-chart" style="width: 964px; height: 1364px;"></div>
<script>


    function convertYearDecimal(num) {
        const year = Math.floor(num);
        // แปลงเศษทศนิยมเป็นสตริง แล้วเอาชุดหลังจุดมาแปลงเป็นเลขจำนวนเต็ม
        const month = parseInt(num.toString().split('.')[1] || '0', 10);
        return `${year} ปี ${month} เดือน`;
    }

    // Data

    var ageData = [];
    // for (let year = 90; year <= 170; year++) {
    //     let maxMonth = (year < 19) ? 11 : 0; // up to .11 except for last year
    //     for (let month = 0; month <= maxMonth; month++) {
    //         ageData.push(`${year}.${month}`);
    //     }
    // }

    // console.log(ageData);

    {{--const heightData = [{{ $heightData }}]; // Heights in cm--}}

    // const heightData = [
    //     {value: ['2.11', 85]},
    //     {value: ['3.8', 92]},
    //     {value: ['4.1', 98]},
    //     {value: ['5.2', 108]},
    // ];
    {{--const heightData = @json($weightData);--}}
    const heightData = @json($heightData);
    {{--const heightData = @json($heightData);--}}
    const weightData = @json($weightData);
    const boneageData = @json($boneageData);
    const tannerData = @json($tannerData);
    // console.log(weightData);

    const parentData = [{
        value: ['19.0', {{ $mph }}]
    }];

    // console.log(heightData);

    const heightX = [{{ $heightX }}];


    // console.log(heightX);

    {{--const weightData = [{{ $weightData }}]; // Weights in kg--}}

    const p3Data = {!! $p3Data !!}; // Weights in kg
    const p10 = [{{ $p10 }}];
    const p25 = [{{ $p25 }}];
    const p50 = [{{ $p50 }}];
    const p75 = [{{ $p75 }}];
    const p90 = [{{ $p90 }}];
    const p97 = [{{ $p97 }}];

    const ages = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
    const bmi_m3 = [11.6, 11.58, 11.55, 11.54, 11.53, 11.56, 11.82, 12.3, 12.84, 13.4, 13.74, 14.1, 14.2, 14.18, 14.18];
    const bmi_m2 = [12.6, 12.8, 13.1, 13.4, 13.9, 14.3, 14.8, 15.3, 15.8, 16.3, 16.6, 16.9, 17.0, 17.1, 17.2];
    const bmi_m15 = [12.9, 13.1, 13.4, 13.8, 14.2, 14.7, 15.2, 15.7, 16.3, 16.8, 17.2, 17.5, 17.7, 17.9, 18.0];
    const bmi_m1 = [13.2, 13.5, 13.8, 14.2, 14.7, 15.3, 15.8, 16.4, 17.0, 17.6, 18.1, 18.5, 18.7, 18.9, 19.0];
    const bmi_0 = [13.9, 14.3, 14.8, 15.3, 15.9, 16.7, 17.6, 18.5, 19.5, 20.4, 21.0, 21.6, 21.9, 22.1, 22.3];
    const bmi_p1 = [15.1, 15.7, 16.3, 17.0, 17.8, 18.7, 19.7, 20.7, 21.8, 22.7, 23.4, 24.0, 24.3, 24.5, 24.7];
    const bmi_p15 = [15.7, 16.4, 17.0, 17.8, 18.6, 19.6, 20.7, 21.9, 23.2, 24.1, 24.9, 25.5, 25.8, 26.0, 26.2];
    const bmi_p2 = [16.4, 17.1, 17.8, 18.6, 19.5, 20.6, 21.9, 23.3, 24.7, 25.7, 26.4, 27.0, 27.4, 27.6, 27.8];
    const bmi_p3 = [18.0, 18.8, 19.7, 20.7, 21.8, 23.0, 24.5, 26.0, 27.5, 28.7, 29.6, 30.5, 31.0, 31.3, 31.6];


    // const xAxisData = heightX.map(item => {
    //     const [years, months] = item.split('.').map(Number);
    //
    //     return years + (months || 0) / 12;
    // });


    // const bandStart = ageData.indexOf('8.0');
    // const bandEnd = ageData.indexOf('13.0');
    // var tannerBand = ageData.map((_, i) => (i >= bandStart && i <= bandEnd) ? 1 : 0);

    // document.addEventListener('DOMContentLoaded', function () {

    var chart = echarts.init(document.getElementById('growth-chart'));

    // Define chart options
    var option = {
        title: {
            text: '\n{{ $gender_txt }} aged 5-19 years: BMI Z-score(SDS)',
            left: 'center',
            subtext: "Name____ {{ $profile->name }}  _____DOB_____{{ dateThai($profile->birthdate) }}_____HN____________\n\n",

        },
        backgroundColor: '{{ $bg }}',
        grid: {
            left: '80px',   // Padding from the left
            // right: '50px',  // Padding from the right
            top: '120px',    // Padding from the top
            // bottom: '50px', // Padding from the bottom
            show: true,
            containLabel: true,
            backgroundColor: '#fff0f5',
        },
        tooltip: {
            trigger: 'item',
            triggerOn: 'click',
            // formatter: function (params) {
            //
            //     if (params.seriesIndex === 1) return params.seriesName + ' <br/>อายุ: ' + convertYearDecimal(params.value[0]) + '<br/>น้ำหนัก: ' + params.value[1] + ' กก.';
            //
            //     if (params.seriesIndex === 2) return params.seriesName + ' <br/>อายุจริง: ' + convertYearDecimal(params.value[2])  + ' <br/>อายุกระดูก: ' + convertYearDecimal(params.value[0]) +'<br/>ความสูง: ' + params.value[1] + ' ซม.';
            //
            //     if (params.seriesIndex === 3) return params.seriesName + ' <br/>อายุ: ' + convertYearDecimal(params.value[0]) + '<br/>Tanner Stage: ' + params.value[2];
            //
            //     return params.seriesName + ' <br/>อายุ: ' + convertYearDecimal(params.value[0]) + '<br/>ความสูง: ' + params.value[1] + ' ซม.';
            //
            // }
        },
        // legend: {
        //     data: ['Height (cm)', 'Weight (kg)']
        // },
        xAxis: {

            {{--name: 'Height (cm)',--}}
                {{--type: 'value',--}}

                {{--data: heightX,--}}
                {{--boundaryGap: false,--}}

                {{--min: 90,--}}
                {{--max: {{ session()->get('profile')->gender == 'female' ? 170:180 }},--}}

            type: 'category',
            name: 'Age (years)',
            data: ages,
            min: 0,
            axisLabel: {
                formatter: '{value}'
            },
            axisTick: { alignWithLabel: true },
            axisLine: {onZero: false},
            boundaryGap: false,
            // axisLabel: {
            //     formatter: val => val.toFixed(0) // Show as year.month format
            // },

            color: '#fddfe7',

            // min: 2,
            // max: 19,
            // interval: 1,
            //
            splitLine: {
                show: true, // Show vertical grid lines
                lineStyle: {
                    color: '#000', // Grid line color
                    type: 'solid', // Line type: 'solid', 'dashed', or 'dotted'
                    width: 1
                }
            },
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
        },
        yAxis: [
            {
                name: 'BMI (kg/m²)',
                type: 'value',
                min: 10,
                max: {{ session()->get('profile')->gender == 'female' ? 40:40 }},
                interval: 1, // Define intervals for horizontal grid cells
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
                name: 'Weight (kg)',
                type: 'value',
                min: 10,
                max: {{ session()->get('profile')->gender == 'female' ? 40:40 }},
                position: 'right',

                splitLine: {
                    show: false
                },
                interval: 1, // Define intervals for horizontal grid cells
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
                name: 'BMI',
                type: 'scatter',
                // data: ageData.map((age, index) => [age, heightData[index]]),
                data: [
                    [3,13],
                    [4,14.5]
                ],
                yAxisIndex: 0,
                smooth: true,
                symbolSize: 13,
                itemStyle: {
                    color: '#b60c0c' // Custom color for scatter points
                },


            },

            {
                name: 'Z = -3',
                symbol: 'none',
                type: 'line', smooth: true, data: bmi_m3,
                lineStyle: {
                    width: 0.5,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },
            },
            {
                name: 'Z = -2',
                symbol: 'none',
                type: 'line', data: bmi_m2, color: '#0e0c0c'
            },
            {
                name: 'Z = -1.5',
                symbol: 'none',
                type: 'line', data: bmi_m15,
                lineStyle: {
                    width: 0.5,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },
            },
            {
                name: 'Z = -1',
                symbol: 'none', type: 'line', data: bmi_m1,
                lineStyle: {
                    width: 0.5,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },
            },
            {
                name: 'Z = 0', symbol: 'none',
                type: 'line', data: bmi_0, color: '#0e0c0c'
            },
            {
                name: 'Z = +1',
                symbol: 'none', type: 'line', data: bmi_p1, color: '#0e0c0c'
            },
            {
                name: 'Z = +1.5',
                symbol: 'none',
                type: 'line', data: bmi_p15,
                lineStyle: {
                    width: 0.5,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },
            },
            {
                name: 'Z = +2',
                symbol: 'none',
                type: 'line', data: bmi_p2, color: '#0e0c0c'
            },
            {
                name: 'Z = +3', symbol: 'none',
                type: 'line', data: bmi_p3,
                lineStyle: {
                    width: 0.5,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },
            },

            {{--{--}}
            {{--    name: 'P3',--}}
            {{--    type: 'line',--}}
            {{--    data: {!! $p3Data !!},--}}
            {{--    // data: ageData.map((age, index) => [age, p3[index]]),--}}

            {{--    // yAxisIndex: 0,--}}
            {{--    smooth: true,--}}
            {{--    symbol: 'none',--}}
            {{--    // symbolSize: 10,--}}
            {{--    tooltip: null,--}}
            {{--    lineStyle: {--}}
            {{--        width: 2,  // Change the thickness of the line--}}
            {{--        color: '#2b2d30'  // Change the color of the line (red in this case)--}}
            {{--    },--}}

            {{--    label: {--}}
            {{--        show: true,--}}
            {{--        position: 'top', // shows label above the point (or use 'right' if you prefer)--}}
            {{--        formatter: function(params) {--}}
            {{--            if (params.dataIndex === p3Data.length - 1) {--}}
            {{--                return 'P3';--}}
            {{--            }--}}
            {{--            return '';--}}
            {{--        }--}}
            {{--    },--}}
            {{--    emphasis: {--}}
            {{--        label: { show: false } // Optional: hides label on hover for other points--}}
            {{--    },--}}


            {{--},--}}


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

            elements: [
                {
                    type: 'image',
                    id: 'chart-image',
                    left: '4%',
                    top: '0.1%',
                    style: {
                        image: '{{ asset('images/thaipedendo_logo_eng.png') }}', // Replace with your image URL
                        width: 90,
                        height: 90,
                        opacity: 1
                    }
                },

                {
                    type: 'text',
                    left: 108, // Adjust based on your axis/px
                    top: 1300,  // Adjust based on your axis/px
                    style: {
                        text: 'References : WHO Growth Standard for children aged 2-5 years, 2006                                   Designed by Thai Society for Pediatric Endocrinology, 2022\n' +
                            '                     National Growth References for children aged 5-19 years, 2020, Bureau of Nutrition, Department of Health, Ministry of Public Health',
                        font: '11px Arial',
                        fill: '#3d3e40'
                    }
                },

                // {
                //     type: 'text',
                //     left: 410, // Adjust based on your axis/px
                //     top: 1175,  // Adjust based on your axis/px
                //     style: {
                //         text: 'P3',
                //         font: '14px Arial',
                //         fill: '#333'
                //     }
                // },

                // {
                //     type: 'text',
                //     left: 492, // Adjust based on your axis/px
                //     top: 1175,  // Adjust based on your axis/px
                //     style: {
                //         text: 'P50',
                //         font: '14px Arial',
                //         fill: '#333'
                //     }
                // },

                // {
                //     type: 'text',
                //     left: 600, // Adjust based on your axis/px
                //     top: 1175,  // Adjust based on your axis/px
                //     style: {
                //         text: 'P97',
                //         font: '14px Arial',
                //         fill: '#333'
                //     }
                // },

                // {
                //     type: 'text',
                //     left: 675, // Adjust based on your axis/px
                //     top: 1165,  // Adjust based on your axis/px
                //     style: {
                //         text: 'Menarche',
                //         font: '14px Arial',
                //         fill: '#333'
                //     }
                // },

                // {
                //     type: 'text',
                //     left: 580, // Adjust based on your axis/px
                //     top: 1192,  // Adjust based on your axis/px
                //     style: {
                //         text: 'Breast Tanner stage II',
                //         font: '14px Arial',
                //         fill: '#333'
                //     }
                // },
            ]
        }
    };

    // Render the chart
    chart.setOption(option);
    // });

</script>


</body>


</html>
