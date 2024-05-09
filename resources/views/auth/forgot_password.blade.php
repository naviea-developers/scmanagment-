<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Reset Password!</title>

    <!-- vendor css -->
    <link href="{{asset('public/backend')}}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('public/backend')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
     @php
        $header_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
        // $site_setting = \App\Models\SiteSetting::first();
     @endphp
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
            <img style="width:100px" src="{{ $header_logo->header_image_show }}" alt="">
            <div>
            <span>Reset Password</span>

            </div>
        </div>
        <p style="text-align: center">Please enter your email address</p>
        <form action="{{ route('forget.send_mail_f_password') }}" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="example@gmail.com">
          </div><!-- form-group -->

          {{-- success message start --}}
          @if(session()->has('message'))
          <div class="alert alert-danger">
            {{session()->get('message')}}
          </div>
          <script>
              setTimeout(function(){
                  $('.alert.alert-danger').hide();
              }, 3000);
          </script>
          @endif
          {{-- success message start --}}


          <button type="submit" class="btn btn-info btn-block">Reset Password</button>
        </form>
        {{-- <div class="col-6 text-right">
            <a class="m-link-muted small" href="{{ route('forget.password') }}"
                >
                <strong>Forgot Password ?</strong>
            </a>
        </div> --}}
        {{-- <div class="mg-t-25 tx-center"><a href="{{ route('admin.forget.password') }}" class="tx-info">Reset Password</a></div> --}}
        {{-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> --}}
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('public/backend')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('public/backend')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('public/backend')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
