<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->paginate(20);

        // Group skills by category for better display
        $groupedSkills = Skill::active()->ordered()->get()->groupBy('category');

        return view('admin.skills.index', compact('skills', 'groupedSkills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully!');
    }

    public function toggleActive(Skill $skill)
    {
        $skill->update(['is_active' => !$skill->is_active]);
        return redirect()->back()->with('success', 'Skill status updated!');
    }
}
