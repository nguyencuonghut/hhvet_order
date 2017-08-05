<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getSignup() {
        return view('users.signup');
    }

    public function postSignup(Request $request) {
        // Validate the input
        $this->validate($request, array(
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ));

        //store user information to database
        $user = new User([
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        $user->save();

        Auth::login($user);

        // redirect to other page
        return redirect()->route('user.profile');
    }

    public function getSignin(){
        return view('users.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, array(
            'email'     => 'email|required',
            'password'  => 'required|min:6'
        ));

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.profile')->with('message', 'Bạn đã đăng nhập thành công!');
        }
        return redirect()->back();
    }

    public function getProfile() {
        return view('users.profile');
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->back()->with('mesage', 'Bạn đã đăng xuất thành công!');
    }
}
