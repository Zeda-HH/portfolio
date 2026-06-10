<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'sort_order' => 'integer',
        ]);
        Skill::create($request->only('name', 'percentage', 'icon', 'sort_order'));
        return back()->with('success', 'Skill added.');
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);
        $skill->update($request->only('name', 'percentage', 'icon', 'sort_order'));
        return back()->with('success', 'Skill updated.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted.');
    }
}
