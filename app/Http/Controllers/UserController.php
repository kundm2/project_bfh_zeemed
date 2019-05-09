<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credential;
use App\Staff;
use App\StaffFunction;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $users = Staff::all()->sortBy('staffID');

        return view('page_user', [
            'users' => $users
        ]);
    }

    public function displayView($userID) {
        $user = Staff::findOrFail($userID);

        return view('page_user_view', [
            'user' => $user
        ]);
    }

    public function toIndex() {
        return redirect('users');
    }

    public function addNew(Request $request) {
        $this->validate($request, [
            'username'              => 'min:2|alpha-dash|unique:Staff',
            'name'                  => 'min:2|alpha-dash',
            'firstname'             => 'min:2|alpha-dash',
            'function'              => '',
            'password'              => 'min:6|required_with:pswrd_confirmation|same:pswrd_confirmation',
            'pswrd_confirmation'      => '',
            '*'                     => 'required'
        ]);

        $user = new Staff();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->first_name = $request->firstname;
        $user->fonctionID = $request->function;
        $user->save();

        $credential = new Credential();
        $credential->staffID = Staff::where('username', $request->username)->first()['staffID'];
        $credential->hashed_password = bcrypt($request->password);
        $credential->hashed_nfctag = '';
        $credential->save();

        return redirect( '/users' );
    }

    public function displayAdd() {
        $functions = StaffFunction::all();
        return view('page_user_add', [
            'functions' => $functions
        ]);
    }


//  Profile
    public function profile() {
        $id = 1;
        $user = Staff::findOrFail($id);
        return view('page_profile', [
            'user' => $user
        ]);
    }

}
