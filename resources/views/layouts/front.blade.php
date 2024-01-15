<!DOCTYPE html>
<html @if(app()->getLocale() == 'ar') lang="ar" dir="rtl" @else lang="en"  dir="ltr" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#11324d">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#11324d">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#11324d">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('fav/site.webmanifest') }}">
    @seoTags()
<!-- Template CSS -->
    @if(app()->getLocale() == 'ar')
         <link rel="stylesheet" href="{{ url('front/assets/css/bootstrap.rtl.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ url('front/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('front/assets/css/en.css') }}">
    @endif
     <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ url('front/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ url('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/extra.css') }}">
    @stack('css')
</head>
<body>
    <div class="root">
        <main>
            @include('front-end.components.navbar')
             @include('layouts.flash-message')
            @yield('content')
        </main>
        @include('front-end.components.footer')
        @include('front-end.components.login')
        @include('front-end.components.register')
        @include('front-end.components.registerCompany')
        @include('front-end.components.forget-password')
        @include('front-end.components.messagesPopup')
    </div>

     <script src="{{ url('front/assets/js/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
     <script src="https://kit.fontawesome.com/642d317a8c.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
         integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
         integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
     </script>
     <script src="{{ url('front/assets/js/owl.carousel.min.js') }}"></script>
     <script src="{{ url('front/assets/js/owl-init.js') }}"></script>
     <script src="{{ url('front/assets/js/script.js') }}"></script>
     <script type="text/javascript">
         $('.select2').select2();
     </script>
    @stack('scripts')
</body>
</html>
