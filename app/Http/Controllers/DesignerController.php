<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clipart;
use App\Models\Texture;
use App\Models\Wrap;
use App\Models\Joint;
use App\Models\Wood;
class DesignerController extends Controller
{
    public function index()
    {
        $textures = Texture::all();
        $woods = Wood::all();
        $cliparts = Clipart::all();
        $wraps = Wrap::all();
        $joints = Joint::all();
        return view('designer', compact('textures', 'joints', 'wraps', 'woods', 'cliparts'));
    }


}
