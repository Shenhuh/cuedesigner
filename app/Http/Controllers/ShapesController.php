<?php

namespace App\Http\Controllers;

use App\Models\Shapes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ShapesController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|unique:textures|max:255',
                'polygonData' => 'required|string|max:2048',
                'price' => 'required|numeric|min:0',
            ]);

       

            // Store the texture in the database
            $texture = Shapes::create($validatedData);

            // Return JSON response for AJAX
            return response()->json([
                'message' => 'Shape added successfully!',
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
            $shape = Shapes::findOrFail($id);

            // Validate the request data, ignoring 'image' if it’s not provided
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:textures,name,' . $id,
                'polygonData' => 'required|string|max:2048',
                'price' => 'required|numeric|min:0',
            ]);

            // Update the texture in the database
            $shape->update($validatedData);

            // Return JSON response for AJAX
            return response()->json([
                'message' => 'Shape updated successfully!',
                'data' => $shape
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
            $shape = Shapes::findOrFail($id);
            
            // Soft delete the texture
            $shape->delete(); // This will set the 'deleted_at' column
            
            return response()->json(['message' => 'Shape deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete texture.'], 500);
        }
    }
}
