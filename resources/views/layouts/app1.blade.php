<!DOCTYPE html>
<html lang="en">
<head>
    @csrf
    <title>Hébergement Vacances</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="{{ asset('assets_template/css/animate.css') }}">
    <script src="{{ asset('js/app.js') }}" ></script>
    <link rel="stylesheet" href="{{ asset('assets_template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_template/css/style.css') }}">

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- icon library for buttons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- date time picker jquery scripts -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
     <!-- date time picker style -->
     <link rel="stylesheet" type="text/css" href="{{ url('/css/dateTimePicker.css') }}" />

<style>
  
  .alert{
    z-index: 99;
    top: 60px;
    right:25px;
    min-width:100px;
    position: fixed;
    animation: slide 0.5s forwards;
}

@keyframes slide {
    100% { top: 30px; }
}

@media screen and (max-width: 668px) {
    .alert{ 
        left: 10px;
        right: 10px; 
    }
}


.count-notif{
  vertical-align:middle;
  margin-top: -20px;
  font-size:10px;
}

.badge-warning{
  padding:3px;
}

.dropdown-item-font{
  font-size: 12px;
}

.buttonNotif {
  background: none!important;
  border: none;
  padding: 0!important;
  /*optional*/
  font-family: arial, sans-serif;
  /*input has OS specific font-family*/
  color: #2f89fc;
  text-decoration: underline;
  cursor: pointer;
}

.divNotif {
  width: 100px; 
  word-wrap: break-word;
}

.divmain {
  width: 500px; 
}

.divmain.a {
  word-wrap: break-word;
}




.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    color: #2f89fc ;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.form-control:focus {
  border-color: #2f89fc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
}

