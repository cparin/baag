<?php

use Carbon\Carbon;

function dateThai($date)
{
    $carbonDate = Carbon::parse($date);
    $thaiMonths = [
        'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'
    ];

    $day = $carbonDate->day;
    $month = $thaiMonths[$carbonDate->month - 1];
    $year = $carbonDate->year + 543;

    return "{$day} {$month} {$year}";
}

function dateEn($date)
{
    $carbonDate = Carbon::parse($date);
    $enMonths = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    $day = $carbonDate->day;
    $month = $enMonths[$carbonDate->month - 1];
    $year = $carbonDate->year;

    return "{$day} {$month} {$year}";
}

