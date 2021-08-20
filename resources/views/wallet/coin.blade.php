@extends('layouts.app')

@section('content')
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between-md">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('wallet-index')}}"><em
                                    class="icon ni ni-arrow-left"></em><span>My Wallets</span></a></div>
                        <div class="nk-wgwh">
                            <em class="icon-circle icon-circle-lg icon ni ni-coins"></em>
                            <div class="nk-wgwh-title h5"> Terra Wallet <small>/</small>
                                <div class="dropdown">
                                    <a class="dropdown-indicator-caret" data-offset="0,4" href="#"
                                       data-toggle="dropdown"><small>USD</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-content">
                        <div class="nk-wg1">
                            <div class="nk-wg1-group g-2">
                                <div class="nk-wg1-item mr-xl-4">
                                    <div class="nk-wg1-title text-soft">Address : {{$wallet->address}}</div>
                                </div>
                            </div>
                            <div class="nk-wg1-group g-2">
                                <div class="nk-wg1-item mr-xl-4">
                                    <div class="nk-wg1-title text-soft">DB Balance</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount">{{$wallet->balance}} <small
                                                class="currency currency-usd">{{$wallet->symbol}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->isAdmin())
                                <div class="nk-wg1-group g-2">
                                    <div class="nk-wg1-item mr-xl-4">
                                        <div class="nk-wg1-title text-soft">Terra Balance</div>
                                        <div class="nk-wg1-amount">
                                            <div class="amount"><span id="walletBalance">Calculating...</span>
                                                <small
                                                    class="currency currency-usd">{{$wallet->symbol}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div><!-- .nk-block-content -->
                    <div class="nk-block-content">
                        <ul class="nk-block-tools gx-3">
                            <li class="btn-wrap"><a href="#" class="btn btn-icon btn-xl btn-dim btn-outline-light"><em
                                        class="icon ni ni-arrow-up-right"></em></a><span class="btn-extext">Send</span>
                            </li>
                            <li class="btn-wrap"><a href="#" class="btn btn-icon btn-xl btn-dim btn-outline-light"><em
                                        class="icon ni ni-arrow-down-left"></em></a><span
                                    class="btn-extext">Recive</span></li>
                            @if(Auth::user()->isAdmin())
                                <li class="btn-wrap"><a href="#" class="btn btn-icon btn-xl btn-dark"
                                                        data-toggle="modal"
                                                        data-target="#wallet-fund"><em
                                            class="icon ni ni-plus"></em></a>
                                    <span class="btn-extext">Add Fund</span></li>
                                <li class="btn-wrap"><a href="#" class="btn btn-icon btn-xl btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#deposit-anchor"><em
                                            class="icon ni ni-arrow-to-right"></em></a><span
                                        class="btn-extext">Deposit to Anchor</span></li>
                                <li class="btn-wrap"><a href="#" class="btn btn-icon btn-xl btn-secondary"
                                                        data-toggle="modal"
                                                        data-target="#withdraw-anchor"><em
                                            class="icon ni ni-arrow-to-left"></em></a><span
                                        class="btn-extext">Withdraw from Anchor</span></li>
                            @endif
                        </ul>
                    </div><!-- .nk-block-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block -->
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">Total Fund</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"> 0.000000 <span
                                                    class="currency currency-btc">{{$wallet->symbol}}</span>
                                            </div>
                                            <div class="amount-sm"> 0.000000 <span
                                                    class="currency currency-usd">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <span class="text-soft">Last Send at <span class="text-base">19 Nov, 2019</span></span>
                                    </div>
                                </div><!-- .nk-wg5 -->
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">Total Deposit</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"> {{$deposit_balance}} <span
                                                    class="currency currency-btc">{{$wallet->symbol}}</span>
                                            </div>
                                            <div class="amount-sm"> 0.000000 <span
                                                    class="currency currency-usd">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <span class="text-soft">Last Receive at <span
                                                class="text-base">24 Nov, 2019</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">Total Withdraw</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"> 0.000000 <span
                                                    class="currency currency-btc">{{$wallet->symbol}}</span>
                                            </div>
                                            <div class="amount-sm"> 0.000000 <span
                                                    class="currency currency-usd">USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <span class="text-soft">Last Withdraw at <span
                                                class="text-base">27 Nov, 2019</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="wallet-fund">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Fund to Wallet</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form method="post" action="{{url('admin/user_fund')}}">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Balance to funds</label>
                                            <input type="number" step="0.000001" class="form-control form-control-lg"
                                                   name="balance"
                                                   placeholder="Enter balance">
                                            <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2 justify-content-end">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary">Fund
                                                </button>
                                            </li>
                                            <li>
                                                <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deposit-anchor">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Deposit to Anchor</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form method="post" action="{{url('admin/deposit_anchor')}}" id="depositForm">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Balance for Deposit</label>
                                            <input type="number" step="0.000001" class="form-control form-control-lg"
                                                   name="deposit_balance" id="deposit_balance"
                                                   placeholder="Enter balance">
                                            <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
                                            <input type="hidden" name="user_id" value="{{$wallet->user_id}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2 justify-content-end">
                                            <li>
                                                <button class="btn btn-lg btn-primary" id="depositBtn">
                                                    Deposit
                                                </button>
                                            </li>
                                            <li>
                                                <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="withdraw-anchor">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Withdraw from Anchor</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form method="post" action="{{url('admin/withdraw_anchor')}}" id="withdrawForm">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Balance for Withdraw</label>
                                            <input type="number" step="0.000001" class="form-control form-control-lg"
                                                   name="withdraw_balance" id="withdraw_balance"
                                                   placeholder="Enter balance">
                                            <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
                                            <input type="hidden" name="user_id" value="{{$wallet->user_id}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2 justify-content-end">
                                            <li>
                                                <button class="btn btn-lg btn-primary" id="withdrawBtn">
                                                    Withdraw
                                                </button>
                                            </li>
                                            <li>
                                                <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        const mnemonic = '{{$wallet->passphrase}}';
        const privateKey = '{{$wallet->private_key}}';
    </script>
    <script src="{{asset_url('js/wallet.js?ver=2.2.0')}}"></script>
@endsection
