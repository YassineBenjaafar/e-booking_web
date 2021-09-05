<html lang="en"><head>
    <title>Vacation Rental - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="{{ asset('assets_template/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets_template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/style.css') }}">
  <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/40/9/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/40/9/util.js"></script></head>
  <body>
    <div  class="hero-wrap js-fullheight" style="position:relative;background-image: url({{ asset('assets_template/images/bg_1.jpg')}}); height: 789px; background-position: 50% -59.5px;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true" style="height: 789px;">
        </div>
      </div>
    </div>
    
    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                        <form method="POST" action="{{ route('login') }}" class="appointment-form">
                            @csrf
                            <h3 style="text-align:center" class="mb-3">Login</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrer votre email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Entrer votre mot de pass">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary py-3 px-4" onclick="document.location.href='Home.html' ">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  <!-- loader -->
  <div id="ftco-loader" class="fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle></svg></div>


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


    
  
