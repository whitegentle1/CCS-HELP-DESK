<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotController extends Controller
{
    public function reply(Request $request)
    {
        $userQuery = $request->input('text');
        $botReply = DB::table('chatbot')
            ->where('queries', 'like', '%' . $userQuery . '%')
            ->first();

        if ($botReply) {
            return response()->json(['message' => $botReply->replies]);
        } else {
            return response()->json(['message' => "I don't think I understand..<br>Send <b>'help'</b> to check the list of my commands!"]);
        }
    }
}
