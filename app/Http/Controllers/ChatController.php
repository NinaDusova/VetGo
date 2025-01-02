<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage ;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $currentUser = auth()->user();
        if (Doctor::where('user_id', $currentUser->id)->exists()) {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $users = User::whereDoesntHave('doctor')->get();
            return view('chat.index', compact('users', 'doctor'));
        } else {
            $doctors = Doctor::with('user')->get();
            return view('chat.index', compact('doctors'));
        }
    }

    public function prev() {
        $doctors = Doctor::all();
        return view('chat.prev_chat', compact('doctors'));
    }


    public function something($receiverId)
    {
        $messages = ChatMessage::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat.index', [
            'messages' => $messages,
            'receiverId' => $receiverId,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true]);
    }

    public function getMessages($doctorId)
    {
        $userId = Auth::id();

        $messages = ChatMessage::where(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $doctorId);
        })->orWhere(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $doctorId)
                ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:255',
        ]);

        $message = new ChatMessage();
        $message->sender_id = Auth::id();
        $message->receiver_id = $validated['receiver_id'];
        $message->message = $validated['message'];
        $message->save();

        return response()->json([
            'status' => 'success',
            'message' => $message,
        ]);
    }
}
