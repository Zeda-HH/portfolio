<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();
        $certificates = Certificate::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();
        return view('portfolio.index', compact('skills', 'certificates', 'projects'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Your message has been sent! I\'ll get back to you soon.');
    }
}
