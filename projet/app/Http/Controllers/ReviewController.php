<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'comment' => 'required|string',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);

    Review::create([
        'user_id' => auth()->id(),
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);

    return redirect()->back()->with('success', 'Merci pour votre avis !');
}
public function monAvis()
{
    $user = Auth::user();
    $review = Review::where('user_id', $user->id)->first();

    return view('reviews.monavis', compact('review'));
}
// app/Http/Controllers/ReviewController.php

public function edit($id)
{
    $review = Review::findOrFail($id);
    return view('reviews.edit', compact('review'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);

    $review = Review::findOrFail($id);
    $review->update([
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);

    return redirect()->route('monavis')->with('success', 'Votre avis a été mis à jour.');
}

}
