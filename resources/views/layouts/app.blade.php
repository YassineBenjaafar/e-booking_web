<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- icon library for buttons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- date time picker style -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/dateTimePicker.css') }}" />

    <!-- date time picker jquery scripts -->
    <!-- this script of jquery already exist in app.js -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- pagination link -->
    <script src="{{ asset('js/pagination.js') }}" ></script>
    
    <!-- image style  -->
<style>
img {
    border-radius: 5px;
    width: 255px;
    height: 255px;
    margin: 5px;  
    float: left;           
}


.count-notif{
    vertical-align:middle;
    margin-top: -15px;
    font-size:10px;
}

.badge-warning{
    padding:3px;
}


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


.topicons{
    margin-right: 5px;
    font-size: 15px;
}

.narbarborder{
    border: 1px solid grey;
    border-top: none;
    border-right:none;
    margin-right: 10px;
}



.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}



.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}


.loader {
  border: 16px solid #3498db;
  border-radius: 50%;
  border-top: 16px solid #D3D3D3;
  border-bottom: 16px solid #D3D3D3;
  width: 100px;
  height: 100px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite; 
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.overlay {
  position: fixed; /* Sit on top of the page content */
  display: none; /* Hidden by default */
  top: 40%;
  left: 47%;
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
</style>.

         
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Changement de saison</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
            <span style="margin:20px;">Basse Saison</span>
            
            <label class="switch">
                    <input id="hauteSaison" type="checkbox">
                    <span class="slider round"></span>
                </label>
            <span style="margin:20px;">Haute Saison</span>
            <div class="loader overlay" id="overlay"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="savebtn">Save changes</button>
        </div>
      </div>
    </div>
  </div>
       
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                 {{-- Error Alert --}}
                 @if(session('fail'))
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <i class="far fa-times-circle" style="margin-right:10px"></i>
                     {{session('fail')}}
                 </div>
                 @endif
            
            
                {{-- Success Alert --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle" style="margin-right:10px"></i>
                    {{session('success')}}
                </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="far fa-times-circle" style="margin-right:10px"></i>
                    {{session('error')}}
                </div>
                @endif

                
                <a class="navbar-brand" href="{{ url('/admin/home') }}">GH Panel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth('admin')
                    <ul class="navbar-nav mr-auto">
                        <li class="narbarborder"><a href="{{ route('admin.centres.index')}}" class="nav-link"><i class="far fa-building topicons"></i>Centres</a></li>
                        <li class="narbarborder"><a href="{{ route('admin.maisons.index')}}" class="nav-link"><i class="fas fa-home topicons" ></i>Maisons</a> </li>
                        <li class="narbarborder"><a href="{{ route('admin.salaries.index')}}" class="nav-link"><i class="fas fa-users topicons"></i>Salariées</a> </li>
                        <li class="narbarborder"><a href="{{ route('admin.reservations.index','confirmer')}}" class="nav-link"><i class="far fa-address-card topicons"></i>Reservations</a> </li>
                        <li class="nav-item dropdown narbarborder">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-cog topicons"></i>Utilisateurs <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.users.index')}}">
                                        Utilisteurs
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.roles.index')}}">
                                        Roles
                                    </a>   
                                </div>
                        </li>
                    <li class="narbarborder"><a href="{{ route('admin.tickets.index')}}" class="nav-link"><i class="far fa-comments topicons"></i>Tickets<span class="badge badge-pill badge-danger count-notif">{{count(App\Ticket::where('read_at',null)->get())}}</span></a> </li>
                    <li class="narbarborder"><a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-cogs topicons topicons"></i>Switch saison</a></li>
                    @endauth

        

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">                   
                        @auth('admin')
                            <li class="nav-item dropdown">
                                @if(Auth::guard("admin")->user()->name)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard("admin")->user()->name }} <span class="caret"></span>
                                </a>
                                @endif
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('admin.register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @endauth
                        {{-- @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- ************************************************* scripts  ************************** !-->
<script type="text/javascript">

$(document).ready(function(){
setTimeout(function() {
      $(".alert").alert('close');
  }, 3000);
});

let  checkBoxState =<?=json_encode(App\Parametre::latest()->first()->hauteSaison)?>;
if(checkBoxState === 1)
    checkBoxState = true;
else
    checkBoxState = false;

$("#hauteSaison" ).prop( "checked", checkBoxState );



$("#savebtn").click( function(){
  document.getElementById("overlay").style.display = "block";
  let checked = $('#hauteSaison').is(":checked");
  setTimeout(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
 
      $.ajax({
        type:'POST',
        url:"{{ route('admin.saison.change') }}",
        data:{hauteSaison:checked},
        success:function(){
          $('#exampleModalCenter').modal('toggle');
          document.getElementById("overlay").style.display = "none";
        }
      });
     
  }, 1500);
  
  
});


jQuery(document).ready(function($){
  $('.table tbody').paginathing({
    perPage: 10,
    insertAfter: '.table',
    prevNext: false,
    firstLast: false,
    firstText: '',
    lastText: '',
    liClass: 'page-link',

  });
});
</script>



      <!-- autocomplete search jquery and styles  -->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
      <!-- script for autoComplete tables and serach  -->
      <script>
      function SearchTable(tableName,inputName,col) {
      var availableTags =  [];
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById(inputName);
      filter = input.value.toUpperCase();
      table = document.getElementById(tableName);
      tr = table.getElementsByTagName("tr")
      // fill available tags from the table
      for( var i = 1; i < table.rows.length ; i++)
      {    
        availableTags.push(table.rows[i].cells[1].innerText);
      } 
      // fill the input with  the array of available tags
      $( function() {
      $("#" + inputName).autocomplete({
      source: availableTags
      });
      });
      // show the element searched  by col value
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[col];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>
  
    <!-- script for preview uploaded images -->
    <script>
      $(function () {   
            var fileUpload = document.getElementById("mediaDirectory");
            if(fileUpload){
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader."); 
                }
            }
           }
        });
              
      </script>

<!-- ***************************************************************************************** -->
</body>


</html>
