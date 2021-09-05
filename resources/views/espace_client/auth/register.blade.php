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
                        
                        <form method="POST" class="appointment-form" action="{{ route('register') }}">
                            @csrf
                            <h3 style="text-align:center" class="mb-3">Registration</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required   placeholder="Enter your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($message = Session::get('failemail'))
                                            <strong style="font-size: 80%;color: #dc3545;">{{ $message }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="ecode" type="text" class="form-control @error('ecode') is-invalid @enderror" name="ecode" required   placeholder="Enter your ecode">
                                        @error('ecode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($message = Session::get('fail'))
                                            <strong style="font-size: 80%;color: #dc3545;">{{ $message }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter your password">
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
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                    </div>
                                </div>
                            </div>
                            
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-1">
                                        {{ __("Register") }}
                                    </button>    
                                      already a member ? <a href="{{ route('login') }}">{{ __('Login') }}</a>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


    
  
