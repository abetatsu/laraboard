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
    
    public function index(Request $request)
    {
        if( $request->has('keyword') )
        {
        $listings = Listing::where('title', 'like', '%' . $request->get('keyword') . '%' )->get();

        } else {
        
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        }

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

        return redirect('/')->with('');
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
        $oldListingTitle = $listing->title;
        $listing->title = $request->title_name;
        $newListingTitle = $listing->title;
        $listing->save();

        return redirect('/')->with('flash_message', '『' . $oldListingTitle . '』が『' . $newListingTitle . '』' . 'に更新されました');
    }

    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $title = $listing->title;
        $listing->delete();

        return redirect('/')->with('flash_message', 'リスト名：' . $title . 'が削除されました');
    }
}