</style>


    
</head>
<body>
<div class="container">
  {{-- response reservation Alert --}}
  @if(session('response'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle" style="margin-right:10px"></i>
      {{session('response')}}
     </div>
  @endif
  {{-- Success Alert --}}
  @if(session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle" style="margin-right:10px"></i>
      {{session('status')}}
  </div>
@endif

{{-- Error Alert --}}
@if(session('statusOut'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-unlink " style="margin-right:10px"></i>
      {{session('statusOut')}}
  </div>
@endif


{{-- Error Alert --}}
@if(session('ticketSent'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle" style="margin-right:10px"></i>
      {{session('ticketSent')}}
  </div>
@endif
</div>

<!--  START top barre -->
<div class="wrap fixed-top">
    <div class="container">
        <div class="row justify-content-between">
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-facebook-f"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fab fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- End Top Barre -->  

<!-- START nav bar -->
@auth('client')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light fixed-top" id="ftco-navbar" style="margin-top:27px">
    <div class="container">
        <a class="navbar-brand" href="/">Hébergement <span>Vacances</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/" class="nav-link">{{ __('Acceuil') }}</a></li>
            <li class="nav-item"><a href="/#contact" class="nav-link">{{ __('Contact') }}</a></li>
            <li class="nav-item"><a href="/reservations" class="nav-link">{{ __('Mes Reservations') }}</a></li>
          </li>
    
      
        
          
      
        </ul>
        <div class="nav-item"><button class="buttonNotif" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-bell"></i><span class="badge badge-pill badge-danger count-notif">{{count(Auth::guard('client')->user()->unreadNotifications)}}</span></button></div>
        
        <div class="nav-item"><a  class="nav-link">{{ Auth::guard("client")->user()->name }}          
        </a>
      </div>
      <div class="nav-item">
        <i class="fas fa-trophy topicons" style="color:#2f89fc;font-size:15px;"></i>
        <span style="margin-left:5px;color:#2f89fc">{{ Auth::guard('client')->user()->salarie->points}}</span>
      </div>
        <div class="nav-item">
              
          <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="fas fa-sign-out-alt"></i>
              
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
        </div>
      </div>
</nav>



<!-- feedback modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FeedBack</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="{{route('feedback.send')}}" method="POST">
          @csrf
          <div class="rating"> 
            <input type="radio" name="note" value="5" id="5">
            <label for="5">☆</label>
            <input type="radio" name="note" value="4" id="4">
            <label for="4">☆</label> 
            <input type="radio" name="note" value="3" id="3">
            <label for="3">☆</label> 
            <input type="radio" name="note" value="2" id="2">
            <label for="2">☆</label>
            <input type="radio" name="note" value="1" id="1" checked="true">
            <label for="1">☆</label>
          </div>
          <div class="form-group">
            <label for="commentaire" style="text-align: center">Commentaire</label>
            <textarea class="form-control" name="commentaire" required></textarea>
            <input type="text" name="notifID" hidden>
            <input type="text" name="reservationID" hidden>
          </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="feedbackbtn">Envoyer</button>
          </div>
        </div>
        </form>
  </div>
</div>


<!-- modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body divmain">
        <ul>
              @php $user = Auth::guard('client')->user();
                   $ticketNotifs = $user->unreadNotifications->where('type','App\Notifications\replyTicket')->sortByDesc('created_at');
                   $reservationNotifs = $user->unreadNotifications->where('type','App\Notifications\reservations')->sortByDesc('created_at');
                   $feedbackNotifs = $user->unreadNotifications->where('type','App\Notifications\feedback')->sortByDesc('created_at');
              @endphp
              @foreach ($feedbackNotifs as $notification)
              <li>
                  @if($notification->data["reservation"]["etat_id"] == 4) <!--  expired -->
                    <div class="a">
                    <p>On éspere que vous avez passé un beau temps pendans votre sejour, veuillez s'il vous plait nous donner votre <a href="" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal" data-reservation-id={{$notification->data['reservation']['id']}} data-notif-id={{$notification->id}}>feedback </a>?</p>
                    </div>
                  @endif
              </li>
              @endforeach
              @foreach ($reservationNotifs as $notification)
              <li>
                  @if($notification->data["reservation"]["etat_id"] != 4)
                    <div class="a">
                      <p>votre réservation de sejour <b>{{date("d-m-Y",strtotime($notification->data['reservation']['date_debut']))}}</b> au <b>{{date("d-m-Y",strtotime($notification->data['reservation']['date_fin']))}}</b> crée le <b>{{date("d-m-Y",strtotime($notification->data['reservation']['created_at']))}}</b> est 
                        @php $etat_id = $notification->data['reservation']['etat_id'] ;
                             $etat = App\Etat::find($etat_id);
                        @endphp
                        <a href="{{route('notification.read', $notification)}}">{{$etat->name}}</a>.</p>
                    </div>
                  @endif
              </li>
              @endforeach
              @foreach ($ticketNotifs as $notification)
              <li>
                    <div class="a">
                    <p>Réponse : {{$notification->data['admin_reply_message']}} 
                      <a  href="{{route('notification.read', $notification)}}" style ="float: right" href=""><i class="fas fa-eye"></i></a>.</p>
                    </div>
              </li>
              @endforeach
        </ul> 
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>















@endauth
<main>
  @yield('content')
</main>
<footer class="footer">
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
              <h2 class="footer-heading"><a href="#" class="logo">Hébergement Vacances</a></h2>
          </div>
          <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
              <h2 class="footer-heading">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-1 d-block">Map Direction</a></li>
                <li><a href="#" class="py-1 d-block">Services</a></li>
                <li><a href="#" class="py-1 d-block">Experience</a></li>
                <li><a href="#" class="py-1 d-block">Lieu central Parfait </a></li>
             </ul>
          </div>
          <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
              <h2 class="footer-heading">Tag cloud</h2>
              <div class="tagcloud">
      <a href="#" class="tag-cloud-link">apartment</a>
      <a href="#" class="tag-cloud-link">villa</a>
      <a href="#" class="tag-cloud-link">vacances</a>
      <a href="#" class="tag-cloud-link">hébergement</a>
      <a href="#" class="tag-cloud-link">louer</a>
      <a href="#" class="tag-cloud-link">maison</a>
      <a href="#" class="tag-cloud-link">place</a>
    </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
              <h2 class="footer-heading">Souscrire</h2>
              <form action="#" class="subscribe-form">
    <div class="form-group d-flex">
      <input type="text" class="form-control rounded-left" placeholder="Email adresse">
      <button type="submit" class="form-control submit rounded-right"><span class="sr-only">Envoyer</span><i class="fa fa-paper-plane"></i></button>
    </div>
  </form>
  <h2 class="footer-heading mt-5">Suivez nous</h2>
  <ul class="ftco-footer-social p-0">
    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fab fa-twitter"></span></a></li>
    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fab fa-facebook-f"></span></a></li>
    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fab fa-instagram"></span></a></li>
  </ul>
          </div>
      </div>
  </div>
</footer>



<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


{{-- <script src="{{ asset('assets_template/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets_template/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets_template/js/popper.min.js') }}"></script>
<script src="{{ asset('assets_template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets_template/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('assets_template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets_template/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets_template/js/scrollax.min.js') }}"></script>
<script src="{{ asset('assets_template/js/main.js') }}"></script>

<script>
  $(document).ready(function(){
setTimeout(function() {
      $(".alert").alert('close');
  }, 3000);
});



$('#exampleModal').on('show.bs.modal', function(e) {

//get data-id attribute of the clicked element
var reservationID = $(e.relatedTarget).data('reservation-id');
var NotifID = $(e.relatedTarget).data('notif-id');

//populate the textbox
$(e.currentTarget).find('input[name="notifID"]').val(NotifID);
$(e.currentTarget).find('input[name="reservationID"]').val(reservationID);

});




$('#feedbackbtn').click(function(){



});



$("#note").val(1);

$("#plusbtn" ).click(function() {
    let value = $("#note").val();
    if(value < 5)
      $("#note").val(++value);
});

$("#minusbtn" ).click(function() {
    let value = $("#note").val();
    if(value > 1)
    $("#note").val(--value);
});



</script>
  
</body>
</html>