@extends('layout.master-auth')

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/authentication/auth_1.css') }}">
@endpush


@section('content')
    <!-- Main Body Starts -->
    <div class="login-one">
        <div class="container-fluid login-one-container">
            <div class="p-30 h-100" >
                <div class="row main-login-one h-100">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                    <form method="POST" action="{{ route('login') }}" class="h-100">
            @csrf

                    <div class="login-one-start">
                            <h6 class="mt-2 text-primary text-center font-20">se connecter</h6>
                            <p class="text-center text-muted mt-3 mb-3 font-14">veuillez saisir votre identifiant et mot de passe</p>
                            <div class="login-one-inputs mt-5">
                                <input id="email" type="text" required autofocus placeholder="email" name="email" />
                                <i class="las la-user-alt"></i>
                            </div>
                            <div class="login-one-inputs mt-3">
                                <input type="password" id="password"  name="password" required autocomplete="current-password"  placeholder="mode de pase"/>
                                <i class="las la-lock"></i>
                            </div>
                            
                            <div class="login-one-inputs mt-4">
                                <button class="ripple-button ripple-button-primary btn-lg btn-login" type="submit" >
                                    <div class="ripple-ripple js-ripple">
                                        <span class="ripple-ripple__circle"></span>
                                    </div>
                                    Connecter
                                </button>
                            </div>
                            <!-- <div class="login-one-inputs mt-4 text-center font-12 strong">
                                <a href="{{url('/authentications/style1/forgot-password')}}" class="text-primary">{{__('Forgot your Password ?')}}</a>
                            </div> -->
                           
                        </div>
                    </form>

                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                        <div class="slider-half">
                            <div class="slide-content">
                                <div class="top-sign-up ">
                                    <!-- <div class="about-comp text-white mt-2">{{__('Neptune')}}</div>
                                    <div class="for-sign-up">
                                        <p class="text-white font-12 mt-2 font-weight-300">{{__('Don\'t have an account ?')}}</p>
                                        <a href="{{url('/authentications/style1/signup')}}">{{__('Sign Up')}}</a>
                                    </div> -->
                                </div>
                                <!-- <div class="clearfix"></div>
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <i class="lar la-grin-alt font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Start your journey')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                    <div class="item">
                                        <i class="lar la-clock font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Save your time')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                    <div class="item">
                                        <i class="las la-hand-holding-usd font-45 text-white"></i>
                                        <h2 class="font-30 text-white mt-2">{{__('Save your money')}}</h2>
                                        <p class="summary-count text-white font-12 mt-2 slide-text" >{{__('Everyone has been made for some particular work, and the desire for that work has been put in every heart')}}</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('assets/js/libs/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/authentication/auth_1.js') }}"></script>
@endpush
