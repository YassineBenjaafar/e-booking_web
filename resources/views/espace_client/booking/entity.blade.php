@extends('layouts.client_layout')

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



.booking-form {
	background-color: #fff;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}



.booking-form .form-control::-webkit-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control::placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	bottom: 4px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: rgba(62, 72, 92, 0.3);
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	display: inline-block;
	color: #3e485c;
	font-weight: 700;
	margin-bottom: 6px;
	margin-left: 7px;
}

.booking-form .submit-btn {
	display: inline-block;
	color: #fff;
	background-color: #1e62d8;
	font-weight: 700;
	padding: 14px 30px;
	border-radius: 4px;
	border: none;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
}

.booking-cta {
	margin-top: 80px;
	margin-bottom: 30px;
}

.booking-cta h1 {
	font-size: 52px;
	text-transform: uppercase;
	color: #fff;
	font-weight: 700;
}

.booking-cta p {
	font-size: 16px;
	color: rgba(255, 255, 255, 0.8);
}
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('assets_template/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span></p>
        <h1 class="mb-0 bread">Booking</h1>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <form method="POST" action="{{route('booking.send',$entity)}}" onSubmit="return validate();">
                                        @csrf
                                    <div class="booking-form">
							        <form>
								<div class="form-group">
									<span class="form-label">Your Destination</span>
									<input class="form-control border-0 font-weight-bold" type="text" value='{{ $entity->label . " - Center : " . $entity->center->label  }}' readonly>
								</div>
								<div class="row">
									<div class="col-sm-12">
                                        	<span class="form-label ">Check In  -  Check out</span>
                                        <hr />
										<div class="input-group">
											<input class="form-control border-0 text-center font-weight-bold" type="text" require name="datetimes" id="datetimes"  readonly>
    									</div>
									</div>
								</div>
						</div>
                                    <hr>
                                    <div id="form-message-warning" class="mb-4"></div> 
                                        <div id="form-message-success" class="mb-4">
                                             Mediathéque of the entity
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row text-center text-lg-left">
                                                @foreach ($entity->getImagesUrls() as $url)
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
                                                    <input  id='state' type='text' name='state' hidden  />
                                                    <input id='startDate' type='text' name='startDate'  hidden />
                                                    <input id='endDate' type='text' name='endDate'  hidden />
                                                </div>
                                                <div style="float:right;">
                                                    <button id="btnArchiver" onclick="setState('archive')" class="btn btn-outline-info" style="margin-right:5px;"><i class="fa fa-archive"></i>
                                                            archive</button >
                                                      <button id="btnEnvoyer"  onclick="setState('send')" class="btn btn-outline-primary"><i class="fa fa-paper-plane "  aria-hidden="true"></i>
                                                        send</button >
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
                                <p class="mb-4">{{$entity->label}}</p>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-bed"></span>
                                    </div>
                                    <div class="text pl-3">
                                    <p><span>Details : </span> <a href=""> {{$entity->details}}</a></p>
                                  </div>
                              </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-hand-holding-usd"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Price :</span> <a href=""> <b>{{$entity->price}}</b> $</a></p>
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
                                    <span class="fa fa-phone-alt"></span>
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

const agendas = <?=json_encode($agendas)?>;
const agendasDisabled = <?=json_encode($agendasDisabled)?>;
let isBtnAddDateActive= false;
let startDate ;
let endDate;
let days;

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
    if(isBtnAddDateActive)
    {
        if(confirm('Do you wish to '+ $("#state").val() + ' this booking ?')){
            state = true;   
        }
    }
    else {
      alert('Please select a period!');
    }

    return state;
}
function setState(value){
    $("#state").val(value);
    alert$("state").val();
}
function setDays(days){
    $("#days").val(days);
}
function setDates(start, end){
    $("#startDate").val(start.format('YYYY-MM-DD'));
    $("#endDate").val(end.format('YYYY-MM-DD'));
}

</script>


@endsection











