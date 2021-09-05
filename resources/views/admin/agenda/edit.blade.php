@extends('layouts.admin_layout')
@section('content')

<div class="container">
  <hr> <H2 class="text-muted" align="center">Create new range agenda for <b>{{ $entity->label }}</b> </H2><hr> 
  <br><br>
  <div class="form-group">
    <div class="input-group mb-3">
      <div>
      <input type="text"  class="form-control" name="datetimes" id="datetimes" readonly="true">
      </div>
      <div class="input-group-append">
        <button  id="addDateBtn" class="btn btn-success"type="button" title="create agenda"><i class="fa fa-plus fa-lg"></i></button>
      </div>
    </div>
  </div>
<br><br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th> </th>
      </tr>
    </thead>
        <tbody  id="bodyAgendas"></tbody>
</table>
  <form  method="POST" action="{{ route('admin.agendas.update',$entity) }}">
  @csrf
    <div class="btn-group">
      <a class="btn btn-secondary mr-3" title="Go Back !" href="{{ route('admin.entities.index')}}"><i class="fa fa-arrow-left">  <strong>Back</strong></i></a>
      <a id="submit" name="submit" onclick="return confirm('Are you sure you want to update ?')" class="btn btn-primary" title="Save new changes" href="#"><i class="fa fa-floppy-o">  <strong>save</strong></i></a>
    </div>
  </form>
</div>
<script>

  
  var isBtnAddDateActive= false;
  var startDate= moment().startOf('hour');
  var endDate=moment().startOf('hour').add(32, 'hour');
  var agendas=<?=json_encode($agendas)?>;
  refreshDisplayAgendas();
  function removeFromAgendas(index){
    agendas.splice(index,1);
    refreshDisplayAgendas();
  }
  


  function refreshDisplayAgendas(){
    var txt="";
    $("#bodyAgendas").empty();
    agendas.map(myFunction);
    function myFunction(value,index) {
      txt+="<tr><td>";
      txt+=value.start;
      txt+="</td><td>";
      txt+=value.end;
      txt+='</td><td><button onclick="removeFromAgendas('+index+')" class="btn btn-danger" type="button" title="Supprimer agenda"><i class="fa fa-trash" ></i></button>';
      txt+="</td></tr>";
    }
    $('#bodyAgendas').append(txt);
  }
  

  function refreshAgendas(start, end) {
    if(!start && !end) {
      alert('selectionner la date');
    }
    else{
      agendas.push({'start':start.format('YYYY-MM-DD'), 'end':end.format('YYYY-MM-DD') });
      refreshDisplayAgendas();
    }
    isBtnAddDateActive= false;
  }
  $("#addDateBtn").click(function(){
    if(isBtnAddDateActive) {
      refreshAgendas(startDate, endDate);
    }
    else {
      alert('Selectionner une periode');
    }
  });

  $("#submit").click(function(){
    var data = JSON.stringify(agendas);
    data = btoa(data);
    $("<input type='text' name='agendas' value='"+data+"' hidden />").appendTo('form');
    $("form").submit();
  });

$(function() {
  $('input[name="datetimes"]').daterangepicker(
  {
    timePicker: false,
    startDate:   moment().startOf('hour'),
    minDate:  moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'YYYY-MM-DD',
      
    },
    drops: 'down',
    autoApply: true,
    isInvalidDate: function (date) {
      return agendas.reduce(function (bool, range) {
      return bool || (date >= moment(range.start) && date <= moment(range.end));
      }, false);
    }
  },function(start, end){
      startDate=start;
      endDate=end;
      isBtnAddDateActive=true;
    });
});

</script>
@endsection