<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Display reviews on homepage
    public function index()
    {
        $reviews = Review::approved()
            ->featured()
            ->latest()
            ->limit(6)
            ->get();

        // Get active skills grouped by category
        $skills = \App\Models\Skill::active()->ordered()->get()->groupBy('category');

        // Get active projects
        $projects = \App\Models\Project::active()->ordered()->get();

        return view('portfolio', compact('reviews', 'skills', 'projects'));
    }

    // PUBLIC: Submit a review from frontend
    public function submitReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Remove email from array (we don't store it)
        unset($validated['email']);

        // Create review with approval pending
        Review::create(array_merge($validated, [
            'is_approved' => false,
            'is_featured' => false
        ]));

        return redirect()->back()->with('success', 'Thank you for your review! It will be published after approval.');
    }

    // Admin - List all reviews
    public function adminIndex()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    // Admin - Create review form
    public function create()
    {
        return view('admin.reviews.create');
    }

    // Admin - Store new review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        Review::create($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully');
    }

    // Admin - Edit review form
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    // Admin - Update review
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully');
    }

    // Admin - Delete review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }

    // Admin - Toggle approval
    public function toggleApproval(Review $review)
    {
        $review->update(['is_approved' => !$review->is_approved]);
        return redirect()->back()->with('success', 'Review status updated');
    }

    // Admin - Toggle featured
    public function toggleFeatured(Review $review)
    {
        $review->update(['is_featured' => !$review->is_featured]);
        return redirect()->back()->with('success', 'Review featured status updated');
    }

    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }
}
