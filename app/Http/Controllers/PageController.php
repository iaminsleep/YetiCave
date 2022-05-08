<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Carbon\Carbon; //use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index() {

        $lots = Lot::orderBy("id", "desc")->take(6)->get();

        return view('index', ['lots' => $lots]);
    }

    public function single($id) {

        Carbon::setLocale('ru');

        $lot = Lot::findOrFail($id);

        $current_date = Carbon::parse(date('Y-m-d H:i:s'));
        $end_date = Carbon::parse($lot->end_date);

        $timer = $end_date->diff($current_date)->format('%d:%H:%i:%s');

        return view('single-lot', ['lot' => $lot, 'timer' => $timer]);
    }

    public function signup() {
        return view('sign-up');
    }

    public function login() {
        return view('login');
    }

    public function addLot() {
        return view('add-lot');
    }

    public function profile() {
        Carbon::setLocale('ru');
        $user = Auth::user();
        $bets = $user->bets()->get();
        $css_status = [
            'winner' => 'rates__item--win',
            'end' => 'rates__item--end',
        ];
        return view('profile', ['id' => $user->id, 'bets' => $bets, 'status' => $css_status]);
    }
}
