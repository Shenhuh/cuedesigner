<?php

namespace App\Http\Controllers;

use App\Models\Wrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WrapController extends Controller
{
    
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|unique:textures|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Image validation
                'material_type' => 'required|string',
                'price' => 'required|numeric|min:0',
            ]);

            // Handle the image upload
            if ($request->hasFile('image')) {
                // Store the image in the 'textures' directory on the 'public' disk
                $imagePath = $request->file('image')->store('wraps', 'public');
                $validatedData['imagePath'] = $imagePath; // Assign the path to validated data
            }

            // Store the texture in the database
            $texture = Wrap::create($validatedData);

            // Return JSON response for AJAX
            return response()->json([
                'message' => 'Wrap added successfully!',
                'data' => $texture // Return the created texture object
            ], 201);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error storing texture: ' . $e->getMessage());

            // Return a JSON response with error details
            return response()->json([
                'error' => 'Unable to add texture. Please try again.',
                'details' => $e->getMessage() // Optionally include error message for debugging
            ], 500);
        }
    }
}
