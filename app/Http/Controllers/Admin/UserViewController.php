<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        $wallets = Wallet::where('user_id', $user_id)->get();
        return view('admin/usermanage/userview', ['user' => $user, 'wallets' => $wallets]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success', "Successfully Changed Password");
    }

    public function fund(Request $request)
    {
        $wallet = Wallet::find($request->wallet_id);
        $wallet->balance = $wallet->balance + $request->balance;
        $wallet->save();
        return redirect()->back()->with('success', "Successfully Funded");
    }
    public function deposit(Request $request)
    {
        $wallet = Deposit::create([
            'user_id'=>$request->user_id,
            'wallet_id'=>$request->wallet_id,
            'amount'=>$request->deposit_balance
        ]);
        return redirect()->back()->with('success', "Successfully Deposited");
    }

    public function security()
    {
        $user = Auth::user();
        return view('dashboard/profile/security', ['user' => $user]);
    }


    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', "Successfully Changed Password");
    }


}
