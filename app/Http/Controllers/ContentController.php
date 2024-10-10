<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getDynamicContent($type)
    {
        // Return a different view based on the type parameter
        if ($type === 'content1') {
            return view('dynamic-content1'); // View for the first content
        } elseif ($type === 'content2') {
            return view('dynamic-content2'); // View for the second content
        }

        return response()->json(['error' => 'Content not found'], 404);
    }
}
