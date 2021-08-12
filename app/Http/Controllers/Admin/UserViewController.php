<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user_id)
    {
        $user = User::find($user_id);
        return view('admin/usermanage/userview', ['user' => $user]);
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success',"Successfully Changed Password");
    }

    public function security()
    {
        $user = Auth::user();
        return view('dashboard/profile/security', ['user' => $user]);
    }


    public function changePassword(Request $request){
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success',"Successfully Changed Password");
    }


}
