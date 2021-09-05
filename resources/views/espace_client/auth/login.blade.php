@extends('layouts.client_layout')
@section('content')

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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary py-3 px-4 mb-1" onclick="document.location.href='Home.html' ">
                                    not a member yet ? <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


    
  
