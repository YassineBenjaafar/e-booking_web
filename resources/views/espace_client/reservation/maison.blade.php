@extends('layouts.app1')

@section('content')
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

input, label {
    display:block;
}
</style>
<section class="ftco-section bg-light" style="margin-top: 100px">
    <div class="container">
        <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <form method="POST" action="{{route('reservation.envoyer',$maison)}}" enctype="multipart/form-data"  onSubmit=" return validate();">
                                        @csrf
                                                <div class="panel panel-default" style="text-align:center">
                                                <hr>
                                                <div class="form-grup">
                                                    <label for="datetimes">Arrivée   -   Départ</label>
                                                    <input title="durée de séjour"type="text" class="btn btn-outline-success" name="datetimes" id="datetimes"  readonly style="margin-top:20px;margin-bottom:20px;width:60%;" >
                                                    <label for="number">Nombre de Personne</label>
                                                    <button class="btn btn-primary" type="button" style="font-size: 12px" id="minusbtn"><i class="fas fa-minus"></i></button>
                                                    <input title="nombre de personne" type="number" class="btn btn-outline-success @error('nombrePersonne') is-invalid @enderror"  name="nombrePersonne" id="nombrePersonne" style="margin-top: 20px;margin-bottom:20px;width:10%;" readonly>
                                                        @error('nombrePersonne')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror 
                                                        <button class="btn btn-primary" type="button" style="font-size: 12px" id="plusbtn"><i class="fas fa-plus"></i></button>
                                                </div>
                                                
                                                
                                                </div>
                                                <hr>
                                    <div id="form-message-warning" class="mb-4"></div> 
                                        <div id="form-message-success" class="mb-4">
                                             Mediathéque de la maison
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row text-center text-lg-left">
                                                @foreach ($maison->getImagesUrls() as $url)
                                                <div class="col-lg-3 col-md-4 col-6">
                                                <a href="{{asset($url)}}" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="{{asset($url)}}" alt=""></a>
                                                  </div>
                                                @endforeach
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">  
                                                    <input id='days' type='number' name='days'  hidden />
                                                    <input  id='etat' type='text' name='etat' hidden />
                                                    <input id='startDate' type='text' name='startDate'  hidden />
                                                    <input id='endDate' type='text' name='endDate'  hidden />
                                                </div>
                                                <div style="float:right;">
                                                    <button id="btnArchiver" onclick="setEtat('archiver')" class="btn btn-outline-info" style="margin-right:5px;"><i class="fas fa-archive"></i>
                                                            archiver</button >
                                                      <button id="btnEnvoyer"  onclick="setEtat('envoyer')" class="btn btn-outline-primary"><i class="fa fa-paper-plane "  aria-hidden="true"></i>
                                                        envoyer</button >
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                    <h3>Informations</h3>
                                <p class="mb-4">{{$maison->libelle}}</p>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fas fa-bed"></span>
                                    </div>
                                    <div class="text pl-3">
                                    <p><span>Chambres : </span> <a href=""> {{$maison->nombre_chambre}}</a></p>
                                  </div>
                              </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fas fa-hand-holding-usd"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Prix par nuit :</span> <a href=""> <b>{{$maison->prix_par_nuit}}</b> MAD</a></p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span></span> <a href=""><b>gh@website.com</b> </a></p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fas fa-phone-alt"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span></span> <a href="#"><b>+212 5 36 68 15 15</b></a></p>
                              </div>
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


<script>

$("#nombrePersonne").val(1);

$("#plusbtn" ).click(function() {
    let value = $("#nombrePersonne").val();
    $("#nombrePersonne").val(++value);
});

$("#minusbtn" ).click(function() {
    let value = $("#nombrePersonne").val();
    if(value > 1)
    $("#nombrePersonne").val(--value);
});




const agendas = <?=json_encode($agendas)?>;
const agendasDisabled = <?=json_encode($agendasDisabled)?>;
let isBtnAddDateActive= false;
let startDate ;
let endDate;
let days;
let etat;


$(function() {
  $('input[name="datetimes"]').daterangepicker(
  {
    timePicker: false,
    //minDate:  moment().startOf('hour'),
    locale: {
      format: 'YYYY-MM-DD',
      
    },
    drops: 'down',
    autoApply: true,
    isInvalidDate: function (date) {
      return agendas.reduce(function (bool, range) {
      return bool && !( date >= moment(range.start) && date <= moment(range.end) );
      }, true) || agendasDisabled.reduce(function (bool, range) {
      return bool||  date >= moment(range.start) && date <= moment(range.end) ;
      }, false);
    }  },function(start, end){
      startDate=start;
      endDate=end;
      days = endDate.diff(startDate, 'days');
      isBtnAddDateActive=true;
      setDays(days);
      setDates(startDate,endDate);
    });
});



function validate(){
    let state = false;
    if(isBtnAddDateActive){
        $("#etat").val(etat);
        if(confirm('Voulez-vous '+$("#etat").val()+' cette reservation ?')){
            state = true;
            
        }
    }else{
      alert('Selectionner une periode');
    }
    return state;
}
function setEtat(val){
    etat = val;
}
function setDays(days){
    $("#days").val(days);
}
function setDates(start,end){
    $("#startDate").val(start.format('YYYY-MM-DD'));
    $("#endDate").val(end.format('YYYY-MM-DD'));
}

</script>


@endsection











