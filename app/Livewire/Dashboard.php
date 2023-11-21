<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
    public function refreshSection()
    {
        // Perform any logic needed to refresh the specific section
        // For example, update data or perform an action

        // You can also emit events if needed
        $this->emit('sectionRefreshed');
    }
}
