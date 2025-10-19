<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category')->latest()->paginate(10); // ambil semua job dengan kategori
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required',
            'description' => 'required',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(Job $job)
    {
        $categories = Category::all();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required',
            'description' => 'required',
        ]);

        $job->update($request->all());
        return redirect()->route('admin.jobs.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
