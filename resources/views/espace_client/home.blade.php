@extends('layouts.client_layout')
@section('content')



<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('assets_template/images/bg_1.jpg') }});" data-stellar-background-ratio="0.4">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
     
      <div class="col-md-7 ftco-animate">
          <h1 class="mb-4">E-booking Your Go To Booking service</h1>
          @auth('client')
        <p><a href="#centerss" class="btn btn-primary">Book Now</a> <a href="#contact" class="btn btn-white">CONTACT-US</a></p>
        @endAuth
      </div>
    
    </div>
  </div> 
</div>

<!-- END nav -->
@if (!Auth::check())
<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-lg-4">
        <form method="POST" action="{{ route('login') }}" class="appointment-form">
          @csrf
          <h3 style="text-align:center" class="mb-3">Authentification</h3>
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
                  <div class="form-group text-center">
                      not a member yet ? <a href="{{ route('register') }}">{{ __('Register') }}</a>
                  </div>
              </div>
          </div>
      
          <div class="col-md-12">
              <div class="form-group">
                  <input type="submit" value="Login" class="btn btn-primary py-3 px-4">
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endif


@auth('client')
<section class="ftco-section ftco-services" id="centerss">
  <div class="container">
      <div class="row">
          @foreach ($centers as $center)
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
          <div class="d-block services-wrap text-center">
                  <div class="img" style="background-image: url({{ $center->getImagesUrls()[0]}});"></div>
                  <div class="media-body py-4 px-3">
                  <h3 class="heading">{{ $center->label}}</h3>
                  <p> {{ $center->description}}</p>
                  <p><a  href="{{route('booking.center.entities', $center)}}" class="btn btn-primary" >more details</a></p> 
                  </div>
            </div>      
          </div>
          @endforeach  
      </div>
  </div>
</section>
@else
<section class="ftco-section ftco-services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
        <div class="d-block services-wrap text-center">
          <div class="img" style="background-image: url({{ asset('assets_template/images/houceima.jpg') }});"></div>
          <div class="media-body py-4 px-3">
            <h3 class="heading">Meilleur emplacement</h3>
            <p>La ville d’Al Hoceïma est géographiquement située au centers nord du Maroc sur le littoral méditerranéen, avec une superficie de 3 550 km2 caractérisée en majorité par une pente allant de 10 % à 40 % et 12 000 ha de plaines</p>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
        <div class="d-block services-wrap text-center">
          <div class="img" style="background-image: url({{ asset('assets_template/images/marina.jpg') }});"></div>
          <div class="media-body py-4 px-3">
            <h3 class="heading">Annonce d'un nouveau centers a SAIDIA-MARINA</h3>
            <p>Notre société vient d'ouvrir son deuxième centers à SAIDIA-MARINA </p>
          </div>
        </div>  
      </div>
      <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
        <div class="d-block services-wrap text-center">
          <div class="img" style="background-image: url({{ asset('assets_template/images/agadir.jpg') }});"></div>
          <div class="media-body py-4 px-3">
            <h3 class="heading">Fermeture du centers AGADIR</h3>
            <p>Le centers d'AGADIR va être fermée pour les 3 prochains mois pour des raisons de sécurité.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>
@endauth 

@auth('client')
<section id="contact"class="ftco-section bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12">
        <div class="wrapper">
          <div class="row no-gutters">
            <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">CONTACT</h3>
                <div id="form-message-warning" class="mb-4"></div> 
                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="{{ route('contact.postTicket')}}">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="label" for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="label" for="#">Message</label>
                        <textarea name="message" class="form-control" id="message" cols="30" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
              <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                <h3>E-Booking Contact</h3>
                <p class="mb-4">We are open to any suggestion and to answer your requests</p>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-phone"></span>
                  </div>
                  <div class="text pl-3">
                    <p><a href="">198 rue 21, Boulevard hassan II 61200</a></p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-phone"></span>
                  </div>
                  <div class="text pl-3">
                    <p><a href="">+212 5 36 78 15 45</a></p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-paper-plane"></span>
                  </div>
                  <div class="text pl-3">
                    <p><a href="">hebvacances.contact@gmail.com</a></p>
                  </div>
                </div>
                <div class="dbox w-100 d-flex align-items-center">
                  <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-globe"></span>
                  </div>
                  <div class="text pl-3">
                    <p><a href="#">www.hebvacances.ma</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endauth

<script>
    $(document).ready(function(){
    $("a").on('click', function(event) {
    if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
        scrollTop: $(hash).offset().top
        }, 1000, function(){
        window.location.hash = hash;
        });
    } 
    });
    });
</script>

@endsection