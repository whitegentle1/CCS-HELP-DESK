<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

class Request extends Component
{
    public function render()
    {
        // Pass $doctype to the view
        return view('livewire.request', ['doctype' => $this->doctype], ['copy' => $this->copy], ['method' => $this->method]);
    }
    public function mount()
    {
        $user = auth()->user();
        $this->fullname = $user->firstname . ' ' . ($user->middlename ? $user->middlename . ' ' : '') . $user->lastname;
        $this->student_id = substr($user->email, 0, strpos($user->email, '@'));
        $this->no_copy = 1;
    }


    public $doctype = ['Certificate of Registration', 'Certificate of Grades', 'Certificate of Enrollment'];
    public $copy = [1, 2, 3, 4, 5];
    public $method = ['Bank Transfer', 'GCash', 'Over-the-counter', 'Maya', 'Grab Pay', 'Online Banking'];


    public string $fullname = '';
    public string $student_id = '';
    public string $year_section = '';
    public string $document = 'Certificate of Registration';
    public int $no_copy = 1;
    public string $payment_method = 'Bank Transfer';
    public int $amount = 150;



    public function submitRequest()
    {
        $paycode = '';
        switch ($this->payment_method) {
            case 'Grab Pay':
                $paycode = 'grab_pay';
                break;
            case 'Bank Transfer':
                $paycode = 'card';
                break;
            case 'GCash':
                $paycode = 'gcash';
                break;
            case 'Paymaya':
                $paycode = 'paymaya';
                break;
            case 'Online Banking':
                $paycode = 'dob';
                break;
            default:
                $paycode = '';
        }
        $user = auth()->user();
        $Studreq = new StudentRequest();
        $Studreq->user_session_id = session()->getId();
        $Studreq->fullname = $this->fullname;
        $Studreq->email = $user->email;
        $Studreq->student_id = $this->student_id;
        $Studreq->year_section = $this->year_section;
        $Studreq->document = $this->document;
        $Studreq->no_copy = $this->no_copy;
        $Studreq->payment_method = $this->payment_method;
        $Studreq->amount = $this->calculateAmount($this->document, $this->no_copy, $this->payment_method);
        $Studreq->activity = 'Payment';
        $Studreq->status = 'Pending';
        $Studreq->save();
        $paymentController = new PaymentController();
        $paymentController->pay(
            $this->amount,
            $this->document,
            $this->fullname,
            $this->no_copy,
            $paycode,
        );

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
