<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('fav/site.webmanifest') }}">


@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('web/css/rtl.css') }}">
    @endif
    @yield('page_css')
    @yield('css')
</head>
<body>

<div id="app"  @if(app()->getLocale() == 'ar') class="text-right" @endif>

    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')
        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('layouts.sidebar')

        </div>
        <!-- Main Content -->
        <div class="main-content">
            @include('layouts.flash-message')
            @yield('header')
            @yield('tools')
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>

@include('profile.change_password')
@include('profile.edit_profile')

</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>



<script src="{{ asset('assets/js/editors/tinymce/tinymce.js')}}" type="text/javascript"></script>


<script>

    $(document).ready(function() {

        tinymce.init({
            selector: '.tiny_editor',
            plugins: 'image code link table',
            menubar: true,
            focusable: true,
            //   inline: true,
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {

                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },


        });
    });
</script>

{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}
{{--<script>--}}
{{--$(document).ready(function() {--}}
{{--    $('.summernote').summernote();--}}
{{--});--}}
{{--</script>--}}
<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
@yield('page_js')
@yield('scripts')
@stack('scripts')
<script>
     $('#flash-overlay-modal').modal();
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    let usersUrl = '{{ aurl('users/update') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>

</html>
