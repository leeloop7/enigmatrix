<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Project;
use App\Models\Customer;
use App\Models\JobDesc;
use App\Models\User;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function suggestion() {

         $suggestions = Suggestion::all();
         return view('suggestion')->with('suggestions', $suggestions);

    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);

    $suggestion = new Suggestion;
    $suggestion->user_id = auth()->id();
    $suggestion->title = $validatedData['title'];
    $suggestion->description = $validatedData['description'];
    $suggestion->solved = false;
    $suggestion->input_date = now();
    $suggestion->save();

    return redirect()->back()
        ->with('success', 'Suggestion created successfully.');
}

}
