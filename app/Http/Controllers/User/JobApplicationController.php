<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function show(Job $job)
    {
        return view('user.jobs.show', compact('job'));
    }

    // Form apply
    public function create(Job $job)
    {
        return view('user.jobs.apply', compact('job'));
    }

    // Simpan lamaran
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'age' => 'required|integer|min:18',
            'marital_status' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'job_expectation' => 'nullable|string',
            'cv' => 'required|mimes:pdf|max:2048',
            'photo' => 'required|image|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('cv', 'public');
        $photoPath = $request->file('photo')->store('photos', 'public');

        JobApplication::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'full_name' => auth()->user()->name,
            'age' => $request->age,
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,
            'address' => $request->address,
            'job_expectation' => $request->job_expectation,
            'cv_path' => $cvPath,
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Lamaran berhasil dikirim!');
    }
}
