<?php

namespace App\Http\Controllers;

use App\Models\SavedDesigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class SavedDesignsController extends Controller
{
    // Store a new design
    public function store(Request $request)
    {
        try {
            // Decode JSON string into an array
            $decodedCanvasData = json_decode($request->input('canvasData'), true);
    
            // Now validate as an array
            $validated = validator(['canvasData' => $decodedCanvasData], [
                'canvasData' => 'required|array',
            ])->validate();
    
            $design = SavedDesigns::create([
                //'user_id' => auth()->id(),
                'user_id' => 1,
                'canvasData' => $validated['canvasData'], // Save as array or encode if needed
            ]);
    
            return response()->json([
                'message' => 'Shape added successfully!',
                'data' => $design
            ], 201);
    
        } catch (\Exception $e) {
            Log::error('Error storing design: ' . $e->getMessage());
    
            return response()->json([
                'error' => 'Unable to add design. Please try again.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    

    public function update(Request $request, $id)
    {
        try {
            // Find the texture by ID
            $design = SavedDesigns::findOrFail($id);

            // Validate the request data, ignoring 'image' if it’s not provided
            $validatedData = $request->validate([
                'canvasData' => 'required|array',
            ]);

            // Update the texture in the database
            $design->update($validatedData);

            // Return JSON response for AJAX
            return response()->json([
                'message' => 'Design updated successfully!',
                'data' => $design
            ], 200);

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating design: ' . $e->getMessage());

            // Return a JSON response with error details
            return response()->json([
                'error' => 'Unable to update design. Please try again.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Find the texture by ID
            $shape = SavedDesigns::findOrFail($id);
            
            // Soft delete the texture
            $shape->delete(); // This will set the 'deleted_at' column
            
            return response()->json(['message' => 'Design deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete design.'], 500);
        }
    }
}

