<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventServices
{

    public static function checkEventDuplication($eventDate, $startTime, $endTime)
    {
        $check = DB::table('events')
        ->whereDate('start_date', $eventDate) //日にち
        ->whereTime('end_date', '>', $startTime)
        ->whereTime('start_date', '<', $endTime)
        ->exists(); //存在確認

        return $check;
    }

    public static function joinDateAndTime($date, $time)
    {
        $join = $date."".$time;
        $dataTime = Carbon::createFromFormat(
            'Y-m-d H:i', $join
        );

        return $dataTime;
    }

    public static function countEventDuplication($eventDate, $startTime, $endTime)
    {
        $check = DB::table('events')
        ->whereDate('start_date', $eventDate) //日にち
        ->whereTime('end_date', '>', $startTime)
        ->whereTime('start_date', '<', $endTime)
        ->count(); //存在確認

        return $check;
    }

}