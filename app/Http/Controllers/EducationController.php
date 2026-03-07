<?php
namespace App\Http\Controllers;

use App\Models\Doccument;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())
            ->orderBy('passing_year')
            ->get();

        return view('About.Education.index', compact('educations'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'level' => 'required|string',
                'course_name' => 'required|string',
                'stream' => 'nullable|string',
                'passing_year' => 'required|digits:4',
                'marks' => 'nullable|string',
                'institution' => 'nullable|string',
                'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);

            if ($request->hasFile('certificate')) {
                $data['certificate'] = $request->file('certificate')
                    ->store('education_certificates', 'public');
            }

            $data['user_id'] = Auth::id();

            Education::create($data);

            return back()->with('success', 'Education added successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to add education: ' . $e->getMessage()]);
        }
    }

    public function updateEducation(Request $request, Education $education)
    {
        $this->authorize('update', $education);

        $data = $request->validate([
            'course_name' => 'nullable|string',
            'stream' => 'nullable|string',
            'passing_year' => 'nullable|digits:4',
            'marks' => 'nullable|string',
            'institution' => 'nullable|string',
            'certificate' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('certificate')) {
            if ($education->certificate) {
                Storage::disk('public')->delete($education->certificate);
            }

            $data['certificate'] = $request->file('certificate')
                ->store('education_certificates', 'public');
        }

        $education->update($data);

        return back()->with('success', 'Education updated');
    }

    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);

        if ($education->certificate) {
            Storage::disk('public')->delete($education->certificate);
        }

        $education->delete();

        return back()->with('success', 'Education deleted');
    }

    public function show(Education $education)
    {
        $this->authorize('view', $education);

        return view('About.Education.show', compact('education'));
    }


    public function documents()
    {
        $documents = Doccument::where('user_id', Auth::id())->get();
        return view('About.Document.index', compact('documents'));
    }

    public function storeDocument(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);


        if ($request->hasFile('certificate')) {
            $data['certificate'] = $request->file('certificate')
                ->store('doccuments', 'public');
        }

        $data['user_id'] = Auth::id();

        Doccument::create($data);

        return back()->with('success', 'Document added successfully');
    }

    public function updateDocument(Request $request, $document)
    {
        $doc = Doccument::find($document);
        
        if (!$doc) {
            abort(404, 'Document not found');
        }

        \Log::info('updateDocument called - Doc ID: ' . $doc->id . ', Doc User ID: ' . $doc->user_id . ', Auth ID: ' . Auth::id());
        
        // Verify the document belongs to the current user
        if ($doc->user_id !== Auth::id()) {
            \Log::error('Unauthorized: Doc user_id (' . $doc->user_id . ') != Auth::id (' . Auth::id() . ')');
            abort(403, 'Unauthorized - Document does not belong to this user');
        }

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('certificate')) {
            if ($doc->certificate) {
                Storage::disk('public')->delete($doc->certificate);
            }

            $data['certificate'] = $request->file('certificate')
                ->store('doccuments', 'public');
        }

        $doc->update($data);

        return back()->with('success', 'Document updated');
    }

    public function destroyDocument($document)
    {
        $doc = Doccument::find($document);
        
        if (!$doc) {
            abort(404, 'Document not found');
        }

        // Verify the document belongs to the current user
        if ($doc->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($doc->certificate) {
            Storage::disk('public')->delete($doc->certificate);
        }

        $doc->delete();

        return back()->with('success', 'Document deleted');
    }
}