<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \CoinMarketCapApi;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $wallets = Wallet::where('user_id', $user->id)
            ->orderby('balance')->get();
        return view('wallet/index')
            ->with('wallets', $wallets);
    }

    public function coinWallet(Request $request)
    {

        $coin_symbol = $request->coin;

        return view('wallet/coin', ['coin_symbol' => $coin_symbol]);
    }
}
