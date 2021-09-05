@extends('layouts.app1')
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

<section class="ftco-section bg-light" style="margin-top: 100px">
    <div class="container">
      @if ($reservations->count() == 0)
        <div class="col-md-12 cartes">
          <div class="item">
            <div class="testimony-wrap d-flex">
              <div class="text pl-4">
                <h1 align="center">Pas de réservation .</h1>
                </div>
            </div>
          </div>
        </div>
      @else
              @foreach ($reservations->sortByDesc('created_at') as $reservation)
              @if($reservation->etat_id === 1)
                  <div class="col-md-12 cartes">
                  <div class="item">
                    <div class="testimony-wrap d-flex">
                      <div class="user-img iconimg"><i class="fa fa-check" aria-hidden="true"></i>
                      </div>
                      <div class="text pl-4">
                        <span class="quote d-flex align-items-center justify-content-center">
                          <i class="fa fa-quote-left"></i>
                        </span>
                        <p><strong>Votre réservation est {{$reservation->etat->name}}.</strong><br>
                          Nous avons pris bonne note que votre arrivée est prévue pour le <b>{{$reservation->date_debut}}</b> , la réservation a été faite jusqu’au <b>{{$reservation->date_fin}}</b> comme vous l’avez demandé. </p>
                        <p class="name">{{$reservation->maison->libelle}}</p>
                        <span class="position">{{$reservation->date_debut}}  <b>>></b>  {{$reservation->date_fin}} </span>
                        @php
                          $range = strtotime($reservation->date_debut) - strtotime(date('Y-m-d'));
                        @endphp
                        <button type="button" data-toggle="modal" data-target="#AnnulationModal" data-reservation_id="{{$reservation->id}}" data-penalite="{{$range}}" class="btn btn-outline-danger buttonMargin">Annuler</button>
                          <a  href="{{route('reservation.report', $reservation)}}" class="btn btn-outline-primary buttonMargin">Report</a>
                        </div>
                    </div>
                  </div>
                  </div>
              @endif
              @if($reservation->etat_id === 6)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgarchive"><i class="fas fa-archive" aria-hidden="true"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Votre réservation est {{$reservation->etat->name}}.</strong><br>
                      Nous avons pris bonne note que votre arrivée est prévue pour le <b>{{$reservation->date_debut}}</b> , la réservation a été faite jusqu’au <b>{{$reservation->date_fin}}</b> comme vous l’avez demandé. </p>
                    <p class="name">{{$reservation->maison->libelle}}</p>
                    <span class="position">{{$reservation->date_debut}}  <b>>></b>  {{$reservation->date_fin}} </span>
                    <button type="button" data-toggle="modal" data-target="#SuppressionModal" data-reservation_id="{{$reservation->id}}" class="btn btn-outline-danger buttonMargin">supprimer</button>
                      <a  href="{{route('reservation.report', $reservation)}}" class="btn btn-outline-primary buttonMargin">voir</a>
                      <a  href="#" class="btn btn-outline-primary buttonMargin">Envoyer</a>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if($reservation->etat_id === 2)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgcancel"><i class="fas fa-times-circle" aria-hidden="true"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Votre réservation est {{$reservation->etat->name}}.</strong><br>
                      Nous avons pris bonne note que votre arrivée est prévue pour le <b>{{$reservation->date_debut}}</b> , la réservation a été faite jusqu’au <b>{{$reservation->date_fin}}</b> comme vous l’avez demandé. </p>
                    <p class="name">{{$reservation->maison->libelle}}</p>
                    <span class="position">{{$reservation->date_debut}}  <b>>></b>  {{$reservation->date_fin}} </span>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if($reservation->etat_id === 3)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                  <div class="user-img iconimgencours"><i class="far fa-clock"></i>
                  </div>
                  <div class="text pl-4">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p><strong>Votre réservation est {{$reservation->etat->name}}.</strong><br>
                      Nous avons pris bonne note que votre arrivée est prévue pour le <b>{{$reservation->date_debut}}</b> , la réservation a été faite jusqu’au <b>{{$reservation->date_fin}}</b> comme vous l’avez demandé. </p>
                    <p class="name">{{$reservation->maison->libelle}}</p>
                    <span class="position">{{$reservation->date_debut}}  <b>>></b>  {{$reservation->date_fin}} </span>
                    </div>
                  </div>
                </div>
                </div>
              @endif
              @if ($reservation->etat_id === 5)
                <div class="col-md-12 cartes">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img iconimg" style="color:#007bff"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                    </div>
                    <div class="text pl-4">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="fa fa-quote-left"></i>
                      </span>
                      <p><strong>Votre réservation est {{$reservation->etat->name}}.</strong><br>
                        Votre réservation a été du <b>{{$reservation->date_debut}}</b> ,au <b>{{$reservation->date_fin}}</b>
                        , nous espérons que vous avez passé de bon vacances. </p>
                      <p class="name">{{$reservation->maison->libelle}}</p>
                      <span class="position">{{$reservation->date_debut}}  <b>>></b>  {{$reservation->date_fin}} </span>
                      @php
                        $range = strtotime($reservation->date_debut) - strtotime(date('Y-m-d'));
                      @endphp
                        <a  href="{{route('reservation.report', $reservation)}}" class="btn btn-outline-primary buttonMargin">Report</a>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Annulation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
            <p id="message"></p>
            <a href="">Plus d'infos</a>
        </div>
        <div class="modal-footer">
          <form action="{{ route('reservation.annuler') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            <button type="submit" class="btn btn-primary">Oui</button>
            <input name="reservation_id" hidden />
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="SuppressionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-md modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Suppression</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <p>vous etes sur de vouloir supprimer cet reservation ?</p>
        </div>
        <div class="modal-footer">
          <form  id="formSupprimer" action="{{ route('reservation.supprimer') }}" method="POST">
            @csrf
            @method('DELETE')
            <input name="reservation_id" hidden />
            <button type="submit" class="btn btn-primary" >Oui</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
  $('#AnnulationModal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var reservationID = $(e.relatedTarget).data('reservation_id');
    var penalite = $(e.relatedTarget).data('penalite');
    console.log(penalite);
    if(penalite < 864000)
      $(e.currentTarget).find('#message').text('Attention , vous serez penalisé (-3 points)');
    else
      $(e.currentTarget).find('#message').text('vous etes sur de vouloir annuler cet réservation ?');

    //populate the textbox
    $(e.currentTarget).find('input[name="reservation_id"]').val(reservationID);
});

$('#SuppressionModal').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var reservationID = $(e.relatedTarget).data('reservation_id');
    //populate the textbox
    $(e.currentTarget).find('input[name="reservation_id"]').val(reservationID);
});

</script>

@endsection











