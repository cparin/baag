<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <script src="https://cdn.jsdelivr.net/npm/echarts@5.6.0/dist/echarts.min.js"></script>
</head>

<body>
<div id="growth-chart" style="width: 964px; height: 1364px;"></div>
<script>

    // Data
    const ageData = ['2', '2.01', '2.02', '2.03', '2.04', '2.05', '2.06', '2.07', '2.08', '2.09', '2.10', '2.11',
        '3', '3.01', '3.02', '3.03', '3.04', '3.05', '3.06', '3.07', '3.08', '3.09', '3.10', '3.11',
        '4', '4.01', '4.02', '4.03', '4.04', '4.05', '4.06', '4.07', '4.08', '4.09', '4.10', '4.11',
        '5', '5.01', '5.02', '5.03', '5.04', '5.05', '5.06', '5.07', '5.08', '5.09', '5.10', '5.11',
        '6', '6.01', '6.02', '6.03', '6.04', '6.05', '6.06', '6.07', '6.08', '6.09', '6.10', '6.11',
        '7', '7.01', '7.02', '7.03', '7.04', '7.05', '7.06', '7.07', '7.08', '7.09', '7.10', '7.11',
        '8', '8.01', '8.02', '8.03', '8.04', '8.05', '8.06', '8.07', '8.08', '8.09', '8.10', '8.11',
        '9', '9.01', '9.02', '9.03', '9.04', '9.05', '9.06', '9.07', '9.08', '9.09', '9.10', '9.11',
        '10', '10.01', '10.02', '10.03', '10.04', '10.05', '10.06', '10.07', '10.08', '10.09', '10.10', '10.11',
        '11', '11.01', '11.02', '11.03', '11.04', '11.05', '11.06', '11.07', '11.08', '11.09', '11.10', '11.11',
        '12', '12.01', '12.02', '12.03', '12.04', '12.05', '12.06', '12.07', '12.08', '12.09', '12.10', '12.11',
        '13', '13.01', '13.02', '13.03', '13.04', '13.05', '13.06', '13.07', '13.08', '13.09', '13.10', '13.11',
        '14', '14.01', '14.02', '14.03', '14.04', '14.05', '14.06', '14.07', '14.08', '14.09', '14.10', '14.11',
        '15', '15.01', '15.02', '15.03', '15.04', '15.05', '15.06', '15.07', '15.08', '15.09', '15.10', '15.11',
        '16', '16.01', '16.02', '16.03', '16.04', '16.05', '16.06', '16.07', '16.08', '16.09', '16.10', '16.11',
        '17', '17.01', '17.02', '17.03', '17.04', '17.05', '17.06', '17.07', '17.08', '17.09', '17.10', '17.11',
        '18', '18.01', '18.02', '18.03', '18.04', '18.05', '18.06', '18.07', '18.08', '18.09', '18.10', '18.11', '19']; // Ages in years
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
                width: 142.86,
                height: 47.62,
                opacity: 1
            }
        }
    };

    // Render the chart
    chart.setOption(option);
    // });

</script>


</body>


</html>
