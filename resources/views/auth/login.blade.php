<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EscrowBear') }}</title>

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
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="" class="logo-link">
                            <h2 class="logo">Terra Wallet</h2>
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Sign-In</h4>
                                    <div class="nk-block-des">
                                        <p>Access the CryptoLite panel using your email and passcode.</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email or Username</label>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" id="email" name="email"
                                           placeholder="Enter your email address or username">

                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Passcode</label>
                                        <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot
                                            Code?</a>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch"
                                           data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="password"
                                               name="password" placeholder="Enter your passcode">
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first() }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary btn-block">Sign in</button>
                                </div>
                            </form>
                            <div class="form-note-s2 pt-4"> New on our platform? <a
                                    href="{{route('register')}}">Create an account</a>
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
                                    <img class="round" src="{{asset_url('dashlite/images/slides/promo-a.png')}}"
                                         srcset="
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
