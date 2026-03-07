<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;

use Illuminate\Support\Facades\DB;

use Inertia\Inertia;


class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
        $user = auth()->user();
        $skills_count=Skill::where('user_id', $user->id)->count();
        $experiences_count=Experience::where('user_id', $user->id)->count();
        $educations_count=Education::where('user_id', $user->id)->count();

        $views_count = DB::table('user_portfolios')->where('user_id', $user->id)->count();

        $top_skills = Skill::where('user_id', $user->id)
        ->select('name',DB::raw('COUNT(*) as count'))
        ->groupBy('name')
        ->orderByDesc('count')
        ->limit(5)
        ->get()
        ->map(fn($s)=>['name'=>$s->name,'count'=>(int)$s->count])
        ->toArray();


         $recent_activity = [
        ['message' => 'Added <strong>React</strong> to skills', 'time' => '2 hours ago'],
        ['message' => 'Updated profile headline', 'time' => '1 day ago'],
    ];

     $chart_labels = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    $chart_data = [5,3,8,4,7,6,9];

    return view('Dashboard.dashboard', compact(
        'skills_count',
        'experiences_count',
        'educations_count',
        'views_count',
        'top_skills',
        'recent_activity',
        'chart_labels',
        'chart_data'
    ));
}

    
    public function adminDashboard()
    {
        $total_users = \App\Models\User::count();
        $active_portfolios = \App\Models\UserPortfolio::count();
        $total_skills = \App\Models\Skill::count();
        $total_experiences = \App\Models\Experience::count();

        $admin_count = \App\Models\User::where('role', 'admin')->count();
        $user_count = \App\Models\User::where('role', 'user')->count();

        // Last 7 days registrations
        $chart_labels = [];
        $user_registrations = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chart_labels[] = $date->format('M d');
            $user_registrations[] = \App\Models\User::whereDate('created_at', $date->toDateString())->count();
        }

        $recent_users = \App\Models\User::latest()->take(5)->get();

        return view('Dashboard.adminDashboard', compact(
            'total_users',
            'active_portfolios',
            'total_skills',
            'total_experiences',
            'admin_count',
            'user_count',
            'chart_labels',
            'user_registrations',
            'recent_users'
        ));
    }
}