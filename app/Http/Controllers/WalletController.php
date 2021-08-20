<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
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

    public function coinWallet($walletId)
    {
        $wallet = Wallet::find($walletId);
        $deposit_balance = Deposit::where('wallet_id', $walletId)
            ->groupBy('wallet_id')
            ->selectRaw('sum(amount) as deposit_balance')
            ->pluck('deposit_balance')
            ->first();
        return view('wallet/coin', ['wallet' => $wallet, 'deposit_balance'=>$deposit_balance]);
    }
}
