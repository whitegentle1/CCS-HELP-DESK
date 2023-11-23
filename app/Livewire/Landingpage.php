<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[
    Layout('layouts.guest')
]
class Landingpage extends Component
{
    public function render()
    {
        return view('livewire.landingpage');
    }
}
