@extends('layouts.app1')

<style>

  .imgmargin{
    margin-top:40px;
  }
</style>
@section('content')    
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets_template/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Acceuil <i class="fa fa-chevron-right"></i></a></span></p>
        <h1 class="mb-0 bread">Maison Disponible</h1>
      </div>
    </div>
  </div>
</section>
   
<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
  <div class="container-fluid px-md-0">
    <div class="row no-gutters">
    @foreach ($maisons as $maison)
    <div class="col-lg-6">
      <div class="room-wrap d-md-flex imgmargin">
        <a href="#" class="img" style="background-image: url({{ asset($maison->getImagesUrls()[0]) }}); alt:"></a>
        <div class="half left-arrow d-flex align-items-center">
          <div class="text p-4 p-xl-5 text-center">
            <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
          <p class="mb-0"><span class="price mr-1">{{$maison->prix_par_nuit}}</span> <span class="per">Mad par nuit</span></p>
          <h3 class="mb-3"><a href="rooms.html">{{$maison->libelle}}</a></h3>
            <ul class="list-accomodation">
            <li><span>Max:</span> {{$maison->nombre_chambre}}</li>
              <li><span>Superficie:</span> 45 m2</li>
              <li><span>Vue:</span> Sea View</li>
            <li><span>Lit:</span> <span> {{$maison->nombre_chambre}}</li>
            </ul>
            <p class="pt-1"><a href="{{route('reservation.maison', $maison)}}" class="btn-custom px-3 py-2">Choisir<span class="icon-long-arrow-right"></span></a></p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
</section>



    

  
@endsection