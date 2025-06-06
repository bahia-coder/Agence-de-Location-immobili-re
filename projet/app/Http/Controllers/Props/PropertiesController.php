<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Prop\AllRequest;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\Prop\SavedProp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class PropertiesController extends Controller
{
    public function index()
{
    $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
    $reviews = Review::with('user')->latest()->get();

    // Retourne la vue avec les propriétés et les avis
    return view('home', compact('props', 'reviews'));
}


    public function single($id)
    {
        $singleProp = Property::find($id);
        $propImages = PropImage::where('prop_id', $id)->get();
        $props = Property::take(9)->orderBy('created_at', 'desc')->get();

        // Initialize variables
        $validateFormCount = 0; // default value
        $validateSavingPropsCount = 0; // default value

        // related props
        $relatedProps = Property::where('home_type', $singleProp->home_type)
            ->where('id', '!=', $id)
            ->take(3)
            ->orderBy('created_at', 'desc')
            ->get();

        // validating form request
        if (auth()->user()) {
            if (Auth::check()) {
                // Check if the user is authenticated
                $validateFormCount = AllRequest::where('prop_id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->count();
            }

            // validating saving properties
            $validateSavingPropsCount = SavedProp::where('prop_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();
        }

        return view('props.single', compact('singleProp', 'props', 'propImages', 'relatedProps', 'validateFormCount', 'validateSavingPropsCount'));
    }




public function priceAsc()
{
    $props = Property::orderBy('price', 'asc')->get();
    $reviews = Review::with('user')->latest()->take(6)->get(); // <-- adapter selon ton besoin
    return view('home', compact('props', 'reviews'));
}


//price descendant
public function priceDesc()
{
        $propsByPriceDesc = Property::select()->orderBy('price', 'desc')->get();

        return view('props.propspricedesc', compact('propsByPriceDesc'));
}





    public function insertRequests(Request $request)
    {

        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:70',
            'phone' => 'required|max:50',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 40 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email field must not exceed 70 characters.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone field must not exceed 50 characters.',
        ]);


        $insertRequest = AllRequest::create([
            'user_id' => Auth::user()->id,
            'prop_id' => $request->prop_id,
            'agent_name' => $request->agent_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($insertRequest) {
            return redirect('/props/prop-details/' . $request->prop_id . '')->with('success', 'Request added successfully');
        }
    }
public function saveProps(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $saveProp = SavedProp::create([
                'user_id' => Auth::user()->id,
                'prop_id' => $request->prop_id,
                'title' => $request->title,
                'image' => $request->image,
                'location' => $request->location,
                'price' => $request->price,
            ]);

            if ($saveProp) {
                return redirect('/props/save-props/' . $request->prop_id)->with('save', 'Property saved successfully');
            }
        } elseif ($request->isMethod('get')) {

            $singleProp = Property::find($id);
            $propImages = PropImage::where('prop_id', $id)->get();
            $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
            $relatedProps = Property::where('home_type', $singleProp->home_type)
                ->where('id', '!=', $id)
                ->take(3)
                ->orderBy('created_at', 'desc')
                ->get();

            if (Auth::check()) {
                // Check if the user is authenticated
                $validateFormCount = SavedProp::where('prop_id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->count();
            } else {
                // Handle the case where the user is not authenticated
                $validateFormCount = 0; // or any other default value or logic
            }

            $validateSavingPropsCount = SavedProp::where('prop_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();

            // Return the view with the form
            return view('props.single', compact('singleProp', 'propImages', 'props', 'relatedProps', 'validateFormCount', 'validateSavingPropsCount'));
        }

        // Handle other cases or show an error message
        return redirect()->back()->with('error', 'Invalid request method');


    }


    public function propsBuy()
    {
        $type = "Buy";
        $propsbuys = Property::where('type', $type)->get();

        return view('props.propsbuy', compact('propsbuys'));
    }


     // searching for props

     public function searchProps(Request $request)
     {
         // Plus de validation "required", car les champs peuvent être vides (donc "All")
         $request->validate([
             'home_type' => 'nullable|string',
             'type' => 'nullable|string',
             'city' => 'nullable|string',
         ]);

         // Récupération des valeurs
         $homeType = $request->input('home_type');
         $type = $request->input('type');
         $city = $request->input('city');

         // Construction dynamique de la requête
         $query = DB::table('properties');

         if (!empty($homeType)) {
             $query->where('home_type', 'like', "%$homeType%");
         }

         if (!empty($type)) {
             $query->where('type', 'like', "%$type%");
         }

         if (!empty($city)) {
             $query->where('city', 'like', "%$city%");
         }

         $searches = $query->get();

         // Retourner la vue avec les résultats
         return view('props.searches', compact('searches'));

     }

       public function propsRent()
    {
        $type = "Rent";
        $propsrents = Property::where('type', $type)->get();

        return view('props.propsrent1', compact('propsrents'));
    }



     public function propsR()
    {
        $type = "Rent";
        $propsrents = Property::where('type', $type)->get();

        return view('props.propsrent1', compact('propsrents'));
    }














}

