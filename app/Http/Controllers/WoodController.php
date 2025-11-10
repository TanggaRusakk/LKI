<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wood;

class WoodController extends Controller
{
    public function index(Request $request)
    {
        // Get search queries
        $searchLocal = $request->input('search_local');
        $searchImport = $request->input('search_import');
        
        // Query for local woods 
        $localWoods = Wood::whereIn('origin', ['Indonesia', 'local'])
            ->when($searchLocal, function ($query, $searchLocal) {
                return $query->where(function($q) use ($searchLocal) {
                    $q->where('name', 'like', "%{$searchLocal}%")
                      ->orWhere('description', 'like', "%{$searchLocal}%")
                      ->orWhere('characteristics', 'like', "%{$searchLocal}%")
                      ->orWhere('uses', 'like', "%{$searchLocal}%");
                });
            })
            ->paginate(3, ['*'], 'local_page');
        
        // Query for imported woods 
        $importWoods = Wood::whereNotIn('origin', ['Indonesia', 'local'])
            ->when($searchImport, function ($query, $searchImport) {
                return $query->where(function($q) use ($searchImport) {
                    $q->where('name', 'like', "%{$searchImport}%")
                      ->orWhere('description', 'like', "%{$searchImport}%")
                      ->orWhere('characteristics', 'like', "%{$searchImport}%")
                      ->orWhere('uses', 'like', "%{$searchImport}%")
                      ->orWhere('origin', 'like', "%{$searchImport}%");
                });
            })
            ->paginate(3, ['*'], 'import_page');
        
        return view('woods', compact('localWoods', 'importWoods'));
    }
    
    public function show(Wood $wood)
    {
        return view('showwoods', compact('wood'));
    }
}
