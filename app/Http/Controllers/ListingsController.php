<?php

namespace App\Http\Controllers;

use Auth;
use App\Listing;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $listings = Listing::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'asc')
                ->get();

        return view('listing.index',['listings' => $listings]);
    }

    public function new()
    {
        return view('listing.new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title_name' => 'required|max:255' , ]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listings = new Listing;
        $listings->title = $request->title_name;
        $listings->user_id = Auth::user()->id;

        $listings->save();

        return redirect('/');
    }

    public function edit($listing_id)
    {
        $listing = Listing::find($listing_id);

        return view('listing.edit', ['listing' => $listing]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['title_name' => 'required|max:255', ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listing = Listing::find($request->id);
        $listing->title = $request->title_name;
        $listing->save();

        return redirect('/');
    }

    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $listing->delete();

        return redirect('/');
    }
}
