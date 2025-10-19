<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $categories = Category::with('jobs')->get();
        $jobs = Job::with('category')->latest()->take(6)->get();
        return view('user.lowongan', compact('categories', 'jobs'));
    }

    public function show(Job $job)
    {
        return view('user.jobs.show', compact('job'));
    }

    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'umur' => 'required|numeric|min:17',
            'status_perkawinan' => 'required|string',
            'gender' => 'required|string',
            'alamat' => 'required|string',
            'harapan' => 'required|string',
            'cv' => 'required|mimes:pdf|max:2048',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('cv', 'public');
        $fotoPath = $request->file('foto')->store('foto', 'public');

        $job->applications()->create([
            'user_id' => auth()->id(),
            'umur' => $request->umur,
            'status_perkawinan' => $request->status_perkawinan,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'harapan' => $request->harapan,
            'cv' => $cvPath,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('user.jobs.show', $job)->with('success', 'Lamaran berhasil dikirim!');
    }
}
