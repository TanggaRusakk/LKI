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
    public function show($id)
    {
        $service = Service::findOrFail($id);

        // Paginate reviews for this service (5 per page), eager-load the user for each review
        $reviews = $service->reviews()->with('user')->latest()->paginate(5);

        return view('showservices', compact('service', 'reviews'));
    }
}
