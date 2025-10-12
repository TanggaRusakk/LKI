<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wood;

class WoodController extends Controller
{
    public function index()
    {
        $woods = Wood::all();
        return view('woods', compact('woods'));
    }
}
