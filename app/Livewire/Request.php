<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentRequest;
use Illuminate\Support\Facades\Auth;

class Request extends Component
{
    public function render()
    {
        // Pass $doctype to the view
        return view('livewire.request', ['doctype' => $this->doctype], ['copy' => $this->copy], ['method' => $this->method]);
    }
    public function mount()
    {
        $user = Auth::user();
        $this->fullname = $user->firstname . ' ' . ($user->middlename ? $user->middlename . ' ' : '') . $user->lastname;
        $this->student_id = substr($user->email, 0, strpos($user->email, '@'));
    }

    public $doctype = ['Certificate of Registration', 'Certificate of Grades', 'Certificate of Enrollment'];
    public $copy = ['1', '2', '3', '4', '5'];
    public $method = ['Paypal', 'Bank Transfer', 'GCash', 'QR Code', 'Over-the-counter', 'Maya'];

    public string $fullname = '';
    public string $email = '';
    public string $student_id = '';
    public string $year_section = '';
    public string $document = 'Certificate of Registration';
    public string $no_copy = '1';
    public string $payment_method = 'Paypal';
    public string $amount = '';

    public function submitRequest()
    {
        $Studreq = new StudentRequest();
        $Studreq->fullname = $this->fullname;
        $Studreq->email = $this->email;
        $Studreq->student_id = $this->student_id;
        $Studreq->year_section = $this->year_section;
        $Studreq->document = $this->document;
        $Studreq->no_copy = $this->no_copy;
        $Studreq->payment_method = $this->payment_method;
        $Studreq->amount = $this->calculateAmount($this->document, $this->no_copy, $this->payment_method);
        $Studreq->activity = 'Payment';
        $Studreq->status = 1;

        $Studreq->save();
        $this->dispatch('request_submitted', name: $this->fullname);
    }
    public function updateFormValues()
    {
        $this->amount = $this->calculateAmount($this->document, $this->no_copy, $this->payment_method);
    }


    private function calculateAmount($document, $no_copy, $payment_method)
    {
        $amounts = [
            'Certificate of Registration' => 150,
            'Certificate of Grades' => 200,
            'Certificate of Enrollment' => 100,
        ];

        return $amounts[$document] * (int)$no_copy;
    }
}
