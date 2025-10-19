<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        // Ambil semua data lamaran dengan relasi user dan job
        $applications = JobApplication::with(['user', 'job'])->latest()->paginate(10);

        return view('admin.applications.index', compact('applications'));
    }

    public function show(JobApplication $application)
    {
        $application->load(['user', 'job']);
        return view('admin.applications.show', compact('application'));
    }
}
