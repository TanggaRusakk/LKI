<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of user's reviews.
     */
    public function index()
    {
        $reviews = Auth::user()->reviews()->latest()->paginate(10);
        return view('users.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     */
    public function create()
    {
        return view('users.reviews.create');
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        // Prevent admin users from creating reviews
        if (Auth::user() && Auth::user()->role === 'admin') {
            abort(403, 'Admins are not allowed to create reviews.');
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        // If no title provided, generate a short title from the comment
        if (empty($validated['title'])) {
            $validated['title'] = Str::limit(strip_tags($validated['comment']), 60);
        }

        // create review attached to authenticated user
        $review = Auth::user()->reviews()->create($validated);

        // Redirect back to the service show page so the user can see their review immediately
        return redirect()->route('services.show', $validated['service_id'])->with('success', 'Review created successfully!');
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit(Review $review)
    {
        // Ensure user can only edit their own reviews
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.reviews.edit', compact('review'));
    }

    /**
     * Update the specified review in storage.
     */
    public function update(Request $request, Review $review)
    {
        // Ensure user can only update their own reviews
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        // Ensure user can only delete their own reviews
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
