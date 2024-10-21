<?php
namespace App\Http\Controllers;

use App\Models\Texture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TextureController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:textures|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Image validation
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('textures', 'public');
            $validatedData['imagePath'] = $imagePath;
        }
    
        // Store the texture in the database
        Texture::create($validatedData);
    
        // Return JSON response for AJAX
        return response()->json(['message' => 'Texture added successfully!'], 201);
    }
    
}
