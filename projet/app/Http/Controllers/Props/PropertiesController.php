<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Prop\HomeType;
use App\Models\Prop\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    // La méthode index() sans paramètre, qui ne fait que récupérer les propriétés
    public function index()
    {
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();

        // Récupérer les types de maisons
        $homeTypes = HomeType::all();

        // Récupérer les villes distinctes
        $cities = Property::select('city')->distinct()->get();

        // Retourner la vue avec les propriétés
        return view('home', compact('props', 'homeTypes', 'cities'));
    }

    // Nouvelle méthode pour gérer le filtrage
  
 // searching for props

 public function searchProps(Request $request)
 {
     $request->validate([
        'home_type' => 'required',
        //'type' => 'required',
       //  'city' => 'required',
     ]);

     $home_type = $request->input('home_type');
    // $type = $request->input('type');
     //$city = $request->input('city');

     /* $searches = Property::where('home_type', 'like', "%$home_type%")
         ->where('type', 'like', "%$type%")
         ->where('city', 'like', "%$city%")
         ->get(); */

         $searches = Property::where('home_type', 'like', "%$home_type%")
        // ->where('home_type', 'like', "%$home_type%")
         ->get();

     return view('props.searches', compact('searches'));
 }
 
}
