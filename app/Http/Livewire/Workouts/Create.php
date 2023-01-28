<?php

namespace App\Http\Livewire\Workouts;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Arr;

class Create extends Component
{
    public $i = 0;
    public $repeat;
    public $repeats = [];
    /**
     * @return View
     */
    public function render():View
    {
        return view('livewire.workouts.create');
    }

    /**
     * @return void
     */
    public function addRepeat(): void
    {

        if($this->i <= 2)
        {
            $this->repeats = Arr::add($this->repeats, $this->i, $this->i);
            $this->i ++;
        }

    }
}
