<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function signup(Request $request) {
        $userData = $request->all();
        $validator = Validator::make($userData, [
            'email' => 'required|unique:users|email:rfc,dns,filter',
            'name' => 'required',
            'password' => 'required',
            'message' => 'required',
        ]);

        if($validator->fails()) {
            return redirect(route('signup-page'))
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();

        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->contacts = $userData['message'];

        $user->save();

        return redirect(route('main-page'));
    }
}
