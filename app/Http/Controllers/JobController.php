<?php
// app/Http/Controllers/JobController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function create()
    {
        return view('jobs.addJob');
    }

    public function store(Request $request)
{
    // Validate and save the job data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255', // Name of the job
        'img' => 'nullable|file|image|max:2048', // Logo (image file)
        'area' => 'required|string|max:255', // Area
        'language' => 'required|string', // Required language
        'experience' => 'required|string', // Experience
        'salary' => 'nullable|string', // Salary
        'position' => 'nullable|string', // Position
        'description' => 'nullable|string', // Job description
        'address' => 'nullable|string', // Job location address
        'worktime' => 'required|string', // Working hours
        'availableApply' => 'nullable|string', // Application availability
        'benefits' => 'nullable|string', // Benefits
    ]);

    // Process and store the image file if it exists

    if ($request->hasFile('img')) {
        $imagePath = $request->file('img')->store('job_images', 'public');
        $validatedData['img'] = $imagePath;}
        

    // Create a new ApplyJob record in the database
    Job::create($validatedData);

    // Redirect back to the job creation page with a success message
    return redirect()->route('jobs.create')->with('status', 'Job added successfully');

}

}

