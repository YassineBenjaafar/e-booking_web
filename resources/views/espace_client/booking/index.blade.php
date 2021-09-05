@extends('layouts.client_layout')
<style>
  .cartes{
    margin-top:20px;
  }

  .iconimg{
    font-size: 30px;
    color: #28a745;
  }

  .iconimgcancel{
    font-size: 30px;
    color: #dc3545;
  }


.iconimgarchive{
  color:#007bff;
  font-size: 30px;
}

.iconimgencours{
  color: 	#D3D3D3;
  font-size: 30px;
}


  .buttonMargin{
    margin-right: 10px;
    float: right;
  }
</style>

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets_template/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Acceuil <i class="fa fa-chevron-right"></i></a></span></p>
        <h1 class="mb-0 bread">My Bookings</h1>
      </div>
    </div>
  </div>
</section>
   

<section class="ftco-section bg-light">
    <div class="container">
      @if ($bookings->count() == 0)
        <div class="col-md-12 cartes">
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="text pl-4">
                <h1 align="center">You have made no bookings .</h1>
                </div>
            </div>
          </div>
        </div>
      @else
              @foreach ($bookings->sortByDesc('created_at') as $booking)
              @if($booking->state_id === 1)
                  <div class="col-md-12 cartes">
                  <div class="item">
                    <div class="testimony-wrap d-flex">
                      <div class="user-img iconimg"><i class="fa fa-check" aria-hidden="true"></i>
                      </div>
                      <div class="text pl-4">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="fa fa-quote-left"></i>
                        </span>
                        <p><strong>Your Booking is  {{$booking->state->name}}.</strong><br>
                         we have taken note that your arrival is scheduled for <b>{{$booking->start_date}}</b> ,
                        the booking was made until <b>{{$booking->end_date}}</b> as you requested.</p>
                        <p class="name">{{$booking->entity->label}}</p>
                        <span class="position">{{$booking->start_date}}  <b>>></b>  {{$booking->end_date}} </span>
                        @php
                          $range = strtotime($booking->start_date) - strtotime(date('Y-m-d'));
                        @endphp
                        <button type="button" data-toggle="modal" data-target="#AnnulationModal" data-booking_id="{{$booking->id}}" data-penalite="{{$range}}" class="btn btn-outline-danger buttonMargin">Cancel</button>
                          <a  href="{{route('booking.report', $booking)}}" class="btn btn-outline-primary buttonMargin">Report</a>
                        </div>
                    </div>
                  </div>
                  </div>
              @endif
              @if($booking->state_id === 6)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgarchive"><i class="fa fa-archive" aria-hidden="true"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Your Booking is  {{$booking->state->name}}.</strong><br>
                      we have taken note that your arrival is scheduled fo <b>{{$booking->start_date}}</b> , we have taken note that your arrival is scheduled for <b>{{$booking->end_date}}</b> as you requested. </p>
                    <p class="name">{{$booking->entity->label}}</p>
                    <span class="position">{{$booking->start_date}}  <b>>></b>  {{$booking->end_date}} </span>
                    <button type="button" data-toggle="modal" data-target="#SuppressionModal" data-booking_id="{{$booking->id}}" class="btn btn-outline-danger buttonMargin">delete</button>
                      <a  href="{{route('booking.report', $booking)}}" class="btn btn-outline-primary buttonMargin">view</a>
                      <a  href="#" class="btn btn-outline-primary buttonMargin">send</a>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if($booking->state_id === 2)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgcancel"><i class="fa fa-times-circle" aria-hidden="true"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Your Booking is  {{$booking->state->name}}.</strong><br>
                      we have taken note that your arrival is scheduled fo <b>{{$booking->start_date}}</b> , we have taken note that your arrival is scheduled for <b>{{$booking->end_date}}</b> as you requested. </p>
                    <p class="name">{{$booking->entity->label}}</p>
                    <span class="position">{{$booking->start_date}}  <b>>></b>  {{$booking->end_date}} </span>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if($booking->state_id === 3)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgencours"><i class="far fa-clock"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Your Booking is  {{$booking->state->name}}.</strong><br>
                      we have taken note that your arrival is scheduled fo <b>{{$booking->start_date}}</b> , we have taken note that your arrival is scheduled for <b>{{$booking->end_date}}</b> as you requested. </p>
                    <p class="name">{{$booking->entity->label}}</p>
                    <span class="position">{{$booking->start_date}}  <b>>></b>  {{$booking->end_date}} </span>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if ($booking->state_id === 5)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img iconimg" style="color:#007bff"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                    </div>
                    <div class="text pl-4">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="fa fa-quote-left"></i>
                      </span>
                      <p><strong>Your Booking is  {{$booking->state->name}}.</strong><br>
                        Votre réservation a été du <b>{{$booking->start_date}}</b> ,au <b>{{$booking->end_date}}</b>
                        , we hope you had a good vacation. </p>
                      <p class="name">{{$booking->entity->label}}</p>
                      <span class="position">{{$booking->start_date}}  <b>>></b>  {{$booking->end_date}} </span>
                      @php
                        $range = strtotime($booking->start_date) - strtotime(date('Y-m-d'));
                      @endphp
                        <a  href="{{route('booking.report', $booking)}}" class="btn btn-outline-primary buttonMargin">Report</a>
                      </div>
                  </div>
                </div>
                </div>
              @endif
          @endforeach
      @endif
    </div>
</section>



























<div class="modal   fade" id="AnnulationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-md modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cancellation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
            <p id="message"></p>
        </div>
        <div class="modal-footer">
          <form action="{{ route('booking.cancel') }}" method="POST">
            @csrf
            @method('PUT')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
            <input name="booking_id" hidden />
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="SuppressionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-md modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <p>are you sure you want to delete this booking ?</p>
        </div>
        <div class="modal-footer">
          <form  id="formSupprimer" action="{{ route('booking.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <input name="booking_id" hidden />
            <button type="submit" class="btn btn-primary" >Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
  $('#AnnulationModal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var bookingID = $(e.relatedTarget).data('booking_id');
    var penalite = $(e.relatedTarget).data('penalite');
    console.log(bookingID);


    if(penalite < 864000)
      $(e.currentTarget).find('#message').text('Attention , vous serez penalisé (-3 points)');
    else
      $(e.currentTarget).find('#message').text('are you sure you want to cancel this booking ?');

    //populate the textbox
    $(e.currentTarget).find('input[name="booking_id"]').val(bookingID);
});

$('#SuppressionModal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var bookingID = $(e.relatedTarget).data('booking_id');
    //populate the textbox
    $(e.currentTarget).find('input[name="booking_id"]').val(bookingID);
});

</script>

@endsection











