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
            text: '{{ $gender_txt }} aged 2-19 years: Weight for Height',
            left: 'center',
            subtext: "Name____ {{ $profile->name }}  _____DOB_____{{ dateThai($profile->birthdate) }}_____HN____________\n\nFather's height____{{ $profile->father_height ?? '' }}____cm,Mother's height____{{ $profile->mother_height ?? '' }}____cm,Mid-parental height____{{ $mph ?? '' }}____cm",

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

            name: 'Height (cm)',
            type: 'value',

            data: heightX,
            boundaryGap: false,

            min: 90,
            max: {{ session()->get('profile')->gender == 'female' ? 170:180 }},


            // axisLabel: {
            //     fontSize: 10,
            //     interval: function (index, value) {
            //         // Show only whole years for clarity
            //         return value.endsWith('.0');
            //     },
            //     formatter: function (value) {
            //         if (value.endsWith('.0')) return value.split('.')[0] + '';
            //         return '';
            //     },
            //     // rotate: 45
            // },

            // axisLabel: {
            //     formatter: val => val.toFixed(0) // Show as year.month format
            // },

            color: '#fddfe7',

            // min: 2,
            // max: 19,
            interval: 10,
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
                name: 'Weight (kg)',
                type: 'value',
                min: 10,
                max: {{ session()->get('profile')->gender == 'female' ? 85:85 }},
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
                name: 'Weight (kg)',
                type: 'value',
                min: 0,
                max: {{ session()->get('profile')->gender == 'female' ? 85:85 }},
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
                type: 'scatter',
                // data: ageData.map((age, index) => [age, heightData[index]]),
                data: heightData,
                yAxisIndex: 0,
                smooth: true,
                symbolSize: 13,
                itemStyle: {
                    color: '#1e8808' // Custom color for scatter points
                },
                {{--markArea: {--}}
                {{--    itemStyle: {--}}
                {{--        color: 'rgb(26,68,7)', // semi-transparent yellow--}}
                {{--        borderWidth: 10,--}}
                {{--        borderColor: '#1e8808'--}}
                {{--    },--}}
                {{--    data: [--}}
                {{--        [--}}
                {{--            {--}}
                {{--                xAxis: '19.0',--}}
                {{--                yAxis: {{ $mph - 8 }}  //mph -8--}}
                {{--            },--}}
                {{--            {--}}
                {{--                xAxis: '19.0',--}}
                {{--                yAxis: {{ $mph + 8  }}// mph +8--}}
                {{--            }--}}
                {{--        ]--}}
                {{--    ]--}}
                {{--}--}}
            },

            // {
            //     name: 'Weight (kg)',
            //     type: 'scatter',
            //     // data: ageData.map((age, index) => [age, heightData[index]]),
            //     data: weightData,
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbolSize: 13,
            //     itemStyle: {
            //         color: '#1e8808' // Custom color for scatter points
            //     },
            //
            // },
            //
            // {
            //     name: 'Boneage',
            //     type: 'scatter',
            //     symbol: 'square',
            //     // data: ageData.map((age, index) => [age, heightData[index]]),
            //     data: boneageData,
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbolSize: 13,
            //     itemStyle: {
            //         color: '#65001d' // Custom color for scatter points
            //     },
            //
            // },

            // {
            //     name: 'Tanner',
            //     type: 'scatter',
            //     symbol: 'square',
            //     // data: ageData.map((age, index) => [age, heightData[index]]),
            //     data: tannerData,
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbolSize: 10,
            //     itemStyle: {
            //         color: '#0029dc' // Custom color for scatter points
            //     },
            //
            // },

            // {
            //     type: 'line',
            //     symbol: 'none',
            //     lineStyle: {
            //         color: 'red',
            //         width: 2
            //     },
            //     data: [
            //         [10, 145], // start: green
            //         [14, 145]  // end: red
            //     ],
            //     z: 2
            // },

            // {
            //     name: 'Parent',
            //     type: 'scatter',
            //     data: parentData,
            //     symbolSize: 16,
            //     // label: {
            //     //     show: true,
            //     //     formatter: '3.11',
            //     //     position: 'top'
            //     // },
            //     itemStyle: {
            //         color: '#1e8808'
            //     }
            // },

            {
                name: 'P3',
                type: 'line',
                data: {!! $p3Data !!},
                // data: ageData.map((age, index) => [age, p3[index]]),

                // yAxisIndex: 0,
                smooth: true,
                symbol: 'none',
                // symbolSize: 10,
                tooltip: null,
                lineStyle: {
                    width: 2,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                },

                label: {
                    show: true,
                    position: 'top', // shows label above the point (or use 'right' if you prefer)
                    formatter: function(params) {
                        if (params.dataIndex === p3Data.length - 1) {
                            return 'P3';
                        }
                        return '';
                    }
                },
                emphasis: {
                    label: { show: false } // Optional: hides label on hover for other points
                },

                // markArea: {
                //     itemStyle: {
                //         color: 'rgba(0, 123, 255, 0.45)', // blue, change as needed
                //         borderWidth: 10,
                //         borderColor: '#faacc8'
                //     },
                //     data: [
                //         [
                //             {xAxis: '9.6', yAxis: 17.5},
                //             {xAxis: '14.0', yAxis: 17.5}
                //         ],
                //
                //         [
                //             {xAxis: '8.0', yAxis: 13},
                //             {xAxis: '12.0', yAxis: 13}
                //         ]
                //
                //     ]
                // }

            },
            {
                name: 'P10',
                type: 'line',
                // data: ageData.map((age, index) => [age, p10[index]]),
                data: {!! $p10Data !!},
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
                // data: ageData.map((age, index) => [age, p25[index]]),
                data: {!! $p25Data !!},

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
                // data: ageData.map((age, index) => [age, p50[index]]),
                data: {!! $p50Data !!},

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
                // data: ageData.map((age, index) => [age, p75[index]]),
                data: {!! $p75Data !!},
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
                // data: ageData.map((age, index) => [age, p90[index]]),
                data: {!! $p90Data !!},
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
                // data: ageData.map((age, index) => [age, p97[index]]),
                data: {!! $p97Data !!},
                yAxisIndex: 0,
                smooth: true,
                symbol: 'none',
                tooltip: null,
                lineStyle: {
                    width: 2,  // Change the thickness of the line
                    color: '#2b2d30'  // Change the color of the line (red in this case)
                }
            },


            // {
            //     name: 'P3',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p3[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 2,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },
            // {
            //     name: 'P10',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p10[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 0.5,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },
            // {
            //     name: 'P25',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p25[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 0.5,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },
            // {
            //     name: 'P50',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p50[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 2,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },
            // {
            //     name: 'P75',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p75[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 0.5,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },
            // {
            //     name: 'P90',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p90[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 0.5,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     },
            //     label: {
            //         show: true,
            //         position: 'inside',  // Position the label at the end of the line
            //         formatter: 'P90'  // Format the label (you can show the value here)
            //     }
            // },
            // {
            //     name: 'P97',
            //     type: 'line',
            //     data: ageData.map((age, index) => [age, p97[index]]),
            //     yAxisIndex: 0,
            //     smooth: true,
            //     symbol: 'none',
            //     tooltip: null,
            //     lineStyle: {
            //         width: 2,  // Change the thickness of the line
            //         color: '#2b2d30'  // Change the color of the line (red in this case)
            //     }
            // },


            // {
            //     name: 'Breast Tanner stage II',
            //     type: 'bar',
            //     barWidth: '100%',
            //     data: tannerBand,
            //     xAxisIndex: 1,
            //     yAxisIndex: 1,
            //     itemStyle: {
            //         color: function(params) {
            //             return params.value === 1 ? '#FFD481' : 'transparent';
            //         },
            //         borderRadius: 5,
            //     },
            //     label: {
            //         show: true,
            //         position: 'inside',
            //         formatter: function(params) {
            //             // Only show label in the middle of the band
            //             if (params.value === 1 && params.dataIndex === Math.floor((bandStart + bandEnd) / 2)) {
            //                 return 'Breast Tanner stage II';
            //             }
            //             return '';
            //         },
            //         color: '#6d3e04',
            //         fontWeight: 'bold',
            //         fontSize: 12
            //     },
            //     emphasis: { disabled: true }
            // }


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
