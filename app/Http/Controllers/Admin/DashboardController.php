<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Skill;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'     => Project::count(),
            'certificates' => Certificate::count(),
            'skills'       => Skill::count(),
            'messages'     => Contact::count(),
            'unread'       => Contact::where('read', false)->count(),
        ];
        $recentMessages = Contact::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
