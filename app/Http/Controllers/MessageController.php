<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function create(Request $request)
{
    $user = Auth::user();

    $doctors = User::where('role', 'doctor')->get();

    $selectedDoctor = null;
    $messages = [];

    if ($request->doctor_id) {
        $selectedDoctor = User::find($request->doctor_id);

        $messages = Message::where(function ($query) use ($user, $selectedDoctor) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', $selectedDoctor->id);
            })
            ->orWhere(function ($query) use ($user, $selectedDoctor) {
                $query->where('sender_id', $selectedDoctor->id)
                      ->where('receiver_id', $user->id);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }

    return view('patients.messaging', compact('doctors', 'selectedDoctor', 'messages'));
}

public function store(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'content' => 'required|string|max:1000',
    ]);

    $message = Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content,
    ]);

    broadcast(new MessageSent($message))->toOthers();

    return response()->json(['status' => 'Message sent', 'message' => $message]);
}

}

