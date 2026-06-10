<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Contact $message)
    {
        $message->update(['read' => true]);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Contact $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
