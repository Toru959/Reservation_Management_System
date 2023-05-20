<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $name = '';

    public function mount() //mountメソッドで初期値の設定
    {
        $this->name = 'mount';
    }

    public function updated() //updatedメソッドで文字が入力されると$nameが更新される
    {
        $this->name = 'updated';
    }

    public function mouseOver()
    {
        $this->name = 'mouseover';
    }

    public function increment()
    {
        $this->count++;
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}
