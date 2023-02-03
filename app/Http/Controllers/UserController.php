<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function view()
    {
        $users = User::all();
        return view('user.users')->with('users',$users);
    }

    public function addUser()
    {
        $countries = Country::all();
        return view('user.userAdd')->with('countries', $countries);
    }

    public function fetchPlace(Request $request)
    {
        $places = Place::where("ctid",$request->ctid)->get();
        return response()->json ($places);
    }

    public function postaddUser(Request $rqst)
    {  
        $user = new User;
        $user->name = $rqst->name;
        $user->email = $rqst->email;
        $user->password = Hash::make($rqst->password);
        $user->phone = $rqst->phone;
        $imageName = time() . "_" . $rqst->file('image')->getClientOriginalName();
        $rqst->image->move(public_path('user_images'), $imageName);
        $user->image = $imageName;;
        $user->role = $rqst->role;
        $user->coid = $rqst->coid;
        $user->ctid = $rqst->ctid;
        $user->plid = $rqst->plid;
        $user->area = $rqst->area;
        $user->save();
        return redirect('/users');
    }

}
