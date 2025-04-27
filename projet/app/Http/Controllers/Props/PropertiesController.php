<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Prop\AllRequest;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\Prop\SavedProp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    public function index()
    {
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        // dd($props);
        return view('home', compact('props'));
    }
}
