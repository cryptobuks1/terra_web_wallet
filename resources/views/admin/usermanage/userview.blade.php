@extends('layouts.app')

@section('content')
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <!-- NK-Block @s -->
            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Personal Information</h5>
                            <div class="nk-block-des">
                                <p>Basic info, like your name and address, that you use on Terra Platform.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="{{url('admin')}}"
                               class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="{{url('admin')}}"
                               class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                    class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Basics</h6>
                    </div>
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">First Name</span>
                            <span class="data-value">{{$user->first_name}}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">First Name</span>
                            <span class="data-value">{{$user->last_name}}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Email</span>
                            <span class="data-value">{{$user->email}}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more disable"><em
                                    class="icon ni ni-lock-alt"></em></span></div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Address</span>
                            <span class="data-value text-soft">{{$user->address}}</span>
                        </div>
                        <div class="data-col data-col-end"><span class="data-more"><em
                                    class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- .data-item -->
                </div><!-- .nk-data -->
            </div>
            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">User's Wallet</h5>
                            <div class="nk-block-des">
                                <p>Basic info, like your name and address, that you use on Terra Platform.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="row g-gs">
                    @if(count($wallets) > 0)
                        @foreach($wallets as $wallet)
                            <div class="col-sm-6 col-lg-4 col-xl-6 col-xxl-4">
                                <div class="card card-bordered">
                                    <div class="nk-wgw">
                                        <div class="nk-wgw-inner">
                                            <a class="nk-wgw-name" href="{{url('wallet/'.$wallet->id)}}">
                                                <div class="nk-wgw-icon">
                                                    <em class="icon ni ni-coins"></em>
                                                </div>
                                                <h5 class="nk-wgw-title title">Terra Wallet</h5>
                                            </a>
                                            <div class="nk-wgw-balance">
                                                <div class="amount">{{$wallet->balance}}<span
                                                        class="currency currency-btc">{{$wallet->symbol}}</span></div>
                                            </div>
                                        </div>
                                        <div class="nk-wgw-actions">
                                            <ul>
                                                <li><a href="#"><em class="icon ni ni-arrow-up-right"></em>
                                                        <span>Send</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-arrow-down-left"></em><span>Receive</span></a>
                                                </li>
                                                <li><a href="#"><em class="icon ni ni-arrow-to-right"></em><span>Withdraw</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nk-wgw-more dropdown">
                                            <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                                    class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                <ul class="link-list-plain sm">
                                                    <li><a href="{{url('wallet/'.$wallet->id)}}">Details</a></li>
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                    <li><a href="#">Make Default</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        @endforeach
                    @endif
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-bordered dashed h-100">
                            <div class="nk-wgw-add">
                                <div class="nk-wgw-inner">
                                    <a href="#">
                                        <div class="add-icon">
                                            <em class="icon ni ni-plus"></em>
                                        </div>
                                        <h6 class="title">Add New Wallet</h6>
                                    </a>
                                    <span class="sub-text">You can add your more wallet in your account to manage separetly.</span>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Personal Information</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form method="post" action="{{url('admin/user_update')}}">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">First Name</label>
                                            <input type="text" class="form-control form-control-lg" name="first_name"
                                                   value="{{$user->first_name}}" placeholder="Enter First name">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Last Name</label>
                                            <input type="text" class="form-control form-control-lg" name="last_name"
                                                   value="{{$user->last_name}}" placeholder="Enter Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Email</label>
                                            <input type="text" class="form-control form-control-lg" id="email"
                                                   value="{{$user->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" class="form-control form-control-lg" name="address"
                                                   value="{{$user->address}}" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary">Update Profile
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
