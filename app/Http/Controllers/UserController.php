<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard()
    {
        $jobs = Job::with('category')->latest()->take(6)->get();
        return view('user.main', compact('jobs'));
    }

    public function tentang()
    {
        return view('user.tentang');
    }

    public function lowongan()
    {
        return view('user.lowongan');
    }

    public function mitra()
    {
        return view('user.mitra');
    }
}
