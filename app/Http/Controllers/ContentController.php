<?php

namespace App\Http\Controllers;

use App\Models\Clipart;
use App\Models\Texture;
use App\Models\Wrap;
use App\Models\Wood;
use App\Models\Joint;
use App\Models\Shapes;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getDynamicContent($type)
    {

        if ($type === 'dashboard') {
            return view('admin.partials.dashboard'); 
        } elseif ($type === 'orders') {
            return view('admin.partials.orders'); 
        } elseif ($type === 'designer-settings') {
            $textures = Texture::all();
            $cliparts = Clipart::all();
            $wraps = Wrap::all();
            $woods = Wood::all();
            $joints = Joint::all();
            $shapes = Shapes::all();
            return view('admin.partials.designer-settings', compact('textures', 'wraps', 'shapes', 'woods', 'joints', 'cliparts'));
        } elseif ($type === 'saved-designs') {
            return view('admin.partials.saved-designs');
        } elseif ($type === 'archives') {
            return view('admin.partials.archives'); 
        } elseif ($type === 'settings') {
            return view('admin.partials.settings'); 
        } elseif ($type === 'about') {
            return view('admin.partials.about'); 
        }

        return response()->json(['error' => 'Content not found'], 404);
    }
}
