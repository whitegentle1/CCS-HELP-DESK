<?php

namespace App\Http\Controllers;

use App\Models\StudentRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class PaymentController extends Controller
{
    public function pay($amount, $document, $fullname, $no_copy, $paycode)
    {

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $amount * 100,
                            'description' => $document . ' * ' . $no_copy,
                            'name' => $fullname,
                            'quantity' => 1,
                        ]
                    ],
                    'payment_method_types' => [
                        $paycode
                    ],
                    'success_url' => 'http://localhost/transactionhistory',
                    // failed payment --WIP--
                    'cancel_url' => 'http://localhost/transactionhistory', 
                    'description' => $document . ' * ' . $no_copy,
                ]
            ]
        ];
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY')))
            ->withData($data)
            ->asJson()
            ->post();

        \Session::put('session_id', $response->data->id);
        $userSessionId = \Session::getId();

        $user = StudentRequest::where('user_session_id', $userSessionId)->latest()->first();

        if ($user) {
            $paymentSessionId = $response->data->id;

            $user->payment_session_id = $paymentSessionId;
            $user->save();
        }

        return redirect()->to($response->data->attributes->checkout_url);
    }
    public function success()
    {
        $sessionId = \Session::get('session_id');

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/' . $sessionId)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY')))
            ->asJson()
            ->get();

        $paymentStatus = $response->data->attributes->payment_intent->attributes->status;

        if ($paymentStatus === 'succeeded') {
            $studentRequest = StudentRequest::where('payment_session_id', $sessionId)->first();

            if ($studentRequest) {
                $studentRequest->status = 'Success';
                $studentRequest->save();

                $dt = Carbon::now('Asia/Shanghai');
                $todayDate = $dt->toDayDateTimeString();

                $log_history = [
                    'email' => Auth::user()->email,
                    'activity' => 'Payment -- Success',
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'logout_time' => $todayDate
                ];
                DB::table('login_history')->insert($log_history);
                return redirect()->to('/transactionhistory');
            } else {
                $dt = Carbon::now('Asia/Shanghai');
                $todayDate = $dt->toDayDateTimeString();

                $log_history = [
                    'email' => Auth::user()->email,
                    'activity' => 'Payment -- Fail',
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'logout_time' => $todayDate
                ];
                DB::table('login_history')->insert($log_history);
                return redirect()->to('/transactionhistory');
            }
        }
    }
}
