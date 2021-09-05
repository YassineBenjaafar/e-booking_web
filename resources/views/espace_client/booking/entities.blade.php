@extends('layouts.client_layout')

@section('content')    
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets_template/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span></p>
        <h1 class="mb-0 bread">Available Bookings</h1>
      </div>
    </div>
  </div>
</section>
   

<div class="container">
<div class="card-deck mt-4 mb-4">
    @foreach ($entities as $entity)
    <div class="col-md-4">
<div class="card m-2">
    <img class="card-img-top" width="259px" height="250px" src="{{ asset($entity->getImagesUrls()[0]) }}" alt="Card image cap">
    <div class="card-body">
      <hr />
      <h5 class="card-title text-center"><b class="text-muted">{{$entity->label}} </b></h5>
      <hr/>
      <p class="card-text">{{ $entity->description}}</p>
       <a href="{{route('booking.entity', $entity)}}" class="btn btn-primary float-right">Book now</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated at {{ $entity->updated_at}}</small>
    </div>
  </div>
    </div>
   @endforeach
</div>
@endsection

