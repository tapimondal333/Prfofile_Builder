<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function skills()
    {
        $skills = Skill::where('user_id', auth()->id())->get();
        return view('Tech.skills', compact('skills'));
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $skill = new Skill();
        $skill->user_id = auth()->id();
        $skill->name = $request->name;
        $skill->proficiency = $request->proficiency;
        $skill->description = $request->description;

        if ($request->hasFile('certificate')) {
            $path = $request->file('certificate')->store('certificates', 'public');
            $skill->certificate = $path;
        }

        $skill->save();

        return redirect()->route('skill.index')->with('success', 'Skill added successfully!');
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $this->authorize('update', $skill);

        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $skill->name = $request->name;
        $skill->proficiency = $request->proficiency;
        $skill->description = $request->description;

        if ($request->hasFile('certificate')) {
            // Delete old certificate if exists
            if ($skill->certificate) {
                \Storage::disk('public')->delete($skill->certificate);
            }
            $path = $request->file('certificate')->store('certificates', 'public');
            $skill->certificate = $path;
        }

        $skill->save();

        return redirect()->route('skill.index')->with('success', 'Skill updated successfully!');
    }

    public function destroySkill(Skill $skill)
    {
        $this->authorize('delete', $skill);

        // Delete certificate if exists
        if ($skill->certificate) {
            \Storage::disk('public')->delete($skill->certificate);
        }

        $skill->delete();

        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully!');
    }

    public function showSkill(Skill $skill)
    {
        $this->authorize('view', $skill);
        return view('Tech.show_skill', compact('skill'));
    }


    public function experience()
    {
        $experiences = Experience::where('user_id', auth()->id())->get();
        return view('Tech.experience', compact('experiences'));
    }

    public function storeExperience(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'reason_to_leave' => 'nullable|string',
        ]);

        $experience = new Experience();
        $experience->user_id = auth()->id();
        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->location = $request->location;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;
        $experience->reason_to_leave = $request->reason_to_leave;
        $experience->save();

        return redirect()->route('portfolio.experience')->with('success', 'Experience added successfully!');
    }

    public function updateExperience(Request $request, Experience $experience)
    {
        $this->authorize('update', $experience);

        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'reason_to_leave' => 'nullable|string',
        ]);

        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->location = $request->location;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;
        $experience->reason_to_leave = $request->reason_to_leave;
        $experience->save();

        return redirect()->route('portfolio.experience')->with('success', 'Experience updated successfully!');
    }

    public function destroyExperience(Experience $experience)
    {
        $this->authorize('delete', $experience);

        $experience->delete();

        return redirect()->route('portfolio.experience')->with('success', 'Experience deleted successfully!');
    }

    public function showExperience(Experience $experience)
    {
        $this->authorize('view', $experience);
        return view('Tech.show_experience', compact('experience'));
    }

}
