<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;

use Illuminate\Http\Request;

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
}
