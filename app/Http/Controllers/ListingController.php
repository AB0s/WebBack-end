<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show All listings
    public function index(Request $request){
        return view('listings.index', [
            'listings'=> Listing::all()
        ]);
    }
    //Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    //Show Create Form
    public function create(){
        return view('listings.create');
    }
    //Store Listing data
    public function store(Request $request){
        $formFields = $request->validate([
           'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' =>
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        return redirect('/');
    }
}

