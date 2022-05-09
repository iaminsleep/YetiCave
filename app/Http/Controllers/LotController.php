<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use App\Models\Bet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller {
    public function searchByCategory($id) {
        $category = Category::findOrFail($id);
        $lots = $category->lots;
        return view('search', ['category' => $category->title, 'lots' => $lots]);
    }

    public function search(Request $request) {
        $search = trim($request->search);

        //$lots = Lot::where('title', 'LIKE', "%$search%")->get();
        $lots = Lot::whereRaw('MATCH (title, description) AGAINST (?)', [$search])->get();

        return view('search', ['search' => $search, 'lots' => $lots]);
    }

    public function addLot(Request $request) {
        $lotData = $request->except('_token');

        $validator = Validator::make($lotData, [
            'lot-name' => 'required',
            'category' => 'required',
            'message' => 'required',
            'lot-img' => 'required|mimes:png,jpeg',
            'lot-rate' => 'required|min:1',
            'lot-step' => 'required|min:1',
            'lot-date' => 'required|date|after:tomorrow',
        ]);

        if($validator->fails()) {
            return redirect(route('add-lot-page'))
            ->withErrors($validator)
            ->withInput();
        }

        $lot = new Lot();
        $lot->title = request('lot-name');
        $lot->category_id = request('category');
        $lot->author_id = Auth::user()->id;
        $lot->description = request('message');
        $lot->price = request('lot-rate');
        $lot->bet_step = request('lot-step');
        $lot->creation_date = Carbon::now()->timezone('Europe/Moscow');
        $lot->end_date = request('lot-date');
        $lot->url = request()->file('lot-img')->store('img/lots');

        $lot->save();

        return redirect(route('lot-page', ['id' => $lot->id]));
    }
}
