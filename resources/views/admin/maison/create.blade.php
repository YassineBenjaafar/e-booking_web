@extends('layouts.app')

@section('content')
<div class="container">
<hr> <H2 class="text-muted" align="center">Ajouter une nouvelle maison</H2><hr> 
<br><br>
<form  id="form" method="POST" action="{{ route('admin.maisons.store') }}" enctype="multipart/form-data">
@csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Centres</span>
        </div>
        <select name="centre" id="centre" class="@error('centre') is-invalid @enderror form-control" aria-describedby="inputGroup-sizing-default">
            @foreach ($centres as $centre)
            <option value="{{ $centre->id}}">{{ $centre->libelle }}</option>
            @endforeach
        </select>
      </div>
    @error('centre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Libellé</span>
        </div>
        <input type="text" name="libelle" class="@error('libelle') is-invalid @enderror form-control" id="libelle" aria-describedby="inputGroup-sizing-default">
    </div>
    @error('libelle')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Description</span>
        </div>
        <textarea type="text" name="description" class="@error('description') is-invalid @enderror form-control" id="description" aria-describedby="inputGroup-sizing-default" aria-multiline="true" maxlength ="256"></textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Nombre Piéces</span>
        </div>
        <input type="number" name="nombre_chambre" class="@error('nombre_chambre') is-invalid @enderror form-control" id="nombre_chambre" aria-describedby="inputGroup-sizing-default" aria-multiline="true">
    </div>
    @error('nombre_chambre')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Prix par Nuit</span>
        </div>
        <input type="number"  name="prix_par_nuit" class="@error('prix_par_nuit') is-invalid @enderror form-control" id="nombre_chambre" aria-describedby="inputGroup-sizing-default" aria-multiline="true">
    </div>
    @error('prix_par_nuit')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default" style="width:120px">Photos</span>
        </div>
        <input accept=".gif,.jpg,.png,.jpeg" type="File" name="mediaDirectory[]" class="@error('mediaDirectory') is-invalid @enderror form-control" id="mediaDirectory" multiple>
    </div>
    <br>
  <button id="submit" type="submit" class="btn btn-primary" style="float:right"><i class="fas fa-save"> save</i></button>
  <a href="{{ route('admin.maisons.index')}}" class="btn btn-secondary" style="float:left" ><i class="fas fa-arrow-left topicons"></i>Back</a>

  <br><br><hr />
    <b>Live Preview</b>
    <br><br><div id="dvPreview"></div>

  
</form>
@endsection





