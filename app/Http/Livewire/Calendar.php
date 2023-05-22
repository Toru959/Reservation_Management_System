<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\CarbonImmutable;
use App\Services\EventServices;

class Calendar extends Component
{

    public $currentDate;
    public $currentWeek;
    public $day;
    public $sevenDaysLater;
    public $events;

    public function mount() // 画面を開いた時の初期値の設定
    {
        $this->currentDate = CarbonImmutable::today();
        $this->sevenDaysLater = $this->currentDate->addDays(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents(
            $this->currentDate->format('Y-m-d'),
            $this->sevenDaysLater->format('Y-m-d'),
        );

        for($i = 0; $i < 7; $i++){
            $this->day = CarbonImmutable::today()->addDays($i)->format('m/d');

            array_push($this->currentWeek, $this->day);
        }
        // dd($this->currentWeek);

    }

    public function getDate($date)
    {
        $this->currentDate = $date;
        $this->sevenDaysLater = CarbonImmutable::parse($this->currentDate)->addDays(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents(
            $this->currentDate,
            $this->sevenDaysLater->format('Y-m-d'),
        );

        for($i = 0; $i < 7; $i++)
        {
            $this->day = CarbonImmutable::parse($this->currentDate)->addDays($i)
            ->format('m/d'); // parseでcarbonインスタンスに変更後、日付を加算

            array_push($this->currentWeek, $this->day);
        }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
