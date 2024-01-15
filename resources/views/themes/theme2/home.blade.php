<!doctype html>
<html lang="{{ lang() }}" dir="{{direction()}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{$site->title}}</title>
    <meta name="keywords" content=" {{$site->about_title}}">
    <meta name="description" content=" {{$site->about_title}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/animate.min.css')}}">
    <!-- Magnific CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/magnific-popup.css')}}">
    <!-- Line Awesome CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/line-awesome.min.css')}}">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/odometer.css')}}">
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/style.css')}}">
    <!-- Stylesheet Responsive CSS -->
    <link rel="stylesheet" href="{{asset('landing_page/assets/css/responsive.css')}}">

    <!-- Favicon -->
    <link rel="icon" type="images/png" href="{{asset('img/logo.png')}}">
    <!-- Title -->
    <title>   {{$site->title}}</title>
</head>

    <body data-spy="scroll" data-offset="70">
    <!-- Preloader -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-hourglass"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Nabvar Area -->
    <nav class="navbar fixed-top navbar-expand-lg main-navbar app-nav">
        <div class="container">
            <a class="navbar-brand" href="/">
                    <img src="{{asset($site->logo)}}" alt="logo" height="75px">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home"> {{$site->title}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">{{$site->about_title ?? trans('front.aboutus')}}</a>
                    </li>
                    @if($site->youtube)
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">{{trans('front.Youtube')}}</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"> {{$site->call_to_action_button_content ??trans('front.submitNow')}} </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                           class="nav-link dropdown-toggle nav-link-lg">
                            <i class="fas fa-flag"></i>  {{ Config::get('languages')[app()->getLocale()] }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">

                            @foreach (Config::get('languages') as $lang => $language)
                                <a class="dropdown-item has-icon" href="{{ route('lang.switch', $lang) }}">
                                    <i class="fas fa-flag"></i>  {{ $language }}
                                </a>
                            @endforeach
                        </div>
                    </li>


                </ul>
                {{--            <div class="nav-btn">--}}
                {{--                <a href="/login" class="default-btn bg-main">دخول</a>--}}
                {{--            </div>--}}
            </div>
        </div>
    </nav>
    <!-- End Nabvar Area -->


    <!-- App Landing Banner Area -->
    <div id="home" class="app-banner-area pt-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="app-banner-text">
                        <h1> {{$site->title}} </h1>
                        <p>
                            {!! $site->short_desc !!}
                        </p>

                        <div class="app-shapes">
                            <img src="{{asset('landing_page/assets/images/shape/shape16.png')}}" class="shape-16"  alt="Image">
                            <img src="{{asset('landing_page/assets/images/shape/shape16.png')}}" class="shape-11"  alt="Image">
                            <img src="{{asset('landing_page/assets/images/shape/shape28.png')}}" class="shape-14"  alt="Image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="app-banner-img">
                        <img src="{{asset($site->banner)}}"  alt="Image">
                    </div>
                </div>

                @foreach($site->partners as $partner)
                         <div class="col-lg-4">
                              <img src="{{asset($partner->logo)}}" alt="logo">
                         </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End App Landing Banner Area -->



    <!-- Saas Download Area -->
    <div id="about" class="app-banner-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="download-text">
                        <div class="section-title">
                            <h2>  {{$site->about_title}}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="download-text">
                        <p>
                            {!! $site->about_desc !!}
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="app-banner-img">
                        <img src="{{asset($site->about_image)}}" class="mobile-image" alt="Image">
                    </div>
                </div>

                <div class="col-lg-12">
                    {!! $site->content !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End Saas Download Area -->

    @if($site->youtube)
    <!-- Screens Slider Area -->
    <div id="gallery" class="screens-slider-area ptb-100">
        <div class="container">
            <!-- Popup Video Area -->
            <div class="popup-video-area bg-1">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="popup-video">
                                <div class="video-btn">
                                    <a href="{{$site->youtube}}" class="popup-youtube">
                                        <i class="las la-play"></i>
                                        <span class="ripple pinkBg"></span>
                                        <span class="ripple pinkBg"></span>
                                        <span class="ripple pinkBg"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Popup Video Area -->
        </div>
    </div>
    <!-- End Screens Slider Area -->
    @endif





    <!-- Contact Area -->
    <div id="contact" class="contact-area ptb-100 features-area">
        <div class="container">
{{--            <div class="contact-content">--}}
            <form action="{{route('send_inquiry')}}" method="POST" class="hala-form p-0">
                @csrf
                <input hidden="hidden" name="current_url" value="{{url()->current()}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" required data-error="Name required" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" required data-error="Email required" placeholder="Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" id="phone" required data-error="Phone number required" placeholder="Phone number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        @foreach($custom_fields as $field)
                            <div class="col-md-6">
                               @include('admin.custom_fields.addons.'.$field->type)
                            </div>
                        @endforeach


                        <div class="col-lg-12 col-md-12 text-center" >
                            <button type="submit" class="default-btn" style="background-color:{{$site->call_to_action_button_color}} ">{{$site->call_to_action_button_content}} </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
{{--            </div>--}}
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Footer Area -->
    <footer class="footer-area" style="padding-top: 50px">
        <div class="container">
            <div class="footer-widget">
                <div class="row">
                    <div class="col-lg-5 col-sm-5">
                        <table>
                            <tr>
                                @foreach($site->partners as $partner)
                                    <td>
                                        <img src="{{asset($partner->logo)}}" alt="logo">
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-2 col-sm-2">
                    </div>

                    <div class="col-lg-5 col-sm-5">


                        <ul class="footer-social">
                            <li>
                                <a class="bg-1" href="{{$site->facebook}}" target="_blank">
                                    <i class="lab la-facebook-f bg-1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="bg-2" href="{{$site->twitter}}" target="_blank">
                                    <i class="lab la-twitter bg-2"></i>
                                </a>
                            </li>
                            <li>
                                <a class="bg-3" href="{{$site->linkedin}}" target="_blank">
                                    <i class="lab la-linkedin-in bg-3"></i>
                                </a>
                            </li>
                            <li>
                                <a class="bg-4" href="{{$site->instagram}}" target="_blank">
                                    <i class="lab la-instagram bg-4"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="copyright-text">
                <p>  © {{$site->copy_right}}</p>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Go Top -->
    <div class="go-top">
        <i class="las la-angle-double-up"></i>
    </div>
    <!-- End Go Top -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('landing_page/assets/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/bootstrap.min.js')}}"></script>
    <!-- Magnific JS -->
    <script src="{{asset('landing_page/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Wow JS -->
    <script src="{{asset('landing_page/assets/js/wow.min.js')}}"></script>
    <!-- Odometer JS -->
    <script src="{{asset('landing_page/assets/js/odometer.min.js')}}"></script>
    <!-- Jquery Apper JS -->
    <script src="{{asset('landing_page/assets/js/jquery.appear.js')}}"></script>
    <!-- Form Validator JS -->
    <script src="{{asset('landing_page/assets/js/form-validator.min.js')}}"></script>
    <!-- Contact JS -->
    <script src="{{asset('landing_page/assets/js/contact-form-script.js')}}"></script>
    <!-- Ajaxchimp JS -->
    <script src="{{asset('landing_page/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('landing_page/assets/js/custom.js')}}"></script>
    <!-- captcha JS -->
    <script src="{{asset('landing_page/theme1/js/captcha.js')}}"></script>
    <script src="//www.google.com/recaptcha/api.js" async defer></script>

    </body>

</html>
