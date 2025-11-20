<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:10',
            'image' => 'nullable|image|max:2048',
            'tags' => 'required|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        // Handle tags (convert comma-separated to array)
        $validated['tags'] = array_map('trim', explode(',', $validated['tags']));

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:10',
            'image' => 'nullable|image|max:2048',
            'tags' => 'required|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        // Handle tags
        $validated['tags'] = array_map('trim', explode(',', $validated['tags']));

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }

    public function toggleActive(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);
        return redirect()->back()->with('success', 'Project status updated!');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);
        return redirect()->back()->with('success', 'Project featured status updated!');
    }
}
