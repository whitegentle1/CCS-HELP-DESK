<?php

namespace App\Livewire\Pages;

use App\Models\StudentRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Transactionhistory extends Component
{
    use WithPagination;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function getTransactions()
    {
        return StudentRequest::where('email', $this->user->email)->paginate(5);
    }

    public function render()
    {
        $transactionHistory = $this->getTransactions();
        return view('livewire.pages.transactionhistory', ['transactionHistory' => $transactionHistory]);
    }
}
