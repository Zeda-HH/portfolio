<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateProject($request);
        $data['technologies'] = array_filter(array_map('trim', explode(',', $request->technologies_input ?? '')));

        if ($request->hasFile('thumbnail')) {
            $result = cloudinary()->upload($request->file('thumbnail')->getRealPath(), [
                'folder' => 'portfolio/projects',
            ]);
            $data['thumbnail'] = $result->getSecurePath();
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateProject($request);
        $data['technologies'] = array_filter(array_map('trim', explode(',', $request->technologies_input ?? '')));

        if ($request->hasFile('thumbnail')) {
            $result = cloudinary()->upload($request->file('thumbnail')->getRealPath(), [
                'folder' => 'portfolio/projects',
            ]);
            $data['thumbnail'] = $result->getSecurePath();
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }

    private function validateProject(Request $request): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail'   => 'nullable|image|max:5120',
            'github_url'  => 'nullable|url|max:500',
            'linkedin_url'=> 'nullable|url|max:500',
            'live_url'    => 'nullable|url|max:500',
            'featured'    => 'boolean',
            'sort_order'  => 'integer',
        ]);
    }
}
