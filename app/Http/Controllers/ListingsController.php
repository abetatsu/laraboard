<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Listing;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;
use JD\Cloudder\Facades\Cloudder;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        if( $request->has('keyword') )
        {
        $listings = Listing::where('title', 'like', '%' . $keyword . '%' )->get();

        } elseif($request->has('userName')) {
        
        $user = User::firstWhere('name', $request->get('userName'));
        $listings = Listing::where('user_id', $user->id)->get();
        
        } else {

        $listings = Listing::limit(30)
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
        $validator = Validator::make($request->all(), ['title_name' => 'required|max:255', 'image' => 'mimes:jpeg,jpg,png,gif|max:10240',]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listing = new Listing;
        $listing->title = $request->title_name;
        $listing->user_id = Auth::user()->id;

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 100,
                'height'    => 100
            ]);
            $listing->image_path = $logoUrl;
            $listing->public_id  = $publicId;
        }

        $listing->save();

        return redirect('/');
    }

    public function edit($listing_id)
    {
        $listing = Listing::find($listing_id);

        return view('listing.edit', ['listing' => $listing]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['title_name' => 'required|max:255', 'image' => 'mimes:jpeg,jpg,png,gif|max:10240',]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listing = Listing::find($request->id);
        $listing->title = $request->title_name;
        $newListingTitle = $listing->title;

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 100,
                'height'    => 100
            ]);
            $listing->image_path = $logoUrl;
            $listing->public_id  = $publicId;
        }

        $listing->save();

        return redirect('/')->with('flash_message', '『' . $newListingTitle . '』' . 'が更新されました');
    }

    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $title = $listing->title;

        if(isset($listing->public_id)) {
            Cloudder::destroyImage($listing->public_id);
        }

        $listing->delete();

        return redirect('/')->with('flash_message', 'リスト名：『' . $title . '』が削除されました');
    }
}
