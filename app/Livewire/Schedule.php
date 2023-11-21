<?php

namespace App\Livewire;

use Livewire\Component;

class Schedule extends Component
{
    public $refresh = false;

    public function render()
    {
        return view('livewire.schedule');
    }
    public function refreshComponent()
    {
        $this->refresh = !$this->refresh;
    }
}
