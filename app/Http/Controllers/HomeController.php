<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Jobs\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', auth()->id())->select([
            'id', 'name', 'email',
        ])->first();

        return view('home', [
            'user' => $user,
        ]);
    }

    public function messages(): JsonResponse {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request): JsonResponse {
        $message = Message::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }
}
