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

    public static function  getWeekEvents($startDate, $endDate)
    {
        // 人数の合計
        $reservedPeople = DB::table('reservations')
        ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNull('canceled_date')
        ->groupBy('event_id');

        return DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id', '=', 'reservedPeople.event_id');
            })
        ->whereBetween('start_date', [$startDate, $endDate]) //今日を含む未来の日にちを表示
        ->orderBy('start_date', 'asc')
        ->get();
    }
    

}