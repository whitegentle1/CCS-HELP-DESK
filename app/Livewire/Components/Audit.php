<?php

namespace App\Livewire\Components;

use App\Models\LoginHistory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Audit extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();
        $activityLog = LoginHistory::where('email', $user->email)->paginate(5);

        return view('livewire.components.audit', [
            'activityLog' => $activityLog,
        ]);
    }
}
