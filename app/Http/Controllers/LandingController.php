<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category')->latest()->take(6)->get(); // ambil 6 terbaru
        return view('open', compact('jobs'));
    }
}
