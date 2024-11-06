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

    public function update(Request $request, $id)
    {
        try {
            // Find the texture by ID
            $wrap = Wrap::findOrFail($id);

            // Validate the request data, ignoring 'image' if it’s not provided
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:textures,name,' . $id,
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Image is nullable
                'material_type' => 'required|string',
                'price' => 'required|numeric|min:0',
            ]);

            // Check if an image was uploaded
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($wrap->imagePath) {
                    Storage::disk('public')->delete($wrap->imagePath);
                }

                // Store the new image and update the image path in validated data
                $validatedData['imagePath'] = $request->file('image')->store('wraps', 'public');
            } else {
                // Keep the existing image path if no new image is uploaded
                $validatedData['imagePath'] = $wrap->imagePath;
            }

            // Update the texture in the database
            $wrap->update($validatedData);

            // Return JSON response for AJAX
            return response()->json([
                'message' => 'Wrap updated successfully!',
                'data' => $wrap
            ], 200);

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating texture: ' . $e->getMessage());

            // Return a JSON response with error details
            return response()->json([
                'error' => 'Unable to update texture. Please try again.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Find the texture by ID
            $wrap = Wrap::findOrFail($id);
            
            // Soft delete the texture
            $wrap->delete(); // This will set the 'deleted_at' column
            
            return response()->json(['message' => 'Wrap deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete texture.'], 500);
        }
    }
}
