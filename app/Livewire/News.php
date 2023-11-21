<?php

namespace App\Livewire;

use Livewire\Component;

class News extends Component
{
    public $refresh = false;

    public function render()
    {
        return view('livewire.news');
    }
    public function refreshComponent()
    {
        $this->refresh = !$this->refresh;
    }
}
