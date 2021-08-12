<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Escrowbear') }}</title>
    <link rel="shortcut icon" href="{{asset_url('favicon.ico')}}">

    <!-- Scripts -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset_url('dashlite/assets/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset_url('dashlite/assets/css/theme.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset_url('assets/css/custom.css?ver=2.2.0')}}">
    @yield('style')
</head>
<body class="nk-body npc-crypto has-sidebar">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <div class="nk-split nk-split-page nk-split-md">
            <!-- content @s -->
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                <div class="nk-block nk-block-middle nk-auth-body wide-md">
                    <div class="brand-logo pb-4 text-center">
                        <a href="" class="logo-link">
                            <h2 class="logo">Terra Wallet</h2>
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Register</h4>
                                    <div class="nk-block-des">
                                        <p>Create New Terra Wallet Account</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('register')}}" method="post" class="form-validate">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">First Name</label>
                                            <input type="text" class="form-control form-control-lg" id="first_name"
                                                   name="first_name"
                                                   placeholder="Enter your first name" required>
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-lg" id="last_name"
                                                   name="last_name"
                                                   placeholder="Enter your last name" required>
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email for Username</label>
                                            <input type="text" class="form-control form-control-lg" id="email" name="email"
                                                   placeholder="Enter your email address for username" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" class="form-control form-control-lg" id="address" name="address"
                                                   placeholder="Enter your Address " required>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch"
                                                   data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="password"
                                                       name="password" placeholder="Enter your passcode" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Passcode Confirm</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch"
                                                   data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="confirmed_password"
                                                       placeholder="Enter your passcode" name="password_confirmation" required>
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-control-xs custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox">
                                                <label class="custom-control-label" for="checkbox">I agree to Dashlite <a
                                                        href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary btn-block">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-note-s2 text-center pt-4"> Already have an account? <a
                                    href="{{route('login')}}"><strong>Sign in instead</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                    <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="{{asset_url('dashlite/images/slides/promo-a.png')}}" srcset="
                                         {{asset_url('dashlite//images/slides/promo-a2x.png')}} 2x" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>Terra Wallet</h4>
                                    <p>You can start to create your products easily with its user-friendly design & most
                                        completed responsive layout.</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="{{asset_url('dashlite/images/slides/promo-b.png')}}"
                                         srcset="{{asset_url('dashlite/images/slides/promo-b2x.png')}} 2x" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>Terra Wallet</h4>
                                    <p>You can start to create your products easily with its user-friendly design & most
                                        completed responsive layout.</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="{{asset_url('dashlite/images/slides/promo-c.png')}}"
                                         srcset="{{asset_url('dashlite/images/slides/promo-c2x.png')}} 2x" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>Terra Wallet</h4>
                                    <p>You can start to create your products easily with its user-friendly design & most
                                        completed responsive layout.</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                    </div><!-- .slider-init -->
                    <div class="slider-dots"></div>
                    <div class="slider-arrows"></div>
                </div><!-- .slider-wrap -->
            </div>
            <!-- wrap @e -->
        </div>
    </div>
</div>
<script src="{{asset_url('dashlite/assets/js/bundle.js?ver=2.2.0')}}"></script>
<script src="{{asset_url('dashlite/assets/js/scripts.js?ver=2.2.0')}}"></script>
</body>
</html>
