<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    // Show the form to add a new business
    public function create()
    {
        return view('business.addBusiness');
    }

    // Process and store the new business
    public function store(Request $request)
    {
        // Validate incoming form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hotline' => 'nullable|string|max:20',
            'customer_mail' => 'required|email|max:255',
            'official_website' => 'nullable|url|max:255',
            'official_facebook' => 'nullable|url|max:255',
            'head_offices' => 'nullable|string|max:500',
            'progress' => 'nullable|string|max:500',
        ]);

        // Store the logo file if it exists and update the path in $validated data
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $logoPath;
        }

        // Create a new record in the businesses table
        Business::create($validated);

        // Redirect back to the form with a success message
        return redirect()->route('business.create')->with('status', 'Thêm công ty thành công!');
    }

    public function homeUser()
    {
        $businesses = Business::orderBy('id', 'desc')->take(10)->get();
        return view('users.homeUser', compact('businesses'));
    }
}
