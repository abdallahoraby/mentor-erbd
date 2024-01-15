<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> Admin Login </title>
    <link rel="icon" type="images/png" href="img/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="https://kit.fontawesome.com/642d317a8c.js" crossorigin="anonymous"></script>
    <!-- Template CSS -->
        <link rel="stylesheet" href="{{ url('front/assets/css/bootstrap.rtl.min.css') }}">
        <link rel="stylesheet" href="{{ url('front/assets/css/style.css') }}">

    <style>
        /* login footer */
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            color: white;
        }

        #login_wrap {
            min-height: 100%;
        }

        #login_main {
            overflow: auto;
            padding-bottom: 100px;
            /* must be same height as the footer */
        }

        #login_footer {
            position: relative;
            margin-top: -100px;
            /* negative value of footer height */
            height: 100px;
            clear: both;
            background-color: #333333;
            color: #ffffff;
        }


        /* Opera Fix thanks to Maleika (Kohoutec) */

        body:before {
            content: "";
            height: 100%;
            float: left;
            width: 0;
            margin-top: -32767px;
            /* thank you Erik J - negate effect of float*/
        }

    </style>
</head>
<body>

<div id="login_wrap">
    <div id="login_main">
        <div class="container">
                <div class="text-center">
                    <img src="{{ url('img/logo.png') }}" alt="Logo" class="img-fluid dark-logo">
                </div>

            @include('layouts.flash-message')
            <main>
                <section class="ms-modal mb-5 mt-5">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="form-content">
                                <h3 class="mb-4">@lang('front.Welcome')</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger p-0">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-row">
                                        <div class="input-field d-flex flex-column gap-2 full-width">
                                            <label for="input-email">@lang('front.email')<span
                                                    class="required">*</span></label>
                                            <div class="input-group flex-nowrap">
                                                <input type="text" id="input-email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                       aria-label="input-email" aria-describedby="addon-input-email" name="email"
                                                       value="{{  old('email') }}" autofocus required>
                                                <span class="input-group-text" id="addon-input-email">
                                      <i class="far fa-envelope"></i>
                                  </span>

                                            </div>
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email','login') }}
                                            </div>
                                        </div>

                                        <div class="input-field d-flex flex-column gap-2 full-width">
                                            <label  for="input-password">@lang('front.password')<span
                                                    class="required">*</span></label>
                                            <div class="input-group flex-nowrap">
                                                <input type="password" id="input-password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid': '' }}"
                                                       aria-label="input-password" aria-describedby="addon-input-password">
                                                <span class="input-group-text" id="addon-input-password">
                                      <i class="far fa-eye"></i>
                                  </span>
                                            </div>
                                        </div>


                                        <button type="submit"
                                                class="btn btn-primary btn-submit">@lang('front.login')</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<footer id="login_footer">
    <div class="center_text">
        <p class="m-0 copyright-text">‏@lang('front.copyright') © @php echo date('Y'); @endphp </p>
          <div class="text-center">
            <img src="{{ url('img/logo-dark.png') }}" width="100" height="100" alt="Logo" class="img-fluid dark-logo">
        </div>
    </div>
</footer>


</body>
</html>
