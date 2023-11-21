<?php

namespace App\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $refresh = false;

    public function render()
    {
        return view('livewire.map');
    }
    public function refreshComponent()
    {
        $this->refresh = !$this->refresh;
    }
}
