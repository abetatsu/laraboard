<?php

namespace App\Http\Controllers;

use App\Card;
use App\Listing;
use Validator;
use Auth;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new($listing_id)
    {
        return view('card.new', ['listing_id' => $listing_id]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['task_name' => 'required|max:255']);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $cards = new Card;
        $cards->title = $request->task_name;
        $cards->listing_id = $request->listing_id;
        $cards->save();

        return redirect('/');
    }

    public function show($listing_id, $card_id)
    {
        $listing = Listing::find($listing_id);
        $card = Card::find($card_id);

        return view('card.show', ['listing' => $listing, 'card' => $card]);
    }

    public function edit($listing_id, $card_id)
    {
        $listings = Listing::where('user_id', Auth::user()->id)->get();
        $listing = Listing::find($listing_id);
        $card = Card::find($card_id);
          
        return view('card.edit', ['listings' => $listings, 'listing' => $listing, 'card' => $card]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['new_task_name' => 'required|max:255']);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $card = Card::find($request->id);
        $card->title = $request->new_task_name;
        $card->listing_id = $request->listing_id;
        $card->save();

        return redirect('/');
    }

    public function destroy($listing_id, $card_id)
    {
        $card = Card::find($card_id);
        $card->delete();


        return redirect('/');
    }
}