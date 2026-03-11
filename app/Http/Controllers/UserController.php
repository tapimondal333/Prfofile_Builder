<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\UserPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Inertia\Inertia;


class UserController extends Controller
{
    public function portfolioProfile()
    {
        $user = auth()->user();

        
        $portfolio = UserPortfolio::where('user_id', $user->id)->first();
        $skills_count = Skill::where('user_id', $user->id)->count();
        $experiences_count = Experience::where('user_id', $user->id)->count();
        $educations_count = Education::where('user_id', $user->id)->count();

        return view('UserPortfolio.profile', [
            'user' => $user,
            'portfolio' => $portfolio,
            'skills_count' => $skills_count,
            'experiences_count' => $experiences_count,
            'educations_count' => $educations_count,
        ]);
    }

    /**
     * Create or update portfolio profile
     */
    public function updatePortfolioProfile(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            // Step 1
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:255',
            'location' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',

            // Step 2
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'website' => 'nullable|url',
            'headline' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:60',
            'availability' => 'nullable|string|max:100',
            'primary_skill' => 'nullable|string|max:100',
            'secondary_skill' => 'nullable|string|max:100',
            'tools' => 'nullable|string',

            // Step 3
            'phone' => 'nullable|string|max:20',
            'email_public' => 'nullable|email|max:255',
            'twitter' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'remote_only' => 'nullable|boolean',
        ]);
        
        // Handle image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $path = $file->store('profile-images', 'public');
            $data['profile_image'] = $path;
        } else {
            // If no new image uploaded, remove it from data to keep existing one
            $data = array_filter($data, function($key) {
                return $key !== 'profile_image';
            }, ARRAY_FILTER_USE_KEY);
        }
        
        // Create or update portfolio
        $portfolio = UserPortfolio::updateOrCreate(
            ['user_id' => $user->id],
            array_merge(['user_id' => $user->id], $data)
        );
        
        if ($portfolio->wasRecentlyCreated) {
            $message = 'Portfolio created successfully!';
        } else {
            $message = 'Portfolio updated successfully!';
        }
        
        return redirect()
            ->route('portfolio.profile')
            ->with('success', $message);
    }

    public function preview()
    {
        $user = auth()->user();
        $portfolio = UserPortfolio::where('user_id', $user->id)->first();

        $educations = Education::where('user_id', $user->id)->orderBy('passing_year', 'desc')->get();
        $skills = Skill::where('user_id', $user->id)->get();
        $experiences = Experience::where('user_id', $user->id)->orderBy('start_date', 'desc')->get();

        return view('UserPortfolio.preview', compact('user', 'portfolio', 'educations', 'skills', 'experiences'));
    }

    public function contactUs()
    {
        return view('Contact_us.show');
    }

    public function submitContactUs(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'proficiency' => 'nullable|string|max:100',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('contact-files', 'public');
            $data['file'] = $path;
        }

        // Create contact message
        $contact = new Contact();
        $contact->user_id = $user->id;
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'] ?? null;
        $contact->message = $data['message'];
        $contact->proficiency = $data['proficiency'] ?? null;
        $contact->file = $data['file'] ?? null;
        $contact->save();

        // Send email notification
        Mail::to('tapimondal333@gmail.com')->send(new ContactMail($contact));

        return redirect()
            ->route('contact_us.index')
            ->with('success', 'Your message has been sent successfully!');
    }

 

}
