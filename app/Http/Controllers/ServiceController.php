<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        // Get rating filter from request
        $ratingFilter = $request->input('rating');

        // Paginate reviews for this service (5 per page), eager-load the user for each review
        $reviews = $service->reviews()
            ->with('user')
            ->when($ratingFilter, function ($query, $ratingFilter) {
                return $query->where('rating', $ratingFilter);
            })
            ->latest()
            ->paginate(5)
            ->appends(['rating' => $ratingFilter]); // Keep rating parameter in pagination links

        return view('showservices', compact('service', 'reviews'));
    }
}
