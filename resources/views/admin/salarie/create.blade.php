@extends('layouts.app')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Ajouter un nouveau salarié</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.salaries.store') }}" enctype="multipart/form-data">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Nom</span>
        </div>
        <input type="text" name="nom" class="@error('nom') is-invalid @enderror form-control" id="nom" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Prenom</span>
        </div>
        <input type="text" name="prenom" class="@error('prenom') is-invalid @enderror form-control" id="prenom" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('prenom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Grade</span>
        </div>
        <select name="grade" class="@error('grade') is-invalid @enderror form-control" id="grade" >
            <option value="">-- Select option --</option>
            <option value="agent">Agent</option>
            <option value="directeur">Directeur</option>
            <option value="cadre">Cadre</option>
        </select>
    </div>
    @error('grade')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Matricule</span>
        </div>
        <input type="text" name="matricule" class="@error('matricule') is-invalid @enderror form-control" id="matricule" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('matricule')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Situation Famillial</span>
        </div>
        <select name="situation_famillial" class="@error('situation_famillial') is-invalid @enderror form-control" id="situation_famillial" >
            <option value="">-- Select option --</option>
            <option value="celibataire">Célibataire</option>
            <option value="marie(e)">Marié</option>
            <option value="marie(e) avec enfants">Marié avec enfants</option>
        </select>
    </div>
    @error('situation_famillial')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Nombre enfants</span>
        </div>
        <input type="number" name="nombre_enfant" class="@error('nombre_enfant') is-invalid @enderror form-control" id="nombre_enfant" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('nombre_enfant')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:150px">Date Prise Fonction</span>
        </div>
        <input type="date" name="date_prise_fonction" class="@error('date_prise_fonction') is-invalid @enderror form-control" id="date_prise_fonction" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('date_prise_fonction')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button id="submit" type="submit" class="btn btn-primary" style="float:right"><i class="fas fa-save"> save</i></button>
    <a href="{{ route('admin.salaries.index') }}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>
    <br><br>
    <hr>
  
</form>


<script>
    $('#situation_famillial').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if(valueSelected == 'marie(e)' || valueSelected == 'celibataire')
    { $('#nombre_enfant').val(0); $('#nombre_enfant').prop("readonly", true); }
    else
    {
        $('#nombre_enfant').prop("readonly", false);$('#nombre_enfant').val('');
    }
}); 
</script>
@endsection





