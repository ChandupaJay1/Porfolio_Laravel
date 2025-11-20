<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_contacts' => Contact::count(),
            'unread_contacts' => Contact::unread()->count(),
            'total_reviews' => Review::count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
            'approved_reviews' => Review::where('is_approved', true)->count(),
            'total_projects' => Project::count(),
            'active_projects' => Project::where('is_active', true)->count(),
            'featured_projects' => Project::where('is_featured', true)->count(),
        ];

        $recent_contacts = Contact::orderBy('created_at', 'desc')->limit(5)->get();
        $recent_reviews = Review::orderBy('created_at', 'desc')->limit(5)->get();
        $recent_projects = Project::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_reviews', 'recent_projects'));
    }
}
